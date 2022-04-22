
<?php
// Formulaire modification infos client
use ABI\Controller\Buisness;

$result=Buisness::viewClient((int)($_GET['IDCLIENT']));

?>

<div class="row w-75 p-4 mx-auto formAdd">
    <div class="col">
        <h3 class="text-center">Fiche du Client  "<?php echo($result['RAISONSOCIALE'])?>" </h3>  
        <h5 class="text-center">Faites vos modifications si nécessaire</h5><br> 
        
        <form action="../index.php?action=buisness&action2=panelModifyClient" method="POST"> 
            <div class="form-group">
            
                <label for="first-name">Secteur d'activité</label>
                <input type="text" name="IDSECT" id='IDSECT' value="<?php echo($result['IDSECT'])?>" class="form-control" required>

                <label for="last_name">Raison Sociale</label>
                <input type="text" name="RAISONSOCIALE" id='RAISONSOCIALE' value="<?php echo($result['RAISONSOCIALE'])?>" class="form-control" required>

                <label for="email">Adresse</label>
                <input type="text" name="ADRESSECLIENT" id='ADRESSECLIENT' value="<?php echo($result['ADRESSECLIENT'])?>" class="form-control" required>

                <label for="email">Code Postal</label>
                <input type="text" name="CODEPOSTALCLIENT" id='CODEPOSTALCLIENT' value="<?php echo($result['CODEPOSTALCLIENT'])?>" class="form-control" required>

                <label for="email">Ville</label>
                <input type="text" name="VILLECLIENT" id='VILLECLIENT' value="<?php echo($result['VILLECLIENT'])?>" class="form-control" required>

                <label for="email">Effectif</label>
                <input type="text" name="EFFECTIF" id='EFFECTIF' value="<?php echo($result['EFFECTIF'])?>" class="form-control" required>

                <label for="email">Téléphone</label>
                <input type="text" name="TELEPHONECLIENT" id='TELEPHONECLIENT' value="<?php echo($result['TELEPHONECLIENT'])?>" class="form-control" required>

                <input type="hidden" name="IDCLIENT" id='IDCLIENT' value="<?php echo($result['IDCLIENT'])?>" class="form-control">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Valider</button>
            </div>
        </form>
    </div>