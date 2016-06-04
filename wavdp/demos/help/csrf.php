
<h2 id="3">3. CSRF</h2>
<br>
<p>

	<b>Procedure for attack:</b>
	<ol>
	<li>Visit the CSRF attack demonstration page</li>
	<li>Set security to <i>low</i> and submit to go to password-change page</li>
	<li> <a href="demos/csrf/csrfAttackerWebsite/attackerSite.php" target="_blank">Click</a> to experience the attack. It will change your password to <b>wvdp</b> </li> 	
	<li>Log out and try to log in again</li>
	<li>Can't log in? Your password is changed</li>
	</ol>

	<br>
	<p> <a href="demos/csrf/csrfAttackerWebsite/attackerSite.php" target="_blank">Site</a> is a malicious website which has a hidden form in it. Since the user is logged in, the server accepts the password request sent by this malicious website on behalf of the user.</p>

</p>
<br><br>
