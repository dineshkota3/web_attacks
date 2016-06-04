###### Iframe Code ######
<iframe style="float: right;" id="receiver" src="demos/web_messaging/manufacturer.php" width="400" height="200">
</iframe>




###############Low Level################

	//input_value : message to be sent
	var input = document.getElementById("message_box");
	var input_value = input.value;

	// Sending message to the receiver window.
	// origin = '*' => which means that message can be sent to any domain.
	receiver.postMessage(input_value, '*');




##############High Level################

	//input_value : message to be sent
	var input = document.getElementById("message_box");
	var input_value = input.value;

	//Sending message to the receiver window.
	//origin = 'http://localhost' => which means that message will be sent to only this particular domain.

	receiver.postMessage(input_value, 'http://localhost');



