<?php
    require('inc/config.php');
	require('include/header.php');?>
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
  <p class="navbar-text">Welcome <?php
		$res=$_POST['name'];
		print_r(strtoupper($res));
		?>
	</p>
    <ul class="nav navbar-nav">
      <li class="active"><a href="createQ.php">Create your own Quiz</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      	<li><a href="index.php">Home</a></li>      
    </ul>
  </div>
</nav>
<div class="text-center" style="color:green;">Report Card</div>
<div class="container">
<table class="table table-hover">
	<thead>
	  <tr>
		<th>Your Response</th>
		<th>Correct answer</th>
		<th>Points rewarded</th>
	  </tr>
	</thead>
	<tbody>
<?php
	$q_id=$_POST['q_id'];
	$result = mysqli_query($con, "SELECT U.ans FROM quiz U WHERE U.quiz_id='$q_id'");
	$res=mysqli_fetch_all($result);
	$row=$_POST['rows'];
	$score=0;
	for ($i=0; $i < $row; $i++) 
	{ 
		$ans=$_POST['ans'.$i.''];
		if($ans==$res[$i][0])
		{
			$score+=5; 	
			echo '<tr class="success">
					<td>'.strtoupper($ans).'</td>
					<td>'.strtoupper($res[$i][0]).'</td>
					<td>5</td>';
		}
		else
			echo '<tr class="danger">
					<td>'.strtoupper($ans).'</td>
					<td>'.strtoupper($res[$i][0]).'</td>
					<td>0</td>'; 	
	}
	echo "<tr class=info>
			<th>Total Score</th><td></td>
			<th>".$score."</th></strong></tr>";
	$name=$_POST['name'];
	mysqli_query($con, "INSERT INTO response(quiz_id,name,score) VALUES('".$q_id."','".$name."','".$score."')");
?>
</tbody>
</table>
</div>
<?php
 require('include/footer.php');
?>