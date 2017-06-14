
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Pranav's</title>
</head>
<body>
  <form action="data.php" method="post">
  <input type="text" name="username" placeholder="username">
  <input type="password" name="password" placeholder="password">
  <input type="submit" name="login" value="Login" >
  </form>
  
</body>
</html>
<?php
 $conn=mysqli_connect("localhost","root","1234","pranav's");
 if(!$conn)
 {
 	console.log("cannot connect to the server");

 }

 else {
     
         echo "connected";
    }
    ?>