	<div id='wrappper'>			
		<h4 class="text-primary">Insecure Direct Object Reference</h4><br>	
		
		<div>
			<table  style="width:100%; height:auto; padding:10px;" align="center">
				<tr>
					<td>																	
						<form method="post" action=".?page=demos/insecur_dobj_ref/insecDirObjRef_submit.php" >	
							Security Level: 
							<select name="seclevel">
								<option value="1">Low</option>
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
						$path = "demos/insecur_dobj_ref/insecDirObjRef_sec.php"; ### Path of the source code file
						
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
						<a href=".?page=demos/help.php#6" target="_blank">Help</a>
					</td>
				</tr>
			</table> 			
		</div>	
		
	</div>	
