

<?php

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
  include 'connectuser.php';

	if(isloggedin())
	{
    
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
    include 'connectuser.php';
	   $my_id=$_SESSION['user_id'];
       $query="SELECT * FROM user WHERE user_id='$my_id'";
       
       $result=mysqli_query($conn,$query);
       $row=mysqli_fetch_array($result);
       $name=$row[1].' '.$row[2];//this gets the firstname and lastname respectively from the database
      }
     
       return $name;	//return back the full name
	

}
function get_user2($user_id)
{
  if(isloggedin())
  {
     include 'connectuser.php';
     $query="SELECT * FROM user WHERE user_id='$user_id'";
       $result=mysqli_query($conn,$query);
       $row=mysqli_fetch_array($result);
       $name=$row[1].' '.$row[2];//this gets the firstname and lastname respectively from the database
       return $name;  
  }
    
   }
function get_reply($reply_id)
{
  include 'connectuser.php';

    $query="SELECT * FROM replies WHERE reply_id='$reply_id'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
    $reply=$row[3];
    return $reply;
}
function get_current_time()
{
include 'connectuser.php';
   $date = date('Y-m-d H:i:s');
   $time=strtotime( $date);//the time is calculated in seconds
   return $time;
  
}


function get_score($reg_time,$upvotes,$downvotes)
{
  include 'connectuser.php';
  $current_time=get_current_time();
  $reg_time=strtotime( $reg_time);
  $t=$current_time-$reg_time;
  $x=$upvotes-$downvotes;
  if($x>0)
  {
    $y=1;
  }
  else if($x==0)
  {
    $y=0;
  }
  else
  {
    $y=-1;
  }

  $temp=abs($x);
  if($temp>=1)
  {
    $z=$temp;
  }
  else
  {
    $z=1;
  }
  $score=log10($z)+(($y)*($t)/(45000));//score is calculated in seconds
  
  return $score;
}
function store_score_replies()
{
  include 'connectuser.php';
  $query1="SELECT * FROM replies";
  $result=mysqli_query($conn,$query1);
  while($row=mysqli_fetch_array($result))
  {
      $score=get_score($row[7],$row[4],$row[5]);
      $query2 = "UPDATE replies SET score='$score' WHERE reply_id = '$row[0]' ";
      if(!mysqli_query($conn,$query2))
      {
        echo "error in storing scores";
      }
  }
  

 }
 function store_score_question()
{
  include 'connectuser.php';
  $query1="SELECT * FROM question";
  $result=mysqli_query($conn,$query1);
  while($row=mysqli_fetch_array($result))
  {
      $score=get_score($row[6],$row[3],$row[4]);
      $query2 = "UPDATE question SET score='$score' WHERE question_id = '$row[0]' ";
      if(!mysqli_query($conn,$query2))
      {
        echo "error in storing scores";
      }
  }
  

 }
?>
