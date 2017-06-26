<?php
session_start();
include 'function.php';
include 'connectuser.php';
     $username=$_POST['username'];//to get the username from the form
   	 $password=$_POST['password'];//to get the password from the form

      
          
           
             $query="SELECT * FROM user WHERE password='$password' 
             AND user_name='$username'";
             $result=mysqli_query($conn,$query);
             if(mysqli_num_rows($result)==1)//to check if the user exists	
             {
                  $row=mysqli_fetch_array($result);
                  $_SESSION['user_id']=$row[0];//initialising the session's variable
                  header("http://localhost/webproject/sign-up-login-form/homepage.php");
                  //####this is a temporary redirect.This is will be changed to the homepage.

             }
             else
             {
               echo "<h1>Username or Password incorrect</h1>";
             }
           
      
      ?>