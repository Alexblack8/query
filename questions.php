<?php
session_start();

include 'function.php';
include 'connectuser.php';
?>
<html>
<head>
</head>
<body>
    <?php
    $query="SELECT * FROM question";
    $result=mysqli_query($conn,$query);

    while($row=mysqli_fetch_array($result))
	{
		?>
	   <div class"questions">
	   <h1><?php echo $row[2];?></h1>
	   <br/>
	   <?php	
	}
	?>
</body>
</html>