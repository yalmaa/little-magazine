<?php 
$EMAIL = $_POST['E_Mail'];
$headers = "From:" . $EMAIL . "\r\n";
$headers .= "Reply-To:" . $EMAIL . "\r\n";
$headers .= "Content-Type: text/plain;\r\n charset=iso-8859-1\r\n";
$recipient = "test@studioq.co.in";
$subject = "Mail from LittltShoppers";
$message = "Pregnent from LittltShoppers \n\n";
$message .= "Due Date : " . $_POST['Due_date'] . "\n\n";
$message .= "Email : " . $_POST['Email'] . "\n\n";
$message .= "Full name : " . $_POST['Full_name'] . "\n\n";
$message .= "Phone Number : " . $_POST['Phone_Number'] . "\n\n";
$message .= "Check Box : " . $_POST['check_box'] . "\n\n";
$message .= "Message sent at: " . time() . "\n";
mail($recipient, $subject, $message, $headers);
header("Location:http://yalmaa.com/lilmagazine");
