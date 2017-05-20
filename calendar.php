<?php 

var_dump(function_exists('mysqli_connect'));

phpinfo();
die;
//mail calendar invitation
$to = "sujeet@qustn.com";
$subject = "Training Registration";
$message = "Thank you for participating in the Technical Certification training program.\r\n\r\n";
$location = "Conf";
//==================
$headers .= "MIME-version: 1.0\r\n";
$headers .= "Content-class: urn:content-classes:calendarmessage\r\n";
$headers .= "Content-type: text/calendar; method=REQUEST; charset=UTF-8\r\n";
$messaje = "BEGIN:VCALENDAR\r\n";
$messaje .= "VERSION:2.0\r\n";
$messaje .= "PRODID:PHP\r\n";
$messaje .= "METHOD:REQUEST\r\n";
$messaje .= "BEGIN:VEVENT\r\n";
$messaje .= "DTSTART:20121223T171010Z\r\n";
$messaje .= "DTEND:20121223T191010Z\r\n";
$messaje .= "DESCRIPTION: You have registered for the class\r\n";
$messaje .= "SUMMARY:Technical Training\r\n";
$messaje .= "ORGANIZER; CN=\"Corporate\":mailto:jayashree.g@fugenx.com\r\n";
$messaje .= "Location:" . $location . "\r\n";
$messaje .= "UID:040000008200E00074C5B7101A82E00800000006FC30E6 C39DC004CA782E0C002E01A81\r\n";
$messaje .= "SEQUENCE:0\r\n";
$messaje .= "DTSTAMP:".date('Ymd').'T'.date('His')."\r\n";
$messaje .= "END:VEVENT\r\n";
$messaje .= "END:VCALENDAR\r\n";
$message .= $messaje;
mail($to, $subject, $message, $headers);

?>