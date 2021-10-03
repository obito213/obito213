<h2>Enregistrement du membre</h2><br><br>
<?php
     require_once("../Utilitaires/connexion.inc.php");
     $last_name = $_POST['last_name'];
     $first_name = $_POST['first_name'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $birthday = $_POST['birthday'];
     $gender ;
  

   //Vérifier si le courriel existe déjà
    $requete="SELECT * FROM membres WHERE courriel=?";
	$stmt = $connexion->prepare($requete);
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$result = $stmt->get_result();
	if($ligne = $result->fetch_object()){
		echo "Ce courriel".$email." existe déjà";
		mysqli_close($connexion);
		exit;
	}
    //Le courriel n'existe pas : Cool!!!
    //Enregistrer infos du membre
 

    
if($_POST['gender']== "male")
{
    $requete = "INSERT INTO membres VALUES(0,?,?,?,\"homme\",?)";
}
else if ($_POST['gender'] == "female")
{
    $requete = "INSERT INTO membres VALUES(0,?,?,?,\"femme\",?)";
}
$stmt = $connexion->prepare($requete);
$stmt->bind_param("ssss", $email, $last_name, $first_name, $birthday);
$stmt->execute();
    $requete = "INSERT INTO connexions VALUES(0,?,?,\"1\",\"M\")";
    $stmt = $connexion->prepare($requete);
	$stmt->bind_param("ss", $email, $password);
	$stmt->execute();
    
   
    echo "<h2>Membre bien enregistré</h2>";
?>
<br><br>
<a href="../../index.html">Retour à la page d'accueil</a>