
<?php

include 'connectuser.php';

function isloggedin()//to check whether the user is logged in or not
{

  if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))//to check whether the session's variable is set and also initialised.This will only happen after logging in.
  {
      return true;
  }
  else
  {
  	return false;
  }
}
function get_username()//this gets the username of the function
{

	if(isloggedin())
	{
    $conn=mysqli_connect("localhost","root","1234","webproject");
	  $my_id=$_SESSION['user_id'];
      $query="SELECT * FROM user WHERE user_id='$my_id'";
        
       $result=mysqli_query($conn,$query);
	      $row=mysqli_fetch_array($result);
      return $row[3];	//this gets the username from the database
	}
   
}
function get_name()//this gets the name of the function
{

	if(isloggedin())
	{
	   $my_id=$_SESSION['user_id'];
       $query="SELECT * FROM user WHERE user_id='$my_id'";
       
       $result=mysqli_query($conn,$query);
       $row=mysqli_fetch_array($result);
       $name=$row[1].' '.$row[2];//this gets the firstname and lastname respectively from the database
      }
     
       return $name;	//return back the full name
	

}
function get_user2($id)
{
  if(isloggedin())
  {
     $conn=mysqli_connect("localhost","root","1234","webproject");
     $query="SELECT * FROM user WHERE user_id='$id'";
       $result=mysqli_query($conn,$query);
       $row=mysqli_fetch_array($result);
       $name=$row[1].' '.$row[2];//this gets the firstname and lastname respectively from the database
       return $name;  
  }
    
   }
?>
