<html>
<head>
  <link href="css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
<style>
      html {
        margin-top: 90px;
      }
      </style>
      <script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="question_display.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
</head>
</html>

<?php
include 'nav_bar.php';
include 'function.php';
function send_notification($sender_id,$receiver_id,$category,$ref_id)
{
  include 'connectuser.php';
  $query="INSERT INTO notificationlike (sender_id,receiver_id,category,ref_id)
  VALUES ('$sender_id','$receiver_id','$category','$ref_id')";
  
  mysqli_query($conn,$query);
  

}
/*$query="INSERT INTO notifications (sender_id,receiver_id,category)
                      VALUES ('$my_id','$row[1]','$category[1]')";
                      mysqli_query($conn,$query);*/
function print_notification()
{
    include 'connectuser.php';
  $my_id=$_SESSION['user_id'];
  $query="SELECT * FROM notificationlike 
  WHERE receiver_id='$my_id' AND unread='1' 
  ORDER BY reg_time";
  $result=mysqli_query($conn,$query);
  $temp=0;
  if(mysqli_num_rows($result)==0)
  {
  	echo "no new notifications to display";
  }
  else
  {
 	 while($row=mysqli_fetch_array($result))
  {
  	$id=$row[1];
  	if($id!=$my_id)
  	{
  	  $category=$row['category'];
  	  $ref_id=$row['ref_id'];
       //Notifications of reply     
  	  if($category=='reply')
  	    {
          $question=get_question($ref_id);
          ?>
          <div class="col-md-1 main-content1" bgcolor="#eee">
          </div>
          <div class="col-md-7 main-content1" bgcolor="#eee">
          <div class="cards_animation" id="card-<?php echo $color_var ;?>">
          <a href="article.php?quest_id=<?php echo $ref_id;?>"><h3><?php $name=get_user2($row[1]);echo $name;?> Question: <?php echo$question;?></h3></a> replied to your post<br/></h3></a><br/> 
          </div>
          </div>
        <?php

          $query2="UPDATE notificationlike SET unread='0' WHERE id='$row[0]'";
          mysqli_query($conn,$query2);
           $temp=1;
  	    }

  	    //notification of like of question
  	  else if($category=="question")
  	 {

  	  	$query="SELECT * FROM question WHERE question_id='$ref_id' ORDER BY reg_time DESC";
  		  $result2=mysqli_query($conn,$query);
  		  $row2=mysqli_fetch_array($result2);
  		  $question=$row2[2];
  		  ?>
  		  <div class="col-md-1 main-content1" bgcolor="#eee">
          </div>
  		  <div class="col-md-7 main-content1" bgcolor="#eee">
  		  <div class="cards_animation" id="card-<?php echo $color_var ;?>">
  		  <a href="article.php?quest_id=<?php echo $ref_id ;?>"><h3><?php $name=get_user2($row[1]);echo $name;?> liked  your post<br/> <?php echo $question;?></h3><br/></a>
  		  </div>
  		  </div>
  		  <?php 
        $query2="UPDATE notificationlike SET unread='0' WHERE id='$row[0]'";
        mysqli_query($conn,$query2);
        $temp=1;
        
  	}
  	 

  	
    
  }

  
}
if($temp!='1')
{
  echo "no new notifications to display";
}


}
}


?>
