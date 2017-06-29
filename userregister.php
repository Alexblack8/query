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
$query1="SELECT * FROM user WHERE user_name='$username' AND
password='$password'";
$result=mysqli_query($conn,$query1);
//if(mysqli_num_rows($result)==0) //if no user exists then the block executes
{
	//insert data in database
	$query2="INSERT INTO user (first_name,last_name,user_name,password,email_id,description)
   	 	VALUES ('$first','$last','$username','$password','$email','$description')";
	if(mysqli_query($conn,$query2))
	{
		header("http://localhost/webproject/sign-up-login-form/homepage.php");
	}
}


?>