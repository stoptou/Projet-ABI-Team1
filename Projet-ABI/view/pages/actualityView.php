<?php
    // Lien et variables pour obtenir la météo de Paris
    
    $url = "https://api.openweathermap.org/data/2.5/weather?q=Paris&lang=fr&units=metric&appid=69aa0652946e6e5dccd1020284ae105d";

    $raw = file_get_contents($url);

    $json = json_decode($raw);

    $name = $json->name; // Nom de la ville

    $weather = $json->weather[0]->main; // Météo
    $desc = $json->weather[0]->description; // Description du ciel

    $temp = $json->main->temp; //Température
    $feel_like = $json->main->feels_like; // Ressenti

    $speed = $json->wind->speed; // Vitesse du vent
    $deg = $json->wind->deg;


?>




<?php ob_start() ?>

<div>
<?php $title='Actualité';  // Titre de l'onglet ?>
</div>

<?php 
      $hour = date('H:i'); // Création de variabe pour obtenir Heure : Minutes 
?>

<div class= "containeur text-center">
    <div class = "lead">
        <div class ="h1">
            <div class = "pt-3">
    <?php echo 'Actualité'; ?> <!-- Titre en haut de la page -->
            </div>
        </div>
    </div>
</div>


<div class = "containeur text-center py-5">
    <div class = " border mt-2 rounded-5 mb-3">
    <marquee direction="left" scrollamount="20">La Météo du jour à <?php echo "$name :";  // Insérer le nom de la ville de Paris ?></marquee>
</div>


<!-- Afficher la case qui affiche la météo de Paris -->

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-4 col-sm-12 col-xs-12">
            <div class="card p-4">
                <div class="d-flex">
                    <h6 class="flex-grow-1"> <?php echo $name; ?>
                    </h6>
                    <div class = "pl-2">
                    <?php echo $hour; ?>
                    </div>
                </div>
                <div class="d-flex flex-column temp mt-5 mb-3">
                    <h1 class="mb-0 font-weight-bold" id="heading"> <?php echo $temp;?>° C </h1> <span class="small grey"> <?php echo $desc ?></span>
                </div>
                <div class="d-flex">
                    <div class="temp-details flex-grow-1">
                        <p class="my-1"> <img src="https://i.imgur.com/B9kqOzp.png" height="17px"> <span> <?php echo $speed; ?> km/h </span> </p>
                    </div>
                    <div class = ""> 
                        <?php 

                        // Afficher des pictogramme selon la météo du jour (soleil, bruine, pluie, nuageuse, orage, neige)
                    switch($weather)
                    {
                        case "Clear" :
                            echo '<img src="https://static1.mclcm.net/lcm2018/int/picto/jour/c0000.png" alt="" style = "">';
                            break;
                        
                        case "Drizzle" :
                            echo '<img src="https://static1.mclcm.net/lcm2018/int/picto/jour/p0010.png" alt="">';
                            break;

                        case "Rain" :
                            echo '<img src="https://static3.mclcm.net/lcm2018/int/picto/jour/p0040.png" alt="">';
                            break;

                        case "Cloud" :
                            echo '<img src="https://static1.mclcm.net/lcm2018/int/picto/jour/c0030.png" alt="">';
                            break;

                        case "Thunderstorm" :
                            echo '<img src="https://static2.mclcm.net/lcm2018/int/picto/jour/c0090.png" alt="">';
                            break;

                        case "Snow" :
                            echo '<img src="https://static2.mclcm.net/lcm2018/int/picto/jour/p0085.png" alt="">';
                            break;

                    }
                        ?>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php  '<img src="https://thumbs.dreamstime.com/z/le-soleil-heureux-25897824.jpg" alt="">' ;?>




<!-- affichage date et heure -->
<div class = "text-left pl-4 pt-4">
    <?php 
        setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
        echo (strftime("%A %d %B"));
        echo '<br>';
        echo $hour 
    ?>
</div>




