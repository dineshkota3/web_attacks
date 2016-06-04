
<h2 id="7">7. Web Storage</h2>
<br>
<p>
		Web storage was introduced in HTML5 to avoid overhead of exchanging same information between client and server every time they communicate. It enables web applications to store required frequent data as a key-value pair at the client side. <br><br> 
				
		1. Web Storage Attack with XSS			<br><br>
		<a class="btn btn-primary" href='.?page=demos/webstorage_xss/webStorage.php&inp1=<script src="js/webStorage.js"> </script> ' target="_blank">Test Link</a>							
		
		<br><br>
				
		2. Web Storage Attack on Ecommerce website <br><br>
		Consider an <a class="btn btn-primary" href="./demos/webstorage/index.php" target="_blank">online shopping portal</a> that allows customers to place orders to purchase  mobile phones. User can add the item to the cart to buy, the cart is actually implemented as a local storage. The item gets added to the local storage on the user’s browser with name of the item as the key and the cost as its value. So, when user presses the buy button, all items in his cart (localstorage) are sent to the server side. The server now adds up the total cost of all the items and gives option to the user to place the order to purchase these items. Assuming, the server on receiving the list of items from user’s cart (local storage) does not compare the price of the items with their original prices in database. So if the client modifies the price of the items in local storage, the bill will be generated according to the modified price.


</p>
<br><br>
