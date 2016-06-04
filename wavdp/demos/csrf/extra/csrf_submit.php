<?php
	session_start();
	if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
		header('location: ../auth/login.php');
	}
	
	else{
		include_once('../../includes/incl_sqlcon.php');
	
		if( isset($_POST['seclevel']) && !empty($_POST['seclevel']) && is_numeric($_POST['seclevel'])){
				$_SESSION['seclevel'] = $_POST['seclevel'];
		}
		$securityLevel = $_SESSION['seclevel'];
		
		if(isset($_POST['post']) && !empty($_POST['current_status']) &&
				(($securityLevel == 1) || (($securityLevel == 2 || $securityLevel == 3) && $_POST['session_token'] == $_SESSION['session_token']))){ // && $_POST['session_token'] == $_SESSION['session_token']){
			$status = $_POST['current_status'];
			$query = "INSERT INTO status(username,name,status) VALUE('".addslashes($_SESSION['username'])."','"
					.addslashes($_SESSION['name'])."','$status')";
			mysql_query($query,$con);
			//to avoid resubmission of the page
			header('Location: csrf_submit.php',true,303);
		}
		$query = "SELECT name,status FROM status ORDER BY createdAt DESC";
		$result = mysql_query($query,$con);
	}
?>

<!DOCTYPE HTML>
<html>
<head>
<title> Vulnerable Website - CSRF </title>

	<link type="text/css" rel="stylesheet" href="css/BEu-ZzKBJ2l.css" />
    <link type="text/css" rel="stylesheet" href="css/hK6v0Zf90rb.css" />
    <link type="text/css" rel="stylesheet" href="css/x3bsMJyVkPp.css" />
    <link type="text/css" rel="stylesheet" href="css/wz6otf_g4G7.css" />
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel='stylesheet' type='text/css' href='css/mystyle.css' />

	<script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js" ></script>
   
    <script type="text/javascript">
		function share(parameters) {

			var a= parameters.parentNode.parentNode.parentNode;	
			var b= a.getElementsByClassName("status");
			var c= b[0];
			var d= c.innerHTML;
	
			//alert(d);
			document.getElementById("modal-body").innerHTML = d ;
		  
		}


		function shareCurrentPost(parameters) {

			var a= parameters.parentNode.parentNode;	
			var b= a.getElementsByClassName("modal-body");
			var c= b[0];
			var d= c.innerHTML;
			var session_token = "<?php echo ($_SESSION['session_token']);  ?>";
			
			var form = document.createElement("form");
		    form.setAttribute("method", "POST");
		    form.setAttribute("action", "csrf_submit.php");
		    var element1 = document.createElement("input"); 
		    var element2 = document.createElement("input");
		    var element3 = document.createElement("input"); 
		    
		    element1.setAttribute("type","hidden");
		    element1.setAttribute("name","current_status");
		    element1.setAttribute("value",d);
		    form.appendChild(element1);
		    
		    element2.setAttribute("type","hidden");
		    element2.setAttribute("name","post");
		    element2.setAttribute("value","post");
		    form.appendChild(element2);

		    element3.setAttribute("type","hidden");
		    element3.setAttribute("name","session_token");
		    element3.setAttribute("value",session_token);
		    form.appendChild(element3);
		    
		    document.body.appendChild(form);
		    form.submit();
		    
			//form submission
	
			//dismiss modal
			$('#myModal').modal('hide');  
		}

</script>

</head>

<body>

<div id='wrappper'>			
		<div id='header'>
			<table border='0' width='100%'>
				<tbody>
					<tr>						
						<td valign='top' align='right'>
							<h1>CSRF Attack Demo</h1>															
							<i style="font-size:12px;font-color:#ccc">(It's a social networking website like facebook where you can post anything and share everything with your friends.)
							
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
	<td  width="40%">
		<div style="margin-bottom: 60px;">
		<form action="" method="POST" id="statusForm">
			<textarea title="What's on your mind?" id="current_status" name="current_status" placeholder="What's on your mind?" role="textbox" aria-autocomplete="list" autocomplete="off" aria-expanded="false" style="width: 100%; height: 90px; margin-top: 15px; font-size: 14px; padding: 13px;"></textarea>	
			<div><button type="submit" id="post_status" name="post" value="post" style="
		    background-color: rgb(0, 125, 247); font-size: 12px;  color: white; padding-left: 10px;
		    float: right; margin-right: 20px; margin-top: 5px; padding-right: 10px;
			">Post</button>
			<input name="session_token" type="hidden" value="<?php echo($_SESSION['session_token'])  ?>">
			<!--   <%= session.form_token %> -->
			
			</div>	
		</form>
		</div>	
				
	<div id="statusList">
	<?php
		while($row = mysql_fetch_array($result))
		{
	?>
		<div class="statusItem" style=" background-color: rgb(229, 229, 229); margin-top: 15px; padding: 15px; font-size: 14px;">
			 <b style = "color: #3b5998;"> <?php echo $row['name']; ?> </b>
			 <div  class="status" style="margin-top: 10px;"> 
				<?php 
					if($securityLevel == 3){
						$statusFromRow = $row['status'];
						echo htmlspecialchars($statusFromRow, ENT_QUOTES, 'UTF-8');
					}
					else{
						echo $row['status'];
					}
				?>
				
			</div>
			<div style="margin-top: 10px;  font-size: 11px;  color: #3b5998;">
				<a href="#"><span style="margin-right: 8px;font-size: 11px;">Like</span></a>
				<a href="#"><span style="margin-right: 8px;font-size: 11px;">Comment</span></a>
				<a href="#"><span style="font-size: 11px;" data-toggle="modal" data-target="#myModal" onclick="share(this)">Share</span></a>
			</div>
		</div>
	<?php } ?>
	</div>
	
	</td>
	<td  width="30%"></td>
	</tr>				
	</table>
</div>





<!-- sahre Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index: 0;">
  <div class="modal-dialog">
    <div class="modal-content" style="z-index: 0;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Share This Post </h4>
      </div>
      <div id = "modal-body" class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="shareCurrentPost(this)">	Share Post
        </button>
      </div>
    </div>
  </div>
</div>


</div>
</body>
</html>
