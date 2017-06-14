<?php
function profile($id)
{
	$conn=mysqli_connect("localhost","root","1234","social");
	$query="SELECT * FROM data WHERE id='$id'";
	$result=mysqli_connect($conn,$query);
	if(mysqi_num_rows($result)==1)
	{
		$row=mysqli_fetch_array($result);
		?>
<html>
<head>
<title><?php echo $_SESSION['username'];?></title>
</head>
<body>
	<h1>Name: <?php echo $row[1];?></h1>
	<h2>Email-id:  <?php echo $row[2];?></h2>
</body>
</html>
</php
	}
}
?>