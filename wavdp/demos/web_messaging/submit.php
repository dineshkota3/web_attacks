
<?php

	if( isset($_POST['seclevel']) )
	{
		if( is_numeric($_POST['seclevel']) )
		{
			if( $_POST['seclevel'] == 3 )	
			{
				### Security Level: Low 
				echo "<script src=\"demos/web_messaging/controller_high_security.js\"></script>";
				
			}
			else
			{	
				### Security Level: High 
				echo "<script src=\"demos/web_messaging/controller.js\"></script>";
			}			
		}
		else
			echo "<script src=\"controller.js\"></script>";
	}
	else
	{
		echo "<script src=\"controller.js\"></script>";
	} 
?> 
	
	
