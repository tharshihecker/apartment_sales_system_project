<?php
session_start();
require 'configuration.php';
			

if (isset($_POST['btnsubmit'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    $sql = "INSERT INTO contact(Name, Email, Message) VALUES ('$name','$email','$message')";
	
    if ($conn->query($sql)) {
        header('Location: contact_success.php');
            exit();
       
    } else {
        echo "Error : ".$conn->error;
    }
}
// Close connection
$conn->close();
?>
