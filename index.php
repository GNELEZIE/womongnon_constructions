<?php 
require'header1.php';
$db=Database::connect();

?>


 <div id="carouselHacked" class="carousel slide carousel-fade" data-ride="carousel">

        <div class="carousel-inner" role="listbox">
            <div class="item active img1">
            
              <img src="images/bg3.png" style="width:100%;height:800px;">
               <h1>BIENVENUE SUR</h1>

            </div>
            <div class="item">
                 <img src="images/b3.jpg" style="width:100%;height:800px;">
            </div>
            
             <div class="item">
                 <img src="images/maison4.jpg" style="width:100%;height:800px;">
            </div>
            <div class="item">
                  <img src="images/maison2.jpg" style="width:100%;height:800px;">
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carouselHacked" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carouselHacked" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

<script>

$('#carouselHacked').carousel();
</script>




<div class="container">

<div class="row">
    <div class="col-md-2" style="background:green; color:#fff;font-size:30px">
        Annonnce
    </div>
     <div class="col-md-10">
       <marquee style="color:red; font-family:lucida calligraphy; font-size:20px;">Bienvenur sur  womongnon  le site de vente d'achat de terrrain et de maison 100% securisé</marquee>
    </div>
</div>
 

    <div class="row">

         
         
         
     

     <?php
        echo' <idv class="col-md-3">';
           echo'<div class="accordion" id="accordionExample">
             <div class="card">
               <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="font-size:15px; margin-left:5px;">
         <span class="glyphicon glyphicon-eye-open">LA LISTE DES COMMUNE
        </button>
      </h2>
      </div> 
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">';
          echo '<nav>
                <ul class="nav nav-pills">';

               
                $statement = $db->query('SELECT * FROM commune');
                $categories = $statement->fetchAll();
                foreach ($categories as $category) 
                {
                    if($category['id'] == '1')
                        echo '<li role="presentation" class="active"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li><br><br><br>';
                    else
                        echo '<li role="presentation"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li><br><br><br>';
                }

                echo    '</ul>
                      </nav>';
           
        
      echo'</div>
      </div>
            </div>
            </div>';
            echo'</idv>';
                
                echo' <idv class="col-md-9"><br>';
                echo '<div class="tab-content">';

                foreach ($categories as $category) 
                {
                    if($category['id'] == '1')
                        echo '<div class="tab-pane active" id="' . $category['id'] .'">';
                    else
                        echo '<div class="tab-pane" id="' . $category['id'] .'">';
                    
                    echo '<div class="row">';
                    
                    $statement = $db->prepare('SELECT * FROM terrain WHERE terrain.commune = ? and statut="en ligne"');
                    $statement->execute(array($category['id']));

                   foreach($statement as $item) 
                    {
                        echo '<div class="col-md-4 animated rotateIn">
                                <div class="thumbnail">
                                    <img  src="image_T_M/' . $item['image'] . '" alt="...">
                                    <div class="price">' . number_format($item['prix'], 3, '.', ''). ' €</div>
                                    <div class="caption">
                                        <h4>' . $item['type'] . '</h4>
                                        <p>' . $item['resume'] . '</p>
                                        <a href="detail.php?id=' . $item['id'] . '" class="btn btn-order" role="button"><span class="glyphicon glyphicon-eye-open"></span> Voir plus</a>
                                    </div>
                                </div>
                            </div>';
                    }
                   
                   echo    '</div>
                        </div>';
                }
             
                echo  '</div>';
         echo'</idv>';
            ?>
    

    </div>
    </div>
    <!-- /.row -->

 
  <!-- /.container -->




<style>
    .img1{
        background-image:url('images/gb2.png');
        background-color: #cccccc; 
    height: 500px; 
   background-position: center; 
   background-repeat: no-repeat; 
    background-size: cover; 
    }

</style>







<br><br><br><br><br><br>

  <footer style="background:black; color:#fff">
    <div class="container">
      <p class="text-center">Copyright &copy; Womongnon 2019</p>
    </div>
    <!-- /.container -->
  </footer>






