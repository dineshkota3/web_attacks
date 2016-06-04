<h5 class="text-danger" align="center">Insecure Direct Object Reference</h5> 

<?php
$inputData = '';
if( isset($_GET['seclevel']) || isset($_POST['seclevel']) || isset($_POST['seclevel2']) || isset($_POST['seclevel1']) )
{	
	$seclevel = 1;	
	if( isset($_POST['seclevel']) || isset($_POST['seclevel2']) || isset($_POST['seclevel2']) )
	{
	if( is_numeric($_POST['seclevel']) || is_numeric($_POST['seclevel1']) || is_numeric($_POST['seclevel2']) )
	{	
		if( isset($_POST['seclevel']) )
			$seclevel = $_POST['seclevel'];	
		if( isset($_POST['seclevel1']) )
			$seclevel = $_POST['seclevel1'];	
		if( isset($_POST['seclevel2']) )
			$seclevel = $_POST['seclevel2'];							
	}
	}	
	if( isset($_GET['seclevel']) )
	{
	if( is_numeric($_GET['seclevel']) )
	{	
		$seclevel = $_GET['seclevel'];	
	}
	}
	
	?>
	
			<?php
			if( isset($_POST['postmsz1']) && isset($_POST['destgroup1']) && isset($_POST['seclevel1'])  )
			{
				$auth1 = 0;
				if( $_POST['seclevel1'] == 3 )
				{
					$user_auth = mysql_query("SELECT * FROM idor_user_auth_group WHERE UserId=1 AND GroupId='".mysql_real_escape_string($_GET['destgroup1'])."' ") or die("Please try later.");
					if( !(mysql_num_rows($user_auth) > 0))
					{
						?>
						<p align="center" style="color:red;">You are not authorized to post anything on this page.</p>
						<?php					
					}				
				}
				else
				{
					$auth1 = 1;
				}	
				
				if( $auth1 == 1 )
				{
					$post_data = mysql_query("INSERT INTO idor_group_post(UserId, GroupId, PostData) VALUES(1, '".mysql_real_escape_string($_POST['destgroup1'])."', '".mysql_real_escape_string($_POST['postmsz1'])."' ) ") or die("Please try later.");
					if( $post_data )
					{
						?><p align="center" style="color:green;">posted successfully.</p><?php
					}					
				}
			}
			?>			
						
			<?php			
			if( isset($_POST['postmsz2']) && isset($_POST['destgroup2']) && isset($_POST['seclevel2'])  )
			{
				$auth2 = 0;
				if( $_POST['seclevel2'] == 3 )
				{
					$user_auth = mysql_query("SELECT * FROM idor_user_auth_group WHERE UserId=2 AND GroupId='".mysql_real_escape_string($_GET['destgroup2'])."' ") or die("Please try later.");
					if( !(mysql_num_rows($user_auth) > 0))
					{
						?>
						<p align="center" style="color:red;">You are not authorized to post anything on this page.</p>
						<?php					
					}				
				}
				else
				{
					$auth2 = 1;
				}	
				
				if( $auth2 == 1 )
				{
					$post_data = mysql_query("INSERT INTO idor_group_post(UserId, GroupId, PostData) VALUES(2, '".mysql_real_escape_string($_POST['destgroup2'])."', '".mysql_real_escape_string($_POST['postmsz2'])."' ) ") or die("Please try later.");
					if( $post_data )
					{
						?><p align="center" style="color:green;">posted successfully.</p><?php
					}					
				}
			}
			?>			
						
							
	
	
	
	
	
	<div class="col-md-6">
	<?php
	$query_group = mysql_query("SELECT * from idor_online_groups WHERE GroupId='iitb2014'  ") or die("Please try later.");
	if( $query_group )
	{
		$result_group = mysql_fetch_array($query_group) or die("Please try later"); 
		?>
		<div align="left">
			<h4 align="center" class="text-info">
				Welcome To <?php echo $result_group['GroupName']; ?> <br>
			</h4>			
			<?php 
				$query_show_post = mysql_query("SELECT * FROM idor_group_post WHERE GroupId='iitb2014' ") or die("Please try later");
				if( $query_show_post )
				{
				if( mysql_num_rows($query_show_post) > 0 )
				{
					while( $result_show_post = mysql_fetch_array($query_show_post) )
					{
						echo "<p>".$result_show_post['PostData']."</p>";
					}
				}
				}
			?>		
			
			<div style="width:100%; height:auto; max-width:450px; border:5px solid #ddd; padding:10px; font-size:16px; font-family:Arial, Helvetica, sans-serif; " align="center">			
			<form method="POST" action=".?page=demos/insecur_dobj_ref/insecDirObjRef_submit.php">
					<textarea name="postmsz1" ></textarea><br>
					Select Group: 
					<select name="destgroup1">
					<?php
					$query_auth_groups = mysql_query("SELECT * FROM idor_online_groups WHERE GroupId IN (SELECT GroupId FROM idor_user_auth_group WHERE UserId=1) ") or die("Please try later.");
					if( $query_auth_groups )
					{
					while( $result_auth_groups = mysql_fetch_array($query_auth_groups)  )
					{
						?>
						<option value="<?php echo $result_auth_groups['GroupId']; ?>">
						<?php echo $result_auth_groups['GroupName']; ?>
						</option>
						<?php
					}
					}
					?>
					</select><br><br>
					<input type="hidden" name="seclevel1" value="<?php echo $seclevel; ?>" />
					<input type="submit" class="btn btn-primary" value="Post By User1" />
			</form>
				<br>
			</div>
			<br>			
							
			
											
		</div>		
		<?php
	}
	?>
	</div>
	
	<div class="col-md-6" >
	<?php
	$query_group = mysql_query("SELECT * from idor_online_groups WHERE GroupId='iitg2015'  ") or die("Please try later.");
	if( $query_group )
	{
		$result_group = mysql_fetch_array($query_group) or die("Please try later"); 
		?>
		<div align="center">
			<h4 align="center" class="text-info">
				Welcome To <?php echo $result_group['GroupName']; ?> <br>
			</h4>

			<?php 
				$query_show_post = mysql_query("SELECT * FROM idor_group_post WHERE GroupId='iitg2015' ") or die("Please try later");
				if( $query_show_post )
				{
				if( mysql_num_rows($query_show_post) > 0 )
				{
					while( $result_show_post = mysql_fetch_array($query_show_post) )
					{
						echo "<p>".$result_show_post['PostData']."</p>";
					}
				}
				}
			?>							
				
			<div style="width:100%; height:auto; max-width:450px; border:5px solid #ddd; padding:10px; font-size:16px; font-family:Arial, Helvetica, sans-serif; " align="center">			
			<form method="POST" action=".?page=demos/insecur_dobj_ref/insecDirObjRef_submit.php">
					<textarea name="postmsz2" ></textarea><br>
					Select Group: 
					<select name="destgroup2">
					<?php
					$query_auth_groups = mysql_query("SELECT * FROM idor_online_groups WHERE GroupId IN (SELECT GroupId FROM idor_user_auth_group WHERE UserId=2) ") or die("Please try later.");
					if( $query_auth_groups )
					{
					while( $result_auth_groups = mysql_fetch_array($query_auth_groups)  )
					{
						?>
						<option value="<?php echo $result_auth_groups['GroupId']; ?>">
						<?php echo $result_auth_groups['GroupName']; ?>
						</option>
						<?php
					}
					}
					?>
					</select><br><br>
					<input type="hidden" name="seclevel2" value="<?php echo $seclevel; ?>" />
					<input type="submit" class="btn btn-primary" value="Post By User2" />
			</form>
				<br>
			</div>
			<br>			
					
		</div>		
		<?php
	}
	?>
	</div>
	
	
	<div class="col-md-5">
	
	</div>
	<br>
	<hr>
	<br>
	<br>
	<?php
}
?> 
