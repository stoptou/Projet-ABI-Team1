<?php

use ABI\model\Database;

foreach ($_POST as $key => $value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);

    switch ($key) {
        case 'email':
            if ((!filter_var($value, FILTER_VALIDATE_EMAIL))) {
                $error = "Email pas valide";
            }
            break;
        
        case 'password':
            if (strlen($value) < 8) {
                $error = "Mot de passe trop court";
            }
            break;
    }

    if($value == "") {
        $error = "Toutes les cases doivent être remplies";
    }
}

switch ($_POST['form']) {
    case 'addUser':
        if (!isset($error)) {
            $data = new Database('abi');
            $password = htmlentities($_POST['password']);
            $password = password_hash($password, PASSWORD_DEFAULT);
            $data = $data->addUser($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $_POST['role']);
            header('Location:./index.php?action=dashboard&action3=dashboardList&successAdd=true');
        }
        else {
            header('Location:./index.php?action=dashboard&action3=addUser&errorForm='.$error);
        }
        break;
    
    case 'modifyUser':
        if (!isset($error)) {
            $data = new Database('abi');
            $data = $data->updateUser($_POST['id_user'], $_POST['first_name'], $_POST['last_name'], $_POST['email']);
            header('Location:./index.php?action=dashboard&action3=dashboardList&successModify=true');
        }
        else {
            header('Location:./index.php?action=dashboard&action3=modifyUser&errorForm='.$error);
        }
        break;

    // case 'addClient':
    //     if (!isset($error)) {
    //         header('Location:./index.php?action=buisness&successAdd=true');
    //     }
    //     else {
    //         header('Location:./index.php?action=buisness&successAdd=true');
    //     }
    //     break;

    // case 'modifyClient':
    //     if (!isset($error)) {
    //         header('Location:./index.php?action=buisness&successAdd=true');
    //     }
    //     else {
    //         header('Location:./index.php?action=buisness&successAdd=true');
    //     }
    //     break;
}
if (isset($error)) {
    echo($error);
}
?>