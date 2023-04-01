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
        
      },
    });
  });
});
