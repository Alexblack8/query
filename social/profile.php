<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
  <body>
<?php include 'connect.php';?>
<?php include 'functions.php';?>
<?php include 'header.php';?>
<?php
session_start();
if(isset($_GET['user']) && !empty($_GET['user']))
{
  $id=$_GET['user'];
  
}
else
{
  $id=$_SESSION['user_id'];
}
 $query="SELECT * FROM data WHERE id='$id'";
 $result=mysqli_query($conn,$query);
 if(mysqli_num_rows($result)==1)
 {
  $row=mysqli_fetch_array($result);
  ?>
  <h1>Name  : <?php echo $row[1];?></h1>
  <h2>Email : <?php echo $row[3];?></h2>
  <?php
  $my_id=$_SESSION['user_id'];
  if($id!=$my_id)
  {
   
    $query="SELECT id FROM friends WHERE (user_one='$id' AND user_two='$my_id')
    OR (user_two='$id' AND user_one='$my_id')";
    $result=mysqli_query($conn,$query);
    
    if(mysqli_num_rows($result)==1)
    {
      
      
      echo "<a href=''>Already Friends</a>";
    } 
    else
  {
    $from_query="SELECT * FROM friend_rqst WHERE from1='$my_id' AND to1='$id'";
    $to_query="SELECT * FROM friend_rqst WHERE from1='$id' AND to1='$my_id'";

     
       $result1=mysqli_query($conn,$from_query);
      $result2=mysqli_query($conn,$to_query);
      if(mysqli_num_rows($result1)==1)
      {
       echo "friend request already sent";
      }    
        else if(mysqli_num_rows($result2)==1)
       {
           echo "<form method='post'><input type='submit' name='accept' value='Accept Request'></form>";
           if(isset($_POST['accept']))
          {  
             $query="INSERT INTO friends (user_one,user_two)
             VAlUES ('$my_id','$id')";
             mysqli_query($conn,$query);
          }

             
       }
       else
       {
        echo "<form method='post' action=''><input type='submit' name='send_request' value='Send Request'></form>";
        if(isset($_POST['send_request']))
          {  
             $query1="INSERT INTO friend_rqst (from1,to1) VALUES ('$my_id','$id')";
             $conn=mysqli_connect("localhost","root","1234","social");
             if(mysqli_query($conn,$query1))
             {
              echo "request sent";
             }
             else
             {
              echo "error in sending request";
             }
          }
       }
       
           
      
    
  }
 }
}
?>

 

</body>  
</html>