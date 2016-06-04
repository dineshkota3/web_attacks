<h5 class="text-danger" align="center">SQL Injection Attack!</h5> 

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
				$query = mysql_query("SELECT * FROM user_marks where user_id='$inputData' ") or die("Error: ".mysql_error());
			}
			elseif( $seclevel == 2 )	
			{	
				### Security Level: Medium 
				$inputData = mysql_real_escape_string($inputData);	
				$query = mysql_query("SELECT * FROM user_marks where user_id=".$inputData." ") or die("Error: ".mysql_error());			
			}
			elseif( $seclevel == 3 ) 
			{	
				### Security Level: High 				
				if( ctype_alpha(str_replace(' ','',$inputData)) ) 
				{ 
					$inputData = mysql_real_escape_string($inputData); 
				} 
				else 
				{
					$inputData = "Invalid Name"; 
				}				
			}
		
		
		?>
		<table width="200" border="1">
		<tr> <th>Roll Number</th> <th>Marks</th> </tr>
		<?php 
		if( mysql_num_rows($query) > 0 ) 
		{ 
		while( $result = mysql_fetch_array($query) ) 
		{ 
		?> 
		<tr>
			<td><?php echo $result['user_id']; ?></td>			
			<td><?php echo $result['marks']; ?></td>
		</tr>
		<?php 
		} 
		} 
		?> 
		</table>

	<br>	
	<?php
}
?> 
