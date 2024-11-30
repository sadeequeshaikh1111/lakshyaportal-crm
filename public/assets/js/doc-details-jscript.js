   


    function load_docs(category) {
        console.log("Trying to Load documents for category:", category);
        const user_id = document.getElementById('user_id_doc').innerText;
        alert("getting documents for user id "+user_id);

        var documents = [];

        if (category === "Educational document") {
            $.ajax({
                url: "{{ route('load_docs.get') }}",
                type: "get",
                data: {
                    email: email,
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

    function populateDocumentSelect(documents) {
        var documentSelect = $('#document_select');
        documentSelect.empty(); // Clear any existing options
        documentSelect.append('<option value="">Select Document</option>');

        documents.forEach(function(doc) {
            documentSelect.append('<option value="' + doc + '">' + doc + '</option>');
        });
    }

    function save_documentdetails(table) {
        const user_id = document.getElementById('user_id').innerText;

        var formData = new FormData($('#documentForm')[0]);
        alert(formData);
        formData.append('email', email);
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
            console.log("Data deleted successfully:");
            console.log(response);
            fetch_doc_details_ajax(email);
            // You can process the response data here, e.g., update the table

        },
        error: function(xhr, status, error) {
            console.error("Error deleting data:", error);
        }
    });
} 


    
 