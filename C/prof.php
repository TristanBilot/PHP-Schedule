<?php

function chercher_eleves() {
    $url = "./V/utilisateur/etudiants/liste_etudiants.tpl";
	require("./V/design/header.tpl");
	require($url); // on affiche la page compte avec msg de succes
}

function lister_etudiants() {
    $groupe=  isset($_POST['groupe'])?($_POST['groupe']):'';
    require ("./M/connectBD.php") ;
    $sql="SELECT * FROM etudiant e, groupe g WHERE e.id_grpe = g.id_grpe AND e.id_grpe=:groupe";
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':groupe', $groupe);
			$bool = $commande->execute(); 
			if ($bool) {
                $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); 
                require("./V/design/header.tpl");
                require("./V/utilisateur/etudiants/liste_etudiants.tpl");
                echo "<center><table class='table table-hover'  style='width:50%'>
                    <thead>
                        <tr class='table-success'>
                        <th scope='col'>Groupe</th>
                        <th scope='col'>Prenom</th>
                        <th scope='col'>Nom</th>
                        <th scope='col'>Adresse email</th>
                        </tr>
                    </thead>
                    <tbody>";
                       
				foreach ($resultat as $tuple) {
                    echo "<tr class='table-active'>";
                    echo "<td>" . $tuple['id_grpe'] . "</td>";
                    echo "<td>" . $tuple['prenom'] . "</td>";
                    echo "<td>" . $tuple['nom'] . "</td>";
                    echo "<td>" . $tuple['email'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody></table></center>";
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); 
		}
}

function users_connectes() {
    require ("./M/connectBD.php") ;
    $sql="SELECT * FROM etudiant WHERE bConnect=1";
		try {
			$commande = $pdo->prepare($sql);
			$bool = $commande->execute(); 
			if ($bool) {
                $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); 
                require("./V/design/header.tpl");
                require("./V/utilisateur/users/connected_users.tpl");
                echo "<center><table class='table table-hover'  style='width:50%'>
                    <thead>
                        <tr class='table-success'>
                        <th scope='col'>Statut</th>
                        <th scope='col'>Prenom</th>
                        <th scope='col'>Nom</th>
                        <th scope='col'>Adresse email</th>
                        <th scope='col'>Contacter</th>
                        </tr>
                    </thead>
                    <tbody>";
                       
				foreach ($resultat as $tuple) {
                    $id_dest = $tuple['id_etu'];
                    $nom_complet_dest = $tuple['prenom'] . " " . $tuple['nom'];
                    
                    echo "<tr class='table-active'>";
                    echo "<td>Elève</td>";
                    echo "<td>" . $tuple['prenom'] . "</td>";
                    echo "<td>" . $tuple['nom'] . "</td>";
                    echo "<td>" . $tuple['email'] . "</td>";                    
                    echo "<td><form action='index.php?controle=message&action=msg_press' method='post'>
                    <input name='id_dest' type='hidden' value='$id_dest'/>
                    <input name='nom_complet_dest' type='hidden' value='$nom_complet_dest'/>
                    <input type= 'submit' value= 'Message' class='btn btn-success btn-sm'/></td>";
                    echo "</form>";
                    echo "</tr>";
                }
            }
            $sql="SELECT * FROM prof WHERE bConnect=1";
            $commande = $pdo->prepare($sql);
			$bool = $commande->execute(); 
			if ($bool) {                
                $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); 
                foreach ($resultat as $tuple) {
                    $id_dest = $tuple['id_prof'];
                    $nom_complet_dest = $tuple['prenom'] . " " . $tuple['nom'];
                    echo "<tr class='table-active'>";
                    echo "<td>Professeur</td>";
                    echo "<td>" . $tuple['prenom'] . "</td>";
                    echo "<td>" . $tuple['nom'] . "</td>";
                    echo "<td>" . $tuple['email'] . "</td>";
                    echo "<td><form action='index.php?controle=message&action=msg_press' method='post'>
                    <input name='id_dest' type='hidden' value='$id_dest'/>
                    <input name='nom_complet_dest' type='hidden' value='$nom_complet_dest'/>
                    <input type= 'submit' value= 'Message' class='btn btn-success btn-sm'/></td>";
                    echo "</form>";
                    echo "</tr>";
                }
            }
            echo "</tbody></table></center>";
            
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); 
		}
}

