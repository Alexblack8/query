<?php
session_start();

$conn=mysqli_connect("localhost","root","1234","social");
$_SESSION['conn']=$conn;
 $_SESSION['username']=$_POST['username'];
  $_SESSION['password']=$_POST['password'];

$username=$_SESSION['username'];
$password=$_SESSION['password'];


  $query="SELECT * FROM data
   WHERE username='$username' AND password='$password' ";
  $result=mysqli_query($conn,$query);
  if(mysqli_num_rows($result) > 0)
  {
    while($row=mysqli_fetch_row($result))
    {
        $email= $row[3];
        break;
   }
   $_SESSION['email']=$email;
  header('Location: http://localhost/main.php');
      }
  else
  {
    echo "no result found";
      }
?>
