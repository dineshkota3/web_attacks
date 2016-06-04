<?php
	header("X-XSS-Protection: 0");
	$local_data =  $_GET["local"];

	echo $local_data;

	$file = fopen("hacked_data.txt","w");
	fwrite($file, $local_data);
	fclose($file);
?>

<!DOCTYPE html>
<html>
<head>

<title>Local Storage</title>
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="config-style.css">

</head>



<body style="background: #BABABB">

	<header class="header-10">
			<div class="container">
				<div class="navbar col-sm-12" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle"></button>
						<h2 style="color: #FAF8F8;">XSS Attack</h2>
					</div>
				</div>
			</div>
	</header>

	
	<b><div id="status"></div></b>
	<div align="center" style="margin-top: 50px;">
		<h4>Store name & message...</h4>
	<form id="myForm" action = "xss.php" method = "GET" class="form-inline" style="color: #2c3e50;">
		<input type="text" placeHolder="Name" class="form-control" name="name" style="width: 300px;"><br><br>
		<input class="form-control" placeHolder="Message" type="text" name="msg" style="width: 300px;"><br><br>
		<button class="btn btn-success"  type="submit"> submit</button>
	</form>
	</div>
	
	<br><br><br>


	<div id="show_result" class="form-inline" align="center" style = "color:#000">

		<?php
		if(!empty($_GET["name"]))
		{
			echo ("Name : ".$_GET["name"]."<br><br>");
			echo ("Message : ".$_GET["msg"]);
		}
		?>


	</div>


</body>
</html>
