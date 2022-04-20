<?php $title='Nous contacter'; ?>

<?php ob_start() ?>
    
        <center>
        <h4 class="sent-notification"></h4>
        <form id="myForm" action="index.php?action=contactEnvoyer" method="POST">
</br>
        <h2>Contactez nous :</h2>
        <label>Nom</label>
        <input name="name" type="text" placeholder="Entrez votre nom">
        <br><br>
        <label>Email</label>
        <input name="email" type="text" placeholder="Entrez votre email">
        <br><br>
        <label>Sujet</label>
        <input name="subject" type="text" placeholder="Entrez le sujet">

        <p>Message</p>
        <textarea name="body" rows="5" placeholder="Entrez votre message"></textarea> </br>
        <button type="submit" value="Send An Email">Envoyer</button>
    </form>
    </center>



    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        /* function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                    url: './view/page/contactEnvoyer.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        name: name.val(),
                        email: email.val(),
                        subject: subject.val(),
                        body: body.val()
                    }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message envoyé.");
                    }
                });
            }
        } */

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