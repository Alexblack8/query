<?php
session_start();

?>
<html>
<head>
<title><?php echo $_SESSION['username'];?></title>
</head>
<body>
	<h1>Name: <?php echo  $_SESSION['username'];?></h1>
	<h2>Email-id:  <?php echo $_SESSION['email'];?></h2>
</body>
</html>