// Check browser support
if (typeof(Storage) != "undefined") 
{
	var lsout = "";
    if (localStorage.length)
	{
		for (var iter = 0; iter < localStorage.length; iter++)
		{
			lsout += "Key: "+localStorage.key(iter) + " - Value: " + localStorage.getItem(localStorage.key(iter)) + "<br>";
		}
	}
	else
	{
		lsout += "Data not found";
	} 	
	
	var ssout = "";
    if (sessionStorage.length)
	{
		for (var iter = 0; iter < sessionStorage.length; iter++)
		{
			ssout += "Key: "+sessionStorage.key(iter) + " - Value: " + sessionStorage.getItem(sessionStorage.key(iter)) + "<br>";
		}
	}
	else
	{
		ssout += "Data not found";
	}    	       		
	
	document.getElementById("results").innerHTML = lsout+"<br><br>"+ssout;
		
} 
else 
{
    alert("Sorry, your browser does not support Web Storage...");
}
