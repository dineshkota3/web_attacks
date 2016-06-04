
<h5 class="text-danger" align="center">XSS Reflected Attack!</h5> 

<?php
$inputData = '';
$itemName = NULL;
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
	
		 
		$itemName =  $inputData;
		if( $seclevel == 1 )	
		{
			### Security Level: Low 
			$inputData = "<pre> You have searched for: ".$itemName."</pre>";
		}
		elseif( $seclevel == 2 )	
		{	
			### Security Level: Medium 
			$inputData = '<pre> You have searched for: ' . str_replace('<script>', '', $itemName). '</pre>';
		}
		elseif( $seclevel == 3 )	
		{	
			### Security Level: High 
			$inputData = '<pre> You have searched for: '. htmlspecialchars($itemName).'</pre>';
		}			 
	?> 
	
	<div align="center" style="width:50%">  
		<p style=" font-size: 14px;"> <b><?php echo $inputData;?></b> </p>		
		<?php
		$rowCount = 0;
		$query = "SELECT name FROM ekart WHERE type='".$itemName."'";
		$result = mysql_query($query,$con);
		$rowCount = mysql_num_rows($result);		
		?>
		
		<?php
		if($rowCount != 0)
		{
			while($row = mysql_fetch_array($result))
			{
		?>
			<div class="statusItem" style=" background-color: rgb(229, 229, 229); margin-top: 15px; padding: 15px; font-size: 14px; text-align:left; color:black;">
				 
				 <div  class="status"> 
					<?php	echo $row['name'];	?>
				</div>
			</div>
		<?php 
			}
		} 
		?>
		<?php
		if( !is_null($itemName) && ($itemName != '') && $rowCount == 0 )
			echo "Sorry, No product Found.";

		?>
		
	</div> 
		

	<br>	
	<?php
}
?> 
