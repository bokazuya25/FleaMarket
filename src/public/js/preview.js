function previewFile() {
    var preview = document.getElementById('preview-image');
    var file    = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();
    var imageText = document.getElementById('image-text');

    reader.onloadend = function () {
        preview.src = reader.result;
        if (imageText) {
            imageText.style.display = 'none';
        }
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
        if (imageText) {
            imageText.style.display = 'block';
        }
    }
}
