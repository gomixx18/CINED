<html>
 
<head>   
 
<!-- 1 -->
<link href="css/plugins/dropzone/basic.css" rel="stylesheet" type="text/css"/>
<link href="css/plugins/dropzone/dropzone.css" rel="stylesheet" type="text/css"/>
<!-- 2 -->

<script src="js/plugins/dropzone/dropzone.js" type="text/javascript"></script>
</head>
 
<body>
 
    <form action="funcionalidad/CargarArchivoBlobTFG.php" enctype="multipart/form-data" method="POST" id="form">
       
        <div class="dropzone" id="drop" name="mainFileUploader">
            <div class="fallback">
                <input name="file" type="file" multiple />
            </div>
        </div>
    </form>
    <div>
        <button type="submit" id="submit-all"> upload </button>
    </div>
    
    
    
</body>




<script>

     
        Dropzone.options.drop = {
            url: "funcionalidad/CargarArchivoBlobTFG.php",
            autoProcessQueue: true,
            uploadMultiple: false,
            maxFiles: 1,
            acceptedFiles: ".docx,.pdf,.doc",

            init: function () {

                var submitButton = document.querySelector("#submit-all");
                var wrapperThis = this;

                submitButton.addEventListener("click", function () {
                    wrapperThis.processQueue();
                    document.getElementById('form').submit();
                });

                this.on("addedfile", function (file) {

                    // Create the remove button
                    var removeButton = Dropzone.createElement("<button class='btn btn-primary '>Remover Archivo File</button>");

                    // Listen to the click event
                    removeButton.addEventListener("click", function (e) {
                        // Make sure the button click doesn't submit the form:
                        e.preventDefault();
                        e.stopPropagation();

                        // Remove the file preview.
                        wrapperThis.removeFile(file);
                        // If you want to the delete the file on the server as well,
                        // you can do the AJAX request here.
                    });

                    // Add the button to the file preview element.
                    file.previewElement.appendChild(removeButton);
                });

               
            }
        };
    
    
</script>

</html>
