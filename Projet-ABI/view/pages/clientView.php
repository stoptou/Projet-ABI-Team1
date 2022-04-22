<?php
// Routeur secondaire - volet gestion commerciale
use \ABI\controller\Controller;
use ABI\model\Client;

$root = realpath($_SERVER["DOCUMENT_ROOT"]);

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
                    else if(isset($_GET['successDel']))
                    {
                ?>
                        <div class="alert alert-success">
                           Client effacé avec succés!

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
                        Controller::viewPage('./view/pages/panelModifyClient.php');             
                    }
                    elseif($_GET['action2']==='delClient')
                    {
                        if(isset($_GET['IDCLIENT'])){
                            $id = $_GET['IDCLIENT'];
                            $results=new Client('abi');
                            $results->delClient($id);
                            header('Location:./index.php?action=buisness&successDel=true');                           
                        }
                        Controller::viewPage('./view/pages/delClientView.php');
                                
                    } 
                    elseif($_GET['action2']==='modifyClient')
                    {
                        Controller::viewPage('./view/pages/modifyClientView.php');
                                
                    }
                    elseif($_GET['action2']==='panelModifyClient')
                    {
                        if(isset($_POST["IDCLIENT"]))
                        {
                            // test vérification existence id client dans le post -> Update données client
                            $data = new Client('abi');
                            $result = $data->updateClient($_POST["IDCLIENT"], $_POST["IDSECT"], $_POST["RAISONSOCIALE"], $_POST["ADRESSECLIENT"], $_POST["CODEPOSTALCLIENT"], $_POST["VILLECLIENT"], $_POST["EFFECTIF"], $_POST["TELEPHONECLIENT"]);

                            Controller::viewPage($root.'/view/pages/clientList.php');
                            
                        }
                        else
                        {
                            Controller::viewPage($root.'/view/pages/panelModifyClient.php');
                        }
                                
                    }                      
                                            
    }
    ?>

</div>