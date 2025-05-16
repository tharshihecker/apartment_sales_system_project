
<?php
include 'connect.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $sql = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$message')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        //echo "Data inserted successfully";
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback Page</title>
  <link rel="stylesheet" href="hs.css">
</head>
<body>
  <h1>Customer Feedback </h1>
  
  <form id="feedbackForm"  method="post">
    <label for="name">Your Name:</label>
    <input type="text" id="name" name="name" required><br><br>
    
    <label for="email">Your Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    
    <label for="message">Your Feedback:</label>
    <textarea id="message" name="message" rows="4" required></textarea><br><br>
    
    <button type="submit" class="btn" name="submit">Submit Feedback</button>
  </form>

  
  
  
</body>
</html>