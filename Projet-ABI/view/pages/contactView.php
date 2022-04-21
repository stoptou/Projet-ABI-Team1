<?php $title='Nous contacter'; ?>

<?php ob_start() ?>

<hr class="py-0 my-0">
<?php
                    if(isset($_GET['send=yes']))
                    {
                ?>
                    <div class="alert alert-success">
                        Email envoyé avec succès

                    </div>
                <?php
                    }
                
                    else if(isset($_GET['send=no']))
                    {
                ?>
                        <div class="alert alert-success">
                        Email non envoyé

                        </div>
                <?php
                    }
                    ?>
    
        <center>
        <h4 class="sent-notification"></h4>
        <form id="myForm" class="myForm"action="index.php?action=contactEnvoyer" method="POST">
</br>
        <h2>Contactez nous :</h2> <br><br>
        <label class="label-form">Nom : </label> 
        <input name="name" type="text" placeholder="Entrez votre nom"> <br>
        <label class="label-form">Email : </label>
        <input name="email" type="text" placeholder="Entrez votre email">
        <br>
        <label class="label-form">Sujet : </label>
        <input name="subject" type="text" placeholder="Entrez le sujet">
        <br> <br>

        <label class="label-form">Message : </label> <br>
        <textarea name="body" rows="5" placeholder="Entrez votre message"></textarea> </br>
        <button type="submit" value="Send An Email" class="btn btn-secondary">Envoyer</button>
    </form>
    </center>



    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">

    function isNotEmpty(caller) {
        if (caller.val() == "") {
            caller.css('border', '1px solid red');
            return false;
        } else 
            caller.css('border', '');
            return true;
        }
    </script>

<?php $content=ob_get_clean(); ?>

<?php require 'template.php'; ?>