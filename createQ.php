<?php
/*PHP Login and registration script Version 1.0, Created by Gautam, www.w3schools.in*/
require('inc/config.php');
require('inc/functions.php');

/*Check for authentication otherwise user will be redirects to main.php page.*/
if (!isset($_SESSION['UserData'])) {
    exit(header("location:main.php"));
}
require('include/header.php');
?>
<script>
function showHint(str,no) {
    if (str.length == 0) { 
        document.getElementById("txtHint"+no).innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint"+no).innerHTML = "Suggestions: "+this.responseText;
            }
        }
        xmlhttp.open("GET", "gethint.php?q="+str, true);
        xmlhttp.send();
    }
}

</script>
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
      <li class="active"><a href="index.php">Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      	<li><a href="logout.php">Log out</a></li>      
    </ul>
  </div>
</nav>
<div class="container">
<form method="GET">
		<label>Input the number of questions you would want.
  		<input type="number" name="no_Q" min='1' max='7' required>
  		<input type="submit" name="submit" value="Go" class="btn btn-info btn-xs">
  		</label>
</form>
<?php
	
	if(isset($_GET["no_Q"])>0)
	{
	echo '<form method="POST" action="subQ.php" autocomplete="off">';
	for ($i=1; $i <= $_GET['no_Q']; $i++)
	{
		echo '<div class="form-group">
		<label for="q1">Question: '.$i.'</label>
		<input type="text" name="q'.$i.'" class="form-control"  oninput="showHint(this.value,'.$i.')" placeholder="Question" required>
		<div id="txtHint'.$i.'"></div>
	</div>
	<div class="form-group radio form-group-lg">
		<lable for="a1">1) <input type="text" name="a1'.$i.'" placeholder="Option" required> </lable>
		<input type="radio" name="a'.$i.'" value="a1" id="a1" required>
		<lable for="a2">2) <input type="text" name="a2'.$i.'" placeholder="Option" required> </lable>
		<input type="radio" name="a'.$i.'" value="a2" id="a2" required>
		<lable for="a3">3) <input type="text" name="a3'.$i.'" placeholder="Option"> </lable>
		<input type="radio" name="a'.$i.'" value="a3" id="a3">
		<lable for="a4">4) <input type="text" name="a4'.$i.'" placeholder="Option"> </lable>
		<input type="radio" name="a'.$i.'" value="a4" id="a4">
		<lable for="a5">5) <input type="text" name="a5'.$i.'" placeholder="Option"> </lable>
		<input type="radio" name="a'.$i.'" value="a5" id="a4">
		</div>';
	}	
	echo '<span class="help-block">*Select the radio to mark it as solution.</span>
	<span class="help-block">**Minimum 2 options must be filled.</span>
	<input type="hidden" name="no_Q" value="'.$i.'"><br><br>
	<input type="submit" name="submit" value="Create" class="btn btn-lg btn-success">
	</form>';
	}
	
?>
</div>
<?php require('include/footer.php');?>