
		
		<!-- <script> function getinput(){
					var receiver = document.getElementById('receiver').contentWindow;
					var btn = document.getElementById('message_box').value;
					receiver.postMessage(btn, 'http://clienta');
				}</script> -->
					
   
	
	





 	<div id='wrappper'>			
		<h4 class="text-primary">Web Messaging</h4><br>	
		<script src="demos/web_messaging/controller.js"></script>
		<div>
			<table  style="width:100%; height:auto; padding:10px;" align="center">
				<tr>
					<td>																	
						<?php
						if( isset($_GET['seclevel']) || isset($_POST['seclevel']) )
						{
							include_once("submit.php");
						}
						?> 
						<br>
						<form method="post" align="center" action=""  style="margin-top: -60px;">						 
							Security Level: 
							<select id = "seclevel"name="seclevel">
								<option value="1">Low</option>
								<!-- <option value="2">Medium</option> -->
								<option value="3">High</option>								
							</select> <br> <br>						
							<input style="padding: 3px 10px;" type="submit" name="submit" value="Submit" class="btn btn-primary" /> <br>
						</form>
						<br><br><br>
						


						<div>
							

					        <h4 style="color: rgb(202, 42, 113);">Complaint Box</h4>
					         <p style="font-size:13px;color: rgb(77, 75, 74);margin-top: -5px;" > &nbsp; &nbsp; &nbsp;Register your all complaint here...</p>
							<!-- <p>
							  This document is on the domain: http://localhost
							</p> -->
							<br> <br>
							<textarea type="text" name="message" id="message_box" value="" placeholder="Enter your complain here" name="inp1" rows="3" cols="45" ></textarea>
							<br><button class="btn" id="send">Send Message</button>
							
							<iframe style="float: right;" id="receiver" src="demos/web_messaging/vendor_sabsesasta.php" width="400" height="200">
							  <p>Your browser does not support iframes.</p>
							</iframe>
						</div>

					</td>
				</tr>
				 <tr>					
					<td align="right">
						
						<br><br> 
						<a class="btn btn-default viewsource" href="#" role="button" onclick="openWin()" >View Source</a>
						<?php
						$path = "demos/web_messaging/view_source.php"; ### Path of the source code file
						
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
