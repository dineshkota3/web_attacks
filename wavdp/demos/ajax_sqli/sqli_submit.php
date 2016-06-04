<?php
include_once('../../includes/incl_sqlcon.php'); 	
$inputData = '';
if( isset($_GET['inp1']) || isset($_POST['inp1']) )
{
	if( isset($_POST['inp1']) )
	{
		$inputData = $_POST['inp1']; 		
		if( isset($_POST['seclevel']) )
		{
		if( is_numeric($_POST['seclevel']) )
		{
			if( $_POST['seclevel'] == 1 )	
			{
				### Security Level: Low 
				$inputData = $_POST['inp1'];
				$query = mysql_query("SELECT * FROM user_marks where user_id='$inputData' ") or die("Error: ".mysql_error());
			}
			elseif( $_POST['seclevel'] == 2 )	
			{	
				### Security Level: Medium 
				$inputData = mysql_real_escape_string($_POST['inp1']);	
				$query = mysql_query("SELECT * FROM user_marks where user_id=".$inputData." ") or die("Error: ".mysql_error());			
			}
			elseif( $_POST['seclevel'] == 3 ) 
			{	
				### Security Level: High 
				
				if( ctype_alpha(str_replace(' ','',$_POST['inp1'])) ) 
				{ 
					$inputData = mysql_real_escape_string($_POST['inp1']); 
				} 
				else 
				{
					$inputData = "Invalid Name"; 
				}				
			}
		}
		} 
		
		
		?>
		
		<br><hr><br>
	
		<div class="demoattackvector">		
			<h5 class="text-danger" align="center">AJAX-SQL Injection Attack!</h5> <br>
				
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
		</div>
		<?php 
	}
	?>	
	<br>	
	<?php
}
?> 
