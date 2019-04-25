<?php

    require 'database.php';
  $db=Database::connect();

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }

   $statut = "";

    if(!empty($_POST)) 
    {
        $statut= checkInput($_POST['statut']);
        
       
                $statement = $db->prepare("UPDATE terrain  set statut = ? WHERE id = ?");
                $statement->execute(array($statut,$id));
                header("Location: index.php");
            }
          
      
       
    
   
   
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
        <link rel="stylesheet" href="../vendor/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Statut des éléments envoyés<span class="glyphicon glyphicon-cutlery"></span></h1>
         <div class="container admin">
            <div class="row">
                <div class="col-sm-6">
                    <br>
                   	<div class="container h-100">
	<div class="d-flex justify-content-center">
		<div class="card mt-5 col-md-12 animated rotateIn myForm">
			<div class="card-header">
				<h4><strong>Modifier le statut</strong></h4>
			</div>
			<div class="card-body">
				<form method="POST" enctype="multipart/form-data">
                 
       
<div id="dynamic_container">
				         
                        
                        
 <div class="input-group mt-3">

En ligne<input type="radio" name="statut" id="statut" value="en ligne"  class="form-control"/>
Acheter<input type="radio" name="statut" id="statut" value="acheter"  class="form-control"/>
En attente<input type="radio" name="statut" id="statut" value="en attente"  class="form-control"/>
</div>
                      
                      
                  		
</div>
                    
                    
     <div class="card-footer">
    <input  type="submit" style="font-size: 20px;"  value="modifier"  name="send" class="btn btn-success btn-sm float-right submit_btn"/>
                  <div class="form-actions">
                      <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                    </div>
                   
  </div>
                    
                    
                    
				</form>
			</div>
			
		</div>
	</div>
	</div>
        
                </div>
              
            </div>
        </div>   
    </body>
</html>
