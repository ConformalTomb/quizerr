<?php

require('inc/config.php');
require('inc/functions.php');

/*Check for authentication otherwise user will be redirects to main.php page.*/
if (!isset($_SESSION['UserData'])) {
    exit(header("location:main.php"));
}
require('include/header.php');
?>
<div class="container text-center">
<h1>Quizerr....</h1>
<p>A Fun quiz to share with your friends to torcher them and ultimately feel lonely coz nobody knows you enough.</p>
</div> 
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
  <p class="navbar-text">Welcome <?php
		$res=get_user_data($con, $_SESSION['UserData']['user_id']);
		print_r(strtoupper($res['name']));
		?>
	</p>
	
    <ul class="nav navbar-nav">
      <li class="active"><a href="createQ.php">Create a Quiz</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      	<li><a href="logout.php">Log out</a></li>      
    </ul>
  </div>
</nav>
<!-- container -->
<div class="container">
<?php
$i=1;
$res=get_quiz_data($con, $_SESSION['UserData']['user_id']);
if($res==False)
	echo "<div class='text-center' style='color: red;'>No quiz exists</div>";
else
{
  echo "<table class='table table-hover'><thead><td></td><th>Link:</th></thead>";
	foreach ($res as $key) 
			echo "
          <tr>
          <th>".$key[0]." #".$i++."</th>
          <td><a href='/find_Q.php?q_id=".$key[1]."'>quizerr.site11.com/find_Q.php?q_id=".$key[1]."</a></td>
          <td><form action='responses.php' method='GET'><button class='btn btn-info' type='submit' value='".$key[1]."' name='q_id'>Responses</button></form></td>
          <td><form action='del.php'><button type='submit' class='btn btn-danger bth-sm' formmethod='POST' name='del' value=".$key[1].">Delete Quiz</button></form></td></tr>";

  echo "</table><span class='help-block'>**Right click (or hold) to copy the link of your quiz and share amongst your friends!!</span>";
}


?>
</div>
<?php 
require('include/footer.php');
?>