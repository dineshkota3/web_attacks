
<?php

	header("X-XSS-Protection: 0");
 	/*header('Access-Control-Allow-Origin: http://127.0.1.1/');
    header('Cache-Control: no-cache');
    header('Pragma: no-cache');
    header('Access-Control-Allow-Credentials: true');
    header('Content-Type: text/plain');*/
?>

<!DOCTYPE html>
<html>
<head>

<title>Local Storage</title>
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="config-style.css">

<style type="text/css">
.item
{
	width: 800px;
	margin-top: 20px;
}

.span_right
{
	float: right;
margin-right: 50px;
color: red;
}


.span_left
{
	float: left;
margin-left: 50px;
color: rgb(21, 141, 11);
}
}
}
</style>


<script>
function storeData(roll_no, first_name) {
	if(typeof(Storage) !== "undefined") {

		if(first_name != null && first_name != "" && roll_no != null && roll_no != "")
		{
			localStorage[roll_no.trim()] = first_name;
		}
	}	
}
</script>

</head>



<body style="background: #BABABB">

	<header class="header-10" style="height: 120px;">
			<div class="container">
				<div class="navbar col-sm-12" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle"></button>
						<h2 style="color: #FAF8F8;">Ecommerce Cart</h2>
						<h4 style="color: #FAF8F8;"> Online Mobile Shopping portal</h4>

					</div>

					<div><a style="float: right;margin-top: 80px; color : #FFFFFF;font-size: 22px;"  href="cart.php">
						Cart</a></div>
				</div>
				
			</div>


	</header>


	
	<b><div id="status"></div></b>
	<div  style="margin-top: 50px; margin-left: 50px;">
		<h4>Select Mobile that you want to buy</h4>
	<form id="myForm" action = "xss.php" method = "GET" class="form-inline" style="color: #2c3e50;">


		<button type="submit" class="btn item btn-default" name="mobile" value = "Moto G" onclick="storeData('Moto G','$200')" >
			<span class="span_left">Moto G </span>  
			<span class="span_right">  $200</span> 
		</button>

		<button type="submit" class="btn item btn-default" name="mobile" value = "Google Nexus" onclick="storeData('Google Nexus','$500')">
			<span class="span_left">Google Nexus </span>  
			<span class="span_right">  $500</span> 
		</button>

		<button type="submit" class="btn item btn-default" name="mobile" value = "Nokia Lumia" onclick="storeData('Nokia Lumia','$400')">
			<span class="span_left">Nokia Lumia </span>  
			<span class="span_right">  $400</span> 
		</button>
		
		<button type="submit" class="btn item btn-default" name="mobile" value = "Samsung Galaxy S5" onclick="storeData('Samsung Galaxy S5','$800')">
			<span class="span_left">Samsung Galaxy S5 </span>  
			<span class="span_right">  $800</span>
		</button>

		<button type="submit" class="btn item btn-default" name="mobile" value = "Micromax" onclick="storeData('Micromax','$100')">
			<span class="span_left">Micromax </span>  
			<span class="span_right">  $100</span> 
		</button>

		<!-- <input type="text" placeHolder="Name" class="form-control" name="name"><br><br>
		<input class="form-control" placeHolder="Message" type="text" name="msg"><br><br>
		<button class="btn btn-success"  type="submit"> submit</button> -->
	</form>
	</div>
	
	<br><br><br>


	<div id="show_result" align="center">



	</div>


</body>
</html>
