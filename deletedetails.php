<?php
	session_start();
	require 'configuration.php';

	if( isset( $_GET['details_id']))
	{
		$details_id=$_GET['details_id']; 
		{			
			// Delete customer details from database
			$sql1 = "DELETE FROM details WHERE ID = $details_id";
			
			if ($conn->query($sql1)) {
				echo "details deleted successfully";
			} 
			else {
				echo "Error deleting details: " . $conn->error;
			}
		}
	}
	
	else
	{
		header('Location: admin_panel.php'); // Redirect back to admin_panel page
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete Success</title>
    <link rel="icon" href="images/icon.jpg">
	<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        .redirect-message {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
		<h1>Deleted Successful</h1>
		<p>The detail has been deleted successfully!</p>
		<div class="redirect-message">
			<p>Redirecting you to the admin_panel page...</p>
		</div>
	</div>
	
	<script>
		// Redirect to home page after 2 seconds
		setTimeout(function() {
			window.location.href = "admin_panel.php";
		}, 2000); // 2000 milliseconds = 2 seconds
	</script>
</body>
</html>