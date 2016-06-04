	<div id='wrappper'>			
		<h4 class="text-primary">XSS Stored</h4><br>	
		
		<div>
			<table  style="width:100%; height:auto; padding:10px;" align="center">
				<tr>
					<td align="center">
						<form method="post" action="" >
							<i style="font-size:12px;font-color:#ccc">(This guestbook is a common floor to interact with your friends. Other WVDP users on your machine can read this post.)</i>
							<br>
							<textarea title="What are you thinking?" id="guestbook_comment" name="inp1" placeholder="Make a post ..." role="textbox" aria-autocomplete="list" autocomplete="off" aria-expanded="false" style="width: 80%; height: 90px; margin-top: 15px; font-size: 14px; padding: 13px;"></textarea>								
							<br><br>
							Security Level: 
							<select name="seclevel"> 
								<option value="1">Low</option> 
								<option value="2">Medium</option> 
								<option value="3">High</option> 
							</select> <br><br>								
							<input type="submit" name="submit" value="Submit" class="btn btn-primary" /> <br>
						</form>
						<br><hr><br>
						
						<div class="demoattackvector">
						<?php
						if( isset($_GET['inp1']) || isset($_POST['inp1']) )
						{
							?>                            
                            <?php
                            include_once("xssStored_submit.php");
                            ?>
                            <hr>                            
                            <?php
						}
						?> 		
						
						<p>Old Posts </p><br>
						<div id="statusList" style="text-align:left; color:black;">							
						<?php
							$query = "SELECT username,comment FROM guestbook ORDER BY createdAt DESC";		
							$result = mysql_query($query);	
							while($row = mysql_fetch_array($result))
							{
						?>
							<div class="statusItem" style=" background-color: rgb(229, 229, 229); margin-top: 15px; padding: 15px; font-size: 14px;">
								 <b style = "color: #3b5998;"> <?php echo $row['username']; ?> </b>
								 <div  class="status" style="margin-top: 10px;"> 
									<?php 
										if($securityLevel == 3){
											$commentFromRow = $row['comment'];
											echo htmlspecialchars($commentFromRow, ENT_QUOTES, 'UTF-8');
										}
										else{
											echo $row['comment'];
										}
									?>
									
								</div>
							</div>
						<?php } ?>
						</div>						
						
						</div>						
					</td>
				</tr>
				<tr>					
					<td align="right">

						<br><br> 
						<a class="btn btn-default viewsource" href="#" role="button" onclick="openWin()" >View Source</a>
						<?php
						$path = "demos/xss_stored/xssStored_submit.php"; ### Path of the source code file 
						
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
						<a href=".?page=demos/help.php#2_b" target="_blank">Help</a>						
					</td>
				</tr>
			</table> 			
		</div>	
		
	</div>	
