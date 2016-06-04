<?php
	session_start();
	if(!isset($_SESSION['username']) || empty($_SESSION['username']))
    {
		#header('location: auth/login.php');
	}
	header("X-XSS-Protection: 0");  
	include_once('includes/incl_sqlcon.php'); 	
	

?>
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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    
    
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
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if(!isset($_SESSION['username']) || empty($_SESSION['username']))
                    {
                    ?>
                        <li>
                            <a class="page-scroll" href="#about">About</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#services">Features</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contact">Contact</a>
                        </li>
                    <?php
                    }
                    else
                    {
                    ?>
                        <li>
                            <a class="navbar-brand page-scroll" href="<?php echo $base_url; ?>" title="Home">Home</a>
                        </li>
                        <li>
                            <?php	
                            $random = rand(1,7); 
                            $opentest = ".?page=challenge/test".$random.".php&test=1";
                            ?>	
                            <a href='<?php echo $opentest; ?>' title="Test your security skills">Challenge</a>  
                        </li>					
                        <li>
                            <a href='.?page=demos/help.php' title="Help">Help</a>
                        </li>
                        <li>
                            <a href='auth/logout.php' title="Log Out"> <span class="glyphicon glyphicon-off"></span> logout</a>
                        </li>                    
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <?php
    if(!isset($_SESSION['username']) || empty($_SESSION['username']))
    {
    ?>    
    <header>
    <div class="header-content">
        <div class="header-content-inner">
            <h1>WAVDP : Web Application Vulnerability Demonstration Platform</h1>
            <hr>
            <p>Practice and Test your security skills!</p>
            <div align="center" id="page-top-login">    <?php include_once("auth/loginform.php"); ?> </div>           
        </div>
    </div>
    </header>
    <?php      
    }
    else
    {
    ?>
    <section id="loadpagearea">
    <div class="container loadpagearea-content" >
    <div class="loadpagearea-content-inner">
        <?php include_once("includes/loadpages.php"); ?>
    </div>
    </div>
    </section>
    <?php
    }
    ?>
    
    <?php
    if(!isset($_SESSION['username']) || empty($_SESSION['username']))
    {
    ?>    
    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">What is WAVDP ?</h2>
                    <hr class="light">
                    <p class="text-faded" style="text-align:justify;">WAVDP is a PHP/MySQL based web application, which provides a common platform to web security enthusiasts to test their security skills. Web developers can practice the methods of developing secure web applications as well as teachers can demonstrate different web application vulnerabilities and corresponding defense in a classroom environment. WAVDP showcases a number of basic (e.g. XSS, CSRF, SQL Injection) as well as advanced (e.g. Encoding based XSS, Clickjacking) web attacks with different security levels.</p>
                    <a href="#page-top-login" class="btn btn-default btn-xl">Get Started!</a>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Features</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-8 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-shield wow bounceIn text-primary"></i>
                        <h3>Practice &amp; Understand</h3>
                        <p class="text-muted"></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-hand-o-right wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>Challenge</h3>
                        <p class="text-muted"></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-android wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>MVDP: WAVDP for android phones</h3>
                        <p class="text-muted"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="primary">
                    <p>	</p>
                </div>
                <div class="col-lg-12 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:your-email@your-domain.com">aawasthi@cse.iitb.ac.in</a></p>
                </div>
            </div>
        </div>                
    </section>
    <?php
    }
    ?>
    
    
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


    <script>
	/* Submit form using POST */
	$('form.ajaxsubmit').on('submit',function(event) { 
		var formID = $(this).attr('id');
		$.ajax({
			url: $(this).attr('action'),
			type: 'POST',
			data: $(this).serialize(),
			success: function( response ) {		
				$("#ajaxResponse").html(response);
			}
		});
		return false;
	});
	
	

	function ajaxBridgeLoadJSON()
	{
			var form_data = {
				is_ajax: 1
			};
			$.ajax({
				type: "GET",
				url: "<?php echo $base_url."demos/ajax_bridging/bridge.json";  ?>",
				data: form_data,
				success: function(response)
				{																		
					var data_array = eval (response);										
					var dataHtml = "";
					for (var i = 0; i < data_array.length; i++) {						
						dataHtml += "<b>" + data_array[i].title + "</b>";						
						dataHtml += "<p>" + data_array[i].data + "</p>";
						dataHtml += "<br>";
					};
					$("#bridge-content").html(dataHtml);
				}
			});	
	}
	
	function encodeHtml(text) {
	  var map = {
		'&': '&amp;',
		'<': '&lt;',
		'>': '&gt;',
		'"': '&quot;',
		"'": '&#039;'
	  };

	  return text.replace(/[&<>"']/g, function(m) { return map[m]; });
	}	
	
	function ajaxBridgeSecureLoadJSON()
	{
			var form_data = {
				is_ajax: 1
			};
			$.ajax({
				type: "GET",
				url: "<?php echo $base_url."demos/ajax_bridging/bridge.json";  ?>",
				data: form_data,
				success: function(response)
				{																		
					var data_array = eval (response);										
					var dataHtml = "";
					for (var i = 0; i < data_array.length; i++) {						
						dataHtml += "<b>" + encodeHtml(data_array[i].title) + "</b>";						
						dataHtml += "<p>" + encodeHtml(data_array[i].data) + "</p>";
						dataHtml += "<br>";
					};
					$("#bridge-content").html(dataHtml);
				}
			});	
	}

	
    </script>
    
    
    
</body>

</html>
