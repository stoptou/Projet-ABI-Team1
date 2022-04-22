<?php
namespace ABI\controller;
use \ABI\model\Database;

//Tableau de bord (Gestion utilisateurs)

// Récupération du chemein du projet par variable superglobale
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require($root.'/controller/Auth.php');

// Class Dashboard (tableau de bord) pour la gestion utilisateurs
class Dashboard
{
    // Renvoie la table utilisateurs
    public static function viewUsers()
    {
        $results= new Database('abi');
        return $results->getUsers();
    
       
    }
    // Vérification données utilisateur et redirection selon son role
    public static function checkUser($email, $password)
    {
        $data= new Database('abi');
        $auth= new Auth($data->getPDO());

        $result=$auth->login($email,$password);
        
        if(!empty($result))
        {
        
            if($result[5]==='Administrateur')
            {
                header('Location:./index.php?action=dashboard');
            }
            elseif($result[5]==='Commercial')
            {
                header('Location:./index.php?action=buisness');
            }
            else
            {
                header('Location:./index.php');
            }
        }
        else
        {
            header('Location:./index.php?action=connexion&error=true');
        }
    }

    public function degage_de_la()
    {
        $results= new Database('abi');
    }


    // Modification données d'un utilisateur
    public static function modifyUserDashboard($value)
    {
        $results= new Database('abi');
        return $results->showUser($value);
    }

    // Suppression d'un utilisateur
    public static function deleteUserDashboardById($id)
    {
        $results= new Database('abi');
        $results->deleteUserById($id);
        header('Location:./index.php?action=dashboard&successDel=true');
        return $results;
    }
     
}
?>