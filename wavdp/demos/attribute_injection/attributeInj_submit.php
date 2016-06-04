<h5 class="text-danger" align="center">Attribute Injection Attack!</h5>			

<div align="center">
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
				$inputData = $inputData;
			}
			elseif( $seclevel == 3 )
			{	
				### Security Level: High 
				$inputData = htmlspecialchars($inputData);
			}			
		?>		
		<img src="demos/attribute_injection/testimg.jpg" width="500" height="<?php echo $inputData; ?>" /> <br><br>		
		<?php 

}
?>
</div>

