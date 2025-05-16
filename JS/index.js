function changeSmall()
{
	document.getElementById("img1").style.width = "60px";
	document.getElementById("img1").style.height = "60px";
}
			
function changeNormal()
{
	document.getElementById("img1").style.width = "80px";
	document.getElementById("img1").style.height = "80px";
}

function displaymsg( result )
{
	if( result == 1 )
		alert("Please Login / SignUp to see more.");
}