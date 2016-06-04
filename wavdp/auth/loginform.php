				<form id="login_form" action="<?php echo $base_url; ?>auth/login.php" method="post">
					
					<table cellspacing="0" role="presentation">
						<tbody>
							<tr><td>
									<label for="user" class="text-primary">Username</label>
								</td>
								<td >
									<label for="pass" class="text-primary" >Password</label>
								</td>
							</tr>
							<tr>
								<td style="padding-right:10px">                                    
                                        <input type="text"  class="form-control" name="user" id="email" value="" tabindex="1" size="20" placeholder="username" >           
								</td>&nbsp; &nbsp;
								<td>
									 <input type="password" class="form-control" name="pass" id="pass" tabindex="2" size="20" placeholder="password" >
								</td>
								<td style="padding-left:10px">
									<input class="btn btn-primary" style="padding-left:8px;padding-left:8px;padding-right:8px;padding-top:4px;padding-bottom:4px" value="Log In" tabindex="4" name="submit" type="submit"  >
								</td>
							</tr>
						</tbody>
					</table>
				</form>
