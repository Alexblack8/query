<html>
<head>
  <link href="css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
<style>
      html {
        margin-top: 50px;
      }
      </style>
      <script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
  	  $category=$row[4];
  	  $ref_id=$row[6];
  	  if($category=='reply')
  	    {
          echo "<a href=''><h3>".get_user2($row[1])." replied to your post<br/> </a></h3><br/> "; 
          $query2="UPDATE notificationlike SET unread='0' WHERE id='$row[0]'";
          mysqli_query($conn,$query2);
           $temp=1;
  	    }
  	  else if($category=="question")
  	 {
  	  	$query="SELECT * FROM question WHERE question_id='$ref_id' ORDER BY reg_time DESC";
  		  $result2=mysqli_query($conn,$query);
  		  $row2=mysqli_fetch_array($result2);
  		  $question=$row2[2];
  		  echo "<h3>".get_user2($row[1])." liked  your post<br/>Question: ".$question."</h3><br/> "; 
        $query2="UPDATE notificationlike SET unread='0' WHERE id='$row[0]'";
        mysqli_query($conn,$query2);
        $temp=1;
  	}
  	 else if($category=='like')
  	 {
  		  echo "<h3>".get_user2($row[1])." liked  your post</h3><br/> "; 
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
