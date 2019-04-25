<?php 
require'header.php';
$db =Database::connect();
if(isset($_POST['send'])){
    $pseud =checkInput($_POST['pseudo']);
    $email =checkInput($_POST['email']);
    $emailc =checkInput($_POST['emailc']);
    $image = checkInput($_FILES['image']['name']);
    $imagePath ='images/'.$image;
    $imageExtension = pathinfo($imagePath,PATHINFO_EXTENSION);
    $valid_Extension =array("jpg","png","gif");
    if(!in_array(strtolower($imageExtension),$valid_Extension)){
        
    }
    if(!move_uploaded_file($_FILES['image']['tmp_name'],$imagePath)){
        
    }
    
    
    
    
    
    
   $imageExtension= pathinfo($imagePath,PATHINFO_EXTENSION);
    
    if(!empty($_POST['pseudo']) && !empty($_POST['email'])){ 
        if($email!=$emailc){
            $_SESSION['email']=true;
        }else{
                 $connect =$db->prepare('SELECT * FROM users WHERE email=?');
       $connect->execute(array($email));
        $mailExist=$connect->rowCount();
        if($mailExist == 0){
            
             $insert =$db->prepare('INSERT INTO users(pseudo,email,image) VALUES(?,?,?)');
        $result=$insert->execute(array($pseud,$email,$image));
         if($result){
             $_SESSION['success']=true;
         }else{
               $_SESSION['error1']=true;
         }
            
        }else{
            
            $_SESSION['error3']=true; 
        }
        
            
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


<div align="center" class="center">
        
        
        	<div class="container h-100">
	<div class="d-flex justify-content-center">
		<div class="card mt-5 col-md-6 animated rotateIn myForm">
			<div class="card-header">
				<h4>FORMULAIRE INSCRIPTION</h4>
			</div>
			<div class="card-body">
				<form method="POST" enctype="multipart/form-data">
                       
                 <?php if(isset($_SESSION['error1'])):?>
        
                    <div class="alert alert-success">Les données sont pas envoyés</div>
                     <?php unset($_SESSION['error1'])?>
                     <?php endif ?>
                        
                   <?php if(isset($_SESSION['success'])):?>
        
                    <div class="alert alert-success">Votre compte a été crée avec success!!!!! <a href="connexion.php">mon profil</a></div>
                     <?php unset($_SESSION['success'])?>
                     <?php endif ?>
                     
                     
                     <?php if(isset($_SESSION['error'])):?>
                      <div class="alert alert-danger">Tous les champs sont obligatoire</div> 
                      <?php unset($_SESSION['error']) ?>
                      <?php endif ?>
                    
                    
                <?php if(isset($_SESSION['error3'])):?>
        
                    <div class="alert alert-danger">Ce mail est déjà insrire veillez utiliser autre mail!!!!!!</div>
                      <?php unset($_SESSION['error3']) ?>
                     <?php endif ?>
                     
                         
                <?php if(isset($_SESSION['email'])):?>
        
                    <div class="alert alert-danger">Les deux mail ne sont pas conforme!!!!!!</div>
                      <?php unset($_SESSION['email']) ?>
                     <?php endif ?>
       
       
       
					<div id="dynamic_container">
				         
                         <div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-user-graduate"></i></span>
							</div>
							<input type="text" name="pseudo" id="pseudo" placeholder="pseudo" class="form-control"/>
						</div>
                        
                        <div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"> <i class="fas fa-envelope"></i></span>
							</div>
							<input type="email" name="email" id="email" placeholder="votre mail" class="form-control"/>
						</div>
                      
                       <div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-calendar-alt"></i></span>
							</div>
							<input type="email" name="emailc" id="emailc" placeholder="confirmez votre mail" class="form-control"/>
						</div>
                      
                      
                      	<div class="input-group mt-3">
							 
                            <input  type="file" id="image" name="image"/>
						</div>
                      
              		
					</div>
                    
                 
                 <div class="card-footer">
               
				  <input  type="submit" style="font-size: 20px;"  value="S'insrire"  name="send" class="btn btn-success btn-sm float-right submit_btn"/>
                   
			       </div>
                    
                    
                    
				</form>
			</div>
			
		</div>
	</div>
	</div>
        

        
    
    </div>
<style>



body{
  background-image: url("images/blog.jpg"); 
  background-color: #cccccc; 
  height: 500px; 
  background-position: center; 
  background-repeat: no-repeat;
  background-size: cover; 
}





</style>


   <br>
   <br>
   <br>
   <br>
<br><br><br><br><br><br>

  <footer style="background:black; color:#fff">
    <div class="container">
      <p class="text-center">Copyright &copy; Womongnon 2019</p>
    </div>
    <!-- /.container -->
  </footer>
