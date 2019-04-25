<?php
 require 'database.php';
 $db = Database::connect();

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
        <h1 class="text-logo"></span>LISTE DES COMMANDES</span></h1>
        <div class="container admin">
            <div class="row">
               
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>prenom</th>
                      <th>Email</th>
                      <th>Telephone</th>
                      <th>Date de rendez-vous</th>
                      <th>Date de commande</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                       
                        $statement = $db->query('SELECT * FROM reservation');
                     foreach($statement as $item)
                       
                        {
                            echo '<tr>';
                            echo '<td>'. $item['nom'] . '</td>';
                            echo '<td>'. $item['prenom'] . '</td>';
                            echo '<td>'. $item['email'] . '</td>';
                           
                            echo '<td>'. $item['phone'] . '</td>';
                          
                          echo '<td>'. $item['dateR'] . '</td>';
                          
                          echo '<td>'. $item['dateD'] . '</td>';
                           
                          
                            
                            
                           
                        }
                        Database::disconnect();
                      ?>
                       <a href="index.php" type="button" class="btn btn-success">RETOUR</a>
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
