	<div id='wrappper'>			
		<h4 class="text-primary">XSS Reflected</h4><br>	
		
		<div>
			<table  style="width:100%; height:auto; padding:10px;" align="center">
				<tr>
					<td align="center">
						<?php
						if( isset($_GET['inp1']) || isset($_POST['inp1']) )
						{
							?>
                            <div class="demoattackvector">
                            <?php
                            include_once("xssReflected_submit.php");
                            ?>
                            </div>
                            <hr>                            
                            <?php
						}
						?> 												
						<form method="post" action="">
							
							<input type="text" id="itemName" name="inp1" placeholder="Search for products     e.g, mobile, laptop" role="textbox" aria-autocomplete="list" autocomplete="off"  style="width: 50%; height: 50px; margin-top: 15px; font-size: 14px; padding: 13px;"></input>
							<br><br>
							Security Level: 
							<select name="seclevel">
								<option value="1">Low</option>
								<option value="2">Medium</option>
								<option value="3">High</option>
							</select> <br><br>								
							<input type="submit" name="submit" value="Submit" class="btn btn-primary" /> <br>
						</form>
					</td>
				</tr>
				<tr>					
					<td align="right">

						<br><br> 
						<a class="btn btn-default viewsource" href="#" role="button" onclick="openWin()" >View Source</a>
						<?php
						$path = "demos/xss_reflected/xssReflected_submit.php"; ### Path of the source code file
						
						$lines = file($path); 						
						foreach ($lines as $line_num => $line)
						{
							#$php_array[$line_num]="Line <b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />";
							$php_array[$line_num] = htmlspecialchars($line) . "<br />";
						}
						?>						
						<script>
						$(document).ready(function() {
						   $("a.viewsource").click(function (event) {
								//Prevent default behavior
								event.preventDefault();
								var js_array = <?php echo json_encode($php_array) ?>;
								var disp = window.open('','','width=500,height=500,left=500,top=100,resizable=yes,scrollbars=yes');
								disp.document.body.innerHTML = js_array.join("\n");
							});
						});
						</script> 
						<br>
						<a href=".?page=demos/help.php#2_a" target="_blank">Help</a>
					</td>
				</tr>
			</table> 			
		</div>	
		
	</div>	
