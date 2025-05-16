<?php
	session_start();
	require 'configuration.php';
							
	if( isset( $_SESSION['user_email']))
	{
		$user_email = $_SESSION['user_email'];
			
		$sql = "SELECT * FROM Details WHERE email = '$user_email'";
		$result = $conn->query($sql);

		if( $result -> num_rows > 0 )
		{
			$rows = $result->fetch_assoc();
			$fullname = $rows['fullname'];
			$displayPhoto = "block";
			$displaylogin = "none";
			$displaylogout = "block";
		}
	}
	
	else
	{
		$displayPhoto = "none";
		$displaylogout = "none";
		$displaylogin = "block";
		$display = 1;
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Online Apartment Sales System</title>
		<link rel="icon" href="images/icon.jpg">
		<link rel="stylesheet" href="CSS/index.css">
		<script src="JS/index.js"></script>
	</head>
	<body>
		<div class="banner">			
			<div class="navigation">
				<ul>
					<li><a href="photo.html" target="_blank">⬅Photos</a></li>
					<li><a href="flat.php" onclick="displaymsg(<?php echo $display; ?>)">🏠Apartments</a></li>
					<li><a href="contact.html">📞Contact</a></li>
					<li><a href="About.html" target="_blank">📋About</a></li>
					<li><a href="upload.php" onclick="displaymsg(<?php echo $display; ?>)">🚀Upload</a></li>
					<li><a href="account.php">account</a></li>
				</ul>
			</div>
			
			<div id="accounted">
				<a href="account.php"><img src="images/account.jfif" alt="Account" id="img1" style="display: <?php echo $displayPhoto; ?>" onmouseover="changeSmall()" onmouseout="changeNormal()"></a>
			</div>

			<div id="headingbox">
				<h1 id="heading1"><i>Luxury Apartments</i></h1>
			</div>
			
			<div id="buttonbox" style="display: <?php echo $displaylogin; ?>;">
				<a href="login.php"><button class="btn" id="btn1">LOG IN</button></a>
				<a href="signup.php"><button class="btn">SIGN UP</button></a>
			</div>
			
			<div id="logout"style="display: <?php echo $displaylogout; ?>;">
				<a href="logout.php"><button class="btn">LOG OUT</button></a>
			</div>
		</div>
	</body>
</html>