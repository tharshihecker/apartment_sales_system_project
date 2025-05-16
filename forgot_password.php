<?php
require_once "configuration.php";
require_once "header.php";

session_start();
?>

<?php

$errors = array();

// Check if form is submitted
if (isset($_POST["btn_reset"])) {
    // Retrieve form data
    $email = $_POST["email"];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    // Check if passwords match
    if ($newPassword !== $confirmPassword) {
        $errors[] = 'Passwords do not match.';
    } else {
        // Check if email exists in the database
        $sql = "SELECT * FROM Details WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Email exists, update the password
            $updateSql = "UPDATE details SET password = '$newPassword' WHERE email = '$email'";
            if ($conn->query($updateSql) === TRUE) {
                $_SESSION['user_email'] = $email;
                $_SESSION['password_change_success'] = true;
                setcookie('user_email', $email, time() + (86400 * 30), "/");
                // Cookie set to expire in 30 days

                // Check if the user is an admin
                $row = $result->fetch_assoc();
                if ($row['role'] == 'admin') {
                    // If the user is an admin, redirect to admin page
                    header('Location: adminloginsuccess.php');
                    exit();
                } else {
                    // Otherwise, redirect to success page
                    header('Location: success.php');
                    exit();
                }
            } else {
                $errors[] = 'Error updating password.';
            }
        } else {
            $errors[] = 'Email does not exist.';
        }
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgotten Password</title>
    <link rel="stylesheet" href="css/forgotpassword.css" />
	<link rel="icon" href="images/icon.jpg">
</head>

<body>

    <div id="container">
        <h1>Forgotten Password</h1>
        <!-- Error Display Section -->
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
        <form action="forgot_password.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <label for="new_password">New Password:</label>
            
            <input type="password" id="new_password" name="new_password" minlength="8" placeholder="Enter your new password"onkeyup="validatePassword1()" required>
            <div id="password-validation1"></div>

            <label for="confirm_password">Confirm Password:</label>
           
         <input type="password" id="confirm_password" name="confirm_password" minlength="8" placeholder="Confirm your new password"onkeyup="validatePassword2()" required>
         <div id="password-validation2"></div>

         <br>
            <input type="submit" value="Reset Password" name="btn_reset">
        </form>
        <div class="center">
            <p>Remembered your password? <a href="login.php">Login here</a></p>
            <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
        </div>
    </div>
    <script src="JS/forgotpassword.js"> </script>
</body>

</html>
<?php

require_once "footer.php";

?>
