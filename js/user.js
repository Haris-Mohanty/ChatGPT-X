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
        // $(".answer").html(response);
        if (response.trim() != "Thank You!") {
          let answer_el = document.querySelector(".answer");
          let data = JSON.parse(response.trim());
          let array_text = [data.answer];
          let char_index = 0;
          animation();
          function animation() {
            char_index++;
            answer_el.innerHTML = array_text[0].slice(0, char_index) + " | ";
            if(char_index == data[0].length){
                clearTimeout(myTimeout);
            }
            let myTimeout = setTimeout(function () {
              animation();
            }, 30);
          }
        } else {
        }
      },
    });
  });
});
