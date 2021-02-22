// Get the template HTML and remove it from the doument
var previewNode = document.querySelector("#template");
previewNode.id = "";
var previewTemplate = previewNode.parentNode.innerHTML;
previewNode.parentNode.removeChild(previewNode);

var myDropzone = new Dropzone(document.body, {// Make the whole body a dropzone
    url: "Personalizados/Upload/upload_laudos.php?id_laudo=" + $('#id_laudo').val(), // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 1,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button", // Define the element that should be used as click trigger to select files.
    acceptedFiles: "image/*"
});

myDropzone.on("addedfile", function (file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function () {
	myDropzone.enqueueFile(file);
    };
    myDropzone.emit("thumbnail", file, "");
});

// Update the total progress bar
myDropzone.on("totaluploadprogress", function (progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
});

myDropzone.on("sending", function (file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1";
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
});

// Hide the total progress bar when nothing's uploading anymore
myDropzone.on("queuecomplete", function (progress) {
    document.querySelector("#total-progress").style.opacity = "0";
    //ATUALIZAR AS IMAGENS DOS LAUDOS QUE FORAM ENVIADAS
    $('#BoxImagens').empty();
    $('#BoxImagens').load("Personalizados/Ajax/BoxImoveisImagensVistoria.php?id_laudo=" + $('#id_laudo').val());
});
myDropzone.on("success", function (progress) {
    //document.querySelector("#total-progress").style.opacity = "0";
    //ATUALIZAR AS IMAGENS DOS IMOVEIS QUE FORAM ENVIADAS
    document.querySelector('.dz-success').remove();
    //$('#BoxImagens').load("Personalizados/Ajax/BoxImoveisImagens.php?id_imovel=" + $('#id_imovel').val());
});
// Setup the buttons for all transfers
// The "add files" button doesn't need to be setup because the config
// `clickable` has already been specified.
document.querySelector("#actions .start").onclick = function () {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
};
document.querySelector("#actions .cancel").onclick = function () {
    myDropzone.removeAllFiles(true);
};