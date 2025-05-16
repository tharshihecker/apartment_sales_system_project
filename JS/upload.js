function checkPhoneNumber()
{
	var number = document.getElementById("ownerPnumber").value;
	if( number.length == 10 )
	{
		confirm("Can I Register this Apartment");
		return true;
	}
	else
	{
		var phonenumber = document.getElementById("ownerPnumber").value;
		var message = "You are entered " + phonenumber.length + " digits";
		alert(message);
		return false;
	}
}