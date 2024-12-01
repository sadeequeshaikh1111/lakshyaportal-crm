



    
    function populateDocumentSelect(documents) {
        var documentSelect = $('#document_select');
        documentSelect.empty(); // Clear any existing options
        documentSelect.append('<option value="">Select Document</option>');

        documents.forEach(function(doc) {
            documentSelect.append('<option value="' + doc + '">' + doc + '</option>');
        });
    }



   


    
 