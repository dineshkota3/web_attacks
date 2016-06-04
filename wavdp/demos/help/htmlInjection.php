<h2 id="1">1. HTML Injection</h2>
<br>
<p>
HTML injection is a type of attack to exploit the injection vulnerability in a web application. In this attack, simple HTML code is injected to modify the original page for malicious reasons. <br><br> 

<u>Attack Scenario</u>: An attacker sends an email to a user who is currently logged into a vulnerable website. When user clicks the 
<a href=".?page=demos/html_injection/htmlInj.php&inp1=<form><p style='color:red;'>Your session has been expired. Please login again.</p><br><br>Username: <input type='text' ='username' /><br><br>Password: <input type='password' name='password' /><br><br><input type='submit' value='Login' /></form>" target="_blank">link</a>, it opens the page of the vulnerable website showing a login form (injected by attacker) saying that "your session has been expired". And user fills up the form thinking that it is being asked by the website, which results that username and password of the user will be sent to the attacker.  <br><br>

<a href=".?page=demos/html_injection/htmlInj.php&inp1=<form><p style='color:red;'>Your session has been expired. Please login again.</p><br><br>Username: <input type='text' ='username' /><br><br>Password: <input type='password' name='password' /><br><br><input type='submit' value='Login' /></form>" target="_blank">Test Link</a> 
</p>
