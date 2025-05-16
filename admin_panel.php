<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Online Apartment Sales System</title>
		<link rel="icon" href="images/icon.jpg">
		<style>
			body{
				background-color:#A3D8FF;
			}
			
			table{
				width:100%;
				background-color:#E1F7F5;
			}
			
			h1{
				font-size:50px;
				text-align:center;
				color:#10439F;
			}
		
			button{
				width:100%;
				background-color:#DFF5FF;
			}
			
		</style>
	</head>
	<body>
		
	</body>
</html>

<?php
	session_start();
	require 'configuration.php';
	
	// Sign Up details
	if( isset( $_SESSION['user_email']))
	{
		$sql = "SELECT * FROM Details";
		$results = $conn->query($sql);
	   
		if ($results->num_rows > 0) 
		{
			echo"<h1>SignUp Member Details</h1>";
			echo '<table border="1">'.
			'<tr><th>ID</th><th>Name</th><th>Gender</th><th>Job</th>'.
			'<th>Role</th><th>Email</th><th>Phone Number</th><th>Address</th>'.
			'<th>Apartment Type</th><th>Budget</th><th>Comments</th><th>Submission Date</th><th>Delete</th></tr>';
		
			while ($row = $results->fetch_assoc())
			{
				$details_id = $row["id"];
				$fullname = $row["fullname"];
				$gender = $row["gender"];
				$job = $row["job"];
				$role = $row["role"];
				$email = $row["email"];
				$phone = $row["phone"];
				$address = $row["address"];
				$apartment_type = $row["apartment_type"];
				$budget = $row["budget"];
				$comments = $row["comments"];
				$Submission_Date = $row["Submission_Date"];

			   echo '<tr><td>'.$details_id.'</td><td>'.$fullname.'</td><td>'.$gender.'</td><td>'.$job.'</td>'.
				    '<td>'.$role.'</td><td>'.$email.'</td><td>'.$phone.'</td><td>'.$address.'</td>'.
					'<td>'.$apartment_type.'</td><td>'.$budget.'</td><td>'.$comments.'</td>'.
					'<td>'.$Submission_Date.'</td>';
					
				if( $email != $_SESSION['user_email'] )
				{
					echo '<td><a href="deletedetails.php?details_id='.$details_id.'">'.
						 '<button>Delete</button></a></td>';
				}
				
			   echo '</tr>';
			}
			
			echo '</table>';
		}
	}
		
	else 
	{
		echo "<h1>No Details Available</h1>";
	}
		
	
	// contact details
	if( isset( $_SESSION['user_email']))
	{
		$sql1 = "SELECT * FROM contact";
		$results1 = $conn->query($sql1);
	   
		if ($results1->num_rows > 0) 
		{
			echo"<h1>Member Contact Details</h1>";
			echo '<table border="1">'.
				 '<tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th>'.
			     '<th>Delete</th></tr>';
		
			while ($row1 = $results1->fetch_assoc())
			{
				$contact_id = $row1["id"];
				$Name = $row1["Name"];
				$Email = $row1["Email"];
				$Message = $row1["Message"];

			   echo '<tr><td>'.$contact_id.'</td><td>'.$Name.'</td><td>'.$Email.'</td><td>'.$Message.'</td>'.
					'<td><a href="deletecontact.php?contact_id='.$contact_id.'">'.
					'<button>Delete</button></a></td></tr>';
			}
			
			echo '</table>';
		}
		
		else 
		{
			echo "<h1>No Contact Details Available</h1>";
		}
		
	}
	
	
	// Admin approve details
	if( isset( $_SESSION['user_email']))
	{
		$sql2 = "SELECT * FROM Details WHERE role= 'pending'";
		$results2 = $conn->query($sql2);
	   
		if ($results2 -> num_rows > 0) 
		{
			echo"<h1>New Admin Details</h1>";
			echo '<table border="1">'.
			'<tr><th>ID</th><th>Name</th><th>Gender</th><th>Job</th>'.
			'<th>Role</th><th>Email</th><th>Phone Number</th><th>Address</th>'.
			'<th>Apartment Type</th><th>Budget</th><th>Comments</th><th>Submission Date</th><th>Approved</th><th>Denied</th></tr>';
		
			while ($row1 = $results2->fetch_assoc())
			{
				$details_id1 = $row1["id"];
				$fullname1 = $row1["fullname"];
				$gender1 = $row1["gender"];
				$job1 = $row1["job"];
				$role1 = $row1["role"];
				$email1 = $row1["email"];
				$phone1 = $row1["phone"];
				$address1 = $row1["address"];
				$apartment_type1 = $row1["apartment_type"];
				$budget1 = $row1["budget"];
				$comments1 = $row1["comments"];
				$Submission_Date1 = $row1["Submission_Date"];

			   echo '<tr><td>'.$details_id1.'</td><td>'.$fullname1.'</td><td>'.$gender1.'</td><td>'.$job1.'</td>'.
				    '<td>'.$role1.'</td><td>'.$email1.'</td><td>'.$phone1.'</td><td>'.$address1.'</td>'.
					'<td>'.$apartment_type1.'</td><td>'.$budget1.'</td><td>'.$comments1.'</td>'.
					'<td>'.$Submission_Date1.'</td>';
					
				if( $email1 != $_SESSION['user_email'] )
				{
					echo '<td><a href="approved.php?details_id1='.$details_id1.'">'.
						 '<button>Approve</button></a></td>'.
						 '<td><a href="approved.php?details_id2='.$details_id1.'">'.
						 '<button>Change</button></a></td>';
				}
				
				echo '</tr>';
			}
			
			echo '</table>';
		}
		
		else 
		{
			echo "<h1>No New Admins Available</h1>";
		}
	}
	
	
	// payment details
	if( isset( $_SESSION['user_email']))
	{
		$sql3 = "SELECT * FROM paymentdetails";
		$results3 = $conn->query($sql3);
	   
		if ($results3->num_rows > 0) 
		{
			echo"<h1>Payment Details</h1>";
			echo '<table border="1">'.
				 '<tr><th>ID</th><th>Name</th><th>Cardnumber</th><th>Expirydate</th>'.
			     '<th>Cvv</th><th>Amount</th></tr>';
		
			while ($row3 = $results3->fetch_assoc())
			{
				$ID2 = $row3["ID"];
				$Name2 = $row3["Name"];
				$Cardnumber2 = $row3["Cardnumber"];
				$Expirydate2 = $row3["Expirydate"];
				$Cvv2 = $row3["Cvv"];
				$Amount2 = $row3["Amount"];

			   echo '<tr><td>'.$ID2.'</td><td>'.$Name2.'</td><td>'.$Cardnumber2.'</td><td>'.$Expirydate2.'</td>'.
					'<td>'.$Cvv2.'</td><td>'.$Amount2.'</td></tr>';
			}
			
			echo '</table>';
		}
		
		else 
		{
			echo "<h1>No Payment Details Available</h1>";
		}
		
	}
	
	
$conn->close();
?>