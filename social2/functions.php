<?php
include 'connect.php';
session_start();

function loggedin()
{
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
	{
		return true;
	}
	else
	{
		return false;
	}
}
function isfriend($id1,$id2)
{
	$query="SELECT * FROM friends WHERE user_one='$id1' AND user_two='$id2'";
	$result=mysqli_query($conn,$result);

	if(mysqli_num_rows($result)>0)
	{
		
		return true;
	}
	else
	{

		return false;
	}
}
  function addfriend($id1,$id2)
  {
  	$query="INSERT INTO friends(user_one,user_two)
  	VALUES('$id1','$id2')";
     if(!mysqli_query($conn,$query))
     {
     	echo "friend added";
     }
     else
     {
     	echo "error in adding a friend";
     }
  }
  ?>