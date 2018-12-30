<?php
function msg_press() {
    $id_dest=  isset($_POST['id_dest'])?($_POST['id_dest']):'';
    $nom_complet_dest=  isset($_POST['nom_complet_dest'])?($_POST['nom_complet_dest']):'';
    $_SESSION['id_dest'] = $id_dest;
    $_SESSION['nom_complet_dest'] = $nom_complet_dest;
    require("./V/design/header.tpl");
    require("./V/utilisateur/users/send_message.tpl");
    
}

function send_msg() {
    $contenu=  isset($_POST['contenu'])?($_POST['contenu']):'';
    
    if ($contenu == "") {
        $msg = "<p class='text-danger'>Le message ne peut pas être vide.</p>";
        die();
    } else {
        require("./M/connectBD.php");
        $id_src = $_SESSION['id'];
        $id_dest = $_SESSION['id_dest'];
		$sql="INSERT INTO message (typeMsg, id_src, id_dest, contenu) VALUES (1, :id_src, :id_dest, :contenu);";
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':id_src', $id_src);
            $commande->bindParam(':id_dest', $id_dest);
            $commande->bindParam(':contenu', $contenu);
			
			$bool = $commande->execute(); // true si bien executée
			if ($bool) {
				$msg = "<p class='text-success'>Message envoyé avec succès !</p>";
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de modification : " . $e->getMessage() . "\n");
			die(); // On arrête tout.
		}
	}
    
    require("./V/design/header.tpl");
    require("./V/utilisateur/users/send_message.tpl");
}

function messages_recus() {
    require ("./M/connectBD.php") ;
    $id_src = $_SESSION['id'];
    $sql="SELECT * FROM message WHERE id_dest=:id_src";
		try {
            $commande = $pdo->prepare($sql);
            $commande->bindParam(':id_src', $id_src);
			$bool = $commande->execute(); // true si bien executée
			if ($bool) {
                $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
                require("./V/design/header.tpl");
                echo "<h2 style='margin:20px;'>Mes messages reçus</h2>";
                echo "<center><table class='table table-hover'  style='width:50%'>
                    <thead>
                        <tr class='table-success'>
                        <th scope='col'>De la part de</th>
                        <th scope='col'>Contenu du message</th>
                        </tr>
                    </thead>
                    <tbody>";
                if (empty($resultat)) {
                    $no_msg = "Vous n'avez pas encore de messages.";
                    
                }
				foreach ($resultat as $tuple) {
                    
                    echo "<tr class='table-primary'>";
                    echo "<td>" . getDestinataire($tuple['id_src']) . "</td>";
                    echo "<td>" . $tuple['contenu'] . "</td>";   
                    echo "</tr>";
                   
                }
                echo "</tbody></table>";
                echo $no_msg . "</center>";
            }
        } catch (PDOException $e) {
            echo utf8_encode("Echec de modification : " . $e->getMessage() . "\n");
            die(); // On arrête tout.
        }

}

function messages_envoyes() {
    require ("./M/connectBD.php") ;
    $id_src = $_SESSION['id'];
    $sql="SELECT * FROM message WHERE id_src=:id_src";
		try {
            $commande = $pdo->prepare($sql);
            $commande->bindParam(':id_src', $id_src);
			$bool = $commande->execute(); // true si bien executée
			if ($bool) {
                $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
                require("./V/design/header.tpl");
                echo "<h2 style='margin:20px;'>Mes messages envoyés</h2>";
                echo "<center><table class='table table-hover'  style='width:50%'>
                    <thead>
                        <tr class='table-success'>
                        <th scope='col'>Destinataire</th>
                        <th scope='col'>Contenu du message</th>
                        </tr>
                    </thead>
                    <tbody>";
                if (empty($resultat)) {
                    $no_msg = "Vous n'avez pas encore envoyé de messages.";
                    
                }
				foreach ($resultat as $tuple) {
                    
                    echo "<tr class='table-primary'>";
                    echo "<td>" . getDestinataire($tuple['id_dest']) . "</td>";
                    echo "<td>" . $tuple['contenu'] . "</td>";   
                    echo "</tr>";
                   
                }
                echo "</tbody></table>";
                echo $no_msg . "</center>";
            }
        } catch (PDOException $e) {
            echo utf8_encode("Echec de modification : " . $e->getMessage() . "\n");
            die(); // On arrête tout.
        }
}

function getDestinataire($id_src) {
    require ("./M/connectBD.php") ;
    
    $sql="SELECT * FROM prof WHERE id_prof=:id_src";
		try {
            $commande = $pdo->prepare($sql);
            $commande->bindParam(':id_src', $id_src);
			$bool = $commande->execute(); // true si bien executée
			if ($bool) {
                $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements

				foreach ($resultat as $tuple) {
                 $nom = $tuple['prenom'] . " " . $tuple['nom'];   
                }
                return $nom;
            }
        } catch (PDOException $e) {
            echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
            die(); // On arrête tout.
        }
        return "";
}



?>