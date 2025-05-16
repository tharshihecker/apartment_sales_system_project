<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title> Apartment page </title>
		<link rel = "icon" href = "images/icon.jpg">
		<link rel = "stylesheet" href = "CSS/flat.css">
		<script src = "JS/flat.js"> </script>
	</head>
	
	<body>
	<h1>FIND YOUR DREAM HOME </h1>
	
	<br>
	<br>
	
	<!--Search Bar-->
	<div id = "box">
		<input type = "text" placeholder = " 🔎    Enter the Area..." onkeyup="check(event)">
	</div>
	</body>
</html>

<?php
	session_start();
	require 'configuration.php';	
	
	if( isset( $_SESSION['user_email']))
	{

		$sql = "SELECT * FROM Apartments";
		$results = $conn->query($sql);

		if ($results->num_rows > 0) 
		{
			while ($row = $results->fetch_assoc())
			{
				$apartment_Id = $row["ID"];
				$img1 = $row["Image1"];
				$Name = $row["Name"];
				$Price = $row["Price"];
				$Address = $row["Address"];

			   echo '<div class = "maindiv" onmouseover="bigImg(this)" onmouseout="normalImg(this)">' .
					'<div class = "im1">'.
					'<a href = "property.php?apartment_Id='.$apartment_Id.'">'.
					'<img src = "data:image/jpeg;base64,' . base64_encode($img1) . '" width = "250px" height = "250px" onmouseover="bigImg(this)" onmouseout="normalImg(this)">'.
					'</a></div><br>'.
					'<div class = "p1">'.
					'<p class = "pc"> &nbsp; '.$Name .'</p>'.
					'<p> &nbsp; '.$Price .'</p>'.
					'<p class="address"> &nbsp; '.$Address .'</p>';
				
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
						
						   echo '<a href="delete_apartment.php?apartment_id='.$apartment_Id.'">' .
								'<button style="width:100%;background-color:#DFF5FF; padding:5px; font-size:20px;">Delete</button></a>';
					}
					
			   echo '</div></div>';
			}
		}
		
		else 
		{
			echo "No results";
		}
	}
	
	else
	{
		header('Location: index.php');
		echo 'User email is not set';
	}
	
$conn->close();
?>