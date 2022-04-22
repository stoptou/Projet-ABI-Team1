<?php
// Contrôle centralisé des entrées dans les formulaires
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require ($root.'./view/pages/contactEnvoyer.php');

use ABI\model\Client;
use ABI\model\Database;
use ABI\model\Secteur;

foreach ($_POST as $key => $value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    // Formulaire utilisateur
    switch ($key) {
        case 'email':
            if ((!filter_var($value, FILTER_VALIDATE_EMAIL))) {
                $error = "L'email n'est pas valide";
            }
            break;
        
        case 'password':
            if (strlen($value) < 8) {
                $error = "Le mot de passe est trop court. Au moins 8 caractères";
            }
            break;

        case 'code_postal':
            if (!is_int((int) $value) || strlen((string) $value) != 5) {
                $error = "Le code postal doit contenir exactement 5 chiffres";
            }
            break;
        
        case 'telephone':
            if (!is_int((int) $value) || strlen((string) $value) != 10) {
                $error = "Le numéro de téléphone doit contenir exactement 10 chiffres";
            }
            break;
    }

    if($value == "") {
        $error = "Toutes les cases doivent être remplies";
    }
}

switch ($_POST['form']) {
    // Formulaire ajouter un utilisateur
    case 'addUser':
        if (!isset($error)) {
            $data = new Database('abi');
            $password = htmlentities($_POST['password']);
            $password = password_hash($password, PASSWORD_DEFAULT);
            $data = $data->addUser($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $_POST['role']);
            header('Location: ./index.php?action=dashboard&action3=dashboardList&successAdd=true');
        }
        else {
            header('Location: ./index.php?action=dashboard&action3=addUser&errorForm='.$error);
        }
        break;
    // Formulaire modifier un utilisateur
    case 'modifyUser':
        if (!isset($error)) {
            $data = new Database('abi');
            $data = $data->updateUser($_POST['id_user'], $_POST['first_name'], $_POST['last_name'], $_POST['email']);
            header('Location: ./index.php?action=dashboard&action3=dashboardList&successModify=true');
        }
        else {
            header('Location: ./index.php?action=dashboard&action3=modifyUser&errorForm='.$error);
        }
        break;
    // Formulaire ajouter un client
    case 'addClient':
        if (!isset($error)) {
            $client = new Client('abi');
            $sect = new Secteur('abi');
            $id_secteur = (int) $sect->getSecteur($_POST['secteur']);
            $result = $client->addClient($id_secteur, $_POST['raison_sociale'], $_POST['adresse'], $_POST['code_postal'], $_POST['ville'], $_POST['effectif'], $_POST['telephone']);
            header('Location: ./index.php?action=buisness&successAdd=true');
        }
        else {
            header('Location: ./index.php?action=buisness&action2=addClient&errorForm='.$error);
        }
        break;

    // case 'modifyClient':
    //     if (!isset($error)) {
    //         header('Location:./index.php?action=buisness&successModify=true');
    //     }
    //     else {
    //         header('Location:./index.php?action=buisness&successModify=true');
    //     }
    //     break;

    // Formulaire de contact
    case 'contactForm':
        if (!isset($error)) {
            $send = sendMail($_POST["name"], $_POST["subject"], $_POST["email"], $_POST["body"]);
            header('Location: ./index.php?action=contact&send='.$send);
        }
        else {
            header('Location: ./index.php?action=contact&errorForm='.$error);
        }
        break;
}
?>