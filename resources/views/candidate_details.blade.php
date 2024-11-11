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

function view(str)
{alert("view clicked for userid"+str)}

    
    </script>




