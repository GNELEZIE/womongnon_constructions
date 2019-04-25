<?php
 require 'database.php';
 $db = Database::connect();
$id='';

if(!empty($_POST)) 
    {
        $id = checkInput($_POST['id']);
        $db = Database::connect();
        $statement = $db->prepare("DELETE FROM terrain WHERE id = ?");
        $statement->execute(array($id));
        Database::disconnect();
        header("Location: index.php"); 
    }






 
//    if(!empty($_POST)) 
//    {
//        $id = checkInput($_POST['id']);
//        $statement = $db->prepare("DELETE * FROM terrain WHERE id = ?");
//        $statement->execute(array($id));
//        header("Location: index.php"); 
//    }

 function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Womongnon Admin</title>
        <meta charset="utf-8"/>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <body>
        <h1 class="text-logo"></span>Womongnon Admin</span></h1>
        <div class="container admin">
            <div class="row">
               <a href="liste.php" type="button" class="btn btn-success">LISTE DES COMMANDES</a>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Description</th>
                      <th>Prix</th>
                      <th>Reference</th>
                      <th>Actions</th>
                   
                      <th>Statut</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                       
                        $statement = $db->query('SELECT * FROM terrain');
                        $item = $statement->fetchAll();
                      
                      
                      
              
    
     
             
    if(!empty($_POST)) 
    {
        $id = checkInput($_POST['id']);
        $statement = $db->prepare("DELETE * FROM terrain WHERE id = ?");
        $statement->execute(array($id));
        header("Location: index.php"); 
    }
                      
                      
                      
                      
                      
                      
                        foreach($item as $item)
                       
                        {
                            echo '<tr>';
                            echo '<td>'. $item['nom'] . '</td>';
                            echo '<td>'. $item['description'] . '</td>';
                            echo '<td>'. number_format($item['prix'], 5, '.', '') . '</td>';
                            echo '<td>'. $item['reference'] . '</td>';
                            echo '<td width=300>';
                            echo '<a class="btn btn-primary" href="view.php?id='.$item['id'].'"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>';
                            echo ' 
                              
                   
                         
       

                    <button class="btn btn-danger" data-href="/index.php?id='.$item['id'].'" data-toggle="modal" data-target="#'.$item['id'].'">
                        Supprimer
                    </button>
                     <div class="modal fade" id="'.$item['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
            <div class="modal-header bg-primary">
               Suppression
            </div>
            <div class="modal-body">
               <form class="form" action="delete.php" role="form" method="post">
                    <input type="hidden" name="id" value="'.$item['id'].'"/>
                    <p class="alert alert-warning">Etes vous sur de vouloir supprimer ?</p>
                    <div class="form-actions">
                      <button type="submit" class="btn btn-danger">Oui</button>
                      <a class="btn btn-default" href="index.php">Non</a>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>
                        
                            
                       
                            </td>';
                            
                            
                            
                            echo '<td><a type="button" href="update2.php?id='.$item['id'].'">';
                             if($item['statut']=='en ligne'){
                                 echo '<div class="alert alert-success">En ligne</div>';
                             } else if($item['statut']=='en attente'){
                                  echo '<div class="alert alert-warning">En attente</div>';
                             }else{
                                 echo '<div class="alert alert-success">Acheter</div>'; 
                             }
                          
                                echo'</a>
                                </td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                      ?>
                  </tbody>
                </table>
            </div>
        </div>
        
        
      <script>
 $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
</script>
        
        
        
        
        
        
        
        
        
        
    </body>
</html>
