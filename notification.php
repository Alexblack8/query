<?php


function send_notification_like($sender_id,$receiver_id,$category,$ref_id)
{
	include 'connectuser.php';
  $query="INSERT INTO notificationlike (sender_id,receiver_id,category,ref_id)
  VALUES ('$sender_id','$receiver_id','$category','$ref_id')";
  if(mysqli_query($conn,$query))
  {
  	echo "<br/>success";
  }
  else
  {
  	echo "<br/>error in sending notifications";
  }
}
/*$query="INSERT INTO notifications (sender_id,receiver_id,category)
                      VALUES ('$my_id','$row[1]','$category[1]')";
                      mysqli_query($conn,$query);*/

?>