function press_lister_profs() {
    lister_profs();
}

function press_activer_notif() {
    require("./V/design/header.tpl");
    require("./V/utilisateur/users/activer_notifs.tpl");
}

function lister_profs() {
    $matiere = isset($_POST['matiere'])?($_POST['matiere']):'';
    require ("./M/connectBD.php") ;
    $sql="SELECT * FROM prof p, prof_roles r WHERE p.id_prof = r.id_prof";
		try {
			$commande = $pdo->prepare($sql);
			$bool = $commande->execute(); 
			if ($bool) {
                $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); 
                require("./V/design/header.tpl");
                echo "<h2 style='margin:20px;'>Liste des professeurs par matière</h2>";
                echo "<center><table class='table table-hover'  style='width:50%'>
                    <thead>
                        <tr class='table-success'>
                        <th scope='col'>Rôle</th>
                        <th scope='col'>Prenom</th>
                        <th scope='col'>Nom</th>
                        <th scope='col'>Adresse email</th>
                        </tr>
                    </thead>
                    <tbody>";
                       
				foreach ($resultat as $tuple) {
                    echo "<tr class='table-active'>";
                    echo "<td>" . $tuple['label'] . "</td>";
                    echo "<td>" . $tuple['prenom'] . "</td>";
                    echo "<td>" . $tuple['nom'] . "</td>";
                    echo "<td>" . $tuple['email'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody></table></center>";
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); 
		}
}

function press_changer_couleur() {
    require("./V/design/header.tpl");
    require("./V/utilisateur/users/changer_couleur.tpl");
}

function changer_couleur() {
    $couleur = isset($_POST['radio'])?($_POST['radio']):'';
    $id = $_SESSION['id'];
    require ("./M/connectBD.php") ;
    $sql="UPDATE prof SET couleur=:couleur WHERE id_prof=:id";
		try {
			$commande = $pdo->prepare($sql);
            $commande->bindParam(':couleur', $couleur);
            $commande->bindParam(':id', $id);
            
			$bool = $commande->execute(); 
			if ($bool) {
                require("./V/design/header.tpl");
                require("./V/utilisateur/users/changer_couleur.tpl");
                echo "<center><p class='text-success'>Votre couleur a bien été changée !</p>";
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); 
        }
        //refresh();
 }

 function changerLabelMatière() {
    $id = $_SESSION['id'];
    require("./M/connectBD.php") ;
    $sql="SELECT * FROM matiere WHERE id_mat=:id_objet";
		try {
			$commande = $pdo->prepare($sql);
            $commande->bindParam(':id_objet', $_SESSION['id_objet']);
            
			$bool = $commande->execute(); 
			if ($bool) {
                $resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
                require("./V/design/header.tpl");
                foreach ($resultat as $tuple) {
                    $label = $tuple['label'];
                }
                
                require("./V/utilisateur/users/changerLabelMatiere.tpl");
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); 
        }
 }

 function setNewLabel() {
    require("./M/connectBD.php") ;
    $new_label = isset($_POST['new_label'])?($_POST['new_label']):'';
    $sql="UPDATE matiere SET label=:new_label WHERE id_mat=:id_objet";
		try {
			$commande = $pdo->prepare($sql);
            $commande->bindParam(':id_objet', $_SESSION['id_objet']);
            $commande->bindParam(':new_label', $new_label);
            
			$bool = $commande->execute(); 
			if ($bool) {
                require("./V/design/header.tpl");
                require("./V/utilisateur/users/changerLabelMatiere.tpl");
                echo "<p class='text-success'> Le label a bien été changé !</p>";
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); 
        }
 }

 function getMatière($id_mat) {
    require('./M/connectBD.php');
    $sql="SELECT * FROM `matiere` WHERE id_mat=:id_mat";
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':id_mat', $id_mat);
		$bool = $commande->execute();
		if ($bool) {
			$resultat = $commande->fetchAll(PDO::FETCH_ASSOC); 
		}
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); 
    }
    if (count($resultat) != 0) {
		foreach ($resultat as $tuple) {
            return $tuple['label'];
        }
    }
}

 function listerMatières() {
    require ("./M/connectBD.php") ;
    $sql="SELECT * FROM matiere;";
		try {
            $commande = $pdo->prepare($sql);
			$bool = $commande->execute();
			if ($bool) {
                $resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
                require("./V/design/header.tpl");
                echo "<form style='margin:40px;margin-left:100px' action='index.php?controle=prof&action=modifMatières' method='post'>";
                echo "<p> Choisissez la matière</p>";
                echo "<select name='matieres'>";
				foreach ($resultat as $tuple) {
                    $couleur = $tuple['label'];
                    $matiere = getMatière($tuple['id_mat']);
                    echo "<option style='color:$couleur' value = '$matiere'>$matiere ";
                }
                echo "</select>";
                echo "<div style='margin-top:20px'>";
                echo "<p> Choisissez la couleur</p>";
                require("./V/utilisateur/users/colors.tpl");
                echo "</div>";
                echo "<input type= 'submit' value= 'Modifier' class='btn btn-success' style='margin:20px;'/>";                       
                echo "</form>";
            }
        } catch (PDOException $e) {
            echo utf8_encode("Echec de modification : " . $e->getMessage() . "\n");
            die(); 
        }
 }

 function modifMatières() {
    $matiere=  isset($_POST['matieres'])?($_POST['matieres']):'';
    $couleur=  isset($_POST['radio'])?($_POST['radio']):'';
    require ("./M/connectBD.php") ;
    $sql="UPDATE matiere SET couleur=:couleur WHERE label=:matiere";
		try {
			$commande = $pdo->prepare($sql);
            $commande->bindParam(':couleur', $couleur);
            $commande->bindParam(':matiere', $matiere);
            
			$bool = $commande->execute(); 
			if ($bool) {
                listerMatières();
                echo "<center><p class='text-success'>Votre couleur a bien été changée !</p>";
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); 
        }
 }

 function refresh() {
	$user = $_SESSION['type_user'];
	$pw = $_SESSION['pw'];
	$id = $_SESSION['id'];
	session_destroy();
	if ($user == "etu") {
		loadEtudiant($id, $pw);
	}
	else if ($user == "prof") {
		loadProf($id, $pw);
	}
}

