<?php
session_start();

include 'function.php';
include 'connectuser.php';
?>
<html>
	<head>
		<!-- required bootstrap framework -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
	    <title>Questions!!</title>
	    <link href="question_display.css" rel="stylesheet">
	</head>
	<body bgcolor="#E6E6FA">
		<div class="container">	
			<div class="row">
				<div class="col-md-3">
					<h3 class="text-danger"> This is for the side content....Below is a sample content </h3>
					<p class="text-info"> learn C if you want to work in C, but probably not otherwise.

					Most software development going on these days is not in C.

					I love C, I work in C, but most people don’t need to learn it.

					I say this a lot, to the point I bore myself:

					Learn what you want to be g</p>
					<p class="text-info"> learn C if you want to work in C, but probably not otherwise.

					Most software development going on these days is not in C.

					I love C, I work in C, but most people don’t need to learn it.

					I say this a lot, to the point I bore myself:

					Learn what you want to be g</p>
					<p class="text-info"> learn C if you want to work in C, but probably not otherwise.

					Most software development going on these days is not in C.

					I love C, I work in C, but most people don’t need to learn it.

					I say this a lot, to the point I bore myself:

					Learn what you want to be g</p>
					<p class="text-info"> learn C if you want to work in C, but probably not otherwise.

					Most software development going on these days is not in C.

					I love C, I work in C, but most people don’t need to learn it.

					I say this a lot, to the point I bore myself:

					Learn what you want to be g</p>
					<p class="text-info"> learn C if you want to work in C, but probably not otherwise.

					Most software development going on these days is not in C.

					I love C, I work in C, but most people don’t need to learn it.

					I say this a lot, to the point I bore myself:

					Learn what you want to be g</p>
					<p class="text-info"> learn C if you want to work in C, but probably not otherwise.

					Most software development going on these days is not in C.

					I love C, I work in C, but most people don’t need to learn it.

					I say this a lot, to the point I bore myself:

					Learn what you want to be g</p>					
					<p class="text-info"> learn C if you want to work in C, but probably not otherwise.

					Most software development going on these days is not in C.

					I love C, I work in C, but most people don’t need to learn it.

					I say this a lot, to the point I bore myself:

					Learn what you want to be g</p>
					<p class="text-info"> learn C if you want to work in C, but probably not otherwise.

					Most software development going on these days is not in C.

					I love C, I work in C, but most people don’t need to learn it.

					I say this a lot, to the point I bore myself:

					Learn what you want to be g</p>
				</div>				

				<div class="col-md-9" bgcolor="#eee">
				    <?php
				    $query="SELECT * FROM question";
				    $result=mysqli_query($conn,$query);

				    while($row=mysqli_fetch_array($result))
					{
						?>				   
					   		<div class="container-fluid">
						   		<div class="panel panel-default panel-info">
									<div class="panel-heading" id="panel-heading">	
									   <h3><?php 
								       $name=get_user2($row[1]);
									   echo "<a href='?user_id=$row[1]&quest_id=$row[0]'>$name</a>";
									   ?></h3>
									</div>
									<div class="panel-body" id="ques_display"> 
							   			<h3><?php echo $row[2];?></h3>
							   		</div>
								   	<div class="panel-footer" id="panel-footer">	
								       	<form action="" method="post" >
											<div class="form-group">						
									       		<input type="submit" class="btn btn-primary" name="reply" value="Reply">		
									       		<button type="submit" class="btn btn-default" name="like"><span class="glyphicon glyphicon-thumbs-up"></span></button>		       	
									       		<button type="submit" class="btn btn-default" name="dislike"><span class="glyphicon glyphicon-thumbs-down"></span></button>
								   			</div>
								       	</form>
								    </div>   	
								</div>
							</div>
					   
					<?php
						}
							if(isset($_POST['like']) &&!empty($_POST['like'])) {
							
								$quest_id=$_GET['quest_id'];

								$query1="SELECT upvotes FROM question WHERE question_id='$quest_id'";
								$result=mysqli_query($conn,$query1);
								$row=mysqli_fetch_array($result);
								$likes=$row[0];
								
								$likes=$likes+1;
								
							      
								$query2="UPDATE question SET upvotes='$likes' WHERE question_id='$quest_id'";
								if(!mysqli_query($conn,$query2))
								{
							       echo "error";
								}
							}
						?>
				</div> <!-- end col-md-7 -->
			</div> <!-- end row -->
		</div> <!-- end container --> 
	</body>
</html>