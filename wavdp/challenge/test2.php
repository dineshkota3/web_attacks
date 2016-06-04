<?php
include_once("common.php");
?>

<div class="demoattackvector">
<?php
if( isset($_POST['atvec']) )		
{	
	echo str_replace('<script>', '', $_POST['atvec']); 
}
?>
</div>
