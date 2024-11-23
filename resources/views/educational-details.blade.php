<!DOCTYPE html>
<html lang="en">
<head>

<link href="{{ asset('assets/css/edu_details.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educational Details</title>
    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">

</head>
<body>

<div class="main_container mt-5">
    <div class="form-container">
        <h2>Educational Details</h2>
        <form id="educationForm">
            <input type="hidden" id="editId">
            <div class="form-grid">
                <div class="form-group">
                    <label for="universityBoard" class="col-form-label">University/Board:</label>
                    <input type="text" class="form-control" id="universityBoard" name="universityBoard" required>
                </div>
                <div class="form-group">
                    <label for="collegeInstitute" class="col-form-label">College/Institute:</label>
                    <input type="text" class="form-control" id="collegeInstitute" name="collegeInstitute" required>
                </div>
                <div class="form-group">
                    <label for="edu_category" class="col-form-label">Category:</label>
                    <select class="form-control" id="edu_category" name="edu_category" required>
                        <option value="">Select Category</option>
                        <option value="10th">10th</option>
                        <option value="12th">12th</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Graduation">Graduation</option>
                        <option value="Post Graduation">Post Graduation</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="course" class="col-form-label">Course:</label>
                    <select class="form-control" id="course" name="course" required>
                        <option value="">Select Course</option>
                        <option value="Arts">Arts</option>
                        <option value="Commerce">Commerce</option>
                        <option value="Science">Science</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Computer Applications">Computer Applications</option>
                        <option value="IT">IT</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="passingYear" class="col-form-label">Passing Year:</label>
                    <input type="number" class="form-control" id="passingYear" name="passingYear" required>
                </div>
                <div class="form-group">
                    <label for="cgpaPercentage" class="col-form-label">CGPA/Percentage:</label>
                    <input type="text" class="form-control" id="cgpaPercentage" name="cgpaPercentage" required>
                </div>
            </div>
            <div class="form-group text-right">
                <button type="button" class="btn btn-primary" onclick="save()">Save</button>
            </div>
        </form>

        <h2>Educational Details</h2>
        <table class="table table-bordered" id="eduDetailsTable">
            <thead>
                <tr>
                    <th>University/Board</th>
                    <th>College/Institute</th>
                    <th>Category</th>
                    <th>Course</th>
                    <th>Passing Year</th>
                    <th>CGPA/Percentage</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Add CSRF Token Meta Tag -->

<script>

    function save() {
        // Get form values
        const user_id = document.getElementById('user_id').innerText;

        const universityBoard = $('#universityBoard').val();
        const collegeInstitute = $('#collegeInstitute').val();
        const passingYear = $('#passingYear').val();
        const cgpaPercentage = $('#cgpaPercentage').val();
        const edu_category = $('#edu_category').val();
        const course = $('#course').val();

        // Perform validation
        if (!universityBoard || !collegeInstitute || !passingYear || !cgpaPercentage || !edu_category || !course) {
            alert("All fields are required.");
            return;
        }

        // Prepare form data
        const formData = {
            user_id: user_id,
            universityBoard: universityBoard,
            collegeInstitute: collegeInstitute,
            passingYear: passingYear,
            cgpaPercentage: cgpaPercentage,
            edu_category: edu_category,
            course: course,
        };

        // Debug form data
        console.log("Form Data:", formData);

        // AJAX call to save educational details
        $.ajax({
            type: 'POST',
            url: "{{ route('save_edu_details.post') }}", // Ensure this route exists in Laravel
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
            },
            success: function(response) {
                alert(response.message || "Data saved successfully!"); // Show success message
                $('#educationForm')[0].reset(); // Reset form
              //  $('#editId').val(''); // Clear editId if needed
              $('#eduDetailsTable').DataTable().ajax.reload(null, false);
                // Refresh educational details (ensure this function is defined)
            },
            error: function(xhr, status, error) {
                console.error("Error occurred:", error);
                alert("An error occurred while saving data.");
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
            $('#eduDetailsTable').DataTable().ajax.reload(null, false);
            // You can process the response data here, e.g., update the table

        },
        error: function(xhr, status, error) {
            console.error("Error deleting data:", error);
        }
    });
}

</script>