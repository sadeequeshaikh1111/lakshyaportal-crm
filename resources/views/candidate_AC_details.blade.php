<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidate AC Page') }}
            Candidate Account Details
        </h2>
    </x-slot>
    <link href="{{ asset('assets/css/Account_details.css') }}" rel="stylesheet">

    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Tabs Section -->
                    <div class="border-b border-gray-300 mb-4">
                        <ul class="flex">
                            <li class="mr-6">
                                <a href="javascript:void(0)" id="basic-tab" class="text-blue-600 hover:text-blue-900">Basic Details</a>
                            </li>
                            <li class="mr-6">
                                <a href="javascript:void(0)" id="educational-tab" class="text-blue-600 hover:text-blue-900">Educational Details</a>
                            </li>
                            <li class="mr-6">
                                <a href="javascript:void(0)" id="document-tab" class="text-blue-600 hover:text-blue-900">Document Details</a>
                            </li>
                            <li class="mr-6">
                                <a href="javascript:void(0)" id="applied-exams-tab" class="text-blue-600 hover:text-blue-900">Applied Exams</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Basic Details Section -->
                    <div id="basic-details-section" class="tab-content">
                        <h3 class="font-semibold text-lg text-gray-700 mb-4">Basic Details</h3>
                        <div id="basic-details" class="mb-6">
                        <div class="form-container" style="width: 100%; max-width: 800px; margin: auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-row">
            <label for="first_name">First Name :</label>
            <input type="text" id="first_name" name="first_name" required autofocus autocomplete="given-name" disabled>
            <div class="error">{{ $errors->first('first_name') }}</div>
        </div>

        <div class="form-row">
            <label for="middle_name">Middle Name:</label>
            <input type="text" id="middle_name" name="middle_name" autocomplete="additional-name" disabled>
            <div class="error">{{ $errors->first('middle_name') }}</div>
        </div>

        <div class="form-row">
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required autocomplete="family-name" disabled>
            <div class="error">{{ $errors->first('last_name') }}</div>
        </div>

        <div class="form-row">
            <label for="mother_name">Mother's Name:</label>
            <input type="text" id="mother_name" name="mother_name" autocomplete="additional-name" disabled>
            <div class="error">{{ $errors->first('mother_name') }}</div>
        </div>

        <div class="form-row">
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required disabled>
            
            <div class="error">{{ $errors->first('dob') }}</div>
        </div>

        <div class="form-row">
            <label for="permanent_address">Permanent Address:</label>
            <textarea id="permanent_address" name="permanent_address" rows="3" required disabled></textarea>
            <div class="error">{{ $errors->first('permanent_address') }}</div>
        </div>

        <div class="form-row">
            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender" autocomplete="additional-name" disabled>

            <div class="error">{{ $errors->first('gender') }}</div>
        </div>

        <div class="form-row">
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" autocomplete="additional-name" disabled>

            <div class="error">{{ $errors->first('category') }}</div>
        </div>

        <div class="form-row">
            <label for="country">Country:</label>
            <input type="text" id="country" name="country" autocomplete="additional-name" disabled>

            <div class="error">{{ $errors->first('country') }}</div>
        </div>

        <div class="form-row">
            <label for="state">State:</label>
         
            <input type="text" id="state" name="state" autocomplete="additional-name" disabled>

            <div class="error">{{ $errors->first('state') }}</div>
        </div>

        <div class="form-row">
            <label for="district">District:</label>
      
            <input type="text" id="district" name="district" autocomplete="additional-name" disabled>

            <div class="error">{{ $errors->first('district') }}</div>
        </div>

        <div class="form-row">
            <label for="taluka">Taluka:</label>
            <input type="text" id="taluka" name="taluka" required autocomplete="address-level3" disabled>
            <div class="error">{{ $errors->first('taluka') }}</div>
        </div>

        <div class="form-row">
            <label for="mobile_number">Mobile Number:</label>
            <input type="tel" id="mobile_number" name="mobile_number" required autocomplete="tel" disabled>
            <div class="error">{{ $errors->first('mobile_number') }}</div>
        </div>

        <div class="form-row">
            <label for="exam_location_1">Preferred Exam Location 1:</label>
            <input type="text" id="exam_location_1" name="exam_location_1" required disabled>
            <div class="error">{{ $errors->first('exam_location_1') }}</div>
        </div>

        <div class="form-row">
            <label for="exam_location_2">Preferred Exam Location 2:</label>
            <input type="text" id="exam_location_2" name="exam_location_2" required disabled>
            <div class="error">{{ $errors->first('exam_location_2') }}</div>
        </div>

        <div class="form-row">
            <label for="exam_location_3">Preferred Exam Location 3:</label>
            <input type="text" id="exam_location_3" name="exam_location_3" required style="width: 100%;" disabled>
            <div class="error">{{ $errors->first('exam_location_3') }}</div>
        </div>

        <!-- Footer -->
        <div class="form-footer">
            <button type="button" onclick="saveAndNext()" style="background-color: #6366F1; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Save and Next</button>
            <button type="button" onclick="enableEdit()" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Edit</button>
        </div>
    </form>
