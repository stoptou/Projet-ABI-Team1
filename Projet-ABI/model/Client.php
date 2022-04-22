<?php

namespace ABI\model;
use \PDO;
use \Exception;
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require ($root.'/model/Database.php');

// Classe pour la gestion client (volet gestion commerciale)
class Client extends Database
{

    // récupération de la table clients
    public function getClients()
    {
        try
        {
            $req=parent::getPDO()->query('SELECT * FROM clients');
            $clients=$req->fetchAll();
            return $clients;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }

    }
    // Récupération des données d'un client grace à son id
    public static function getClient($id_client)
    {
        try
        {
            $req=parent::getPDO();
            $result=$req->prepare('SELECT * FROM clients WHERE IDCLIENT=:id_client');
            $result->bindValue(':id_client', $id_client, PDO::PARAM_INT);
            $result->execute();
            
            return $result->fetch();
            

        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
    // Ajout d'un client dans la base de données
    public function addClient($id_secteur,$raison_sociale,$adresse,$code_postale,$ville,$effectif,$telephone)
    {
        try
        {
            $req= parent::getPDO()->prepare("INSERT INTO clients (IDSECT, RAISONSOCIALE, ADRESSECLIENT, CODEPOSTALCLIENT, VILLECLIENT, EFFECTIF, TELEPHONECLIENT) VALUES (:id_sect,:raison_sociale,:adresse,:code_postale,:ville, :effectif, :telephone)");
                    $req->bindValue(':id_sect',$id_secteur, PDO::PARAM_INT );
                    $req->bindValue(':raison_sociale',$raison_sociale, PDO::PARAM_STR);
                    $req->bindValue(':adresse',$adresse, PDO::PARAM_STR );
                    $req->bindValue(':code_postale',$code_postale, PDO::PARAM_INT );
                    $req->bindValue(':ville',$ville, PDO::PARAM_STR );
                    $req->bindValue(':effectif',$effectif, PDO::PARAM_INT );
                    $req->bindValue(':telephone',$telephone, PDO::PARAM_INT );
            $req->execute();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
 // Mise à jour des données d'un client
 public function updateClient($id_client,$id_secteur,$raison_sociale,$adresse,$code_postal,$ville,$effectif,$telephone)
 {
     try
     {
        $req= $this->getPDO()->prepare('UPDATE clients SET IDCLIENT=:id_client, IDSECT=:id_secteur, RAISONSOCIALE=:raison_sociale, ADRESSECLIENT=:adresse, CODEPOSTALCLIENT=:code_postal, VILLECLIENT=:ville,  EFFECTIF=:effectif, TELEPHONECLIENT=:telephone WHERE IDCLIENT=:id_client');
       
        $req->bindValue(':id_client', $id_client, PDO::PARAM_INT);
        $req->bindValue(':id_secteur', $id_secteur, PDO::PARAM_INT);
        $req->bindValue(':raison_sociale', $raison_sociale, PDO::PARAM_STR);
        $req->bindValue(':adresse', $adresse, PDO::PARAM_STR);
        $req->bindValue(':code_postal', $code_postal, PDO::PARAM_STR);
        $req->bindValue(':ville', $ville, PDO::PARAM_STR);
        $req->bindValue(':effectif', $effectif, PDO::PARAM_INT);
        $req->bindValue(':telephone', $telephone, PDO::PARAM_INT);
        $req->execute();
 }
     catch(Exception $e)
     {
         die($e->getMessage());
     }
 }
 
 // Suppression d'un client 
 public function delClient($IDCLIENT)
 {
     try
     {
         $req=parent::getPDO();
         $result=$req->prepare('DELETE FROM clients WHERE IDCLIENT=:IDCLIENT');
         $result->bindValue(':IDCLIENT', $IDCLIENT, PDO::PARAM_INT);
         $result->execute();            
         return $result->fetch();        
     }
     catch(Exception $e)
     {
         die($e->getMessage());
     }        
 }
    // Ajoute de la requête pour supprimer un utilisateur 15/04 Marine Mickael
    public function deleteUserById($id_user)
    {
        try
        {
            $req=parent::getPDO();
            $result=$req->prepare('DELETE FROM utilisateur WHERE id_user=:id_user');
            $result->bindValue(':id_user', $id_user, PDO::PARAM_INT);
            $result->execute();
            
            return $result->fetch();
            

        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

 
}

?>