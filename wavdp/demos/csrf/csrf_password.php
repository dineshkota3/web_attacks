<?php
	session_start();
	$securityLevel = $_SESSION['seclevel'];
	$changePassword = "Change Your Password Here:";
	
	if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
		header('location: ../../auth/login.php');
	}
	
	else
	{
		include_once('../../includes/incl_sqlcon.php');
		
		$allowChangePassword = 0;		
		if( isset($_POST['post']) && !empty($_POST['newPassword']) && !empty($_POST['reenterPassword']) ) 	
		{			
			if($securityLevel == 1)
			{
				################################### Security Level: Low 
				$allowChangePassword = 1;
			}
			elseif($securityLevel == 2 && (eregi("localhost", $_SERVER['HTTP_REFERER']) || eregi("127.0.0.1", $_SERVER['HTTP_REFERER']))) 
			{
				################################### Security Level: Medium  	
				$allowChangePassword = 1;
			}
			elseif($securityLevel == 3 && $_POST['session_token'] == $_SESSION['session_token'])
			{
				################################### Security Level: High 
				$allowChangePassword = 1;
			}
		}				
									
		
		if($allowChangePassword == 1)		
		{
			$passwd = $_POST['newPassword'];
			$query = "UPDATE users SET password='".$passwd."' WHERE username='".$_SESSION['username']."'";
			mysql_query($query,$con);

			//to avoid resubmission of the page
			$_SESSION['passwordChanged'] = "Password Successfully Changed.";
		}
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
	</div>


	</td>
	<td  width="40%">
		<div style="margin-bottom: 60px;">
		<p align="center"><font color="red">
		
		<?php
		 		if(isset($_SESSION['passwordChanged'])){
					echo $_SESSION['passwordChanged'];
				}
				$_SESSION['passwordChanged'] = ""; 
		?></font></p>
		<label><?php echo $changePassword; ?></label><br><br><br>
		<form style="width:330px;margin-top:10px" action="" method="POST">
		  <div class="form-group">
		    <label for="exampleInputEmail1">New PassWord</label>
		    <input name="newPassword" type="password" class="form-control" id="exampleInputEmail1" placeholder="Password">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Re-enter Password</label>
		    <input name="reenterPassword" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		  </div>
		  <input name="session_token" type="hidden" value="<?php echo($_SESSION['session_token'])  ?>">
		  <button type="submit" name="post" class="btn btn-success">Change Password</button>
		</form>
		</div>	
		<br>
		<a href="csrfAttackerWebsite/attackerSite.php?path=<?php echo $base_url; ?>demos/csrf/csrf_password.php" target="_blank">Sample Attacker site</a>, it will set your account password to <b>wvdp</b>.
		<br>
	</td>
	<td  width="30%"></td>
	</tr>				
	</table>
</div>


</div>
</body>
</html>
