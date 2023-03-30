$(document).ready(function () {
  $(".signup-form").submit(function (e) {
    e.preventDefault();
    if ($(".email").val() != "" && $(".password").val() != "") {
      $.ajax({
        
      });
    } else {
      swal("Empty Field!", "Please fill all the Input field!", "warning");
    }
  });
});
