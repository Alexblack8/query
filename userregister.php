<?php
include 'function.php';
include 'connectuser.php';
?>
<html>
<head>
	<title>Register User</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
	   
	    <script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	    <script src="like_unlike.js" type="text/javascript"></script>
	    <script src="like_unlike_reply.js" type="text/javascript"></script>
	    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
	    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">

		<link href="question_display.css" rel="stylesheet">

	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>	
</head>
<body>

</body>
</html>
<?php
//to get the text fields of register part of register.php
$first=$_POST['first_name'];
$last=$_POST['last_name'];
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$description=$_POST['description'];
//to check whether an user already exists in the database
$query1="SELECT * FROM user WHERE user_name='$username' ";
$result=mysqli_query($conn,$query1);
if(mysqli_num_rows($result)==0) //if no user exists then the block executes
{
	//insert data in database
	$query3="SELECT FLOOR(10000 + RAND() * 89999) AS random_number
FROM user
WHERE 'random_number' NOT IN (SELECT user_id FROM user)
LIMIT 1";
  $result=mysqli_query($conn,$query3);
  $row=mysqli_fetch_array($result);
  $user_id=$row['random_number'];
	$query2="INSERT INTO user (user_id,first_name,last_name,user_name,password,email_id,description)
   	 	VALUES ('$user_id','$first','$last','$username','$password','$email','$description')";
	
	if(mysqli_query($conn,$query2))
	{
        $msg="You have been registered,please login";   
    }
}
else
{
 
    $msg='The username is taken.Please choose another one';
}
	?>
	
	<div class="demo-area">
		<div class="container">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-1">Proceed</button>

			<div class="modal fade" id="modal-1" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Registration message</h4>
						</div>

						<div class="modal-body">
							<h1><?php echo $msg;?></h1>
						</div>

						<div class="modal-footer">
							<a href="index.php" class="btn btn-primary" >Proceed</a>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- end demo-area -->
	<?php
	
	//header("Location:http://7b84ae04.ngrok.io/webproject/sign-up-login-form/register.php");
?>
