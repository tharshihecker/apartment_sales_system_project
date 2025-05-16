var d = new Date();
			var year = d.getFullYear();
			var month = d.getMonth()+1;
			var date = d.getDate();
			var dates = date + " / " + month + " / " + year;
						
			document.write("<h1 style='color:red; text-align:right;'>"+dates+"</h1>");
						
			function show(names)
			{
				if( names == "flat1" )
				{
					document.getElementById("image").src = document.getElementById("flat1").src;
					document.getElementById("flatname").textContent = "John Daniel Flats";
				}
				
				else if( names == "duplex1" )
				{
					document.getElementById("image").src = document.getElementById("duplex1").src;
					document.getElementById("flatname").textContent = "The Urban Haven";
				}
				
				else if( names == "penthouse1" )
				{
					document.getElementById("image").src = document.getElementById("penthouse1").src;
					document.getElementById("flatname").textContent = "The Highrise Hideaway";
				}
				
				else if( names == "shop1" )
				{
					document.getElementById("image").src = document.getElementById("shop1").src;
					document.getElementById("flatname").textContent = "The Industrial Residence";
				}
				
				else if( names == "villa1" )
				{
					document.getElementById("image").src = document.getElementById("villa1").src;
					document.getElementById("flatname").textContent = "The Opulent Oasis";
				}
				
				else if( names == "townhouse1" )
				{
					document.getElementById("image").src = document.getElementById("townhouse1").src;
					document.getElementById("flatname").textContent = "The Summit Sanctuary";
				}
				
				else if( names == "flat2" )
				{
					document.getElementById("image").src = document.getElementById("flat2").src;
					document.getElementById("flatname").textContent = "The Quaint Quarters";
				}
				
				else if( names == "duplex2" )
				{
					document.getElementById("image").src = document.getElementById("duplex2").src;
					document.getElementById("flatname").textContent = "The Cozy Cranny";
				}
				
				else if( names == "penthouse2" )
				{
					document.getElementById("image").src = document.getElementById("penthouse2").src;
					document.getElementById("flatname").textContent = "The Platinum Penthouse";
				}
				
				else if( names == "shop2" )
				{
					document.getElementById("image").src = document.getElementById("shop2").src;
					document.getElementById("flatname").textContent = "The Stylish Studio";
				}
				
				else if( names == "villa2" )
				{
					document.getElementById("image").src = document.getElementById("villa2").src;
					document.getElementById("flatname").textContent = "The Quaint Quarters";
				}
				
				else if( names == "townhouse2" )
				{
					document.getElementById("image").src = document.getElementById("townhouse2").src;
					document.getElementById("flatname").textContent = "The Modern Monastery";
				}
			}