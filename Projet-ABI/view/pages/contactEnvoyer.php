<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;



$root = realpath($_SERVER["DOCUMENT_ROOT"]);


//require ($root.'/vendor/PHPMailer/PHPMailer/src/PHPMailer.php');
//require ($root.'/vendor/PHPMailer/PHPMailer/src/SMTP.php');
//require ($root.'/vendor/PHPMailer/PHPMailer/src/Exception.php');
require ($root.'/vendor/autoload.php');


if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];


    $mail = new PHPMailer();



    //Utilisateur qui reçoit
    try{   
   
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username= "activebretagneinformatique@gmail.com";
    $mail->Password= 'adminabi';
    $mail->Port = 465;

    // email contenu

    $mail->isHTML(true);
    $mail->setFrom("activebretagneinformatique@gmail.com", 'abi');
    $mail->addAddress($email);
    $mail->Subject = $subject;
    $mail->Body = $body;

    $mail->send();

    }
    catch(Exception $e){
        echo "Le mail ne s'est pas envoyé";
    }
echo "grfgfdx";
}
?>