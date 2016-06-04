<?php	
if( isset($_GET['inp1']) || isset($_POST['inp1']) )
{
	if( isset($_POST['inp1']) )
	{
		$inputData = $_POST['inp1'];
	}
	if( isset($_GET['inp1']) )
	{
		$inputData = $_GET['inp1'];
	}	
	
	$seclevel = 1;	
	if( isset($_POST['seclevel']) )
	{
	if( is_numeric($_POST['seclevel']) )
	{	
		$seclevel = $_POST['seclevel'];	
	}
	}
	
	if( isset($_GET['seclevel']) )
	{
	if( is_numeric($_GET['seclevel']) )
	{	
		$seclevel = $_GET['seclevel'];	
	}
	}
	
		
		if( $seclevel == 1 )	
		{
			### Security Level: Low 
			$inputData = trim($inputData);
		}
		elseif( $seclevel == 2 )	
		{	
			### Security Level: Medium 
			$inputData = trim(strip_tags(addslashes($inputData)));	
			$inputData = mysql_real_escape_string($inputData);	
			$inputData = htmlspecialchars($inputData);		
		}
		elseif( $seclevel == 3 )	
		{	
			### Security Level: High 
			$inputData = stripslashes($inputData);	
			$inputData = mysql_real_escape_string($inputData);	
			$inputData = htmlspecialchars($inputData);	
		}			 
		
		$query = mysql_query("INSERT INTO guestbook (comment,username) VALUES ('".$inputData."','".$_SESSION['username']."')") or die(mysql_error());			
}						
?> 

<h5 class="text-danger" align="center">XSS Reflected Attack!</h5> 


