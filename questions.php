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
	   <h2><?php 
        $name=get_user2($row[1]);
	   echo "<a href='?user=$row[1]'>$name</a>";
	   ?></h2>
	   <h3><?php echo $row[2];?></h1><br/>
      <form action="" method="post" >
      <input type="submit" name="reply" value="Reply">
      <input type="submit" name="like" value="Like">
      <input type="submit" name="dislike" value="Dislike">
      </form>

	   <?php	
	}
	?>
</body>
</html>