<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'connect.php';?>
<?php include 'functions.php';?>
<?php include 'header.php';?>
<form method='post'>
   <?php
     session_start();
     $username=$_POST['username'];
   	 $password=$_POST['password'];

      if(isset($_POST['login']))
      {
           if(empty($username) || empty($password))
           {
              echo "<h1>Fields cannot be empty</h1>";
           }
           else
           {
             $query="SELECT * FROM data WHERE password='$password' 
             AND username='$username'";
             $result=mysqli_query($conn,$query);
             if(mysqli_num_rows($result)==1)
             {
                  $row=mysqli_fetch_array($result);
                  $_SESSION['user_id']=$row[0];
                  header('location:index.php');
             }
             else
             {
               echo "<h1>Username or Password incorrect</h1>";
             }
           }
      }
      ?>
     User Name: <input type='text' placeholder="username" name="username" ><br/>
     Password:  <input type='password' placeholder="password" name="password"><br/> 
     <input type="submit" name="login" value="Login">
</form>
</body>
</html>