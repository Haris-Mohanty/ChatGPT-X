$(document).ready(function () {
  $(".login-form").submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "php/login.php",
      data: {
        email: $(".email").val(),
        password: $(".password").val(),
      },
      beforeSend: function () {
        $(".btn-login").html("Please wait...");
    },
    success: function (response) {
          $(".btn-login").html("Login");
        if(response.trim() == "Status Pending"){
            $(".login-form").addClass("d-none");
            $(".verify-btn").removeClass("d-none");
            $(".otp").removeClass("d-none");
        }else{
            swal();
        }
      },
    });
  });
});
