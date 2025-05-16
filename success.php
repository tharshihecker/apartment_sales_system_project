<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
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
        <?php
        session_start();
		
		// Check if user signed up successfully
        if (isset($_SESSION['success_signup'])) {
            echo "<h1>Sign Up Successful</h1>";
            echo "<p>Thank you for signing up, " . $_SESSION['user_email'] . "!</p>";
        }

        // Check if user logged in successfully
        if (isset($_SESSION['success_login'])) {
            echo "<h1>Login Successful</h1>";
            echo "<p>Welcome, " . $_SESSION['user_email'] . "!</p>";
        }
		?>
        
		<div class="redirect-message">
            <p>Redirecting you to home page...</p>
        </div>
    </div>
    
    <script>
        // Redirect to home page after 3 seconds
        setTimeout(function() {
            window.location.href = "index.php";
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>
</body>
</html>