function displayTypeEnsPage() {
    require("./V/design/header.tpl");
    require("./V/utilisateur/users/changerTypeE.tpl");
}

function setNewTypeEns() { // set d'un nouveau type d'ensegnement 
    require("./M/connectBD.php") ;
    $id = $_SESSION['id'];
    $sql="SELECT typeEns, id_mat FROM matiere m, prof_roles p WHERE m.id_mat=p.id_objet AND p.id_prof=:id_prof";
		try {
            $commande = $pdo->prepare($sql);
            $commande->bindParam(':id_prof',$_SESSION['id']);
			$bool = $commande->execute();
			if ($bool) {
                $resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
               

                
                //var_dump($resultat[0]);
                $obj = json_decode($resultat[0]['typeEns'], true);
                //$obj = json_decode($obj, true);
                //var_dump($obj);
                //echo $obj["A"][0];
                if(isset($_POST["typeA"]) && isset($_POST["tempsA"]) && $_POST["typeA"] != "" && $_POST["tempsA"] != ""){
                    $A[0] = $_POST["typeA"];
                    $A[1] = (float) $_POST["tempsA"];
                    $obj["A"] = $A;
                }
                if(isset($_POST["typeM"]) && isset($_POST["tempsM"]) && $_POST["typeM"] != "" && $_POST["tempsM"] != ""){
                    $M[0] = $_POST["typeM"];
                    $M[1] = (float) $_POST["tempsM"];
                    $obj["M"] = $M;
                }
                if(isset($_POST["typeT"]) && isset($_POST["tempsT"]) && $_POST["typeT"] != "" && $_POST["tempsT"] != ""){
                    $T[0] = $_POST["typeT"];
                    $T[1] = (float) $_POST["tempsT"];
                    $obj["T"] = $T;
                }
                $obj = json_encode($obj);
                // echo $obj;
                // echo $resultat[0]['id_mat'][0];
                setBDDNewTypeEns($obj, $resultat[0]['id_mat'][0]);
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); 
        }
 }

