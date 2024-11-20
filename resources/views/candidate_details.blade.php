<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidate Page') }}
            This is the candidate details page.
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table id="candidates-table" class="table-container mt-5">
                        <thead>
                            <tr>
                                <th>email</th>
                                <th>user_id</th>
                                <th>district</th>
                                <th>mobile_number</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                    </table>                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

    <script>
    $(document).ready(function() {
    // Trigger the fetch function when the page loads
    fetchEducationalDetails_ajax("email");
    alert("data loadimg")
});

function fetchEducationalDetails_ajax(email) {
    console.log("Trying to load data");

    $('#candidates-table').DataTable({
    processing: true,
    serverSide: true,
    destroy: true,
    ajax: {
        url: "{{ route('Fetch_candidates.get') }}",
        type: "GET",
        data: {
            email: email, // Pass email as a parameter if needed
            
        }
    },
    columns: [
        
        { data: 'email', name: 'email' },       // Column for User ID
            { data: 'User_id', name: 'User_id' },           // Column for email
            { data: 'district', name: 'district' },     // Column for city/district
            { data: 'mobile_number', name: 'mobile_number' },  // Column for mobile number       
        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false,
            render: function (data, type, row, meta) {
                return data; // Render HTML content for actions
            }
        }
    ]
});

}

function view(userId) {
    
    window.location.href = `/candidate-ac-details?user_id=${userId}`
   
}


function getBasicDetails(user_id) {
    console.log("Entering getBasicDetails");
    $.ajax({
        url: "/Fetch_candidate_AC_details", // Replace with your actual route path
        method: "GET",
        data:{user_id:user_id},
        success: function(response) {
            console.log(response); // For debugging purposes
                        
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error:", textStatus, errorThrown);
            alert("Failed to get details!");
        }
    });
}
function Delete(id) {
    console.log("Trying to delete data with ID:", id);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "{{ route('delete_edu_detail.delete') }}",
        type: "DELETE",
        data: {
            id: id
        },
        success: function(response) {
            console.log("Data deleted successfully:");
            console.log(response);
            fetchEducationalDetails_ajax(email);
            // You can process the response data here, e.g., update the table

        },
        error: function(xhr, status, error) {
            console.error("Error deleting data:", error);
        }
    });
}
function save() {
                alert(email,0);
                

        var formData = {
            universityBoard: $('#universityBoard').val(),
            collegeInstitute: $('#collegeInstitute').val(),
            passingYear: $('#passingYear').val(),
            cgpaPercentage: $('#cgpaPercentage').val(),
            yearOfPassing: $('#yearOfPassing').val(),
            edu_category: $('#edu_category').val(),
            course: $('#course').val(),
            editId: $('#editId').val(),
            email:email,
            user_id:user_id
                };

        // Perform validation
        if (!formData.universityBoard || !formData.collegeInstitute || !formData.passingYear || !formData.cgpaPercentage || !formData.yearOfPassing || !formData.edu_category || !formData.course) {
            alert("All fields are required.");
            return;
        }

        // Example of handling form submission or AJAX call
        // Replace with your implementation
        alert("Data inserted: " + JSON.stringify(formData));
        $.ajax({
        type: 'POST',
        url: "{{ route('save_edu_details.post') }}",
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            alert(response.message); // Show success message
            $('#educationForm')[0].reset(); // Reset form
            $('#editId').val(''); // Clear editId if needed
            fetchEducationalDetails_ajax(email);
        },
        error: function(xhr, status, error) {
            alert('An error occurred while saving data.');
            console.error(error);
        }
    });
        // Reset form
        $('#educationForm')[0].reset();
        $('#editId').val('');
    }

    </script>




