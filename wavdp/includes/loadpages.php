<div>
			<?php
			if( !isset($_GET['test']) )
			{
			?>
            <div class="col-md-3">      	
			<div class="btn-group-vertical" role="group" aria-label="Vertical button group">			  
			   <a href=".?page=demos/html_injection/htmlInj.php" role="button" class="btn btn-default" ><span class="text-info">HTML Injection</span></a>
			  			  
			  <div class="btn-group" role="group">
				<button id="btnGroupVerticalDrop1" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				  <a class="text-info">XSS Attacks <span class="caret"></span> </a>
				</button>
				<ul class="dropdown-menu" role="menu" aria-labelledby="btnGroupVerticalDrop1">
					<li><a href=".?page=demos/xss_reflected/xssReflected.php">XSS Reflected</a></li>
					<li><a href=".?page=demos/xss_stored/xssStored.php">XSS Stored</a></li>
				</ul>
			  </div>


			  <div class="btn-group" role="group">
				<button id="btnGroupVerticalDrop12" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				  <a class="text-info">Advance XSS <span class="caret"></span> </a>
				</button>
				<ul class="dropdown-menu" role="menu" aria-labelledby="btnGroupVerticalDrop12">
					<li><a href=".?page=demos/partial_script_injection/partialScriptInj.php">Partial Script Injection</a></li> 
					<li><a href=".?page=demos/attribute_injection/attributeInj.php">Attribute Injection</a></li> 
					<li role="presentation" class="dropdown-header">Encoding based XSS attacks</li>
					<li><a href=".?page=demos/xss_utf8_encoding/utf8Encoding.php">UTF-8 Encoding</a></li> 
					<li><a href=".?page=demos/xss_base64_encoding/base64Encoding.php">Base-64 Encoding</a></li> 
					<li><a href=".?page=demos/xss_js_encoding/jsEncoding.php">Js Encoding</a></li>
				</ul>
			  </div>


			  			  
			  <a href=".?page=demos/csrf/csrf.php" role="button" class="btn btn-default" ><span class="text-info">CSRF</span></a> 
			  <a href=".?page=demos/sql_injection/sqli1.php" role="button" class="btn btn-default" ><span class="text-info">SQL Injection</span></a>			 
			  <a href='.?page=demos/clickJacking/clickJacking.php' role="button" class="btn btn-default" ><span class="text-info">ClickJacking</span></a> 
			  <a href='.?page=demos/insecur_dobj_ref/insecDirObjRef.php' role="button" class="btn btn-default" title="Insecure Direct Object Reference" ><span class="text-info">IDOR</span></a> 
			  
			  <a href="./demos/webstorage/index.php" role="button" class="btn btn-default" target="_blank" onclick="localStorage.clear();"><span class="text-info">Web Storage Attack</span></a>
			  <a  href=".?page=demos/webstorage_xss/webStorage.php" role="button" class="btn btn-default" ><span class="text-info">Web Storage Attack with XSS</span></a>
			  
			  
			  
			  
			  <div class="btn-group" role="group">
				<button id="btnGroupVerticalDrop4" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				  <a class="text-info">AJAX <span class="caret"></span></a>
				</button>
				<ul class="dropdown-menu" role="menu" aria-labelledby="btnGroupVerticalDrop4">
					<li><a  href=".?page=demos/ajax_xss/ajaxXSS.php">XSS</a></li>	
					<li><a  href=".?page=demos/ajax_sqli/sqli.php">SQL Injection</a></li>
					<li><a  href=".?page=demos/ajax_bridging/ajaxBridging.php">AJAX Bridging</a></li>
				</ul>
			  </div>
			  			  
			</div>
				              
            </div>
                                    

            <div class="col-md-9" style="background-color:black; padding-top:10px; opacity:0.6; overflow:auto;">

                <div>                                        
					<?php
					if( isset($_GET['page']) )
					{
						#if( file_exists($_GET['page']) )
						#{
						?>
							<?php include_once($_GET['page']); ?>
						<?php
						#}
					}
					else
					{
					?> 
					<p style="text-align:justify;">
					WAVDP is a PHP/MySQL based web application, which provides a common platform to web security enthusiasts to test their security skills. Web developers can practice the methods of developing secure web applications as well as teachers can demonstrate different web application vulnerabilities and corresponding security in a classroom environment. <br><br>
					WAVDP showcases a number of basic (e.g. XSS, CSRF, SQL Injection) as well as advanced (e.g. Encoding based XSS, Clickjacking) web attacks with different security levels. It also covers some of the potential security vulnerabilities of HTML5 like web storage, web messaging etc. 
					</p> 				
                    <p>&nbsp;</p>
					<br>
					<?php 
					}
					?>
                </div>

				</div>

			</div>
			<?php
			}
			else
			{
			?>
				<div class="col-md-12" style="padding-top:10px;">
				<?php
					if( isset($_GET['page']) )
					{					
						?>
						<div class="thumbnail"> 
						<div class="caption-full"> 	
							<?php include_once($_GET['page']); ?>
						</div> 
						</div> 
						<?php					
					}					
				?>
				</div>
			<?php	
			}
			?>

</div>
