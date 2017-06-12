<?php
include 'connectuser.php';//establish data connection with users table
class table//this is class is used to insert data in users table in database
{
	function insertuser($name,$password,$email)//function used to insert data
	{
		$id=getid();
        $query="INSERT INTO user(user_id,user_name,password,email_id)
        VALUES ('$id','$name','$password','$email')";
        if(!mysql_query($query))
        {
        	echo "cannot insert data";
        }
	}
	fucntion getid()
	{
		//to generate a random and unique id
		$random_num="SELECT FLOOR(RAND() * 99999) AS random_num   
        FROM user
        WHERE "random_num" NOT IN (SELECT user_id FROM user)
        LIMIT 1";
        return random_num;
	}
}
?>