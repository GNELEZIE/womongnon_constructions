<?php 
include'header.php';
$db =Database::connect();
if(isset($_GET['id']) and $_GET['id']>0){
    $getId=intval($_GET['id']);
    $info=$db->prepare('SELECT *FROM terrain WHERE id=?');
    $info->execute(array($getId));
    $infos=$info->fetch();
}

if(isset($_POST['send'])){
    $nom =checkInput($_POST['nom']);
    $prenom =checkInput($_POST['prenom']);
    $phone =checkInput($_POST['phone']);
    $date =checkInput($_POST['date']); 
    $email =checkInput($_POST['email']);
    $ref =checkInput($_POST['ref']);
    
    
    $image = checkInput($_FILES['image']['name']);
    $imagePath ='image_T_M/'.$image;
    $imageExtension = pathinfo($imagePath,PATHINFO_EXTENSION);
    $valid_Extension =array("jpg","png","gif");
    if(!in_array(strtolower($imageExtension),$valid_Extension)){
   $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg...'; 
    }
    if(!move_uploaded_file($_FILES['image']['tmp_name'],$imagePath)){
        
    }
    
    
    
    

    
//    $image =$_FILES["image"]["name"];
//    $imagePath = 'images/' .basename($image);
//    $imageExtension= pathinfo($imagePath,PATHINFO_EXTENSION);
    
    if(!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['prenom']) && !empty($_POST['phone']) && !empty($_POST['date']) && !empty($_FILES['image'])){ 
        
        $insert =$db->prepare('INSERT INTO reservation(nom,prenom,phone,image,dateR,reference,email) VALUES(?,?,?,?,?,?,?)');
        $result=$insert->execute(array($nom,$prenom,$phone,$image,$date,$ref,$email));
         if($result){
             $_SESSION['success']=true;
         }else{
               $_SESSION['error1']=true;
         }

    
    
    
}else{
         $_SESSION['error']=true; 
    }

}
function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }


?>
<br><br>
<div class="container">
<div class="alert alert-danger"><img src="images/attention2.png" class="img-responsive" style="width:50px;">Votre commande reste visible par le grand public tant que vous n'avez pas validé l'achat au près de l'admin. Email: zie@nan.ci .CEL:46859936</div></div>
<div align="center">
        
        
        	<div class="container h-100">
	<div class="d-flex justify-content-center">
		<div class="card mt-5 col-md-6 animated rotateIn myForm">
			<div class="card-header" style="background:green; color:#fff;">
				<h4>PRENDRE UN RENDEZ-VOUS</h4>
				
			</div>
			<div class="card-body">
				<form method="POST" enctype="multipart/form-data">
                      <h1>Reference:<?php echo $infos['reference'];?></h1>
                       
                 <?php if(isset($_SESSION['error1'])):?>
        
                    <div class="alert alert-success">Les données sont pas envoyés<a href="connexion.php"> </a>mon profil</div> 
                     <?php unset($_SESSION['error1'])?>
                     <?php endif ?>
                        
                   <?php if(isset($_SESSION['success'])):?>
        
                    <div class="alert alert-success">Reservation faite avec success !!!!!<a href="printconnex.php">Imprimer la fiche ici</a></div>  
                     <?php unset($_SESSION['success'])?>
                     <?php endif ?>
                     
                     
                     <?php if(isset($_SESSION['error'])):?>
                      <div class="alert alert-danger">Tous les champs sont obligatoire</div> 
                      <?php unset($_SESSION['error']) ?>
                      <?php endif ?>
                    
      
					<div id="dynamic_container">
				         <div class="row">
                        <div class="col-md-6">
                         <div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-user-graduate"></i></span>
							</div>
							<input type="text" name="nom" id="nom" placeholder="Entrer votre nom" class="form-control"/>
						</div>
                       
                       
                        <div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-user-graduate"></i></span>
							</div>
							<input type="text" name="prenom" id="prenom" placeholder="Entrer votre prenom" class="form-control"/>
						</div>
                      
                       <div class="input-group mt-3">
							<div class="input-group-prepend">
				            <span class="input-group-text br-15"><i class="fas fa-user-graduate"></i></span>
							</div>
							<input type="tel" name="phone" id="phone" placeholder="Entrer le numéro " class="form-control"/>
						</div>
                      
                      <div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-envelope"></i></span>
							</div>
							<input type="text" name="ref" id="ref" placeholder="Recopier la reference ici" class="form-control"/>
						</div>
                       </div>
                       <div class="col-md-6">
                      
                       <div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-envelope"></i></span>
							</div>
							<input type="email" name="email" id="email" placeholder="Entrer votre email" class="form-control"/>
						</div>
                       
                        
                        
                        
                        
                        <div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"> <i class="fas fa-envelope"></i></span>
							</div>
							<input type="date" name="date" id="phone" placeholder="Entrer votre date de rendez-vous" class="form-control"/>
						</div>
                     
                 
                     
                   
                   
                      
                      
                      	<div class="input-group mt-3">
							 
                            <input  type="file" id="image" name="image" multiple/>
						</div>
                      
                       <div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-image"></i></span>
							</div>
                     
						</div>
                       
                  		
					
                    
                    
                 <div class="card-footer">
               
				  <input  type="submit" style="font-size: 20px;"  value="S'insrire"  name="send" class="btn btn-success btn-sm float-right submit_btn"/>
                   </div>
			     </div>
                    
                    
                    </div>
				</form>
				</div>
			</div>
			
		</div>
	</div>
	</div>
        

        
    
    </div>



<br>
<br>
<br>
<style>

  body{
  background-image: url("images/rendez.jpg"); 
  background-color: #cccccc;
  height: 500px;
  background-position: center; 
  background-repeat: no-repeat; 
  background-size: cover; 
}

</style>


<?php 

require'footer.php';

?>
