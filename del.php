<?php
require("inc/config.php");
mysqli_query($con, "DELETE FROM quiz_atr WHERE quiz_id='".$_POST['del']."'");
header("location:index.php");
?>