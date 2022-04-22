<?php
// Page suppression d'un client
use ABI\controller\Buisness;

$results=Buisness::viewClients();
    if(!empty($results))
                {             
?>

<div class='row'>

    <div class="col px-4">
    
            <table class="table table-hover">
            <thead>
            <tr>
                <th>Raison sociale</th>
                <th>Adresse</th>
                <th>Code postal</th>
                <th>Ville</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
                
                    foreach($results as $result)
                    {                      
            ?>
            <tr>
                
                <td><?= $result['RAISONSOCIALE']?></td>
                <td><?= $result['ADRESSECLIENT']?></td>
                <td><?= $result['CODEPOSTALCLIENT']?></td>
                <td><?= $result['VILLECLIENT']?></td>
                <!-- Suppression client - envoie son id -->
                <td> <a href="../index.php?action=buisness&action2=delClient&IDCLIENT=<?= $result['IDCLIENT']?>">Supprimer</a></td>              
            </tr>
            <?php
                    }               
            ?>
            </tbody>
        </table>
    </div>
</div>
<?php
    }