<!-- Début du premier article -->
<div class = 'height: 100px pt-4'>

    <h2>Quand les femmes s'engagent pour les femmes</h2>
    <figure>
        <img src="https://www.touteleurope.eu/wp-content/uploads/2021/03/journee_droits_des_femmes_2021.jpg" alt="Des femmes de tous horizons en dessin"
        class="col-6 pt-3">
    <div class="font-italic">
        <figcaption  class ="">Active Bretagne travaille avec de nombreux collectifs de femmes engagées</figcaption> 
        </div>
    </figure>
    <div class = "pt-3 px-4">
    <p>
    Chaque jour, les équipes de France Active accompagnent des femmes entrepreneures dans leur projet.
    La journée internationale des droits des femmes nous donne l’occasion de mettre en avant toutes celles
    qui se mobilisent pour leur territoire, pour créer du lien social, de l’emploi et qui incarnent notre volonté
    de construire une société plus inclusive et plus durable. <br> <br>

    Notre action en faveur des femmes les plus éloignées des financements bancaires se traduit sur la phase de création
    par une parité dans le nombre d’entrepreneurs financés au démarrage de leur projet. Depuis plus de dix ans, un entrepreneur
    sur deux financé par France Active au moment de la création de son projet est une femme. Cette action est rendue possible par
    le soutien constant du ministère délégué auprès du Premier ministre chargé de l’Égalité entre les femmes et les hommes, de la
    Diversité et de l’Égalité des chances. Cela se traduit par la Garantie ÉGALITÉ Femmes. <br> <br>

    France Active garantit le prêt accordé par la banque jusqu’à 80% pour des montants allant jusqu’à 50 000 €. Aucune caution personnelle
    n’est demandée à l’entrepreneure, ce qui lui permet de sécuriser sa situation personnelle. Cette garantie est dédiée aux femmes,
    créatrices ou repreneuses d’entreprises, demandeuses d’emploi ou en situation de précarité. <br> <br>

    Pour renforcer son action, France Active travaille avec de nombreux collectifs de femmes engagées dans le développement de l’accès à
    l’entrepreneuriat. Cette année, France Active et Femmes des Territoires renforcent leurs coopérations pour aider les femmes à accéder
    aux financements et notamment à la banque, grâce à la Garantie EGALITE Femme. Comme l’explique Marie ELOY, présidente de Femmes des Territoires,
    « nous associons France Active aux ateliers ‘s’entourer pour entreprendre’ pour faire découvrir aux créatrices d’entreprise, l’accompagnement de
    leurs conseillers ainsi que les financements dont elles peuvent bénéficier. France Active contribuera également au MOOC ‘Je finance mon projet’ 
    qui vise à lever les obstacles face aux questions financières pour les femmes entrepreneures ». <br> <br>

    Femmes des Territoires est un réseau social d’entraide pour toutes les femmes qui souhaitent entreprendre, partout en France, et pour
    toutes celles qui veulent les aider. Femmes des Territoires est convaincue qu’il est essentiel que les femmes qui entreprennent choisissent
    de ne pas rester isolées, s’entourent et fonctionnent davantage en réseau. La réussite individuelle passe par l’entraide collective.
    <br> <br>

    Pour cette journée du 8 mars, France Active a choisi de mettre en avant quatre femmes entrepreneures qui s’engagent pour la
    cause des femmes. A travers leur projet, elles ont choisi d’œuvrer à l’inclusion des femmes et à leur donner la capacité de
    prendre toute leur place dans la société. <br> <br>

    <strong> Le 15/04/2022 par K.M </strong>
    </p>
    </div>
</div>
<!-- Fin du premier article -->

<!-- Début du second article -->

<div class = "border-top">
    <h2 class = "pt-3">L'emploi au service du handicap en Bretagne</h2>
