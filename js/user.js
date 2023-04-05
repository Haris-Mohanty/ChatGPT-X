$(document).ready(function () {
  $(".search-btn").on("click", function () {
    //ajax request
    let question = $(".user-question").val();
    $.ajax({
      type: "POST",
      url: "php/user.php",
      data: {
        question: question,
      },
      beforeSend: function () {},
      success: function (response) {
        $(".gpt-box").addClass("d-none");
        $(".answer-box").removeClass("d-none");
        $(".question").html(question);
      },
    });
  });
});
