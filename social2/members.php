<!DOCTYPE html>
<html>
<head>
	<title>Members</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'connect.php';?>
<?php include 'functions.php';?>
<?php include 'header.php';?>
<?php
   $query="SELECT * FROM data";
   $result=mysqli_query($conn,$query);
   if(mysqli_num_rows($result)>0)
   {
   	 while($row=mysqli_fetch_array($result))
   	 {
         if($row[0]!=$_SESSION['user_id'])
         {
   	 	 $username=$row[1];
          $id=$row[0];
          echo "<h1><a href='profile.php?user=$id'>$username</a></h1>";
   	   }
       }
   }
   ?>
</body>
</html>
