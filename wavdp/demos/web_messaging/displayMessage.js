window.onload = function() {
	// Get a reference to the <div> on the page that will display the
	// message text.
	var messageEle = document.getElementById('message');

	// A function to process messages received by the window.
	function receiveMessage(e) {
		// Check to make sure that this message came from the correct domain.
		// if (e.origin !== "http://localhost")
			// return;

		// Update the div element to display the message.
		messageEle.innerHTML = "<li>" + e.data + "</li>";
	}

	// Setup an event listener that calls receiveMessage() when the window
	// receives a new MessageEvent.
	window.addEventListener('message', receiveMessage);
}
