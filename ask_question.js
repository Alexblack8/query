$(document).ready(function() {
    $(".post_but").click(function() {
      var id = this.id;
      var split_id = id.split("-");
      var user_id = split_id[1];
      var question_heading = document.getElementById("question_heading").value;
      var ask_question = document.getElementById("ask_question").value;
      var category = document.getElementById("category").value;
      
      $.ajax({
        url: 'post_question.php',
        type: 'POST',
        data: {question_heading:question_heading,ask_question:ask_question,category:category,user_id:user_id},
        dataType: 'json',
        success: function(data) {
          window.location="user_profile.php?userId="+user_id;
        }
     
      });
  
    });
 
});
