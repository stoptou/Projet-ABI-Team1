<?php
// Routeur principal
session_start();

use ABI\controller\Controller;
use ABI\controller\Dashboard;
require ('./controller/Controller.php');
require ('./controller/Buisness.php');
require ('./controller/Dashboard.php');

if (isset($_GET['action'])) {

        if ($_GET['action']=='home')
        {
            Controller::viewPage('./view/pages/indexView.php');
        }
        elseif($_GET['action']=='formControl')
        {
            Controller::viewPage('./view/pages/formControl.php');
        }
        elseif($_GET['action']=='ABIgroup')
        {
            Controller::viewPage('./view/pages/groupView.php');
        }
        elseif($_GET['action']=='actuality')
        {
            Controller::viewPage('./view/pages/actualityView.php');
        }
        elseif($_GET['action']=='offer')
        {
            Controller::viewPage('./view/pages/offerView.php');
        }
        elseif($_GET['action']=='contact')
        {   
            if (isset($_GET['send'])){
                if ($_GET['send']=='yes') {
                Controller::viewPage('./view/pages/contactView.php');
                } elseif ($_GET['send']=='no'){
                Controller::viewPage('./view/pages/contactView.php');
                } 
        } else {
            Controller::viewPage('./view/pages/contactView.php');
        }
        }
        elseif($_GET['action']=='connexion')
        { 
            Controller::viewPage('./view/pages/connexionView.php');
        }
        elseif($_GET['action'] == 'mentionsLegales') 
        {
            Controller::viewPage('./view/pages/mentionsLegales.php');
        }
        elseif($_GET['action'] == 'charte') 
        {
            Controller::viewPage('./view/pages/charte.php');
        }
        elseif($_GET['action'] == 'contactEnvoyer') 
        {
            Controller::viewPage('./view/pages/contactEnvoyer.php');
        }
           
        elseif($_GET['action']=='dashboard')
        {
                                                      
               if(isset($_POST['emailLog'])&& isset($_POST['passwordLog']))
               {
                     Dashboard::checkUser(htmlentities($_POST['emailLog']),htmlentities($_POST['passwordLog']));
               }
              
               else
               {
                Controller::viewPage('./view/pages/dashboardView.php');
               }
        }
        elseif ($_GET['action']=='logOut')
        {
            Controller::logOut();
        }
        elseif($_GET['action']=='buisness')
        {
            Controller::viewPage('./view/pages/buisnessView.php');
        }
          
        else
        {
           Controller::viewPage('./view/pages/indexView.php');
        }

    } else {
        Controller::viewPage('./view/pages/indexView.php');
    }
