
<h2 id="4">4. SQL Injection</h2>
<br>
<p>
<u>Attack Scenario</u>: Assume a college website which shows marks and other personal information corresponding to the entered roll number. If proper input validation is not done by the website, then an attacker can enter a malicious input and which will manipulate the database query at the server side and will enable attacker to view information related to all the students. <br><br>


					<form action=".?page=demos/sql_injection/sqli1_submit.php" method="POST" target="_blank">
					<input type="hidden" name="seclevel" value="1" />	
					<input type="hidden" name="inp1" value="1' or '1'='1'#" />
					<input type="submit" class="btn btn-primary" value="Test Link" />
					</form>



</p>
<br><br>
