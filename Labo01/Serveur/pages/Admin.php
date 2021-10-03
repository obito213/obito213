<?php 
include("../Utilitaires/connexion.inc.php");
include("../Donnees/sqlFunctions.inc.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="/Labo01BD/Client/Public/css/style.css">
  <link rel="stylesheet" href="/Labo01BD/Client/Public/css/flipCard.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
  <link rel="icon" type="image/png" href="/Labo01BD/Client/Public/icon/Home.jpg"/>

  <script src="/Labo01BD/Client/Utilitaire/js/jquery-3.3.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script src="/Labo01BD/Client\Public\js\password.js"></script>

  <title>MoviePass Accueil</title>
</head>
<body>
    <!-- Icon Image -->  
    
    <!-- End Icon Image -->
    <!--NavBar-->
    <?php echo file_get_contents("../Utilitaires/navBar.html"); ?>
    
    <!-- End NavBar -->
    <!-- Background image -->
  <div class="bg-image">
    <!-- Modal Inscription-->
    <?php echo file_get_contents("../Utilitaires/inscription.html"); ?>

    <!-- End Modal Inscription -->
    <!-- Modal Connexion -->
    <?php echo file_get_contents("../Utilitaires/connexion.html"); ?>
    <!-- End Modal Connexion -->   

    <div class="container mt-5" id="cards">
      <div class="card-group container-fluid">    
        <?php
          $listeFilms = getFilms($connexion);
          if (count($listeFilms) > 0) {
            $rep=' <div class="row">';	                     
              foreach($listeFilms as $row) {
                  
                  $posterUrl = $row["posterUrl"];
                  $titre = $row["titre"];            
                  $parution = $row["parution"];            
                  $duree = $row["duree"];
                  $description = $row["desc"];

                  $rep.='<div class="col-sm-3 flip-card" >';
                    $rep.='<div class="card bg-warning mb-3 flip-card-inner">';		                   
                      $rep.='<div class="flip-card-front">';  
                        $rep.='<img class="" src="'.($posterUrl) .'"alt="Image Not Found" onerror="this.src='."'/Labo01BD/Client/Utilitaire/img/covers/cover2.jpg'\"> </img>";                                                            
                        $rep.='<h5 class="card-title">'.($titre).'</h5>';
                        $rep.='<p class="card-text">Parution: '.($parution).'</p>';
                        $rep.='<p class="card-text">Duree: '.($duree).' Minutes</p>';                                                                                                                                        
                      $rep.='</div>';
                      $rep.='<div class="card-body flip-card-back">';	
                        $rep.='<p class="card-text">'.($description).'</p>';
                        $rep.='<button type="button">Modifier</button><button type="button" style="background-color:red">Supprimer</button>';  
                      $rep.='</div>'; 	              
                    $rep.='</div>';
                  $rep.='</div>';                                       
              }
              $rep.="</div>";//fermer le container  
              echo $rep;
          }
          echo 'Aucun film afficher à l'.'écran';
        ?>
      </div>
    </div>

  </div>

<!-- Background image -->

</body>
<script>
  $(document).ready(function(){
    var date_input=$('input[name="birthday"]'); 
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    var options={
      format: 'dd/mm/yyyy',
      container: '#id01',
      todayHighlight: true,
      autoclose: true,
      orientation:'bottom right'
    };
    date_input.datepicker(options);
  })
</script>

</html>