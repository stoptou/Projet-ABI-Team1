<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;



$root = realpath($_SERVER["DOCUMENT_ROOT"]);

require ($root.'/vendor/autoload.php');


if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];


    $mail = new PHPMailer();



    //Utilisateur qui reçoit
    try{   
   
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username= "activebretagneinformatique@gmail.com";
    $mail->Password= 'adminabi';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    // email contenu

    $mail->isHTML(true);
    $mail->setFrom("activebretagneinformatique@gmail.com", 'ABI');
    $mail->addAddress($email);
    $mail->Subject = 'Votre email au sujet de ['.$subject.'] a été envoyé.';
    $mail->Body = '<strong>Le mail envoyé contient : </strong></br>'.$body;

    $mail->send();
        $send="yes";
    }
    catch(Exception $e){
        $send = "no";
    }
}

header("Location: index.php?action=contact&send=".$send);
die();
?>