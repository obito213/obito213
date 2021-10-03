<?php
require_once("../Utilitaires/connexion.inc.php"); 
$logemail = $_POST['logemail'];   
$pass = $_POST['pass'];

//Vérifier les paramètres de connexion
$requete="SELECT * FROM connexions WHERE Courriel=? AND Pass=?";
$stmt = $connexion->prepare($requete);
$stmt->bind_param("ss", $logemail, $pass);
$stmt->execute();
$result = $stmt->get_result();
if($ligne = $result->fetch_object()){       
    if ($ligne->Role === 'M'){        
        header("Location: ../pages/Membre.php");
    }else{
        header('Location: ../pages/Admin.php');
    }
}else {
    echo "<p style='color:red; font-size: 14px;'><b>SVP Vérifiez vos paramètes de connexion !</b></p>";
    
}
?>
<br><br>
<a href="../../index.html">Retour à la page d'accueil</a>

