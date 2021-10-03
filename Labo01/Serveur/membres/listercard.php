<html>
<head>
		<script language="javascript" src="../js/global.js"></script>
        <script src="/Labo01/Client/Utilitaire/js/jquery-3.3.1.min.js"></script>

    
   
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/Labo01/Client/Public/css/style.css">
	</head>
<body>
<br>
<a href="../films.php">Retour à la page d'accueil</a>
<br><br>
<?php
	// require_once("../BD/connexion.inc.php");
	
	// $rep="<table border=1>";
	// $rep.="<caption>LISTE DES FILMS</caption>";
	// $rep.="<tr><th>NUMERO</th><th>TITRE</th><th>DUREE</th><th>REALISATEUR</th><th>POCHETTE</th></tr>";
	// $requette="SELECT * FROM films";
	//  try{
	// 	 $listeFilms=mysqli_query($connexion,$requette);
	// 	 while($ligne=mysqli_fetch_object($listeFilms)){
	// 		$rep.="<tr><td>".($ligne->idf)."</td><td>".($ligne->titre)."</td><td>".($ligne->duree)."</td><td>".($ligne->res)."</td><td><img src='../pochettes/".($ligne->pochette)."' width=80 height=80></td></tr>";		 
	// 	}
	// 	mysqli_free_result($listeFilms);
	//  }catch (Exception $e){
	// 	echo "Probleme pour lister";
	//  }finally {
	// 	$rep.="</table>";
	// 	echo $rep;
	//  }
	//  mysqli_close($connexion);
?>
<?php
	require_once("../Utilitaires/connexion.inc.php");
    $requette="SELECT * FROM films ";


	$stmt = $connexion->prepare($requette);
	
	$stmt->execute();
	$listeFilms = $stmt->get_result();
	 try{
		
         $rep="<div class='cards'>";
		 $i=0;
		
		 $rep.=' <div class="row">';
		 while($ligne=mysqli_fetch_object($listeFilms)){
			if ($i%4==0){
				$rep.='</div>';
				$rep.=' <div class="row">';
			}
				$rep.='<div class="card  bg-warning mb-3" >';
					$rep.='<div class="card" style="width: 18rem;">';
                   
					$rep.='<img src="'.($ligne->posterUrl) .'"alt="Image Not Found" onerror="this.src='."'../../Client/Utilitaire/img/covers/cover2.jpg'\"> </img>";
                        
					$rep.='<div class="card-body">';
					$rep.='<h5 class="card-title">'.($ligne->titre).'</h5>';
					$rep.='<p class="card-text">Parution: '.($ligne->parution).'</p>';
					$rep.='<p class="card-text">Duree: '.($ligne->duree).' Minutes</p>';
					$rep.='<p class="card-text">'.($ligne->desc).'</p>';
					$rep.='<a href="#" class="btn btn-primary">Détails</a>';
					$rep.='</div>';
					$rep.='</div>';
				$rep.='</div>';
				$i++;
		}
        //Link: http://localhost/Labo01Bd/Serveur/membres/listercard.php#
			$rep.="</div>";//fermer le dernier row
		$rep.="</div>";//fermer le container
		mysqli_free_result($listeFilms);
	 }catch (Exception $e){
		echo "Probleme pour lister";
	 }finally {
		echo $rep;
	 }
	 mysqli_close($connexion);
?>
</body>
</html>
