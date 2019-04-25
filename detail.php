<?php
require'header2.php';
$db=Database::connect();

if(isset($_GET['id']) and $_GET['id']>0){
    $getId=intval($_GET['id']);
    $info=$db->prepare('SELECT *FROM terrain WHERE id=?');
    $info->execute(array($getId));
    $infos=$info->fetch();
}


?>

<div class="row">
    <div class="col-md-6">
        
        
 
    

   <div align="center">
        
        
        	<div class="container h-100">
	<div class="d-flex justify-content-center">
		<div class="card mt-5 col-md-12 animated fadeInLeft myForm">
			<div class="card-header" style="background:green;color:#fff;">
				<h4>INFOS TERRAIN</h4>
			</div>
  <div class="card-body">
     <img src="<?php echo'image_T_M/'.$infos['image'].'';?>" alt="..." style="width:100%; height:50%;">
    <p>Description:<?php echo $infos['description'];?></p>
    <p>Reference :<?php echo $infos['reference'];?></h5>
    <p>Prix :<?php echo $infos['prix'];?></h5>
    <p>Perimetre :<?php echo $infos['perimetre'];?></h5><br>
    
    <a href="rendez.php?id=<?php echo $infos['id'];?>" type="button" class="btn btn-success">
    RENDEZ-VOUS</a>
    <a href="printconnex.php" type="button" class="btn btn-danger">IMPRIMER FICHE DE RENDEZ-VOUS</a>
 
        
 </div>
			
		</div>
	</div>
	</div>
        

        
    
    </div>

    </div>
    <div class="col-md-6">
        
        <div align="center">
        
        
        	<div class="container h-100">
	<div class="d-flex justify-content-center">
		<div class="card mt-5 col-md-12 animated fadeInRight myForm">
			<div class="card-header" style="background:green;color:#fff;">
				<h4>INFOS PROPRIETAIRE</h4>
			</div>
			<div class="card-body">
			 <h1><?php echo $infos['nom'];?></h1>
			 <h1><?php echo $infos['prenom'];?></h1>
			 <h1><?php echo $infos['phone'];?></h1>
			 <h1><?php echo $infos['email'];?></h1>
			
			
			</div>
			
		</div>
	</div>
	</div>
        

        
    
    </div>

        
    </div>
    
</div>
<br><br><br><br><br><br>

  <footer style="background:black; color:#fff">
    <div class="container">
      <p class="text-center">Copyright &copy; Womongnon 2019</p>
    </div>
    <!-- /.container -->
  </footer>