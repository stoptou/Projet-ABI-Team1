<?php
// Envoi du message provenant du formulaire de contact - avec "PHPMailer" - par protocole smtp (gmail)
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

function sendMail($name, $subject, $email, $body)
{


    $root = realpath($_SERVER["DOCUMENT_ROOT"]);

    require ($root.'/vendor/autoload.php');

    if(isset($name) && isset($email)){


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
    return $send;
}