
<h2 id="6">6. Insecure Direct Object References</h2>
<br>
<p>
<u>Attack Scenario</u>: Consider two users user1 and user2, who are authorized to make post only on group1 and group2 respectively on a social network website. If the website is using groupid selected by the user directly (without verifying at server side) while user makes a post, then user can manipulate groupid in the given group selection list <select><option value="groupid1">Group 1</option></select>  to <select><option value="groupid2">Group 1</option></select> (check the html code to see the difference) to post spam messages on unauthorized groups.<br><br>

						<form method="post" action=".?page=demos/insecur_dobj_ref/insecDirObjRef_submit.php" target="_blank" >	
							<input type="hidden" name="seclevel" value="1"	/>				
							<input type="submit" name="submit" value="Test Link" class="btn btn-primary" /> <br>
						</form>

<br><br>
</p>
<br><br>
