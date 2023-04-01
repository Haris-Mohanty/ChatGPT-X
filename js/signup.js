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
            alert(response);
        },
      });
    } else {
      swal("Empty Field!", "Please fill all the Input field!", "warning");
    }
  });
});
