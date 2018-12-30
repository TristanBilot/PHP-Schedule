<?php

function charger_image() {

    $uploaddir = './V/utilisateur/images/';
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) { // réussite de chargement
        require("./M/connectBD.php");
        $id = $_SESSION['id'];
        $type = $_SESSION['type_user'];

        if ($type == "etu") { // new_login        
            $sql="UPDATE etudiant SET urlPhoto=:urlPhoto WHERE id_etu=:id";
        } else if ($type == "prof" || $type == "respEDT" || $type == "respMat") {
            $sql="UPDATE prof SET urlPhoto=:urlPhoto WHERE id_prof=:id";
        }
            try {
                $commande = $pdo->prepare($sql);
                $chemin = $uploaddir . $_FILES['userfile']['name'];
                $commande->bindParam(':urlPhoto', $chemin); //chemin
                $commande->bindParam(':id', $id);
                $bool = $commande->execute(); // true si bien executée
                if ($bool) {
                    $msg = "<p class='text-success'>Modification effectuée avec succès !</p>";
                    $url = "./V/utilisateur/compte/compte.tpl";
                    require("./V/design/header.tpl");
                    require($url); // on affiche la page compte avec msg de succes
                }
            }
            catch (PDOException $e) {
                echo utf8_encode("Echec de modification : " . $e->getMessage() . "\n");
                die(); // On arrête tout.
            }
    
        } 
      else {
        $msg = "<p class='text-danger'>L'image n'a pas été chargée correctement !<br>
         Nous vous conseillons de changer d'image.</p>";
         
		$url = "./V/utilisateur/compte/compte.tpl";
		require("./V/design/header.tpl");
		require($url); // on affiche la page compte avec msg de succes
    }
}

?>