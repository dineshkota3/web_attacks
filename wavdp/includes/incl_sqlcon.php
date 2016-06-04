<?php 

$dbHOST= 'localhost'; # Database Host
$dbUSER= 'root'; # Database User
$dbPASS= ''; # Database Password
$dbNAME= 'wvdp'; # Database Name

# Connecting to MySql server 
$con = mysql_connect($dbHOST,$dbUSER,$dbPASS) or die("Failed to connect to MySQL Server".mysql_errno());
if( $con )
{
	# Selecting Database 
	$db = mysql_select_db($dbNAME) or die("Failed to connect to MySQL Database: ".mysql_error());
}


########################################################################
### Change this path according to the installation folder of WVDP
########################################################################
$base_url = "http://localhost/wavdp/";


?> 
