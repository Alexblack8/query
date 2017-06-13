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
        $conn=mysqli_connect("localhost","root","1234","webproject");//connecting to the database
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
       $conn=mysqli_connect("localhost","root","1234","webproject");//connecting to the database
       $result=mysqli_query($conn,$query);
       $row=mysqli_fetch_array($result);
       $name=$row[1].' '.$row[2];
       return $name;	
	}
   
}
function add_question($question)
{
	if(isloggedin())
   {
   	 //error area help needed in below section
   	 $my_id=$_SESSION['user_id'];
    $query="INSERT INTO question ('user_id','question','upvotes'
    ,'downvotes','score') VALUES ('$my_id','$question','0','0','0')";
    $conn=mysqli_connect("localhost","root","1234","webproject");//connecting to the database
  
    if(!mysqli_query($conn,$query))
    { 
         return false;
    }
    else
    {
    	return true;
    }

   }

}

