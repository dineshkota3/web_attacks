<h5 class="text-danger" align="center">Mobile XCS Attack!</h5> 
<?php
	session_start();
	header("X-XSS-Protection: 0");  
	include_once('../../includes/incl_sqlcon.php'); 	
?>

<?php
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
			}
			elseif( $_POST['seclevel'] == 2 )	
			{	
				### Security Level: Medium 
				$inputData = mysql_real_escape_string($_POST['inp1']);				
			}
			elseif( $_POST['seclevel'] == 3 )	
			{	
				### Security Level: High 
				$inputData = htmlspecialchars($_POST['inp1']);
			}			
		}
		} 
		?> 
		
		<div align="center"> 
			
			<?php include_once("xcs.html"); ?>				
			
			<?php echo $inputData;?> <br>
			<?php 			
			//Store new post
			$query = mysql_query("INSERT INTO mobile_xcs (Post, Datetime) VALUES( '".$inputData."', '".gmdate("Y-m-d H:i:s")."' ) ") or die("");
			
			// Show all posts
			$query = mysql_query("SELECT * FROM mobile_xcs ORDER BY Datetime DESC") or die("");
			while( $result = mysql_fetch_array($query) )
			{
			?>
			<div style="width:200px;" align="left">
				<?php echo $result['Post']; ?><br>
				
				<span style="text-color:gray;font-size:10px;">at <?php echo $result['Datetime']; ?><hr></span>
			</div>	
			<?php		
			}
			?>						
		</div> 
		
		<?php
	}
	?>	
	<br>	
	<?php
}
?> 
