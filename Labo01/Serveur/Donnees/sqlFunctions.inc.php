<?php

function getFilms($connexion) {
    $requette="SELECT * FROM films ";
    $stmt = $connexion->prepare($requette);	
	$stmt->execute();
	$result = $stmt->get_result();
    $listeFilms = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {            
            $listeFilms[] = $row;
        }
    }
    return $listeFilms;   
}

?>