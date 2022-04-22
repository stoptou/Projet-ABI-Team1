<?php


namespace ABI\controller;
use ABI\model\Client;
use ABI\model\Secteur;
use ABI\model\Database;
use Exception;

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require ($root.'/model/Client.php');
require ($root.'/model/Secteur.php');

// Classe Buisness (Volet gestion commerciale)
class Buisness
{
    // Renvoie toutes les occurencesla table client
    public static function viewClients()
    {
        $results= new Client('abi');
        return $results->getClients();
    }
    // renvoie les données d'un client par son id
    public static function viewClient($id)
    {
        $results= new Client('abi');
        $result = $results->getClient($id);
        return $result;
              
    }
    // Affiche les 4 secteurs d'activité
    public static function viewSecteurs()
    {
        try{
            $results= new Secteur('abi');

            $secteurs=$results->getSecteurs();
            foreach($secteurs as $secteur)
            {
               echo '<option>'.$secteur->ACTIVITE.'</option>';

            }
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
        
    }
    // Renvoie Client (volet gestion commerciale)
    public static function showClientBuisness($value)
    {
        try
        {
            $results= new Database('abi');
        $result=$results->showClients($value);
       
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
        return $result;
    }
    
}

?>