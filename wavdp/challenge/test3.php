<?php
include_once("common.php");
?>

<div class="demoattackvector">
<?php
if( isset($_POST['atvec']) )		
{	
	echo htmlspecialchars($_POST['atvec']); 
}
?>
</div>
