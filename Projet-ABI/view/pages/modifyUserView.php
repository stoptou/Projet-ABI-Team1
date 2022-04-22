<?php
// formulaire recherche utilisateur (Interactivité Ajax)
if (isset($_GET['errorForm'])) {
    echo($_GET['errorForm']);
}
?>

<hr class="p-0 m-0">
<div class="row w-75 mx-auto">
    <div class="col">
        <h4 class="text-center mt-4 p-4">Veuillez taper un nom ou un prénom pour chercher un utilisateur:</h4>
        
            <div class="form-group">
                <input type="text" placeholder="Tapez votre recherche ici" name="search" id="search" 
                        class="form-control p-4" onkeyup="showUser(this.value)" onsubmit="showUser(this.value)">
                        <!-- Interactivité Ajax -->
            </div>
        <div id='result'>

        </div>

    </div>
</div>


