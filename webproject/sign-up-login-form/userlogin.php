<?php
session_start();
include 'function.php';
include 'connectuser.php';
     $username=$_POST['username'];
   	 $password=$_POST['password'];

      
          
           
             $query="SELECT * FROM user WHERE password='$password' 
             AND user_name='$username'";
             $result=mysqli_query($conn,$query);
             if(mysqli_num_rows($result)==1)	
             {
                  $row=mysqli_fetch_array($result);
                  $_SESSION['user_id']=$row[0];
                  echo "hello";
             }
             else
             {
               echo "<h1>Username or Password incorrect</h1>";
             }
           
      
      ?>