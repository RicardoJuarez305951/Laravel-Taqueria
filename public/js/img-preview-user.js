function filePreview(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('.preview-photo').attr({'src':e.target.result});
      };
      reader.readAsDataURL(input.files[0]);
  }
}

$("#file").change(function () {
  filePreview(this);
});