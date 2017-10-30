<!DOCTYPE html>
<html>
   <head>
        <title>Send Email</title>
        <meta charset="utf-8">
        <link href="css/style" type="text/css" rel="stylesheet">

   </head>
   <body>
   <div class="wrap"> 
        <h3>Form</h3>
        <form action="" method="get">
            <label for="email">To:</label>
            <br><input type="text" name="email" id="email">
            <br>
            <label for="name">Name:</label>
            <br> 
            <input type="text" name="name" id="name">
            <br>
            <label for="subject">Subject:</label>
            <br> 
            <input type="text" name="subject" id="subject">
            <br>
            <label for="Message">Text message:</label>
            <br>
            <textarea rows="6"  name="Message" id="Message"></textarea><br><br>
            <input type="submit" name="submit" value="SEND">
            
        </form>
    </divv>
   </body> 
</html>
<?php 
//Settings for php mejlera
 require "../PHPMailer_5.2.0/class.phpmailer.php";
 
 $email = new PHPMailer();
 $email->isSMTP();
 $email->SMTPDebug = 0;
 $email->Debugoputput = 'html';


//Settings  for gmail account

$email->Host = 'smtp.gmail.com';
$email->Port = 587;
$email->SMTPAuth = true;
$email->SMTPSecure = "tls";
$email->Username = "youremail";
$email->Password =" your password ";

//Setting for email send

$email->SetFrom("toEmail","name");
$toName = $_GET['name'];
$to =  $_GET['email'];
$mess = $_GET['Message'];
$sub = $_GET['subject'];

$email->addAddress($to,$toName);

$email->Subject=$sub;
$email->Body = $mess;
$email->isHTML(true);

//Send email

if(!$email->send()){

    echo "Your email is not send";

}else {
    echo "Your email is send";
}

?>