</div>


             </div>
                    </div>
                    <!-- Educational Details Section -->                     
                    <div id="educational-details-section" class="tab-content" style="display:none;">
                        <h3 class="font-semibold text-lg text-gray-700 mb-4">Educational Details</h3>
                        <div id="user_id"></div>
                        <div id="educational-details" class="mb-6">
                        @include('educational-details')

                        </div>
                    </div>

                    <!-- Document Details Section -->
                    <div id="document-details-section" class="tab-content" style="display:none;">
                        <h3 class="font-semibold text-lg text-gray-700 mb-4">Document Details</h3>
                        <div id="document-details" class="mb-6">
                            <p>Loading Document Details...</p>
                            <div id="user_id_doc">s</div>
                            @include('Document-details')

                        </div>
                    </div>

                    <!-- Applied Exams Section -->
                    <div id="applied-exams-section" class="tab-content" style="display:none;">
                        <h3 class="font-semibold text-lg text-gray-700 mb-4">Applied Exams</h3>
                        <div id="applied-exams" class="mb-6">
                            <p>Loading Applied Exams...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        const userId = "{{ $user_id }}"; // User ID passed from the controller
        console.log("Loading data for User ID:", userId);

        // Load Basic Details by default
        getBasicDetails(userId);

        // Tab Click Handlers
        $('#basic-tab').on('click', function() {
            switchTab('basic');
            getBasicDetails(userId); // Fetch Basic Details
        });

        $('#educational-tab').on('click', function() {
            switchTab('educational');
            getEducationalDetails(userId); // Fetch Educational Details
        });

        $('#document-tab').on('click', function() {
            switchTab('document');
            getDocumentDetails(userId); // Fetch Document Details
        });

        $('#applied-exams-tab').on('click', function() {
            switchTab('applied-exams');
            getAppliedExams(userId); // Fetch Applied Exams
        });
    });
    function enableEdit() {
        const inputs = document.querySelectorAll("input, select, textarea");
        inputs.forEach(input => input.disabled = false);
    }
    function switchTab(tabName) {
        // Hide all sections
        $('.tab-content').hide();

        // Remove active class from all tabs
        $('ul li a').removeClass('text-blue-900').addClass('text-blue-600');

        // Show the relevant tab section
        $('#' + tabName + '-details-section').show();

        // Set the active class on the clicked tab
        $('#' + tabName + '-tab').removeClass('text-blue-600').addClass('text-blue-900');
    }

    function getBasicDetails(userId) {
        $.ajax({
            url: "/Fetch_candidate_AC_details", // Replace with your actual API route
            method: "GET",
            data: { user_id: userId },
            success: function(response) {
                if (response.success) {
                    const data = response.data;
                   // renderBasicDetails(data);
                   
                   populate_basic_details(data)

                
                } else {
                    $('#basic-details').html('<p>Error loading basic details.</p>');
                }
            },
            error: function() {
                $('#basic-details').html('<p>Failed to load basic details.</p>');
            }
        });
    }

    function populate_basic_details(data) {
    // Render the basic details form with inputs initially locked for editing
    alert(data.first_name)
    document.getElementById("first_name").value = data.first_name || '';
    document.getElementById("middle_name").value = data.middle_name || '';
    document.getElementById("last_name").value = data.last_name || '';
    document.getElementById("mother_name").value = data.mother_name || '';
    document.getElementById("dob").value = data.date_of_birth || '';
    document.getElementById("permanent_address").value = data.permanent_address || '';
    document.getElementById("gender").value = data.gender || '';
    document.getElementById("category").value = data.Category || '';

    document.getElementById("country").value = data.country || '';
    document.getElementById("state").value = data.state || '';
    document.getElementById("district").value = data.district || '';
    document.getElementById("taluka").value = data.taluka || '';
    document.getElementById("mobile_number").value = data.mobile_number || '';
    document.getElementById("exam_location_1").value = data.preferred_exam_location_1 || '';
    document.getElementById("exam_location_2").value = data.preferred_exam_location_2 || '';
    document.getElementById("exam_location_3").value = data.preferred_exam_location_3 || '';

}

    // Placeholder functions for other sections (Educational, Document, Applied Exams)
    function getEducationalDetails(userId) {
       // $('#educational-details').html('<p>Loading Educational Details...</p>');
       alert("Fetching educational details")
       fetchEducationalDetails_ajax(userId)    }

    function getDocumentDetails(userId) {
        document.getElementById('user_id_doc').innerText = userId;
        fetch_doc_details_ajax(userId);

        
    }

    function getAppliedExams(userId) {
        $('#applied-exams').html('<p>Loading Applied Exams...</p>');
    }

    function fetchEducationalDetails_ajax(user_id ) {
    console.log("Trying to load data");
    document.getElementById('user_id').innerText = user_id;

    $('#eduDetailsTable').DataTable({
    processing: true,
    serverSide: true,
    destroy: true,
    ajax: {
        url: "{{ route('get_eduDetails_ajax.get') }}",
        type: "GET",
        data: {
            // Pass email as a parameter if needed
            user_id:user_id
        }
    },
    columns: [
        
        { data: 'university_board', name: 'university_board' },
        { data: 'college_institute', name: 'college_institute' },
        {data:'edu_category',name:'edu_category'},
        {data:'course',name:'course'

        },

        { data: 'passing_year', name: 'passing_year' },
        { data: 'cgpa_percentage', name: 'cgpa_percentage' },
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
});}



function fetch_doc_details_ajax(userId) {
        const user_id = userId;
        const user_id_int = parseInt(user_id, 10);
    console.log("Trying to load data for "+user_id );

    $('#documentTable').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        ajax: {
            url: "{{ route('fetch_doc_details.get') }}",
            type: "GET",
            data: {
                // Pass email as a parameter if needed
                user_id:user_id_int

            }
        },

        columns: [

        { data: 'category', name: 'category' },
        { data: 'file_name', name: 'file_name' },
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
   </script>

