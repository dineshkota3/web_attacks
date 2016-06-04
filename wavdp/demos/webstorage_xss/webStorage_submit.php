<h5 class="text-danger" align="center">Web Storage Attack!</h5> 

<script>
// Check browser support
if (typeof(Storage) != "undefined") {
    // Store
    localStorage.setItem("name", "wvdp");
	sessionStorage.setItem("user", "wvdp1");
	sessionStorage.setItem("dob", "2015");
    
    // Retrieve
    //alert(localStorage.getItem("name"));
} else {
    alert("Sorry, your browser does not support Web Storage...");
}
</script>

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
			elseif( $seclevel == 2 )	
			{				
				### Security Level: Medium 
				$inputData = str_replace('script','',$inputData);
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
					$inputData = "";
				}
			}

		?>
		<div class="well" style="color:black; text-align:left;"> 
			<h5 class="text-danger">Information stored by web application</h5><br> 
			<div id="results"> </div>
			<?php 	echo "<br>".$inputData."<br>"; ?> 
		</div> 		
		<?php
}
?> 
