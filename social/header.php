
<div class="title_bar">
  <ul>
	      <li><a href='index.php'>Home</a></li>
       <?php
          session_start();
	      if(loggedin())
	      {
	      	?>
	       <li><a href='profile.php'>Profile</a></li>
	        <li><a href='request.php'>Requests</a></li>
	         <li><a href='friends.php'>Friends</a></li>
	          <li><a href='members.php'>Members</a></li>
	           <li><a href='logout.php'>Log Out</a></li>
	           <?php
	      }

	      else
	      {
	      	?>

	        <li><a href='login.php'>Log In</a></li>
	         <li><a href='register.php'>Register</a></li>
	         <?php
	      }
	      ?>
	</ul>
</div>