<?php 
require'header.php';
$db =Database::connect();
if(isset($_POST['send'])){
   
    $email = htmlspecialchars($_POST['email']);
    if(!empty($_POST['email'])){ 
        
        $connect =$db->prepare('SELECT * FROM users WHERE email=?');
       $connect->execute(array($email));
        $mailExist=$connect->rowCount();
        if($mailExist == 1){
            $usersInfos =$connect->fetch();
            $_SESSION['id'] =$usersInfos['id'];
            $_SESSION['email'] =$usersInfos['email'];
             header('Location:profile.php?id='.$_SESSION['id']);
         }else{
               $_SESSION['error3']=true;
         }

    
    
    
}else{
         $_SESSION['error']=true; 
    }

}



?>


<div align="center">
        
        
        	<div class="container h-100">
	<div class="d-flex justify-content-center">
		<div class="card mt-5 col-md-6 animated  flipInY myForm">
			<div class="card-header">
				<h4>CONNEXION</h4>
			</div>
			<div class="card-body">
				<form method="POST" enctype="multipart/form-data">
                       
                 <?php if(isset($_SESSION['error1'])):?>
        
                    <div class="alert alert-success">Les données sont pas envoyés<a href="connexion.php"> </a>mon profil</div>
                     <?php unset($_SESSION['error1'])?>
                     <?php endif ?>
                       
                       <?php if(isset($_SESSION['error3'])):?>
        
                    <div class="alert alert-danger">Mail introuvable!!!!!!</div>
                     <?php unset($_SESSION['error3'])?>
                     <?php endif ?>
                        
                   <?php if(isset($_SESSION['success'])):?>
        
                    <div class="alert alert-success">Votre compte a été crée avec success!!!!!<a href="connexion.php"> </a>mon profil</div> 
                     <?php unset($_SESSION['success'])?>
                     <?php endif ?>
                     
                      <?php if(isset($_SESSION['success2'])):?>
        
                    <div class="alert alert-success">Votre compte a été crée avec success!!!!! </div>; 
                     <?php unset($_SESSION['success2'])?>
                     <?php endif ?>
                     
                     
                     
                     <?php if(isset($_SESSION['error'])):?>
                      <div class="alert alert-danger">Tous les champs sont obligatoire</div>; 
                      <?php unset($_SESSION['error']) ?>
                      <?php endif ?>
                    
       
					<div id="dynamic_container">
				         
                        
                        
                        <div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"> <i class="fas fa-envelope"></i></span>
							</div>
							<input type="email" name="email" id="email" placeholder="votre mail" class="form-control"/>
						</div>
                      
                      
                  		
					</div>
                    
                    
                 <div class="card-footer">
               
				  <input  type="submit" style="font-size: 20px;"  value="connexion"  name="send" class="btn btn-success btn-sm float-right submit_btn"/>
                   
			       </div>
                    
                    
                    
				</form>
			</div>
			
		</div>
	</div>
	</div>
        

        
    
    </div>
    
   
  <style>

body{
  background-image: url("images/bg-01.jpg"); 
  background-color: #cccccc;
  height: 500px;
  background-position: center; 
  background-repeat: no-repeat; 
  background-size: cover; 
}



</style>


