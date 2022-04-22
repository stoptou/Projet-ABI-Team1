<?php use ABI\model\Database; ?>
<!-- Header principal -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/gif" href="../public/IMG/abi_logo.png" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/styles/style.css">
 
    <title><?=$title; ?></title>
</head>
<body>
    <div class="container-fluid px-0">
        <header class="container px-0 mt-3">
            <div class="row logo mx-0 d-flex align-items-center justify-content-center">
                <div class="col-2 p-2">
                    <a href="/index.php"><img class="img-fluid" alt="logo" src="./public/IMG/Logo_Transparent.png" style=width:100% ></a>                   
                </div>

                <div class="col-6 mt-2 pt-2 text-center">
                    <h4 class="slogan">ACTIVE BRETAGNE INFORMATIQUE</h4>
                    <h5 class="sloganB">Un nouveau monde en "Tique"</h5>

                </div>
                <!-- menu burger-->
                <div class="col-2 d-md-none d-block">
                    <img alt='menu-burger' src="./public/IMG/menu-burger.png" class="img-fluid icone" width="100%" data-toggle="dropdown">
                        <div class="dropdown-menu">
                            <!--liens a ajouter -->
                            <a class="dropdown-item" href="/index.php?action=home">Accueil</a>

                            <a class="dropdown-item" href="../index.php?action=ABIgroup">Groupe ABI</a>
                            <a class="dropdown-item" href="./index.php?action=actuality">Actualité</a>
                            <a class="dropdown-item" href="./index.php?action=offer">Nos offres</a>
                            <a class="dropdown-item" href="./index.php?action=contact">Contact</a>

                        </div> 
                </div>
                <div class="col d-md-none d-block text-center">

                <div class="row align-items-center">
                    <div class="col">
                        <?php 
                        
                        if (!empty($_SESSION)) {
                            $data = new Database('abi');
                            $userRole = $data->getUser((int) $_SESSION['id']);

                            if($userRole[0]['role'] == "Administrateur") {?>
                                <li class="nav-item">
                                    <a class="nav-link" href="../index.php?action=dashboard">Tableau de Bord</a>
                                </li>
                            <?php } ?>

                            <?php if($userRole[0]['role'] == "Commercial") {?>
                                <li class="nav-item">
                                    <a class="nav-link" href="../index.php?action=buisness">Tableau de Bord</a>
                                </li>
                            <?php } ?>
                        </div>

                        <div class="col">
                            <li class="nav-item espace-membre d-flex<?php if ($_SERVER['SCRIPT_NAME']==='./index.php?action=logOut'):?> active <?php endif?>">
                                <i class="fas fa-user-alt p-2 mt-1 connexion"></i><a class="nav-link" href="./index.php?action=logOut">Déconnexion</a>
                            </li>
                        <?php }

                        else { ?>
                            <li class="nav-item espace-membre d-flex<?php if ($_SERVER['SCRIPT_NAME']==='./index.php?action=connexion'):?> active <?php endif?>">
                                <i class="fas fa-user-alt p-2 mt-1 connexion"></i><a class="nav-link" href="./index.php?action=connexion">Connexion</a>
                            </li>
                        <?php 
                        } ?>

                        </div>
                    </div>     
                </div>       
                
            </div>
            <hr class="my-0 py-0">
            <nav class="menu navbar navbar-expand d-none d-md-block">
                <ul class="navbar-nav d-flex justify-content-around">
                    <!--Mettre la classe Active en place sur le Menu-->
                <li class="nav-item <?php

                    if ($_SERVER['SCRIPT_NAME']==='./index.php?action=home'):?> active <?php endif?>">
                        <a class="nav-link" href="../index.php?action=home">Accueil</a>
                    </li>
                    <li class="nav-item <?php if ($_SERVER['SCRIPT_NAME']==='./index.php?action=ABIgroup'):?> active <?php endif?>">
                        <a class="nav-link" href="../index.php?action=ABIgroup">Groupe ABI</a>
                    </li>
                    <li class="nav-item <?php if ($_SERVER['SCRIPT_NAME']==='./index.php?action=actuality'):?> active <?php endif?>">
                        <a class="nav-link" href="../index.php?action=actuality">Actualité</a>
                    </li>
                    <li class="nav-item <?php if ($_SERVER['SCRIPT_NAME']==='./index.php?action=offer'):?> active <?php endif?>">
                        <a class="nav-link" href="../index.php?action=offer">Nos offres</a>
                    </li>
                    <li class="nav-item <?php if ($_SERVER['SCRIPT_NAME']==='./index.php?action=contact'):?> active <?php endif?>">
                        <a class="nav-link" href="../index.php?action=contact">Contact</a>
                    </li>
                    
                    <?php 
                    
                    if (!empty($_SESSION)) {
                        $data = new Database('abi');
                        $userRole = $data->getUser((int) $_SESSION['id']);

                        if($userRole[0]['role'] == "Administrateur") {?>
                            <li class="nav-item">
                                <a class="nav-link" href="../index.php?action=dashboard">Tableau de Bord</a>
                            </li> 
                        <?php } ?>

                        <?php if($userRole[0]['role'] == "Commercial") {?>
                            <li class="nav-item">
                                <a class="nav-link" href="../index.php?action=buisness">Tableau de Bord</a>
                            </li> 
                        <?php } ?>

                        <li class="nav-item espace-membre d-flex<?php if ($_SERVER['SCRIPT_NAME']==='./index.php?action=logOut'):?> active <?php endif?>">
                            <i class="fas fa-user-alt p-2 mt-1 connexion"></i><a class="nav-link" href="./index.php?action=logOut">Déconnexion</a>
                        </li>
                    <?php }

                    else { ?>
                        <li class="nav-item espace-membre d-flex<?php if ($_SERVER['SCRIPT_NAME']==='./index.php?action=connexion'):?> active <?php endif?>">
                            <i class="fas fa-user-alt p-2 mt-1 connexion"></i><a class="nav-link" href="./index.php?action=connexion">Connexion</a>
                        </li>
                    <?php 
                    } ?>

                </ul>
               
                 
            </nav>
           
            
        </header>