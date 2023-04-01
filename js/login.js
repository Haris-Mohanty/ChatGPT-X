$(document).ready(function () {
  $(".login-form").submit(function (e) {
    let email = $(".email").val();
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
        if (response.trim() == "Status Pending") {
          $(".login-form").addClass("d-none");
          $(".verify-btn").removeClass("d-none");
          $(".otp").removeClass("d-none");
          //verify btn
          $(".verify-btn").click(function () {
            //ajax
            $.ajax({
              type: "POST",
              url: "php/verify.php",
              data: {
                email: email,
                otp: $(".otp").val(),
              },
              beforeSend: function () {
                $(".verify-btn").html("Please wait....");
              },
              success: function (response) {
                if(response.trim() == "success"){
                    $(".verify-btn").html("Verify");
                    window.location = "https://google.com";
                }else{
                    swal(response.trim(), "Please Enter the Correct OTP!", "error");
                }
              },
            });
          });
        } else if (response.trim() == "Login Success") {
          window.location = "https://google.com";
        } else {
          swal(response.trim(), response.trim(), "error");
        }
      },
    });
  });
});
