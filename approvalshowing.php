<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Pending</title>
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
        <h1>Your registration is pending approval</h1>
        <p>Thank you for registering. Your account is pending approval by the administrator.</p>
        <div class="redirect-message">
            <p>Redirecting you to the home page...</p>
			<p>You can visit the website as a customer</p>
        </div>
    </div>
    
    <script>
        setTimeout(function() {
            window.location.href = "index.php";
        }, 4000);
    </script>
</body>
</html>
