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
    <script src="{{ asset('assets/js/doc-details-jscript.js')}}"></script>


</head>
<body>

<div class>
    <div>
        <h2>Upload Documents</h2>
        <form id="documentForm" enctype="multipart/form-data">
            @csrf <!-- Include CSRF token for Laravel -->
            <input type="hidden" id="editId">
            <div class="form-group row">
                <label for="documentCategory" class="col-sm-3 col-form-label">Document Category:</label>
                <div class="col-sm-9">
                    <select class="form-control" id="documentCategory" name="documentCategory" required onchange="loadDocumentsAjax(this.value)">
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
                <button type="button" class="btn btn-primary" onclick="save_document()">Upload</button>
                </div>
            </div>
        </form>
    </div>

    <div class="" style="width: 100%; max-width: 800px; margin: auto;">
        <table id="documentTable" class="">
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
    function save_document()
    {
        let userIdDocContent = document.getElementById('user_id_doc').innerHTML;

               save_documentdetails(userIdDocContent)
    }
    function get_Doc(id) {
    try {
        alert("getting doc "+id)
        get_Doc_from_CRM(id); // Call the function
    } catch (exception) {
        alert(exception); // Show the exception message
    }
}

function get_Doc_from_CRM(id) {
    alert("Trying to load document from CRM")
   
   const user_id = document.getElementById('user_id').innerText;
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });

   $.ajax({
       url: "{{ route('Getdocument_CRM.get') }}",
       type: "get",
       data: {
           id: id
       },
       success: function(response) {
           console.log("Data deleted successfully:");
           console.log(response);
           url=response.url;
           source=response.source;
           loadObject(url, id,source);
   // You can process the response data here, e.g., update the table
       },
       error: function(xhr, status, error) {
           console.error("Error deleting data:", error);
       }
   });
} 



function get_Doc_from_portal(id) {
   
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
            loadObject(response,id)
            
            // You can process the response data here, e.g., update the table

        },
        error: function(xhr, status, error) {
            console.error("Error deleting data:", error);
            
        }
    });
} 

function loadObject(url, id,source) {
    alert("source :" +source)
   // for loading from portal const url1 = "http://" + url;
    if(source=="CRM")
    {        
        alert(url)
        const iframe = document.getElementById('imageViewer');
        // Set the iframe source
        iframe.src = url;
    }
    else
    {
        alert("load object else block: "+url)
        url1 = "http://" + url;
        const iframe = document.getElementById('imageViewer');
        iframe.src = url1;
        save_doc_CRM(url1);
        
 
    }




   



   
}







function loadDocumentsAjax(cat)
{
console.log("Category is "+cat);
let userIdDocContent = document.getElementById('user_id_doc').innerHTML;
console.log("User id is"+userIdDocContent)
load_docs(cat,userIdDocContent);

}


function loadDocumentsAjax2(val,userIdDocConten2t) {
    let userIdDocContent = document.getElementById('user_id_doc').innerHTML;
    console.log("Category "+val)
console.log("User id is"+userIdDocContent)
    $.ajax({
        url: '{{ route("load_docs_ajax.get") }}',  // The route to hit
        type: 'GET',
        data: {
            user_id: user_id  // Passing the user_id as data
        },
        success: function(response) {
            // On success, alert the response
            console.log("Response from server: " + JSON.stringify(response));  // Displaying the response as an alert
        },
        error: function(xhr, status, error) {
            // Handle error here
            console.error("Error loading documents: ", error);

            alert("An error occurred while fetching documents.");
        }
    });
}
   

//-----

function load_docs(category,user_id) {
        console.log("in jscriot file")
        alert(category)
        console.log("Trying to Load documents for category:"+ category);
        alert("getting documents for user id "+user_id);
      

        var documents = [];

        if (category === "Educational document") {
            $.ajax({
                url:'{{ route("load_docs.get") }}',
                
                type: "get",
                data: {
                    
                    user_id:user_id
                },
                success: function(response) {
                    console.log("Data loaded successfully:", response);
                    documents = response;
                    populateDocumentSelect(documents);
                },
                error: function(xhr, status, error) {
                    console.error("Error loading data:", error);
                }
            });
        } else if (category === "Identity document") {
            documents = ["Adhaar card", "Voters Id", "Passport", "Driving Licence"];
            populateDocumentSelect(documents);
        } else if (category === "Address proof") {
            documents = ["Electricity bill", "Adhar Card", "Property Tax Receipt", "Domicile certificate"];
            populateDocumentSelect(documents);
        } else if (category === "Other") {
            var documentSelect = $('#document_select');
            documentSelect.empty(); // Clear any existing options
            documentSelect.append('<option value="">Select Document</option>');
            documentSelect.append('<option value="Other">Other</option>');
            documentSelect.after('<input type="text" class="form-control mt-2" id="otherDocument" name="otherDocument" placeholder="Specify other document">');
        } else {
            populateDocumentSelect(documents); // Clear dropdown for unspecified category
        }
    }


    function save_documentdetails(user_id) {
              
              alert("saving for "+user_id);
              var formData = new FormData($('#documentForm')[0]);
              alert(formData);
              formData.append('user_id', user_id);
              $.ajax({
                  url: '{{ route("save_document_details.post") }}',
                  type: 'POST',
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  data: formData,
                  processData: false,
                  contentType: false,
                  success: function(response) {
                      console.log('Upload details saved successfully:', response);
                      alert('Upload details saved successfully!');
                      fetch_doc_details_ajax(email);
      
                      $('#documentForm')[0].reset();
                  },
                  error: function(xhr, status, error) {
                      console.error('Error saving upload details:', error);
                      alert('Error saving upload details: ' + error);
                  }
              });
          }



function save_doc_CRM(url1)
{
    alert("saving in CRM for ");
            
            
              $.ajax({
                  url: '{{ route("save_doc_CRM.post") }}',
                  type: 'POST',
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  data: {url1:url1},
                  processData: false,
                  contentType: false,
                  success: function(response) {
                      console.log('Upload details saved successfully:', response);
                      alert('doc saved in crm successfully!');
                      
                  },
                  error: function(xhr, status, error) {
                      console.error('Error saving upload details:', error);
                      alert('Error saving upload details: ' + error);
                  }
              });

}



          function Delete_doc(id) {
    console.log("Trying to delete data with ID:", id);
    const user_id = document.getElementById('user_id').innerText;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "{{ route('delete_doc_detail.delete') }}",
        type: "DELETE",
        data: {
            id: id
        },
        success: function(response) {
           
            console.log(response);
            fetch_doc_details_ajax(email);
            // You can process the response data here, e.g., update the table

        },
        error: function(xhr, status, error) {
            console.error("Error deleting data:", error);
        }
    });
} 




</script>

</body>
</html>