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
function print_notification_like()
{
    include 'connectuser.php';
  $my_id=$_SESSION['user_id'];
  $query="SELECT * FROM notificationlike 
  WHERE receiver_id='$my_id'";
  $result=mysqli_query($conn,$query);
  while($row=mysqli_fetch_array($result))
  {
    echo "<h3>".get_user2($row[1])."liked your post</h3><br/> "; 
  }
}
?>