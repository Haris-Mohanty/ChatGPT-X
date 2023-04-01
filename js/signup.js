$(document).ready(function () {
  $(".signup-form").submit(function (e) {
    e.preventDefault();
    let email = $(".email").val();
    if ($(".email").val() != "" && $(".password").val() != "") {
      $.ajax({
        type: "POST",
        url: "php/signup.php",
        data: {
          email: $(".email").val(),
          password: $(".password").val(),
        },
        cache: false,
        beforeSend: function () {
          $(".signup-btn").html("Please wait.....");
          $(".signup-btn").addClass("disabled");
        },
        success: function (response) {
          $(".signup-btn").html("Signup");
          $(".signup-btn").removeClass("disabled");
          if (response.trim() == "success") {
            $(".signup-form").addClass("d-none");
            $(".otp").removeClass("d-none");
            $(".verify-btn").removeClass("d-none");
            //verify
            $(".verify-btn").click(function () {
              $.ajax({
                type: "POST",
                url: "php/verify.php",
                data: {
                  email: email,
                  otp: $(".otp").val(),
                },
                beforeSend: function () {
                  $(".verify-btn").html("Please wait...");
                  $(".verify-btn").addClass("disabled");
                },
                success: function (response) {
                  if(response.trim() == "success"){
                    
                  }
                },
              });
            });
          } else {
            swal(response.trim(), response.trim(), "error");
          }
        },
      });
    } else {
      swal("Empty Field!", "Please fill all the Input field!", "warning");
    }
  });
});
