<?php $title='Accueil'; ?>
<?php ob_start(); ?>


<div class="px-0 mx-0 d-block banniere">

<!-- Banniere -  caroussel page d'acccueil -->

    <div class="container container-fluid my-2" >
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            </ol>
        <div class="carousel-inner">
            <div class="carousel-item active" >
                <img class="img-responsive d-block w-100" src="./public/IMG/carousel/Banniere.png" height="450px">
           
        </div>
        <div class="carousel-item" >
            <img class="d-block w-100" src="./public/IMG/carousel/performance.png" height="450px">
            
        </div>
        <div class="carousel-item" >
            <img class="d-block w-100" src="./public/IMG/carousel/ai.jpg" height="450px">
           
        </div>
        <div class="carousel-item" >
            <img class="d-block w-100" src="./public/IMG/carousel/cSécurité.png" height="450px">
           
        </div>
        <div class="carousel-item" >
            <img class="d-block w-100" src="./public/IMG/carousel/bigData.png" height="450px">
           
        </div>
        <div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
    </div>            
</div>

                <div class="row mx-0">

               
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-8 col-12 text-center py-4 px-4">
                        <h2 class="titre-section text-center">Nous découvrir</h2>

                        <!--Faire le liens du bouton avec GROUP ABI-->
                        <a href="index.php?action=ABIgroup"><button class="btn btn-primary">Notre groupe</button></a>

                    </div>
                    <div class="col-md-2">

                    </div>  

                </div>
                
                <div class="row rejoindre px-0 mx-0">
                    <div class="col-12 col-md-6 mx-0 px-0">
                        <img class="" alt="Image à trouver" src="./public/IMG/accueil1.jpeg" width="100%">
                    </div>
                    <div class="col-12 col-md-6 text-center p-4">
                        <h3 class="titre-rejoindre">La société</h3>
                        <p class="paragraphe-rejoindre">
                        La Société de Services et d'Ingénierie Informatique (SSII, encore appelée Entreprise de Services
Numérique ou ESN) ACTIVE BRETAGNE INFORMATIQUE est spécialisée dans les projets « au
forfait » mais effectue aussi de la prestation « en régie ». Elle intervient essentiellement en région
Bretagne, sa clientèle principale est la PME/PMI spécialisée en Agro-alimentaire. Elle adopte en
général une démarche Scrum pour réaliser ses développements.
                        </p>
                    </div>

                </div>
                <div class="row rejoindre px-0 mx-0">
                    <div class="col-12 col-md-6 text-center p-4">
                        <h3 class="titre-rejoindre">Où nous trouver</h3>
                        <p class="paragraphe-rejoindre">
                        Vous pouvez retrouver nos bureaux au 25 rue de la cité à Saint-Malo (35400).
                        </p>
                    </div>
                    <div class="embed-responsive embed-responsive-4by3 col-12 col-md-6 mx-0 px-0">
                        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3055.4670992612046!2d-2.0269623840783435!3d48.6361042792663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480e813b600b3917%3A0x99fa5dd2eefeb81!2s25%20Rue%20de%20la%20Cit%C3%A9%2C%2035400%20Saint-Malo!5e1!3m2!1sfr!2sfr!4v1649968469437!5m2!1sfr!2sfr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <!-- <img class="" alt="Image à trouver" src="./public/IMG/" width="100%"> -->
                    </div>
                    

                </div>
<?php $content=ob_get_clean(); ?>

<?php require 'template.php'; ?>
