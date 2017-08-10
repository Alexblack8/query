<?php
session_start();
include 'nav_bar.php';
include 'function.php';
if(!isloggedin())
{
  header("Location:index.php");
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome to query</title>
  
  
  <link href="css/bootstrap.min.css" rel="stylesheet">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
	    <title>Query!!</title>
	    <link href="question_display.css" rel="stylesheet">
	    <script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	    <script src="like_unlike.js" type="text/javascript"></script>
	    <script src="like_unlike_reply.js" type="text/javascript"></script>
	    <style>
			
	    </style>
      <link rel="stylesheet" href="modern-responsive-cards-design/css/style1.css">

  
</head>

<body>
  <div class="viewport">
   <div class="title">
   
   </div>
 <div class="cards">
  
   <div class="card">
    <a href="questions.php">
     <div class="card_img card1">
          
     </div>
     
     <h3>Questions</h3>
     <div class="line">
     </div>
     <p> Ask questions to the student community of iit indore  </p>
     </a>
    
   </div>
   <div class="card">
   <a href="notification_homepage.php">
     <div class="card_img card2">
      
     </div>

     <h3>Notifications</h3>
     <div class="line">
     </div>
    <p> Here you can all the notifications regarding your posts</p>
    </a>
   </div>
   <div class="card">
    <a href="feedbacks.php">
     <div class="card_img card3">
 
     </div>
     
     <h3> Feedbacks</h3>
     <div class="line">
     </div>
     <p>Post feedbacks regarding <br/>
                        Mess<br/>
                        Academics<br/>
                        Transort<br/>
                        Sports & Medical Facilities<br/></p>
    </a>
   </div>
   <div class="card">
    <a href="user_profile.php?userId=<?php echo $_SESSION['user_id'];?>">
     <div class="card_img card4">
       
     </div>
     
     <h3>Profile</h3>
     <div class="line">
     </div>
     <p>Visit your Profile<br>
                        <span>See the questions and feedbacks<br/>
                        posted by you</span></p></div>
   </a>
   
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

  
</body>
</html>
