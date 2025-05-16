<?php
	// linking the configuration file
	require 'configuration.php';
	session_start();
	
	if( isset( $_SESSION['user_email']))
	{	
		if( isset($_POST["btnsubmit"]))
		{
			global $conn;
			$pName = $_POST["propertyName"];
			$pType = $_POST["propertyType"];
			$oName = $_POST["ownerName"];
			$oNumber = $_POST["ownerPnumber"];
			$pPrice = $_POST["propertyPrice"];
			$pAddress = $_POST["propertyAddress"];
			$pSize = $_POST["propertySize"];
			$pRooms = $_POST["rooms"];
			$pBedrooms = $_POST["bedrooms"];
			$pBathrooms = $_POST["bathrooms"];
			$pBalconys = $_POST["balconys"];
			$pAge = $_POST["propertyAge"];
			$Image1 = addslashes(file_get_contents($_FILES["image1"]["tmp_name"]));
			$Image2 = addslashes(file_get_contents($_FILES["image2"]["tmp_name"]));
			$Image3 = addslashes(file_get_contents($_FILES["image3"]["tmp_name"]));		
			$Image4 = addslashes(file_get_contents($_FILES["image4"]["tmp_name"]));
			$pDescription = $_POST["propertyDescription"];
			
			$sql1 = "INSERT INTO Apartments(Name, Type, OwnerName, OwnerNumber, Price, Address, Size, Rooms, Bedrooms, Bathrooms, Balconys, PropertyAge, Image1, Image2, Image3, Image4, Description)
					VALUES('$pName','$pType','$oName','$oNumber','$pPrice','$pAddress','$pSize','$pRooms','$pBedrooms','$pBathrooms','$pBalconys','$pAge','$Image1','$Image2','$Image3','$Image4','$pDescription')";
			
			if( $conn->query($sql1))
			{
				setcookie("OwnerName",$oName, time()+(86400*30),"/");
				echo "Inserted Successfully";
				
				$user_email = $_SESSION['user_email'];
	
				$sql2 = "SELECT * FROM Details WHERE email = '$user_email'";
				$result1 = $conn->query($sql2);

				if( $result1 -> num_rows > 0 )
				{
					$rows = $result1->fetch_assoc();
					$role = $rows['role'];
				}
				
				else
				{
					echo "No user found.";
				}

				if( $role == 'admin' )
				{
					header('Location: adminuploadsuccess.php');
					exit();
				}
				
				else
				{
					header('Location: uploadsuccess.php');
				}
			}
			
			else
			{
				echo "Error : ".$conn->error;
			}
		}
	}
	
	else
	{
		header('Location: index.php');
		echo 'Your email is not set';
	}
	$conn->close();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Luxury Apartments</title>
		<link rel="stylesheet" href="CSS/upload.css">
		<link rel="icon" href="images/icon.jpg">
		<script src="JS/upload.js"></script>
	</head>
	<body>
	<div>
		<h1>Property Details</h1>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" onsubmit="return checkPhoneNumber()">
		<table>
		
			<tr>
			<td><label for="propertyName">Apartment Name</label></td>
			<td><input type="text" name="propertyName" id="propertyName" required></td>
			</tr>
			
			<tr>
			<td><label>Property Type</label></td>
			<td><select name="propertyType" required>
				<option value="Loft">Loft</option>
                <option value="Duplex">Duplex</option>
                <option value="Penthouse">Penthouse</option>
                <option value="Townhouse">Townhouse</option>
                <option value="Shop">Shop</option>
                <option value="Villa">Villa</option>
			</select></td>
			</tr>
			
			<tr>			
			<td><label for="ownerName">Owner Name</label></td>
			<td><input type="text" name="ownerName" id="ownerName" required></td>
			</tr>
			
			<tr>
			<td><label for="ownerPnumber">Owner Contact  No</label></td>
			<td><input type="text" name="ownerPnumber" id="ownerPnumber" placeholder="0xxxxxxxxx" required></td>
			</tr>
			
			<tr>
			<td><label for="propertyPrice">Property Price</label></td>
			<td><input type="text" name="propertyPrice" id="propertyPrice" required></td>
			</tr>
			
			<tr>
			<td><label for="propertyAddress">Property Address</label></td>
			<td><textarea name="propertyAddress" id="propertyAddress" rows="2" cols="30" required></textarea></td>
			</tr>
			
			<tr>
			<td><label for="propertySize">Property Size</label></td>
			<td><input type="text" name="propertySize" id="propertySize" placeholder="    Enter in Squarefeet" required></td>
			</tr>
			
			<tr>
			<td><label for="rooms">Rooms </label>
			<input type="number" name="rooms" id="rooms" required></td>
			<td><label for="bedrooms">Bedrooms </label>
			<input type="number" name="bedrooms" id="bedrooms" required></td>
			</tr>
			
			<tr>
			<td><label for="bathrooms">Bathrooms  </label>
			<input type="number" name="bathrooms" id="bathrooms" required></td>
			<td><label for="balconys">Balconys </label>
			<input type="number" name="balconys" id="balconys" required></td><br>
			</tr>
			
			<tr>
			<td><label>Property Age</label></td>
			<td><select name="propertyAge" required>
				<option value="new property">New Property</option>
				<option value="old property">Old Property</option>
			</select></td>
			</tr>
			
			<tr><td colspan="2"><label>Upload the Apartment Photos here ...</label></td></tr>
			
			<tr>
			<td><label for="image1">Image1</label>
			<input type="file" name="image1" id="image1" required></td>
			<td><label for="image2">Image2</label>
			<input type="file" name="image2" id="image2" required></td>
			</tr>
			
			<tr>
			<td><label for="image3">Image3</label>
			<input type="file" name="image3" id="image3" required></td>
			<td><label for="image4">Image4</label>
			<input type="file" name="image4" id="image4" required></td>
			</tr>
			
			<tr>
			<td><label for="propertyDescription">Property Description</label></td>
			<td><textarea name="propertyDescription" id="propertyDescription" rows="5" cols="40" required></textarea></td>
			</tr>
		</table>
			
			<input type="submit" value="Upload Property" name="btnsubmit">
		</form>
		
		</div>
	</div>		
	</body>
</html>