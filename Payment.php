<?php
require 'configuration.php';
session_start();

if (isset($_POST["btn"]))
{
    $name = $_POST['name'];
    $card_number = $_POST['card_number'];
    $expiry_date = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];
    $amount = $_POST['amount'];
    
    $sql = "INSERT INTO paymentdetails (Name, Cardnumber, Expirydate, Cvv, Amount) VALUES ('$name', '$card_number', '$expiry_date', '$cvv', $amount)";
    
    if ($conn->query($sql) === TRUE) {
       
        echo "Payment processed successfully";
        setcookie("payment_success", "true", time() + 3600, "/"); // Cookie expires in 1 hour
		header('Location: index.php');
		exit();
    } 

    else {
        echo "Error: " .  $conn->error;
    }
}
   
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet"href="CSS/Payment.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Page</title>
  <script src="JS/Payment.js"></script>
  <link rel="icon" href="images/icon.jpg">
</head>
<body style="background-color:#68D2E8;">
  <h1><marquee bgcolor="#007bff" width="_00px" color="" height="40px"behavior="scroll" direction="left"scrolldelay="120" scrollamount="10px"> <b>LUXURY  APARTMENTS PAYMENT  PAGE</b> </marquee></h1>
  
  <div>
  <h1>Payment Form</h1>
  
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" onsubmit="validateForm()">
		<label for="name">Name on Card : </label>
		<input type="text" id="name" name="name" required><br><br>
		
		<label for="card_number">Card Number : </label>
		<input type="text" id="card_number" name="card_number" required><br><br>
		
		<label for="expiry_date">Expiration Date : </label>
		<input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY" required><br><br>
		
		<label for="cvv">CVV : </label>
		<input type="text" id="cvv" name="cvv" required><br><br>
		
		<label for="amount">Amount:</label>
		<input type="number" id="amount" name="amount" required><br><br>
		
		<button type="submit" name="btn">Pay Now</button>
	</form>
	</div>
</body>
</html>


