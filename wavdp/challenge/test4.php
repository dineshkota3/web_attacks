<?php
include_once("common.php");
?>

<div class="demoattackvector">
<?php
if( isset($_POST['atvec']) )		
{
?>
<script>		
	document.write("<?php echo $_POST['atvec'];?>");
</script>
<?php	 
}
?>
</div>
