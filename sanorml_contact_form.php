<?php
// Fetching Values from URL.
$name = $_POST['name1'];
$email = $_POST['email1'];
$message = $_POST['message1'];
$subject = $_POST['subject1'];
$contact = $_POST['contact1'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing E-mail.
// After sanitization Validation is performed
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
if (!preg_match("/^[0-9]{10}$/", $contact)) {
echo "Please put in a valid phone number (no dashes)”;
} else {

$subjectCust = ‘Thank you for your message ‘.$name;
$subjectOwner = ‘Website message from: ‘ . $name;

// To send HTML mail, the Content-type header must be set.
$headers = ‘MIME-Version: 1.0′ . “\r\n”;
$headers .= ‘Content-type: text/html; charset=iso-8859-1′ . “\r\n”;
$headers .= ‘From:’ . $email. “\r\n”; // Sender’s Email
$template2Customer = ‘Hello ‘ . $name . ‘,’
. ‘Thank you for contacting us.’
. ‘Your message to us: ‘
. ‘Name:’ . $name . ”
. ‘Email:’ . $email . ”
. ‘Contact No:’ . $contact . ”
. ‘Subject:’ . $subject . ”
. ‘Message:’ . $message . ”
. ‘This is a confirmation mail.’
. ”
. ‘We will contact you as soon as possible.’
. ‘http://www.sanorml.org';

$template2SiteOwner = ‘Website message from: ‘
. ‘Name: ‘ . $name . ”
. ‘Email: ‘ . $email . ”
. ‘Contact No: ‘ . $contact . ”
. ‘Subject: ‘ . $subject . ”
. ‘Message: ‘ . $message . ”
. ”
. ‘This message was sent from: http://www.sanorml.org‘;

$sendmessage2Cust = $template2Customer;
$sendmessage2SiteOwner = $template2SiteOwner;

// Message lines should not exceed 70 characters (PHP rule), so wrap it.
$sendmessage2Cust = wordwrap($sendmessage2Cust, 70);
$sendmessage2SiteOwner = wordwrap($sendmessage2SiteOwner, 70);

// Send mail by PHP Mail Function.
mail($email, $subjectCust, $sendmessage2Cust, $headers);
mail(“contact@sanorml.org”, $subjectOwner, $sendmessage2SiteOwner, $headers);

echo “Your message has been received, we will contact you soon.”;
}
} else {
echo “* invalid email *”;
}
?>