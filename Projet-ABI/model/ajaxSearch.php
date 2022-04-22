<?php
// Traitement de l'interactivité avec Ajax (fichier app.js) pour la modification données utilisateur
use ABI\controller\Dashboard;

require '../controller/Controller.php';
require '../controller/Dashboard.php';
require './Database.php';


if(!empty($_GET['search'])){

  
    
    $results=Dashboard::modifyUserDashboard(htmlentities($_GET['search']));
    if(!empty($results))
    {
        
        ?>
            <div class='row'>

    <div class="col px-4">

        <table class="table table-hover">
        <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Rôle</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
            
                foreach($results as $result)
                {
        ?>
        <tr>
            <td><?= $result->first_name?></td>
            <td><?= $result->last_name?></td>
            <td><?= $result->email?></td>
            <td><?= $result->role?></td>
            <td><a href="../index.php?action=dashboard&action3=panelModifyUser&user_id=<?=$result->id_user?>">Modifier</a></td>
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
    else
    {
        
       
        ?>
        <div class="alert alert-danger mt-4 p-4">
        aucun resultat n'a été trouvé!
        </div>
        <?php
    
    }

}


?>