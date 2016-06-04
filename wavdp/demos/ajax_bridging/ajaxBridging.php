	<div id='wrappper'>			
		<h4 class="text-primary">AJAX Bridging</h4><br> 		
		<div>
			<table  style="width:100%; height:auto; padding:10px;" align="center">
				<tr>
					<td>																	
						<div style="border:1px solid;padding:1px 25px;"  >
						<h3>  </h3>
							<input type="button" class="btn btn-primary" value="Secure - Load Data" onclick="ajaxBridgeSecureLoadJSON();" > 
							&nbsp;&nbsp;&nbsp;&nbsp;	
							<input type="button" class="btn btn-primary" value="Insecure - Load Data" onclick="ajaxBridgeLoadJSON();" > 
							
							
							<br><br>
							<div id="bridge-content" style="padding:1px 25px; background-colo:#FAFAFA;" >

							</div>
						</div>
					</td>
				</tr>
				<tr>					
					<td align="right">

						<br><br> 
						<a class="btn btn-default viewsource" href="#" role="button" onclick="openWin()" >View Source</a>
						<?php
						$path = "demos/ajax_bridging/ajaxbridging_sec.php"; ### Path of the source code file
						
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
						<br><br>				
						<a href=".?page=demos/help.php#8" target="_blank">Help</a>	
					</td>
				</tr>
			</table>				
			
		</div>	
		
	</div>	
