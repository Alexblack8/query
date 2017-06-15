<?php

include 'connectuser.php';

function isloggedin()
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
function get_username()
{
	if(isloggedin())
	{
	  $my_id=$_SESSION['user_id'];
      $query="SELECT * FROM user WHERE user_id='$my_id'";
        
       $result=mysqli_query($conn,$query);
	      $row=mysqli_fetch_array($result);
      return $row[3];	
	}
   
}
function get_name()
{
	if(isloggedin())
	{
	   $my_id=$_SESSION['user_id'];
       $query="SELECT * FROM user WHERE user_id='$my_id'";
       
       $result=mysqli_query($conn,$query);
       $row=mysqli_fetch_array($result);
       $name=$row[1].' '.$row[2];
       return $name;	
	}
   
}

?>
