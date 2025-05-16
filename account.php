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
			$gender = $rows['gender'];
			$job = $rows['job'];
			$role = $rows['role'];
			$phone = $rows['phone'];
			$email = $rows['email'];
			$address = $rows['address'];
			$apartment_type = $rows['apartment_type'];
			
			
           echo '<h1>User Account</h1>'.
                '<p><strong>Full Name : </strong> '.$fullname.'</p>'.
				'<p><strong>Email : </strong> '.$user_email.'</p>'.
				'<p><strong>Gender : </strong> '.$gender.'</p>'.
				'<p><strong>Job : </strong> '.$job.'</p>'.
				'<p><strong>Phone Number : </strong> '.$phone.'</p>'.
				'<p><strong>User Role : </strong> '.$role.'</p>'.
				'<p><strong>Address : </strong> '.$address.'</p>'.
				'<p><strong>Prefered Apartment : </strong> '.$apartment_type.'</p>'.
				'<a href="feedback/display.php" target="_blank"><button class="btn">Feedback</button></a>';
		}		
		else
		{
			echo "No user found.";
		}
	}
			
	else
	{
		echo "<h1 style='color:red; margin-top:20%;'>Login / Signup to see your profile.</h1>";
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>User Account</title>
		<link rel="icon" href="images/icon.jpg">
		<style>
			body{
				background-color:#48cae4;
			p{
				font-size:30px;
				margin-left:35%;
			}
			h1{
				margin-top:30px;
				margin-bottom:30px;
				color:blue;
				text-align:center;
				font-size:50px;
			}
			.btn{
				display:block;
				width: 40%;
				padding: 10px;
				background-color: #007bff;
				color: #fff;
				border: none;
				border-radius: 4px;
				cursor: pointer;
				margin:20px auto 30px auto;
				font-size:20px;				
			}
			  
			.btn:hover {
				background-color: #0056b3;
			}
			a{
				text-decoration:none;
			}
		</style>
	</head>
	<body>
	</body>
</html>