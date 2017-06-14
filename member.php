<?php
include "function.php";
?>
 <html>
<head>
<title>Pranav's Network</title>
<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<div class="navigation">
	<ul class="nav-list">
	  <li><a href="#">Home</a></li>
	  <li><a href="profile.php">View Profile</a></li>
      <li><a href="#">Edit Profile</a></li>
	  <li><a href="member.php">Member Directory</a></li>
	  <li><a href="#">Friends List</a></li>
	  <li><a href="#">Post Status</a></li>
	  <li><a href="#">Inbox</a></li>
	  <li><a href="#">Compose</a></li>
	</ul>
	</div>  
	
	
    

</body>
</html>
<?php
  session_start();

  

 $query="SELECT * FROM data";
  $result=mysqli_query($conn,$query);
  if( mysqli_num_rows($result)>0)
  {
  	while($row=mysqli_fetch_array($result))
  	{
  		echo "<a href='profile.php?user=$row[0]'>".$row[1]."</a><br/>";

  	}
  }
 ?>