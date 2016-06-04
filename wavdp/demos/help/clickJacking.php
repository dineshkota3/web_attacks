<h2 id="5">5. Clickjacking</h2>
<br>
<p>
<u>Attack Scenario</u>: Consider a vulnerable bank website, which is having facility to <a href="demos/clickJacking/clickJackingdemo/bank1.php" target="_blank">transfer</a> the money from your account to someone else’s account. A user is currently logged in to this vulnerable bank website. An attacker sends an email to the user containing a link to claim some prize. When user clicks the link in the email, it opens a web page which contains a transparent form which is actually the bank’s money transfer form (in real attack it will be hidden). On solving the puzzle, it actually sends some amount to the attacker.

	<br><br>
	<a href=".?page=demos/clickJacking/clickJacking.php" target="_blank">Current Account balance</a>
	
	<form action="demos/clickJacking/clickJackingdemo/demo.php" method="POST" target="_blank">
	<input type="hidden" name="seclevel" value="1" />	
	<input type="submit" class="btn btn-primary" value="Test Link" />
	</form>

	After solving the puzzle check the remaining balance in your account <a href=".?page=demos/clickJacking/clickJacking.php" target="_blank">Current Account balance</a>.
</p>
<br><br>
