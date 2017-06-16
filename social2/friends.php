<html>
<head>
  <title>Friend System</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
</html>
<?php
session_start();
include 'connect.php';
 include 'functions.php';
 include 'header.php';

$my_id=$_SESSION['user_id'];
$query="SELECT user_one,user_two FROM friends WHERE user_one='$my_id' OR user_two='$my_id'";
$result=mysqli_query($conn,$query);
   if(mysqli_num_rows($result)>0)
   {
   	 while($row=mysqli_fetch_array($result))
   	 {
         $id=$row[0];
         if($id!=$my_id)
         {
           $query1="SELECT username FROM data WHERE id='$id'";
           $result1=mysqli_query($conn,$query1);
           $row1=mysqli_fetch_array($result1);
           echo "<h1>".$row1[0]."</h1><br/>";
       }
       else
       {
       	$id=$row[1];
       	$query1="SELECT username FROM data WHERE id='$id'";
           $result1=mysqli_query($conn,$query1);
           $row1=mysqli_fetch_array($result1);
          echo "<h1>".$row1[0]."</h1><br/>";
       }
     }
   }
?>