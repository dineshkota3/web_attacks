<h5 class="text-danger" align="center">XSS with HTML5 Attack!</h5> 	

<div align="center">
<?php
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
			}
			elseif( $_POST['seclevel'] == 2 )	
			{				
				### Security Level: Medium  
				$inputData = str_replace('script','',$_POST['inp1']);
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
		<div class="well"> 
			<?php echo $inputData."<br><br>"; ?> 
		</div> 
		<?php 
	}	
}
?>
</div>