</div>

    <figure>
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrXiAwaKGsDZz-VFhr2nXbbtFDA5GCLBqNfQ&usqp=CAU" alt="Dessin de plusieurs personnes, dont un en chaise roulante, travaillants sur des ordinateurs"
        class="col-7 pt-3">
    
        <div class ="font-italic">
        <figcaption class ="">Active Bretagne s'engage à créer des postes pour les travailleurs handicapés</figcaption> 
        </div>
    </figure>

    <div class = "pt-3 px-4">
    <p>
    Les lignes bougent pour les entreprises adaptées. La loi appelée « Pour la liberté de choisir son avenir professionnel » ouvre en effet
    la voie à des expérimentations de travail temporaire pour les personnes en situation de handicap.
    Julia Barone et Erwan Pitois, deux dirigeants d’entreprises adaptées en Bretagne et membres de l’UNEA (Union nationale des entreprises adaptées),
    se saisissent du sujet à l’échelle de leur région. Rassemblant douze autres acteurs – qui représentent 50 % des entreprises adaptées de leur territoire –,
    ils créent début 2020 l’entreprise adaptée de travail temporaire Breizh EATT. Celle-ci comprend aujourd’hui quatre agences à Rennes, Saint-Brieuc, Lorient 
    et Quimper, baptisées « Up’Intérim ».
    Breizh EATT est une SCIC (Société coopérative d’intérêt collectif) et cela ne tient pas du hasard : « Ce statut marque cette volonté de coopération territoriale,
    explique Erwan Pitois. C’est toute la logique du projet : être plus forts ensemble que séparément ; être avec les autres, dans l’ouverture. »

    <h3>Ouvrir de nouvelles voies</h3>

    L’EATT a la même mission que toute entreprise adaptée : créer des postes et des parcours pour les personnes en situation de handicap. « Mais avec ce nouvel dispositif
    de travail temporaire, notre objectif est de toucher des profils différents : possiblement plus jeunes et davantage à potentiel de travail immédiat pour des missions.
     Nous proposons ici des parcours plus toniques et exigeants. Mais surtout, nous augmentons le panel de réponses possibles pour les publics en situation de handicap en 
    recherche d’emploi », complète Erwan Pitois.
    « Sans oublier que notre objectif reste avant tout des sorties en emploi durable, rebondit Julia Barone. Un vrai plus pour les intérimaires mais aussi pour les entreprises
    qui font appel à nous. Elles sont pour la plupart du milieu ordinaire et de tous les secteurs d’activité (automobile, nettoyage, câblage, entretien d’espaces verts…) et
    peuvent utiliser ces missions pour ensuite intégrer durablement les salariés dans leurs effectifs. » Ainsi, en un an, 800 personnes, qualifiées et prêtes à l’emploi, se
    sont inscrites, 120 ont été mises en poste et 20 ont connu une sortie en emploi durable.

    <h3>Prêts pour la reprise</h3>

    Ces résultats sont très encourageants au regard de la crise sanitaire qui a explosé le lendemain à peine de l’ouverture d’Up Intérim… Malgré une fermeture lors du premier
    confinement et une réouverture en plein été, période traditionnellement la moins dynamique pour l’intérim, il n’est pourtant pas à l’ordre du jour de réduire les ambitions
    de Breizh EATT.
    Ainsi, pour redimensionner le projet au regard de cette situation et continuer la belle aventure en cours, ils contractent, en plus d’un un prêt garanti par l’État, un Prêt
    de Relève Solidaire de 60 000 euros, via France Active qui les soutient depuis le début.
    France Active Bretagne les a en effet accompagnés en amont, en 2020, dans le cadre du programme Fonds de confiance : « Passer par ce comité nous a permis de bénéficier d’une
    expertise et de regards croisés validant notre projet et nous donnant la possibilité de passer à la vitesse supérieure. Cet accompagnement a été clé. D’autant que France Active
    est un acteur du territoire et a donc une connaissance très fine de nos réseaux locaux, c’est essentiel », précise Erwan Pitois.

    Aujourd’hui, le prochain défi de Breizh EATT est d’anticiper la reprise en constituant les ressources, en visant les écarts de formation et en préparant le redémarrage auprès
    des entreprises de la région. « Nous comptons sur un vivier de 800 personnes sur tous types de métiers et tous types de postes – même très qualifiés – c’est énorme ! 
    Nous sommes bien loin de l’image du salarié handicapé qui ne peut faire que quelques tâches. Nous serons donc là pour les entreprises qui rechercheront des compétences dès que
    ça repartira. Nous sommes prêts ! », conclut Julian Barone. <br><br>
    <strong> Le 15/04/2022 par K.M </strong>
    </p>
    </div>
<!-- Fin du second article -->

<div class = "pt-4">
<h2>Plus d'articles</h2>
</div>

<div class = "containeur pt-4">
    <div class = "row custom-line">
        <div class="col align-self-start">
            <div class= ".w-30">

<a  href="https://www.francetvinfo.fr/replay-radio/c-est-mon-boulot/la-france-manque-de-developpeurs-informatiques-les-idees-recues-sur-ces-metiers-qui-recrutent-restent-tenaces_5052565.html"
    title = 'France info'
    target = _blank
>

    <img src="https://www.francetvinfo.fr/pictures/M5ZECU8LPRF3661Xv5abqD3rbOQ/0x306:5955x3656/944x531/filters:format(webp)/2022/04/12/phprOCXGg.jpg" 
    alt=""
    class="col-10">
    <figcaption class = "col-11">La France manque de développeurs informatiques : les idées reçues sur ces métiers qui recrutent restent tenaces</figcaption>
</a>
</div>
        </div>

        <div class="col align-self-start">
            <div class= ".w-25">
<a  href="https://start.lesechos.fr/travailler-mieux/metiers-reconversion/ancien-chauffeur-de-taxi-au-soudan-je-suis-devenu-developpeur-web-en-france-1400926" 
    title = 'Les echos' 
    target = _blank
>
    
    <img src="https://media.lesechos.com/api/v1/images/view/6258fc1b4eed857e3a749406/1280x720-webp/0701359404589-web-tete.webp" 
    alt=""
    class="col-10">
    <figcaption class = "col-11">Témoignage : << Ancien chauffeur de taxi au Soudan, je suis devenu développeur web en France >></figcaption>
</a>

    </div>
        </div>

        <div class="col align-self-start">
            <div class= ".w-25">
<a  href="https://www.lemonde.fr/campus/article/2022/04/03/rock-stars-du-marche-de-l-emploi-les-developpeurs-web-craignent-de-devenir-les-ouvriers-d-hier_6120349_4401467.html"
    title = 'Le monde' 
    target = _blank

>

    <img src="https://img.lemde.fr/2022/03/28/0/0/1200/653/664/0/75/0/9d2b23b_1648468470787-eewegebxuaex4sg.jpeg" 
    alt=""
    class="col-10">
    <figcaption class = "col11">Les développeurs Web, << rock stars >> du marché de l'emploi, craignent de devenir les << ouvriers d'hier >></figcaption>
</a>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>