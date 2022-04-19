<?php
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];

    require_once "vendor/PHPMailer/src/PHPMailer.php";
    require_once "vendor/PHPMailer/src/SMTP.php";
    require_once "vendor/PHPMailer/src/Exception.php";

    $mail = new PHPMailer();

    //Utilisateur qui reçoit

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username= "activebretagneinformatique@gmail.com";
    $mail->Password= 'adminabi';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    // email contenu

    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAdress("activebretagneinformatique@gmail.com");
    $mail->Subject = ("$email ($subject)");
    $mail->Body = $body;

    if($mail->send()){
        $status = "success";
        $response = "Email envoyé!";
    }
    else{
        $status = "failed";
        $response = "Quelque chose s'est mal passé" . $mail->ErrorInfo;
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
}
?>