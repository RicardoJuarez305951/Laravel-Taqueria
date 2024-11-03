function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#preview').attr({'class':'d-block', 
                              'src':e.target.result});
        };
        reader.readAsDataURL(input.files[0]);
        $("#originalIMG").removeClass("d-block");
        $("#originalIMG").css("display", "none");
        $("#text-img").css("display", "none");
    }
  }
  
  $("#file").change(function () {
    filePreview(this);
  });