
<?php 
$secLev = 1;
if( isset($_POST['seclevel']) ) 
{	
if( is_numeric($_POST['seclevel']) ) 
{ 
	$secLev = $_POST['seclevel']; 
} 
} 

$bankurl = 'bank1.php'; 
switch( $secLev ) 
{ 
	case 1: 
		$bankurl = 'bank1.php'; 
		break; 
	case 2:
		$bankurl = 'bank2.php'; 
		break; 
	case 3:
		$bankurl = 'http://www.cse.iitb.ac.in/~aawasthi/mtp/bank3.php'; 
		#$bankurl = 'bank3.php'; 
		break; 
}
?>
<!DOCTYPE HTML>
<html>
<head>
    	
<style type="text/css"> 
body{
    width: 100%;
    text-align: center;
    color: #fff;
    background-image: url(../../../img/header.jpg);
    background-position: center;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;	
	}

#div1 {width:350px;height:70px;padding:10px;border:1px solid #aaaaaa;} 
</style>
<script>
function allowDrop(ev)
{
    ev.preventDefault();
}

// This function is called when image with id "drag3" is started dragging, sets drag data and invokes function "moveAccnt"
function dragAccnt(ev)
{
    
    ev.dataTransfer.setData("text/plain", "283281234799");
    ev.dataTransfer.setData("image", ev.target.id);
    document.addEventListener("dragover", moveAccnt, false);
}

// This function makes the iframe containing "Account" field follow the mouse cursor
function moveAccnt(evt) {
    evt = evt || window.event;
    var x = evt.pageX - 25;
    var y = evt.pageY - 5;
    var f = document.getElementById("accountno");
    f.style.position = "absolute";
    f.style.left = x + 'px';
    f.style.top = y + 'px';
    f.addEventListener("mouseover", dropAccnt, false);
}

//When the mouse button is released, both image and iframe are placed at proper position and an event listener is added for disabling function "moveAccnt"
function dropAccnt()
{
    var i = document.getElementById("drag3");
    i.style.left = "657px";
    i.style.top = "270px";
    
    var j = document.getElementById("accountno");
    j.style.left = "750px";
    j.style.top = "270px";
    document.removeEventListener("dragover", moveAccnt, false);
}

// This function is called when image with id "drag1" is started dragging, sets drag data and invokes function "moveAmnt"
function dragAmnt(ev)
{
    
    ev.dataTransfer.setData("text/plain", "1000000");
    ev.dataTransfer.setData("image1", ev.target.id);
    document.addEventListener("dragover", moveAmnt, false);
}

// This function makes the iframe containing "Amount" field follow the mouse cursor
function moveAmnt(evt) {
    evt = evt || window.event;
    var x = evt.pageX - 25;
    var y = evt.pageY - 5;
    var f = document.getElementById("accountno");
    f.src = "<?php echo $bankurl;  ?>#amnt";
    f.style.position = "absolute";
    f.style.left = x + 'px';
    f.style.top = y + 'px';
    f.addEventListener("mouseover", dropAmnt, false);
}

//When the mouse button is released, both image and iframe are placed at proper position and an event listener is added for disabling function "moveAmnt"
function dropAmnt() {
    var i = document.getElementById("drag1");
    i.style.left = "657px";
    i.style.top = "307px";
    
    var j = document.getElementById("accountno");
    j.style.left = "750px";
    j.style.top = "270px";
    j.src = "<?php echo $bankurl;  ?>#accno";
    
    //left:620px; top:380px;
    //var j = document.getElementById("amount");
    //j.style.left = "750px";
    //j.style.top = "307px";
    
    document.removeEventListener("dragover", moveAmnt, false);
}

function drop(ev)
{
    ev.preventDefault();

    var data=ev.dataTransfer.getData("image");
    ev.target.appendChild(document.getElementById(data));

    document.getElementById(data).style.left = "20px";
    document.getElementById(data).style.top = "20px";
}

//This function changes the background color of the "div1" element
function processIFrameClick()
{
    var x = document.getElementById("div1");
    x.style.backgroundColor = "red";
    alert("You are qualified to the next level");
}

//This function adds an event listener on the button "Done!", which captures the click made on the iframe with id "btnid" and calls function "processIFrameClick"
function init()
{
    var x = document.getElementById("btnid");
    var y = (x.contentWindow || x.contentDocument);

    alert("Welcome to the page!");
    if(y.document)
          y = y.document;

    y.addEventListener("click", processIFrameClick, false);
}

//This function is invoked when image with id "drag2" is started dragging and an event listener is added on the "div" element
function placeBall3() {
    var i = document.getElementById("div1");
    i.addEventListener("mouseover", finishDrag, false);
}

//This function places the image with id "drag2" at its proper position and a listener is added for disabling the function "finishDrag"
function finishDrag() {
    var i = document.getElementById("drag2");
    i.style.left = "620px";
    i.style.top = "307px";
    //alert("Hello");
    var f = document.getElementById("accountno");
    f.removeEventListener("mouseover", dropAccnt, false);
    f.removeEventListener("mouseover", dropAmnt, false);
    f.style.left = "620px";
    f.style.top = "380px";
    f.width = "75";
    f.height = "23";
    f.style.opacity = "0.7";
    f.src = "<?php echo $bankurl;  ?>#button1";
    var j = document.getElementById("div1");
    j.removeEventListener("mouseover", finishDrag, false);
}

</script>
</head>
<body style="background-color:#E6E6E6;" >
<br>
<h2 align="center">Text Field Injection using Drag and Drop</h2>

<div id="div1" style="background-color:black; opacity:0.8; position:absolute; left:600px; top:250px; width:100px; height:100px;" ondrop="drop(event)" ondragover="allowDrop(event)"></div>

<button type="submit" style="position:absolute; left:630px; top:380px" >Done!</button>

<h3 align="center">Complete the ball by dragging different parts to their correct places in least time </h3>

<img id="drag2" src="ball3.gif" style="position: absolute; left: 420px; top:300px" width="37.5" height="37.5" draggable="true" ondragstart="placeBall3()">

<img id="static" src="ball1.gif" style="position:absolute; left:620px; top:270px;" width="37.5" height="37.5">

<img id="drag1" src="ball2.gif" style="position: absolute; left: 380px; top:300px" width="37.5" height="37.5" draggable="true" ondragstart="dragAmnt(event)">

<img id="drag3" src="ball4.gif" style="position: absolute; left: 340px; top:300px" width="37.5" height="37.5" draggable="true" ondragstart="dragAccnt(event)">

<iframe id="accountno" frameborder="1" name="accountno" width="100" height="200" src="<?php echo $bankurl;  ?>#accno" style="opacity:0.4; overflow:hidden; position:absolute; left:60px; top:25px; z-index:1;" scrolling="no" ></iframe>

<script>init();</script>


</body>

</html>

<!--var d = document.getElementById("div1");
d.innerHTML = "<strong>Done!</strong>"; -->
