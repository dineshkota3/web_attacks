<?php

$inputData = '';
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
			$inputData = $inputData;
		}
		elseif( $seclevel == 2 )	
		{	
			### Security Level: Medium 
			$inputData = str_replace("<script>",'',$inputData);							
		}
		elseif( $seclevel == 3 )	
		{	
			### Security Level: High 
			$inputData = htmlspecialchars($inputData);
		}			 
	?> 
	
	<br><hr><br>
	
	<div class="demoattackvector">	
		<h5 class="text-danger" align="center">AJAX-XSS Attack!</h5> 
		<?php echo $inputData;?> 
	</div> 
		

	<br>	
	<?php
}
?> 
