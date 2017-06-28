
<?php
session_start();
include 'connectuser.php';
$quest_id=$_GET['quest_id'];
$query="SELECT * FROM question WHERE question_id='$quest_id'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);

	?>
	<div id="card">
						   				
								   	<h3 id="question_heading"><strong><?php 
								   	echo '<a href="user_profile.php?userId='.$get_user_id.'">'.ucfirst($name).'</a>';
								   	?></strong></h3>
									<p>
						   			<blockquote><?php echo $row[2];?></blockquote>
									</p>
									<?php

?>