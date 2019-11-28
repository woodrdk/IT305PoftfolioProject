<?php
    if(isset( $_POST['name']))
        $name = $_POST['name'];
    if(isset( $_POST['email']))
        $email = $_POST['email'];
    if(isset( $_POST['message']))
        $message = $_POST['message'];
    if(isset( $_POST['subject']))
        $subject = $_POST['subject'];

    $content="From: $name \n Email: $email \n Message: $message";
    $recipient = "rdrwood@gmail.com";
    $mailheader = "From: $email \r\n";
    mail($recipient, $subject, $content, $mailheader) or die("Error!");
    echo "Email sent!";
/*
$message = "";
if ($isValid) {
    $email_subject = "Interested Student!";
    foreach ($_POST as $key => $value) {
        $message .= "Field" . htmlspecialchars($key) . " is " . htmlspecialchars($value) . "\n";
    }
    $success = mail('ostrich.adventure2019@gmail.com', $email_subject, $message);
    $msg = $success ? "Your form has been successfully sent to iD.A.Y Dream."
        : "We're sorry, something went wrong. Please contact us at info@idaydream.org";
    $emailSent = $success ? "A summary of what you submitted will be emailed to you!" : "";
    echo $msg;
    echo "<br>";
    echo $emailSent;
}*/
?>