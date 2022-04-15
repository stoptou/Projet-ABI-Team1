<?php
namespace ABI\controller;
use \ABI\model\Database;

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require($root.'/controller/Auth.php');


class Dashboard
{
    public static function viewUsers()
    {
        $results= new Database('abi');
        return $results->getUsers();
    
       
    }
    
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
        }
        else
        {
            header('Location:./index.php?action=connexion&error=true');
        }
    }
    public static function addUserDashboard($first_name, $last_name, $email, $password, $role)
    {
        $results= new Database('abi');
        $result=$results->addUser($first_name,$last_name,$email,$password,$role);
        header('Location:./index.php?action=dashboard&successAdd=true');
       
        return $result;
    }


    
    public static function modifyUserDashboard($value)
    {
        $results= new Database('abi');
        return $results->showUser($value);
    }

    // Création de la requête suppression d'un utilisateur 15/04 Marine Mickael
    public static function deleteUserDashboardById($id)
    {
        $results= new Database('abi');
        $results->deleteUserById((int)$id);
        header('Location:./index.php?action=dashboard&successDel=true');
        return $results;
    }
    
   
}
?>