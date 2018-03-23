<?php
	require('inc/config.php');
	require('include/header.php');
?>
<style>
body {
	background-image: url("./back.jpg");
	background-repeat: no-repeat;
	background-position: center;
	background-blend-mode: soft-light;
}
</style>
<div class="container text-center">
<h1>Quizerr....</h1>
<p>A Fun quiz to share with your friends to torcher them and ultimately feel lonely coz nobody knows you enough.</p>
</div> 
<hr>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
    </ul>
  </div>
</nav>
<div class="text-center" style="color:green;">Responses</div>
<div class="container">
<table class="table table-hover">
	<thead>
	  <tr>
		<th>Name</th>
		<th>Score</th>
	  </tr>
	</thead>
	<tbody>
<?php
	$q_id=$_GET['q_id'];
	$result = mysqli_query($con, "SELECT U.name, U.score FROM response U WHERE U.quiz_id='".$q_id."'");
	$res=mysqli_fetch_all($result);
	if(!empty($res))
		foreach ($res as $res)
			echo '<tr>
					<td>'.strtoupper($res[0]).'</td>
					<td>'.strtoupper($res[1]).'</td>';
	else
		echo '<td><div class="container text-center" style="color:red;">No response submitted yet!</td</div>';
?>
</tbody>
</table>
</div>
<?php
 require('include/footer.php');
?>