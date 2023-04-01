$(document).ready(function () {
  $(".signup-form").submit(function (e) {
    e.preventDefault();
    if ($(".email").val() != "" && $(".password").val() != "") {
      $.ajax({
        type: "POST",
        url: "php/signup.php",
        data: {
          email: $(".email").val(),
          password: $(".password").val(),
        },
        cache: false,
        beforeSend : function(){
          $(".signup-btn").html("Please wait.....");
          $(".signup-btn").addClass("disabled");
        },
        success: function (response) {
          $(".signup-btn").html("Signup");
          $(".signup-btn").removeClass("disabled");
            if(response.trim() == "success"){
              $(".signup-form").addClass("d-none");
              $(".otp").removeClass("d-none");
              $(".verify-btn").removeClass("d-none");
              //verify
              $(".verify-btn").
            }else{
              swal(response.trim(), response.trim(), "error");
            }
        },
      });
    } else {
      swal("Empty Field!", "Please fill all the Input field!", "warning");
    }
  });
});
