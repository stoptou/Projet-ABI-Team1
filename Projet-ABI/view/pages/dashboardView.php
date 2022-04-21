<?php


use ABI\controller\Controller;
use \ABI\controller\Auth;
use ABI\model\Database;



$title='Tableau de bord';


$role=Auth::checkRoleAdmin();
$first_name=$_SESSION['first_name'];
$last_name=$_SESSION['last_name'];


ob_start(); 
?>

<hr class="py-0 my-0">
<div class='row p-2 bonjour mx-0'>
        <div class='col'>
        <div class="p-3 alert alert-success">vous êtes connecté en tant que <?='<b>'.' '.strtoupper($first_name).' '.strtoupper($last_name).'('.$role.')'.'</b>'; ?></div>

        </div>
        <div class="col text-right">
        <a class="nav-link" href="./index.php?action=logOut" data-toggle="tooltip" title="Se déconnecter">Déconnexion<span class="p-3"><img class="logout"src="./public/IMG/svg/svg/door-open.svg" alt="Icone déconnexion à ajouter"></span></a>

        </div>

</div>

<hr class="py-0 my-0">
<?php
                    if(isset($_GET['successAdd']))
                    {
                ?>
                    <div class="alert alert-success">
                        Utilisateur ajouté avec succès!

                    </div>
                <?php
                    }
                
                    if(isset($_GET['successDel']))
                    {
                ?>
                        <div class="alert alert-success">
                        Utilisateur effacé avec succès!

                        </div>
                <?php
                    }
                    if(isset($_GET['successModify']))
                    {
                ?>
                    <div class="alert alert-success">
                        Utilisateur modifié avec succès!

                    </div>
                <?php
                    }
                    ?>

    <div class="row modif text-center mb-4">
        <div class="col">
            <ul class="nav nav flex-column">
              <li class="nav-item">
                  <a href="./index.php?action=dashboard&amp;action3=dashboardList" class="nav-link"><img src="./public/IMG/svg/svg/users-rectangle.svg" alt="Image utilisateurs à créer"></a>
                </li>
             <li class="nav-item">
                 <a class="nav-link" href="../index.php?action=dashboard&amp;action3=dashboardList">Afficher les utilisateurs</a>
                </li>   
            </ul>
               
        </div>
        <div class="col">
            <ul class="nav nav flex-column">
              <li class="nav-item">
                  <a href="../index.php?action=dashboard&amp;action3=modifyUser" class="nav-link"><img src="./public/IMG/svg/svg/user-pen.svg" alt="Image modifier utilisateurs à créer"></a>
                </li>
             <li class="nav-item">
                 <a class="nav-link" href="../index.php?action=dashboard&amp;action3=modifyUser">Modifier les utilisateurs</a>
                </li>   
            </ul>
        </div>

        <div class="col">
            <ul class="nav nav flex-column">
              <li class="nav-item">
                  <a href="../index.php?action=dashboard&amp;action3=addUser" class="nav-link"><img src="./public/IMG/svg/svg/user-plus.svg" alt="Image ajouter utilisateurs à créer"></a>
                </li>
             <li class="nav-item">
                 <a class="nav-link" href="../index.php?action=dashboard&amp;action3=addUser">Ajouter un utilisateur</a>
                </li>   
            </ul>
        </div>

        <div class="col">
            <ul class="nav nav flex-column">
              <li class="nav-item">
            <!-- <a href="../index.php?action=dashboardList" class="nav-link"><img src="./public/IMG/" alt="Image supprimer utilisateurs à créer"></a>
            //     </li>
            //  <li class="nav-item">
            //      <a class="nav-link" href="../index.php?action=dashboardList">Supprimer un utilisateur</a>
            // Lignes commentées 19/04/22 Mickaël -->
                  <a href="../index.php?action=dashboard&amp;action3=deleteUser" class="nav-link"><img src="./public/IMG/svg/svg/user-minus.svg" alt="Image supprimer utilisateurs à créer"></a>
                </li>
             <li class="nav-item">
                 <a class="nav-link" href="../index.php?action=dashboard&amp;action3=deleteUser">Supprimer un utilisateur</a>

                </li>   
            </ul>
               
        </div>
</div>


<?php 
    if(isset($_GET['action3']))
    {
        $root = realpath($_SERVER["DOCUMENT_ROOT"]);

                    if($_GET['action3']==='dashboardList')
                    {
                        
                        Controller::viewPage($root.'/view/pages/listView.php');
                    }
                            
                
                    elseif($_GET['action3']==='addUser')
                    {
                        Controller::viewPage($root.'/view/pages/addUserView.php');
                                
                    }
                    elseif($_GET['action3']==='modifyUser')
                    {
                        Controller::viewPage($root.'/view/pages/modifyUserView.php');
                                
                    }
                    elseif($_GET['action3']==='panelModifyUser')
                    {
                            Controller::viewPage($root.'/view/pages/panelModifyUser.php');
                                
                    }
                    elseif($_GET['action3']==='deleteUser')
                    {
                        if(isset($_GET['id_user'])){
                            $id = $_GET['id_user'];
                            $results= new Database('abi');
                            $results->deleteUserById($id);
                        }
                        Controller::viewpage('./view/pages/deleteUserView.php');
                                
                    }                                
    }
                                
?>
   </div>         

    <?php $content=ob_get_clean(); ?>

<?php require 'template_admin.php'; ?>
   

