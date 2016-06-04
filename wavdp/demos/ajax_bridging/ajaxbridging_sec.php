<script>

	function ajaxBridgeLoadJSON()
	{
			var form_data = {
				is_ajax: 1
			};
			$.ajax({
				type: "GET",
				url: "<?php echo $base_url."demos/ajax_bridging/bridge.json";  ?>",
				data: form_data,
				success: function(response)
				{																		
					var data_array = eval (response);										
					var dataHtml = "";
					for (var i = 0; i < data_array.length; i++) {						
						dataHtml += "<b>" + data_array[i].title + "</b>";						
						dataHtml += "<p>" + data_array[i].data + "</p>";
						dataHtml += "<br>";
					};
					$("#bridge-content").html(dataHtml);
				}
			});	
	}
	
	function encodeHtml(text) {
	  var map = {
		'&': '&amp;',
		'<': '&lt;',
		'>': '&gt;',
		'"': '&quot;',
		"'": '&#039;'
	  };

	  return text.replace(/[&<>"']/g, function(m) { return map[m]; });
	}	
	
	function ajaxBridgeSecureLoadJSON()
	{
			var form_data = {
				is_ajax: 1
			};
			$.ajax({
				type: "GET",
				url: "<?php echo $base_url."demos/ajax_bridging/bridge.json";  ?>",
				data: form_data,
				success: function(response)
				{																		
					var data_array = eval (response);										
					var dataHtml = "";
					for (var i = 0; i < data_array.length; i++) {						
						dataHtml += "<b>" + encodeHtml(data_array[i].title) + "</b>";						
						dataHtml += "<p>" + encodeHtml(data_array[i].data) + "</p>";
						dataHtml += "<br>";
					};
					$("#bridge-content").html(dataHtml);
				}
			});	
	}



</script>
