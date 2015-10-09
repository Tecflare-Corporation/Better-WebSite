<?php
function sendmessage($to,$subject,$r)
{

$headers = "From: " . strip_tags("Automated@tecflare.com") . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message = '<html><body>';
$message .= '<h1>' . $subject . '</h1>';
$message = '<html><body>';
$message .= '<h1>Tecflare</h1>';
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message .= "<tr style='background: #eee;'><td><strong>Subject:</strong> </td><td>" . strip_tags($subject) . "</td></tr>";
$message .= "<tr><td><strong>Sent to:</strong> </td><td>" . strip_tags($to) . "</td></tr>";
$message .= "</table><br>" . $r;
$message .= "</body></html>";
mail($to, $subject, $message, $headers);
}
?>