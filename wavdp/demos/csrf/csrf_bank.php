<?php
	session_start();
	if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
		header('location: ../../auth/login.php');
	}
	
	else{
		include_once('../../includes/incl_sqlcon.php');
	
		if( isset($_POST['seclevel']) && !empty($_POST['seclevel']) && is_numeric($_POST['seclevel'])){
				$_SESSION['seclevel'] = $_POST['seclevel'];
		}
		$_SESSION['passwordChanged'] = "";
	}
?>

<!DOCTYPE HTML>
<html>
<head>
<title> Vulnerable Website - CSRF </title>

    <link type="text/css" rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel='stylesheet' type='text/css' href='../../css/mystyle.css' />

	<script src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.min.js" ></script>

		
</script>

</head>

<body>

<div id='wrappper'>			
		<div id='header'>
			<table border='0' width='100%'>
				<tbody>
					<tr>						
						<td valign='top' align='left'>
							<h1>CSRF Attack Demo</h1>															
							
							
							<br><br><br>
							<hr style='color:#F8F8F8;' >

						</td>
					</tr>
				</tbody>	
			</table>	
		</div>
<div>
	<table width="100%"><tr>
	<td  width="30%" style="vertical-align: top;" >
	<div  align="center" style="font-size: 15px; margin-top: 23px;">
		<b> <?php echo $_SESSION['name']; ?> </b><br>
		<a style="font-size: 12px;" href="#" >Edit Profile</a>
	</div>


	</td>
	<td  width="80%">
		<div style="margin-bottom: 60px;">
		<h2>Welcome to Your Bank</h2> 
		</div>	
	</div>			
	<div>
	


		<a href="csrf_password.php" style=" margin-top: 23px;"  class="btn btn-primary">Change Password</a>

	</div>
	
	</td>
	<td  width="30%"></td>
	</tr>				
	</table>
</div>

</div>
</body>
</html>
