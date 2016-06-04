	<div id='wrappper'>			
		<h4 class="text-primary">AJAX-XSS</h4><br>	
		
		<div>
			<table  style="width:100%; height:auto; padding:10px;" align="center">
				<tr>
					<td>																	
						<form method="post" action="<?php echo $base_url; ?>demos/ajax_xss/ajaxXSS_submit.php" class="ajaxsubmit" id="ajaxXSSForm" >	
							<textarea name="inp1" rows="5" cols="50" ></textarea>
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
					<td>
						<br><br>
						<div id="ajaxResponse" align="center">
							<img src="images/wait.gif" style="width:20px;height:20px;" />
						</div>
					</td>
				</tr>
				<tr>					
					<td align="right">
						
						<br><br> 
						<a class="btn btn-default viewsource" href="#" role="button" onclick="openWin()" >View Source</a>
						<?php
						$path = "demos/ajax_xss/ajaxXSS_submit.php"; ### Path of the source code file
						
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
										
					</td>
				</tr>
			</table> 			
		</div>	
		
	</div>	
