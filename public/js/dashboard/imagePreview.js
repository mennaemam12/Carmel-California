function previewImage() {
  var input = document.getElementById("file");
  var preview = document.getElementById("image-preview");

  if (document.getElementById("newImg") != null) {
    document.getElementById("newImg").remove();
  }
  
  // Ensure that a file is selected
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      preview.classList.add("image-preview"); //for styling

      // Set the source of the image to the uploaded file
      preview.innerHTML =
      '<div id="newImg">Selected Image: <img src="' + e.target.result + '" alt="Item Preview"></div>';
    };

    // Read the image file as a data URL
    reader.readAsDataURL(input.files[0]);
  }
}

document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("file")
    .addEventListener("change", previewImage, false);
});
