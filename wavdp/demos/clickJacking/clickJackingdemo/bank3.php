<?php
header('X-FRAME-OPTIONS: DENY');
#header('X-FRAME-OPTIONS: SAMEORIGIN');
?>
<html>
<head>
</head>
<body>
<h1 align="center"><u>My Bank</u></h1>
<h2 align="center">Money Transfer Page</h2><br>
<h3 align="center">Fill in the Account No. and Amount in Rupees to be transferred</h3>
<br><br><br><br><br><br>


<form id="form1" action="bank_submit.php" method="POST" style="position:absolute; left:550px; top:250px;">
	
Account No.:<input id="accno" type="text" name="AccNo"><br><br>
Amount Rs.: <input id="amnt" type="text" name="Amnt"><br><br>

<input id="button1" type="submit" value="Transfer">


</form>
</body>
</html>
