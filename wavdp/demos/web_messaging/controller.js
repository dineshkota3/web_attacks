window.onload = function() {
	// Get the window displayed in the iframe.
	var receiver = document.getElementById('receiver').contentWindow;
  
	// Get a reference to the 'Send Message' button.
	var btn = document.getElementById('send');

	// A function to handle sending messages.
	function sendMessage(e) {
		// Prevent any default browser behaviour.
		//e.preventDefault();

		
		var input = document.getElementById("message_box");
		var input_value = input.value;

		// Send a message with the text 'Hello Treehouse!' to the receiver window.
		receiver.postMessage(input_value, '*');
	}

	// Add an event listener that will execute the sendMessage() function
	// when the send button is clicked.
	btn.addEventListener('click', sendMessage);
}