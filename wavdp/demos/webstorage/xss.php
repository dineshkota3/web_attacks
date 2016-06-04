<?php
header("X-XSS-Protection: 0");
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


<script type="text/javascript">
function order()
{
	//alert("Item added to your Cart");
	window.location.href = "cart.php";
}
</script>


<script>
function storeData(roll_no, first_name) {
	if(typeof(Storage) !== "undefined") {

		if(first_name != null && first_name != "" && roll_no != null && roll_no != "")
		{
			localStorage[roll_no.trim()] = first_name;
		}
	}	

	window.location.href = "cart.php";
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
						<h4 style="color: #FAF8F8;"> Online Shopping portal</h4>
					</div>
					
					<div><a style="float: right;margin-top: 80px; color : #FFFFFF;font-size: 22px;"  href="cart.php">
						Cart</a></div>
						<div><a style="float: right;margin-top: 80px; margin-right: 40px; color : #FFFFFF;font-size: 22px;"  href="index.php">
						Home</a></div>
				</div>
			</div>
	</header>

	
	<b><div id="status"></div></b>
	<div align="center" style="margin-top: 50px;">
		<h4>Item Details</h4>

	
	</div>

	</div>
	
	<br><br><br>


	 <input id = "text" type="hidden" value="<?php echo $_GET["mobile"] ?> ">

	 


	<div id="show_result" class="form-inline" align="center" style = "color:#000">

		<button type="submit" class="btn item btn-default" name="mobile" >
			<span class="span_left">
				<?php
					if(!empty($_GET["mobile"]))
					{
						echo $_GET["mobile"];
					}
					?>
			</span>  
			<span id= "item_val"class="span_right"> 
			<?php
					if(!empty($_GET["mobile"]))
					{
						/*$pieces = explode("~~", $_GET["mobile"]);
						echo $pieces[1]; // piece1*/

						echo ("<script language='javascript' >

							var first_name = localStorage[document.getElementById('text').value.trim()];
							document.getElementById('item_val').innerHTML = first_name;

                   				</script>");

					}
					?>


				</span> 
		</button>

		<button class="btn item btn-success" style="width: 100px;" type="submit" onclick="order()"> Add to Cart</button>
	</form>
		
			
		
	</div>

	<div align = "center" style="
    margin-top: 160px;">

<!-- 	<form id="myForm" action = "xss.php" method = "GET" class="form-inline" style="color: #2c3e50;">
		<input type="text" placeHolder="Search Other Elements" class="form-control" name="search" style="width: 300px;"><br><br>
		<input id = "text" type="hidden" name="mobile" value="<?php echo $_GET["mobile"] ?> ">
		<button class="btn btn-success"  type="submit"> submit</button>
	</form>

<br><br><br> -->

<!-- 
	<?php
		if(!empty($_GET["search"]))
		{
			echo "Searched Item :".$_GET["search"];
		}
		?> -->
	
</div>


</body>
</html>
