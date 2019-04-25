<?php 
include'headerd.php';
$db =Database::connect();
if(isset($_POST['send'])){
    $nom =checkInput($_POST['nom']);
    $prenom =checkInput($_POST['prenom']);
    $phone =checkInput($_POST['phone']);
    $ref =checkInput($_POST['ref']);
    $prix =checkInput($_POST['prix']);
    $type =checkInput($_POST['radio']);
    $email =checkInput($_POST['email']);
    $perimetre =checkInput($_POST['perimetre']);
    $resume =checkInput($_POST['resume']);
     $commune =checkInput($_POST['commune']);
     $description =checkInput($_POST['description']);
    
    
    $image = $_FILES['image']['name'];
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
    
    if(!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['prenom']) && !empty($_POST['phone']) && !empty($_POST['ref']) && !empty($_POST['prix'])  && !empty($_FILES['image'])){ 
        
        $existe=$db->prepare('SELECT * FROM terrain WHERE reference=?');
        $existe->execute(array($ref));
        $isExiste= $existe->rowCount();
        if($isExiste!=1){
            
             
        $insert =$db->prepare('INSERT INTO terrain(nom,prenom,phone,reference,email,prix,commune,image,type,description,perimetre,resume) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
        $result=$insert->execute(array($nom,$prenom,$phone,$ref,$email,$prix,$commune,$image,$type,$description,$perimetre,$resume));
         if($result){
             $_SESSION['success']=true;
             $_SESSION['errorAd']=true;
         }else{
               $_SESSION['error1']=true;
         }

    
    
        }else{
            $_SESSION['error3']=true;       }
       
    
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
<div class="alert alert-danger"><img src="images/attention2.png" class="img-responsive" style="width:50px;">Veillez bien renseignez les champs avant d'envoyer car une fois envoyer vous ne pouvez plus modifier</div></div>
<div align="center">
        
        
        	<div class="container h-100">
	<div class="d-flex justify-content-center">
		<div class="card mt-5 col-md-12 animated fadeInLeft myForm">
			<div class="card-header" style="background:green; color:#fff;">
				<h4>FORMULAIRE D'AJOUT DE MAISON OU TERRAIN</h4>
			</div>
			<div class="card-body">
				<form method="POST" enctype="multipart/form-data">
                       
                 <?php if(isset($_SESSION['error1'])):?>
        
                    <div class="alert alert-success">Les données sont pas envoyés<a href="connexion.php"> </a>mon profil</div> 
                     <?php unset($_SESSION['error1'])?>
                     <?php endif ?>
                     
                        
                   <?php if(isset($_SESSION['success'])):?>
        
                    <div class="alert alert-success">Votre <?php echo $_POST['radio'];?> a été Ajouter avec success!!!!!</div>  
                     <?php unset($_SESSION['success'])?>
                     <?php endif ?>
                      
                       <?php if(isset($_SESSION['errorAd'])):?>
        
                    <div class="alert alert-danger">Finaliser votre ajout auprès des admin <br>Email:zie@nan.ci<br>Phone:+225 46 85 99 36</div> 
                     <?php unset($_SESSION['errorAd'])?>
                     <?php endif ?>
                     
                     <?php if(isset($_SESSION['error'])):?>
                      <div class="alert alert-danger">Tous les champs sont obligatoire</div> 
                      <?php unset($_SESSION['error']) ?>
                      <?php endif ?>
                      
                         <?php if(isset($_SESSION['error3'])):?>
                      <div class="alert alert-danger">Cette reference existe dans notre base de donnée!!!!!!</div> 
                      <?php unset($_SESSION['error3']) ?>
                      <?php endif ?>
                    
      
					<div id="dynamic_container">
				         <div class="row">
                        <div class="col-md-6">
                         <div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-user-graduate"></i></span>
							</div>
							<input type="text" name="nom" id="nom" placeholder="Entrer le nom du propriété" class="form-control"/>
						</div>
                       
                       
                        <div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-user-graduate"></i></span>
							</div>
							<input type="text" name="prenom" id="prenom" placeholder="Entrer le prenom  du propriété" class="form-control"/>
						</div>
                      
                       <div class="input-group mt-3">
							<div class="input-group-prepend">
				            <span class="input-group-text br-15"><i class="fas fa-user-graduate"></i></span>
							</div>
							<input type="tel" name="phone" id="phone" placeholder="Entrer le numéro du propriété" class="form-control"/>
						</div>
                      
                      
                      
                       <div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-envelope"></i></span>
							</div>
							<input type="email" name="email" id="email" placeholder="Entrer le email du propriété" class="form-control"/>
						</div>
                       
                        
                        
                        
                        
                        <div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"> <i class="fas fa-envelope"></i></span>
							</div>
							<input type="text" name="resume" id="resume" placeholder="Entrer un petit resumé max =100 caractère" class="form-control" maxlength="100"/>
						</div>
                     
                      
                       <div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-calendar-alt"></i></span>
							</div>
							<input type="text" name="ref" id="ref" placeholder="Enter la réference du terrain ou maisson" class="form-control"/>
						</div>
                    </div>
                    <div class="col-md-6">
                     
                    <div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"> <i class="fas fa-envelope"></i></span>
							</div>
							<input type="tel" name="prix" id="prix" placeholder="Entrer le prix" class="form-control"/>
				    </div>
                     
                       <div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"> <i class="fas fa-envelope"></i></span>
							</div>
                          <textarea type="tel" name="description" id="description" placeholder="Decrivez votre produit" class="form-control"></textarea>
				    </div>
                    
                     <div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"> <i class="fas fa-envelope"></i></span>
							</div>
                          <input type="text" name="perimetre" id="perimetre" placeholder="Entrer le  perimetre" class="form-control">
				    </div>
                     
                       <div class="input-group mt-3">
							
                            Maison<input type="radio" name="radio" id="radio"  value="Maison" class="form-control"/>
							Terrain <input type="radio" name="radio" id="radio"  value="Terrain"placeholder="Entrer le prix" class="form-control"/>
				    </div>
                      
                    
                      
                      
                      
                      
                      
                      	<div class="input-group mt-3">
							 
                            <input  type="file" id="image" name="image" multiple/>
						</div>
                      
                       <div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-image"></i></span>
							</div>
                           <select name="commune" id="commune" class="form-control">
                             
                              <option>Choisir la commune de la maison ou du terrain</option>
                              <?php 
                        
                                 $select=$db->query('SELECT * FROM  commune');
                                foreach($select as $select):?>
                             
             <option value="<?php echo $select['id']; ?>"><?php echo $select['name'] ;?></option>
                              <?php endforeach ?>
                             
                           </select>
						</div>
                       
                    </div>  		
					</div>
                    
                    
                 <div class="card-footer">
               
				  <input  type="submit" style="font-size: 20px;"  value="Ajouter"  name="send" class="btn btn-success btn-sm float-right submit_btn"/>
                  
                   <div class="form-actions">
                      <a class="btn btn-primary" href="profile.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                    </div>
                   
			       </div>
                   </div>
                    
                    
                    
				</form>
			</div>
			
		</div>
	</div>
	</div>
        

        
    
    </div>


<style>

   body{
  background-image: url("images/man.jpg"); 
  background-color: #cccccc;
  height: 500px;
  background-position: center; 
  background-repeat: no-repeat; 
  background-size: cover; 
}

</style>



