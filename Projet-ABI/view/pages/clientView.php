<?php
use \ABI\controller\Controller;

?>
<div class="col client-view my-4 ml-2 mr-4">
<?php
                    if(isset($_GET['successAdd']))
                    {
                ?>
                    <div class="alert alert-success mt-4">
                           Client ajouté avec succés!

                    </div>
                <?php
                    }
                ?>
    <?php
if(isset($_GET['action2']))
    {

                    if($_GET['action2']==='clientList')
                    {
                        Controller::viewPage('./view/pages/clientList.php');
                    }
                            
                    elseif($_GET['action2']==='searchClient')
                    {
                        Controller::viewPage('./view/pages/searchClientView.php');
                                
                    }
                    elseif($_GET['action2']==='addClient')
                    {
                        Controller::viewPage('./view/pages/addClientView.php');
                                
                    }
                    elseif($_GET['action2']==='detailClient')
                    {
                        Controller::viewPage('./view/pages/detailClientView.php');
                                
                    }
                   
                                            
    }
    ?>

</div>