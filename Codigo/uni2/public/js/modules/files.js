window.onload = function () {
    setTimeout(function () {
        $('#loader-gallery').addClass('hide');
        $('#lightBoxGallery').removeClass('hide');
    }, 1000);
};

$(document).ready(function () {

    Dropzone.options.myAwesomeDropzone = {
        acceptedFiles: acceptFile(),
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 10,
        maxFiles: 10,
        init: function () {
            var myDropzone = this;
            this.element.querySelector("button[type=submit]").addEventListener("click", function (e) {
                e.preventDefault();
                e.stopPropagation();
                myDropzone.processQueue();
            });
            this.on("sendingmultiple", function () {
            });
            this.on("successmultiple", function (files, response) {
            });
            this.on("errormultiple", function (files, response) {
            });
        }
    }
});

function acceptFile() {

    var route = $('#route').val();
    var name = route.split('/');
    if (name[3] === 'gallery') {
        return 'image/jpeg,image/png';
    }
    return ".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf";
}