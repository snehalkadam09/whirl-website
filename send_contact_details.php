<?php

 require 'swiftmailer/lib/swift_required.php';

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$phone = $_POST['phone'];
$zip = $_POST['zip'];

/*
$m = new MongoClient();
$db = $m->selectDB("whirl-db");
$collection = $db->selectCollection("contact_messages");
$document = array(
    "name" => $name,
    "email" => $email,
    "subject" => $subject,
    "phone" => $phone,
    "zip" => $zip,
    "message" => $message,
    "submitted_datetime" => new MongoDate(),
);
$contact_added = $collection->insert($document);
//echo "Contact inserted successfully";
*/

//Create the Transport. I created it using the gmail configuration
$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
        ->setUsername('testing@oabstudios.com')
        ->setPassword('bandit@Pride1');

$admin_template = '<div style="width:640px; margin:0 auto"> <!-- main container -->
  <div style="width:640px; float:left; height: 170px;">
     <p>
        Hello Admin,<br><br>

        <b> '.ucfirst($name).'</b> (Email: '.$email.') has contacted you. <br><br>

       Other details as follows : <br><br>

           Cell Phone:' . $phone . '<br>
           Zip Code:' . $zip . '<br>
           Message:' . $message . '<br><br>

        <br><br>
        Thank You<br>
        Whirl Team.<br>
     </p>
  </div>
</div>';

//$sendmessage = wordwrap($sendmessage, 70);
//Create the message
$message_admin = Swift_Message::newInstance();

$body = "";
//$toEmail = array('testing@oabstudios.com','dovidspector@gmail.com');
$toEmail = 'testing@oabstudios.com';
$message_admin->setSubject("Whirl - Contact Details")
        ->setFrom('testing@oabstudios.com')
        ->setTo($toEmail)
        ->setBody($body)
        ->addPart($admin_template, 'text/html');

//Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

//Send the message
$result = $mailer->send($message_admin);

if ($result) {
   echo "success";
} else {
   echo "error";
}