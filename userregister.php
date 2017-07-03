<?php
session_start();
include 'function.php';
include 'connectuser.php';

//to get the text fields of register part of register.php
$first=$_POST['first_name'];
$last=$_POST['last_name'];
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$description=$_POST['description'];
//to check whether an user already exists in the database
$query1="SELECT * FROM user WHERE user_name='$username' ";
$result=mysqli_query($conn,$query1);
if(mysqli_num_rows($result)==0) //if no user exists then the block executes
{
	//insert data in database
	$query3="SELECT FLOOR(10000 + RAND() * 89999) AS random_number
FROM user
WHERE 'random_number' NOT IN (SELECT user_id FROM user)
LIMIT 1";
  $result=mysqli_query($conn,$query3);
  $row=mysqli_fetch_array($result);
  $user_id=$row['random_number'];
	$query2="INSERT INTO user (user_id,first_name,last_name,user_name,password,email_id,description)
   	 	VALUES ('$user_id','$first','$last','$username','$password','$email','$description')";
	if(mysqli_query($conn,$query2))
	{

		header("Location:http://localhost/webproject/sign-up-login-form/homepage.php");
	}
}
else
{
	?>
	
	<script>alert('The username is taken.Please choose another one,PLEASE HIT THE BACK BUTTON');</script>

	<?php
	//header("Location:http://7b84ae04.ngrok.io/webproject/sign-up-login-form/register.php");
}

?>