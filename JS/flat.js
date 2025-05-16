function bigImg(x) 
{
	var img = x.querySelector('img');
	if(img)
	{
		img.style.height = "240px";
		img.style.width = "240px";
	}
}

function normalImg(x) 
{
	var img = x.querySelector('img');
	if(img)
	{
		img.style.height = "250px";
		img.style.width = "250px";
	}
}

//search bar
	
function check(event) 
{		
	var searchttext = event.target.value.trim().toUpperCase();
	var address = document.querySelectorAll(".address");
	var div = document.querySelectorAll(".maindiv");
	for( var i=0; i<address.length ; ++i )
	{
			
		if( address[i].textContent.trim().toUpperCase().indexOf(searchttext) < 0 )
		{
			div[i].style.display = 'none';
		}
			
		else
		{
			div[i].style.display = 'inline-block';
		}		
	}
}