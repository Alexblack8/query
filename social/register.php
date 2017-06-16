<html>
<head>
	<title>Register Now</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'connect.php';?>
<?php include 'functions.php';?>
<?php include 'header.php';?>
<form method='post'>
<?php
   if(isset($_POST['register']))
   {
   	 $username=$_POST['username'];
   	 $password=$_POST['password'];
   	 $email=$_POST['email'];
   	 if(empty($username) || empty($password) || empty($email))
   	 {
   	 	echo "<h1>Fields cannot be empty</h1>";
   	 }
   	 else
   	 {
   	 	$query="INSERT INTO data (username,password,email)
   	 	VALUES ('$username','$password','$email')";
        if(mysqli_query($conn,$query))
        	{
        		echo "<h1>Registered successfully</h1>";
             }
        else
        {
        	echo "error in registering<br/>";
        }
   	 }
   }


?>  
     User Name: <input type='text' placeholder="username" name="username"><br/>
     Password:  <input type='password' placeholder="password" name="password"><br/> 
     Email :  <input type="text" name="email" placeholder="email"><br/>
     <input type="submit" name="register" value="Register">


</form>
</body>
</html>