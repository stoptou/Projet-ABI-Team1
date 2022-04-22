<?php $title='Nous contacter'; ?>

<?php ob_start() ?>
<!-- Formulaire de contact -->
<hr class="py-0 my-0">
<?php
        if(isset($_GET['send']))
        {
            if ($_GET['send'] == "yes")
            { ?>
                <div class="alert alert-success">
                    Email envoyé avec succès
                </div>
            <?php
            }
    
            elseif($_GET['send'] == "no")
            { ?>
                <div class="alert alert-success">
                    Email non envoyé
                </div>
            <?php
            }
        }

        if (isset($_GET['errorForm'])) {
            echo($_GET['errorForm']);
        }
        ?>
    
    <center>
        <h4 class="sent-notification"></h4>
        <form id="myForm" class="myForm" style="width: 300px;" action="index.php?action=formControl" method="POST">
            </br>
            <h2>Contactez nous :</h2> <br><br>

            <label class="label-form">Nom : </label> 
            <input class="form-control" name="name" type="text" placeholder="Entrez votre nom"> <br>

            <label class="label-form">Email : </label>
            <input class="form-control" name="email" type="text" placeholder="Entrez votre email">

            <br>
            <label class="label-form">Sujet : </label>
            <input class="form-control" name="subject" type="text" placeholder="Entrez le sujet">

            <br> <br>
            <label class="label-form">Message : </label> <br>
            <textarea class="form-control" name="body" rows="5" placeholder="Entrez votre message"></textarea> </br>
            
            <input type="hidden" name="form" id='form' value='contactForm' class="form-control">

            <button type="submit" value="Send An Email" class="btn btn-secondary mb-4">Envoyer</button>
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