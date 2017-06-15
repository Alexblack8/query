<html>
<head>
	<title>Friend System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
</html>
<?php include 'connect.php';?>
<?php include 'functions.php';?>
<?php include 'header.php';?>
<?php
session_start();
$my_id=$_SESSION['user_id'];
$to_query="SELECT from1 FROM friend_rqst WHERE  to1='$my_id'";
$result=mysqli_query($conn,$to_query);
if(mysqli_num_rows($result)>0)
{

	while($row=mysqli_fetch_array($result))
	{
		$id=$row[0];

		$query1="SELECT username FROM data WHERE id='$id'";
		$result1=mysqli_query($conn,$query1);
		$row1=mysqli_fetch_array($result1);
		echo "<h1>".$row1[0]."</h1>";
		echo "<form method='post'><input type='submit' name='accept' value='Accept Request'></form>";
           if(isset($_POST['accept']))
          {  
             $query="INSERT INTO friends (user_one,user_two)
             VAlUES ('$my_id','$id')";
             mysqli_query($conn,$query);
          }

	}
}
?>