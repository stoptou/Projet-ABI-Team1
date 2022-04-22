<?php $title='mentionsLegales'; ?>
<?php ob_start(); ?>

<div class= "containeur text-center mt-2 py-3">
    <div class = "lead">
        <div class ="h1">
    <?php echo 'Mentions légales'; ?>
        </div>
    </div>
</div>

<div class= "container text-justify p-5 py-5 mb-5">
    <p>
        Editeur
        Active Bretagne informatique est l'éditeur de l'ensemble des sites, portails, pages du domaine.</br>
        <h4><u>Le groupe ABI comprend :</u></h4></br>
    </p>
    <p>
        L'Epic
        Établissement public à caractère industriel et commercial</br>
        Tour Cityscope, 3 rue Franklin, 93100  Montreuil</br>
        824 228 142 RCS BOBIGNY</br>
        NDA * : 11930743393</br>
        Numéro TVA intracommunautaire : FR 14824228142</br>
    </p>
    <p>
        La SAS ABI Entreprises</br>
        SAS au capital de 41.100.000 €</br>
        Tour Cityscope, 21 rue Franklin, 93250  Montreuil</br>
        824 092 688 RCS BALBIGNY</br>
        NDA * : 45123659875</br>
        Numéro TVA intracommunautaire : FR 82485796854</br>
    </p>
    <p>
        <h4><u>Hébergement:</u></h4></br>
        Sopra Steria Group</br>
        6 Rue du Pro Faucon 74940 Annecy le Vieux.</br>
        Tel : 02 47 47 47 47</br>
    </p>
</div>

<?php $content=ob_get_clean(); ?>
<?php require 'template.php' ?>



