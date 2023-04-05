$(document).ready(function () {
  $(".upload-form").on("submit", function (e) {
    e.preventDefault();
    //ajax request
    $.ajax({
      type: "POST",
      url: "php/dashboard.php",
      data: {
        question: $("#question").val().toLowerCase(),
        answer: $("#answer").val(),
      },
      beforeSend: function () {},
      success: function (response) {
        if (response.trim() == "success") {
          swal("Successful!", "Question Added Successfully!", "success");
        } else {
          swal(response.trim(), response.trim(), "error");
        }
      },
    });
  });
});
