<?php
/*PHP Login and registration script Version 1.0, Created by Gautam, www.w3schools.in*/
require('inc/config.php');
require('inc/functions.php');

/*Check for authentication otherwise user will be redirects to main.php page.*/
if (!isset($_SESSION['UserData'])) {
    exit(header("location:main.php"));
}

$q_id=md5(date("h:i:sa"));
$user_id=$_SESSION['UserData']['user_id'];
	mysqli_query($con, "INSERT INTO quiz_atr (quiz_id, user_id) values('$q_id', '$user_id')");
$no_Q=$_POST['no_Q'];	
	for ($i=1; $i < $no_Q; $i++) 
	{ 
		$ques=$_POST["q".$i.""];
		$a01=$_POST['a1'.$i.''];
		$a02=$_POST['a2'.$i.''];
		$a03=$_POST['a3'.$i.''];
		$a04=$_POST['a4'.$i.''];
		$a05=$_POST['a5'.$i.''];
		$ans=$_POST['a'.$i.''];
		mysqli_query($con, "INSERT INTO quiz (quiz_id, ques, a1,a2,a3,a4,a5,ans) values('$q_id','$ques','$a01','$a02','$a03','$a04','$a05','$ans')");
	}
header("location:index.php");
exit();?>