function setBDDNewTypeEns($json, $id_mat) { // set d'un nouveau type d'ensegnement 
    require("./M/connectBD.php") ;
    $sql="UPDATE matiere SET typeEns=:json WHERE id_mat=:id_mat";
		try {
            $commande = $pdo->prepare($sql);
            $commande->bindParam(':json',$json);
            $commande->bindParam(':id_mat',$id_mat);
			$bool = $commande->execute();
            if ($bool) {
                displayTypeEnsPage();
                echo "<p class='text-success'> Le type d'enseignement a bien été changé !</p>";
            }
        }
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); 
        }
 }

function displayExportPage() {
    require("./V/design/header.tpl");
    require("./V/utilisateur/users/exportbd.tpl");
}

function export(){
    require("./M/connectBD.php");
    
    $id = $_SESSION['id'];
    $sql="SELECT * FROM `creneau`;";
    try {
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':id', $id);
		$bool = $commande->execute();
		if ($bool) {
            $resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($resultat);
            date_default_timezone_set('UTC');
            $chemin = 'Mes cours générés le ' . date('H:i:s') . '.csv';
            $delimiteur = ','; 
            $fichier_csv = fopen($chemin, 'w+');
            fprintf($fichier_csv, chr(0xEF).chr(0xBB).chr(0xBF));

            // Boucle foreach sur chaque ligne du tableau
            foreach($resultat as $ligne){
                // $tuple['tDeb'] = date('H:i', $tuple['tDeb']);
                //     $tuple['tFin'] = date('H:i', $tuple['tFin']);
                // chaque ligne en cours de lecture est insérée dans le fichier
                // les valeurs présentes dans chaque ligne seront séparées par $delimiteur
                fputcsv($fichier_csv, $ligne, $delimiteur);
            }
        // fermeture du fichier csv
        fclose($fichier_csv);
        }
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); 
    }
    
    require("./V/design/header.tpl");
    require("./V/utilisateur/users/exportbd.tpl");
    echo "<p class='text-success'>Votre fichier a été généré !</p>";
}

function listerIntervenants() {
    displayListerIntervenants();
    require ("./M/connectBD.php") ;
    // intervenants avec bResp = 0 dans la bdd
    $sql="SELECT * FROM prof p, prof_roles r WHERE r.bResp = 0 AND p.id_prof = r.id_prof";
		try {
			$commande = $pdo->prepare($sql);
			$bool = $commande->execute(); 
			if ($bool) {
                $resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
                echo "<h2 style='margin:20px;'>Liste des intervenants par matière</h2>";
                echo "<center><table class='table table-hover'  style='width:50%'>
                    <thead>
                        <tr class='table-success'>
                        <th scope='col'>Rôle</th>
                        <th scope='col'>Prenom</th>
                        <th scope='col'>Nom</th>
                        <th scope='col'>Adresse email</th>
                        </tr>
                    </thead>
                    <tbody>";
                       
				foreach ($resultat as $tuple) {
                    echo "<tr class='table-active'>";
                    echo "<td>" . $tuple['label'] . "</td>";
                    echo "<td>" . $tuple['prenom'] . "</td>";
                    echo "<td>" . $tuple['nom'] . "</td>";
                    echo "<td>" . $tuple['email'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody></table></center>";
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); 
		}
}

function displayListerIntervenants() {
    require("./V/design/header.tpl");
    require("./V/utilisateur/users/listerIntervenants.tpl");
}
?>