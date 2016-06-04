<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WAVDP : Web Application Vulnerability Demonstration Platform</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
   <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="<?php echo $base_url; ?>">WAVDP : Web Application Vulnerability Demonstration Platform</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
<?php
	session_start();
	header("X-XSS-Protection: 0");  
	include_once('../includes/incl_sqlcon.php'); 		
	
	
	$sessionId = session_id();	
	if(isset($_SESSION['username']) && !empty($_SESSION['username'])){ //check if session is already active
		header('location: ../index.php');
	}
	if(isset($_POST['submit']))
	{
		$user = $_POST['user'];
		$user = stripslashes($user);
		$user = mysql_real_escape_string($user);
		$password = $_POST['pass'];
		$password = stripslashes($password);
		$password = mysql_real_escape_string($password);
        
		if(!empty($user))
		{     
			$query = "SELECT * FROM users WHERE username='".$user."' AND password='".$password."' ";
			$result = mysql_query($query) or die("Please try later.");
			if($result && mysql_num_rows($result) == 1) 
			{
				$_SESSION['username'] = $user;
				$row = mysql_fetch_row($result);
				$_SESSION['name'] = $row[1];
				mysql_query("UPDATE users SET sessionid='$sessionId' WHERE username='$user'",$con);
				header('Location: ../index.php');
			}
			else
			{
                ?> <p align="center" style="color:red;background-color:white;" >Wrong Username/Password. Try Again!</p> <?php 
			}
		}		
	}	
	
	
?>
            
            <?php
            if(!isset($_SESSION['username']) || empty($_SESSION['username']))
            {
            ?>
            <div class="header-content-inner">
                <h1>WAVDP : Web Application Vulnerability Demonstration Platform</h1>
                <hr>
                <p>Practice and Test your security skills!</p>
                <div align="center" id="page-top-login">   <?php include_once("loginform.php"); ?>    </div>                
            </div>
            <?php
            }
            else
            {
                
            }
            ?>
        </div>
    </header>

    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

</body>

</html>
