<?php
require'headerd.php';
$db=Database::connect();

if(isset($_GET['id']) and $_GET['id']>0){
    $getId=intval($_GET['id']);
    $info=$db->prepare('SELECT *FROM users WHERE id=?');
    $info->execute(array($getId));
    $infos=$info->fetch();
}


?>

<div class="row">
    <div class="col-md-12">
        
        
      <?php if(isset($_SESSION['id']) AND $infos['id'] ==$_SESSION['id']){
    
?>
<div class="container h-100">
	<div class="d-flex justify-content-center">
		<div class="card mt-5 col-md-12 animated flipInX myForm">
			<div class="card-header" style="background:green;color:#fff;">
			<h2>Infos Profil</h2>
			</div>
			<div class="card-body">
			<table class="table">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Pseudo</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"> <img src="<?php echo 'images/'.$infos['image'];?>" class="img-responsive rounded-circle" style="width:200px" alt="...">	</th>
      <td><?php echo $infos['pseudo'];?></td>
      <td><?php echo $infos['email'];?></td>
      <td><a  class="btn btn-success" type="button" href="add.php">Ajouter maison ou terrainSS</a></td>
     
    </tr>
  </tbody>
</table>
           
<?php } 
                
    else{
        header('Location:connexion.php');
    }            
    
                
                
                
    ?> 
        
        
			</div>
			
		</div>
	</div>
	</div>
        
<style>
        
body{
  background-image: url("images/profi.jpg"); /* The image used */
  background-color: #cccccc; /* Used if the image is unavailable */
  height: 500px; /* You must set a specified height */
  background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
}        
        
        
</style>
        
    
    </div>

    </div>
    
</div>
