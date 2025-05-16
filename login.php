<?php
require_once "configuration.php";
require_once "header.php";
session_start();

$errors = array();

if (isset($_POST["btn_login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM Details WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['password'] == $password) {
            $_SESSION['user_email'] = $email;
            $_SESSION['user_role'] = $row['role'];
            setcookie('user_email', $email, time() + (86400 * 30), "/");

            if ($row['role'] == 'admin') {
                header('Location: adminloginsuccess.php');
                exit();
            } elseif ($row['role'] == 'pending' || $row['role'] == 'guest') {
                // Display approval status message
                echo '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Approval Status</title>
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
                        <h1>Approval Status</h1>';
                        if ($row['role'] == 'pending') {
                            echo '<p>Your registration request is pending approval by the administrator.</p>';
                        } elseif ($row['role'] == 'guest') {
                            echo '<p>Your Admin registration request has been denied.</p>';
                        }
                        echo '<div class="redirect-message">
                            <p>You can continue to use the website as a Guest.</p>
                        </div>
                    </div>
                    <script>
		
		setTimeout(function() {
			window.location.href = "index.php";
		}, 2000); // 2000 milliseconds = 2 seconds
	</script>
                </body>
                </html>';
                exit();
            } else {
                $_SESSION['success_login'] = true;
                header('Location: success.php');
                exit();
            }
        } else {
            $errors[] = 'Incorrect password.';
        }
    } else {
        $errors[] = 'Email does not exist.';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Apartments - Login</title>
    <link rel="stylesheet" href="css/login.css" />
    <link rel="icon" href="images/icon.jpg">
</head>

<body>

    <div id="container">
        <h1>Login</h1>
        <div id="errors">
            <?php
            if (!empty($errors)) {
                echo '<ul>';
                foreach ($errors as $error) {
                    echo "<li>$error</li>";
                }
                echo '</ul>';
            }
            ?>
        </div>
        <form action="login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <label for="password">Password:</label>

            <input type="password" id="password" name="password" placeholder="Enter your password" minlength="8" onkeyup="validatepassword1()" required>
            <div id="password-validation1"></div>

            <input type="submit" value="Login" name="btn_login">
        </form>
        <p>Forgot your password? <a href="forgot_password.php">Reset here</a></p>
        <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
    </div>
    <script src="JS/login.js"> </script>


</body>

</html>

<?php
require_once "footer.php";
?>
