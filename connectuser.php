<?php
$ip="localhost";//ip address
$db_user_name="root";//phpmyadmin username
$db_password="1234";//phpmyadmin password
$db="webproject";//name of database
$conn=mysqli_connect($ip,$db_user_name,$db_password,$db);//connecting to the database
if(!$conn)
{
    	 die( "error in connecting to database"); 
}
?>