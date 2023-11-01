
const uploadInput = document.getElementById("uploadInput");


const uploadedImage = document.getElementById("uploadedImage");

uploadInput.addEventListener("change", function() {
  const file = uploadInput.files[0];

  if (file) {
    const reader = new FileReader();

    reader.onload = function(e) {
      
      uploadedImage.src = e.target.result;
    };

    
    reader.readAsDataURL(file);
  }
});
