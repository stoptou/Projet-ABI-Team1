<?php
// Formulaire modification infos utilisateur
use ABI\model\Database;

$data= new Database('abi');
$result = $data->getUser($_GET['user_id'])[0];

?>

<div class="row w-75 p-4 mx-auto formAdd">
    <div class="col">
        <h4 class="text-center">Veuillez modifier les champs que vous voulez changer ci-dessous:</h4>  
        <form action="../index.php?action=formControl" method="POST">
            <div class="form-group">
                <label for="first-name">Prénom</label>
                <input type="text" name="first_name" id='first_name' value="<?php echo($result['first_name'])?>" class="form-control" required>

                <label for="last_name">Nom</label>
                <input type="text" name="last_name" id='last_name' value="<?php echo($result['last_name'])?>" class="form-control" required>

                <label for="email">Email</label>
                <input type="text" name="email" id='email' value="<?php echo($result['email'])?>" class="form-control" required>

                <input type="hidden" name="id_user" id='id_user' value="<?php echo($result['id_user'])?>" class="form-control">

                <input type="hidden" name="form" id='form' value='modifyUser' class="form-control">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Valider</button>
            </div>
        </form>
    </div>