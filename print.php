<?php
require'header2.php';
$db=Database::connect();

if(isset($_GET['id']) and $_GET['id']>0){
    $getId=intval($_GET['id']);
    $info=$db->prepare('SELECT *FROM reservation WHERE id=?');
    $info->execute(array($getId));
    $infos=$info->fetch();
//    SELECT * FROM terrain INNER JOIN reservation ON terrain.reference=reservation.reference
}


?>

<div class="row">
    <div class="container">
        
        
      <?php if(isset($_SESSION['id']) AND $infos['id'] ==$_SESSION['id']){
    
?>
   <div align="center">
        
        
        	<div class="container h-100" id="imprimer" style="display:block;">
	<div class="d-flex justify-content-center">
		<div class="card  animated rotateIn myForm">
			<div class="card-header" style="background:green;color:#fff;">
				<h4>INFORMATION DE LA RESERVATION</h4>
			</div>
			<div class="card-body">
			
			<table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Telephone</th>
      <th scope="col">Reference</th>
      <th scope="col">Email</th>
      <th scope="col">Date de reservation</th>
      <th scope="col">Date de rendez-vous</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $infos['nom'];?></th>
      <td><?php echo $infos['prenom'];?></td>
      <td><?php echo $infos['phone'];?></td>
      <td><?php echo $infos['reference'];?></td>
      <td><?php echo $infos['email'];?></td>
      <td><?php echo $infos['dateR'];?></td>
      <td><?php echo $infos['dateD'];?></td>
    </tr>
   
      
  </tbody>
</table>
<div>
    <a type="button" class="btn btn-warning" onclick="imprimer();"><i class="fas fa-print">imprimer</i></a>
</div>	
     <div class="alert alert-danger"><b style="color:red;">NB : Finaliser votre ajout auprès des admin  Email:zie@nan.ci  Phone:+225 46 85 99 36</b></div>		
			
			
			
			

<?php } ?>  
        
			</div>
			
		</div>
	</div>
	</div>
        

       <script>
        
function imprimer() {    
	var imprimer = document.getElementById('imprimer');
	var popupcontenu = window.open('', '_blank');
	popupcontenu.document.open();
	popupcontenu.document.write('<html><body onload="window.print()">' + imprimer.innerHTML + '</html>');
	popupcontenu.document.close();
}
</script>
       
       
       </script> 
    
    </div>

    </div>
   
    
</div>
