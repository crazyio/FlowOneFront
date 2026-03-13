<?php

// Define some constants
define( "RECIPIENT_NAME", "John Doe" );
define( "RECIPIENT_EMAIL", "ashik.mdashikurrahman@gmail.com" );

// Read the form values
$success = false;
$senderName = isset( $_POST['name'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['name'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$senderPhone = isset( $_POST['phone'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['phone'] ) : "";
$subject = isset( $_POST['subject'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['subject'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

// If all values exist, send the email
if ( $senderName && $senderEmail && $message ) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $senderName . " <" . $senderEmail . ">";
  $mailBody = 'Sender Name: ' . $senderName. "\r\n" . 'Sender Email: ' . $senderEmail . "\r\n" .'Sender Phone: '. $senderPhone . "\r\n" . 'Subject: ' . $subject . "\r\n" . 'Message: ' . $message;
  $success = mail( $recipient, $subject, $mailBody, $headers );
  echo "<p class='success'>Thanks for contacting us. We will contact you ASAP!</p>";
}

?>