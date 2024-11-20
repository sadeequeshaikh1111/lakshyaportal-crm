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

<script>


    function save() {
        user_id= document.getElementById('user_id').innerText;
        universityBoard= $('#universityBoard').val();
        collegeInstitute= $('#collegeInstitute').val();
        yearOfPassing= $('#passingYear').val();
        cgpaPercentage= $('#cgpaPercentage').val();
        edu_category=$('#cgpaPercentage').val();
        course= $('#course').val();
        
        alert(universityBoard+"  "+collegeInstitute+"  "+passingYear+"  "+cgpaPercentage+"  "+edu_category+" "+course )

        var formData = {
            universityBoard: universityBoard,
            collegeInstitute: collegeInstitute,
            passingYear: passingYear,
            cgpaPercentage:cgpaPercentage,       
            edu_category: edu_category,
            course: course,
            user_id:user_id
            
                };
                alert(formData)
        // Perform validation
        if (!formData.universityBoard || !formData.collegeInstitute || !formData.passingYear || !formData.cgpaPercentage || !formData.edu_category || !formData.course) {
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