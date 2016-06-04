<?php
include_once('../../../includes/incl_sqlcon.php'); 	
?>
<html>
<head>
</head>
<body>

<?php
if( isset($_POST['AccNo']) && isset($_POST['Amnt']) )
{
		/*
		if( isset($_POST['seclevel']) )
		{
		if( is_numeric($_POST['seclevel']) )
		{
			if( $_POST['seclevel'] == 1 )
			{
				echo "Attack successful.";
			}
			elseif( $_POST['seclevel'] == 2 )	
			{				
				
			}
			elseif( $_POST['seclevel'] == 3 )
			{	
				
			}
		}
		}*/
	$query = mysql_query("UPDATE user_bank_account SET acc_balance=acc_balance-1 WHERE user='your-account-1' ") or die("problem while connecting to database."); 	
}
?>

</form>
</body>
</html>
