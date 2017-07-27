<?php
session_start();
include 'nav_bar.php';
include 'function.php';
include 'connectuser.php';
?>  
<!DOCTYPE html>
<html>
  <head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
    <title>Ask a question</title>
    <link rel="stylesheet" href="ask_question.css" type="text/css">
    <script src = "https://code.jquery.com/jquery.js"></script>
      
      <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src = "js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="ask_question.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <style>
      html {
        margin-top: 50px;
      }

      @media screen and (max-width: 640px) {
                * {
          font-family: 'Josefin Sans', sans-serif;
          /*border: 1px solid blue;*/
        }
      }
    </style>

    <script src="//cdn.ckeditor.com/4.7.1/basic/ckeditor.js"></script>
  </head>
  <body>

    <!-- heading of the file -->
    <header>
      <div class="jumbotron">
        <div class="container">
          <h1>Ask A Question</h1>
        </div>
      </div>
    </header>

    <div class="container">
      <form action="post_question.php" method="post">
      
      <div class="form-group">
        <p class="help-block">Username: 
        <?php 
        $username=get_username();
        echo $username;
        ?></p>
      </div>

      <div class="form-group">
        <label for="question_heading">Ask A Question...</label>
        <input type="text" class="form-control" id="question_heading">
      </div>

      <div class="form-group">
          <label for="ask_question">Enter full description here: </label>
          <textarea name="ask_question" id="ask_question" cols="50" rows="10" class="form-control"></textarea>
       </div>
       
       <script>
            CKEDITOR.replace( 'ask_question' );
        </script>

       <div class="form-group">
        <select class="selectpicker" data-style="btn-danger" id="category" multiple data-max-options="1" data-live-search="true">
          <option value="mess">Mess</option>
          <option value="transport">Transport</option>
          <option value="academics">Academics</option>
          <option value="sports">Sports</option>
          <option value="medical">Medical</option>
          <option value="others">Others</option>
        </select>
      </div>

      <div class="form-group">
        <input type="button" class="btn btn-warning post_but" id="post_question-<?php echo $_SESSION['user_id']; ?>" value="Post">
      </div>
      </form>
    </div>

    <hr>

    <div class="container">
       
    </div>
    

  </body>
</html>

