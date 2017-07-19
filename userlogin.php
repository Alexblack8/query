<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
     
      <script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
      <script src="like_unlike.js" type="text/javascript"></script>
      <script src="like_unlike_reply.js" type="text/javascript"></script>
      <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
      <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">

    <link href="question_display.css" rel="stylesheet">

      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
      <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>  
</head>
<body>

</body>
</html>
<?php
session_start();
include 'function.php';
include 'connectuser.php';
     $username=$_POST['username'];//to get the username from the form
     $password=$_POST['password'];//to get the password from the form
      
          
           
             $query="SELECT * FROM user WHERE password='$password' 
             AND user_name='$username'";
             $result=mysqli_query($conn,$query);
             if(mysqli_num_rows($result)==1)//to check if the user exists 
             {
                  $row=mysqli_fetch_array($result);
                  $_SESSION['user_id']=$row[0];//initialising the session's variable

                  header("Location: http://localhost/webproject/sign-up-login-form/homepage.php");
             }
             else
             {
               ?>
               <div class="demo-area">
    <div class="container">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-1">Proceed</button>

      <div class="modal fade" id="modal-1" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Login message</h4>
            </div>

            <div class="modal-body">
              <h1><?php echo "username or password is incorrect";?></h1>
            </div>

            <div class="modal-footer">
              <a href="register.php" class="btn btn-primary" >Proceed</a>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- end demo-area -->
  <?php
             }
           
      
      ?>