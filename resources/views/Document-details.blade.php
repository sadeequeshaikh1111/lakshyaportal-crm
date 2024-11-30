<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Documents</title>
    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <link href="{{ asset('assets/css/edu_details.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/doc_details.css') }}" rel="stylesheet">

</head>
<body>

<div class>
    <div class="doc_form-container" style="width: 100%; max-width: 800px; margin: auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1) align=top;">
        <h2>Upload Documents</h2>
        <form id="documentForm" enctype="multipart/form-data">
            @csrf <!-- Include CSRF token for Laravel -->
            <input type="hidden" id="editId">
            <div class="form-group row">
                <label for="documentCategory" class="col-sm-3 col-form-label">Document Category:</label>
                <div class="col-sm-9">
                    <select class="form-control" id="documentCategory" name="documentCategory" required onchange="load_docs(this.value)">
                        <option value="">Select Category</option>
                        <option value="Educational document">Educational Document</option>
                        <option value="Identity document">Identity Document</option>
                        <option value="Address proof">Address Proof</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="document" class="col-sm-3 col-form-label">Document:</label>
                <div class="col-sm-9">
                    <select class="form-control" id="document_select" name="document" required>
                        <option value="">Select Document</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="documentFile" class="col-sm-3 col-form-label">Upload File:</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" id="documentFile" name="documentFile" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 text-right">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </form>
    </div>

    <div class="" style="width: 100%; max-width: 800px; margin: auto;">
        <table id="documentTable" class="display">
            <thead>
                <tr>
                    <th>Document Category</th>
                    <th>File Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be populated via JavaScript -->
            </tbody>
        </table>
    </div>
</div>
<div>
<iframe id="imageViewer" class="imageViewer"></iframe> 
</div>

<script>
function get_Doc(id) {
    console.log("Trying to delete data with ID:", id);
    const user_id = document.getElementById('user_id').innerText;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "{{ route('Getdocument.get') }}",
        type: "get",
        data: {
            id: id
        },
        success: function(response) {
            console.log("Data deleted successfully:");
            console.log(response);
            loadObject(response)
            
            // You can process the response data here, e.g., update the table

        },
        error: function(xhr, status, error) {
            console.error("Error deleting data:", error);
        }
    });
} 

function loadObject(url) {
    url1="http://"+url
    const viewerDiv = document.getElementById('viewer');
alert("Loading URL "+url)
const iframe = document.getElementById('imageViewer');
iframe.src=url1;}


   
</script>

</body>
</html>