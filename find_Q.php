<?php 
require('inc/functions.php');
require('inc/config.php');
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Quizerr-The quiz making app!!</title>
    <!-- Include CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet"><!-- Bootstrap CSS -->
    <link href="./css/style.css" rel="stylesheet"><!-- Custom CSS -->
    <!-- Include Google font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,600">
</head>
<body>
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
	<?php
		$q_id=$_GET['q_id'];
		$result = mysqli_query($con, "SELECT U.ques, U.a1, U.a2, U.a3, U.a4, U.a5 FROM quiz U WHERE U.quiz_id='$q_id'"); 
    $row=mysqli_num_rows($result);
    if($row > 0)
    {
    	echo '
    		<hr>
			<div class="text-center" style="color:green;">Select the correct</div>
			<hr>
			<div class="container">
			<form action="score.php" method="POST" autocomplete="off">';
    	$res=mysqli_fetch_all($result);
    	$o=1;
        for ($i=0; $i < $row; $i++) 
        	for ($j=0; $j < 6; $j++) 
        		if($j==0)
        		{
        			echo "<strong>Question ".$o.")</strong> ".$res[$i][$j]."?<br>";
        			$o++;
        		}
        		else if($res[$i][$j]!='')
        		echo "<div class='container-fluid'><label><input class='form-group' type='radio' name='ans".$i."' value='a".$j."'> ".$res[$i][$j]."</label><br></div>";
    
    echo "<br><input type='text' name='name' required class='form-control' placeholder='Enter your name (Stormtrooper will work)'><br>
    	<input type='hidden' name=q_id value=".$q_id.">
    	<input type='hidden' name=rows value=".$row.">
    	<input type='submit' name=submit class='form-group btn btn-lg btn-success'>";
    }  		
    else
        echo "<div class='text-center' style='color: red;'>Broken link or quiz has been revoked.</div>";
    ?>
</form>
</div>
<?php require('include/footer.php');?>