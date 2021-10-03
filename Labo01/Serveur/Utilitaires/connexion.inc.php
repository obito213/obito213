<?php
 define("SERVEUR","127.0.0.1");
 define("USAGER","root");

 define("PASSE","");
 define("BD","e21bdfilms");
$connexion =  new mysqli(SERVEUR,USAGER,PASSE,BD);

 if( $connexion->connect_errno ){
     echo "Erreur de Connexion";
     exit();
 }
 
?>