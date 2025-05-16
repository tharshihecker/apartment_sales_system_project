<?php
require_once "configuration.php";
require_once "header.php";
session_start();

$errors = array();

if (isset($_POST["btn"])) {
    // Retrieve form data
    $fullname = $_POST["fullname"];
    $gender = $_POST["gender"];
    $job = $_POST["job"];
    $role = $_POST["role"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $apartment_type = $_POST["apartment_type"];
    $budget = $_POST["budget"];
    $comments = $_POST["comments"];
    $terms = $_POST["terms"];

    $sql = "SELECT email FROM Details WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $errors[] = 'Email already exists. Please choose a different email.';
    } else {
       
        if (strlen($password) < 8) {
            $errors[] = 'Password should be at least 8 characters long';
        }
        if (strlen($phone) != 10) {
            $errors[] = 'Phone number should be exactly 10 digits';
        }
        if ($budget < 1000000) {
            $errors[] = 'Budget should be more than 1 million';
        }

        if (empty($errors)) {
            if ($role === 'admin') {
                $new = "INSERT INTO Details (fullname, gender, job, role,email, password, phone, address, apartment_type, budget, comments) VALUES ('$fullname', '$gender', '$job', 'pending','$email', '$password', $phone, '$address', '$apartment_type', $budget, '$comments')";
                header('Location: approvalshowing.php');
              
            } else {
                $new = "INSERT INTO Details (fullname, gender, job, role,email, password, phone, address, apartment_type, budget, comments) VALUES ('$fullname', '$gender', '$job', '$role','$email', '$password', $phone, '$address', '$apartment_type', $budget, '$comments')";
            }
        
            setcookie('user_email', $email, time() + (86400 * 30), "/");
        
            if ($conn->query($new) === TRUE) {
                $_SESSION['user_email'] = $email;
                $_SESSION['success_signup'] = true;
        
                if ($role !== 'admin') {
                    header('Location: success.php');
                    exit();
                }
            } else {
                $errors[] = 'Failed to add the record.';
            }
        }
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Apartments</title>
    <link rel="stylesheet" href="CSS/signup.css">
	<link rel="icon" href="images/icon.jpg">
</head>

<body>
    
    
    
    <div id="container">
        <h1>Signup page</h1>
        
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
        <form action="signup.php" method="post">
            <table>
                <tr>
                    <td><label for="fullname">Full Name:</label></td>
                    <td><input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>
                    </td>
                </tr>
                <tr>
                    <td><label for="gender">Gender:</label></td>
                    <td>
                        <input type="radio" id="male" name="gender" value="male" required> Male
                        <input type="radio" id="female" name="gender" value="female" required> Female
                    </td>
                </tr>

                <tr>
                    <td><label for="job">Job:</label></td>
                    <td><input type="text" id="job" name="job" placeholder="Enter your job details" required></td>
                </tr>
                <tr>
                    <td><label for="role">Role:</label></td>
                    <td>
                        <input type="radio" id="buyer" name="role" value="buyer" required> Buyer
                        <input type="radio" id="seller" name="role" value="seller" required> Seller
                        <input type="radio" id="admin" name="role" value="admin" required> Admin

                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" id="email" name="email" placeholder="Enter your email" required></td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td style="width: 300px;"><input type="password" minlength="8" id="password" name="password"
                            placeholder="Enter your password" onkeyup="validatePassword()" required style="height: 40px;"></td>
                    <td style="width: 400px; ">
                        <div id="password-validation" class="validation-message"></div>
                    </td>

                </tr>
                <tr>
                    <td><label for="phone">Phone Number:</label></td>
                    <td style="width: 300px;"><input type="number" id="phone" maxlength="10" name="phone"
                            placeholder="Enter your phone number" onkeyup="validatePhoneNumber()" required></td>
                    <td style="width: 200px;">
                        <div id="phone-validation" class="validation-message"> </div>
                    </td>
                </tr>
                <tr>
                    <td><label for="address">Address:</label></td>
                    <td><input type="text" id="address" name="address" placeholder="Enter your address" required></td>
                </tr>
                <tr>
                    <td><label for="apartment_type">Preferred Apartment Type:</label></td>
                    <td>
                        <select id="apartment_type" name="apartment_type" placeholder="Select your preferred apartment type" required>
                            <option value="loft">Loft</option>
                            <option value="duplex">Duplex</option>
                            <option value="penthouse">Penthouse</option>
                            <option value="townhouse">Townhouse</option>
                            <option value="condo">Condo</option>
                            <option value="villa">Villa</option>
                            <option value="apartment_suite">Apartment Suite</option>
                            <option value="efficiency">Efficiency Apartment</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="budget">Budget:</label></td>
                    <td><input type="number" id="budget" name="budget" placeholder="Enter your budget" onkeyup="budgetValidation()" required>
</td>
                    <td style="width: 400px; ">
                        <div id="budget-validation" class="validation-message"></div>
                    </td>

                </tr>
                <tr>
                    <td><label for="comments">Additional Comments or Preferences:</label></td>
                    <td><textarea id="comments" name="comments" rows="4" cols="50"
                            placeholder="Enter any additional comments or preferences" required></textarea></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label>
                            <input type="checkbox" id="terms" name="terms" required>
                            I agree to the <a href="termsAndConditions.html" target="_blank">Terms and Conditions</a>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;"><input type="submit" value="Submit" name="btn"></td>
                </tr>
            </table>
        </form>
        <div class="center">
        <p>Already have an account? <a href="login.php">Login here</a></p>
        <p>Forgot your password? <a href="forgot_password.php">Reset here</a></p>
        
    </div>
    </div>
   
    <script src="js/signup.js"> </script>

</body>
</html>
<?php

require_once "footer.php";


?>

