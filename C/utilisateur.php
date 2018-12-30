<?php 
//fichier de controle - services de gestion des utilisateurs
// les fonctions d'un fichier de contr�le sont appel�es des actions

function ident() {
	
	$_SESSION['nom'] = '';

	$nom=  isset($_POST['id'])?($_POST['id']):'';
	$num=  isset($_POST['pw'])?($_POST['pw']):'';
	$msg='';
	
	if  (count($_POST)==0) {
		require ("./V/utilisateur/ident.tpl") ;
	}
	else {
		require ("./M/utilisateurBD.php") ;
	if  (! verif_ident($nom,$num)) {
					$msg ="erreur de saisie";
					require ("./V/utilisateur/ident.tpl") ;
	}
	else { 
					$_SESSION['nom'] = $nom;
					$url = "index.php?controle=utilisateur&action=accueil";
					header ("Location:" . $url); 
	}
	}	
}

function verif_ident() { // etudiant
	$id=  isset($_POST['id'])?($_POST['id']):'';
	$pw=  isset($_POST['pw'])?($_POST['pw']):'';
	require('./M/connectBD.php'); 
		$sql="SELECT * FROM `etudiant` WHERE login_etu=:id AND pass_etu=:pw";
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':id', $id);
			$commande->bindParam(':pw', $pw);
			
			$bool = $commande->execute(); 
			if ($bool) {
				$resultat = $commande->fetchAll(PDO::FETCH_ASSOC); 
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); 
		}
		if (count($resultat) == 0) {
			if (!ident_prof()) {
				// if (!ident_resp()) {
					$url = "index.php?controle=utilisateur&action=errorConnection";
					header ("Location:" . $url); 
					return false; 
				// }
			}
		}
		
		else {
			loadEtudiant($id, $pw);
			$url = "index.php?controle=utilisateur&action=accueil";
			header ("Location:" . $url); 
			return true;
		}
}

function ident_prof() {
	$id=  isset($_POST['id'])?($_POST['id']):'';
	$pw=  isset($_POST['pw'])?($_POST['pw']):'';
	require('./M/connectBD.php'); 
		$sql="SELECT * FROM `prof` WHERE login_prof=:id AND pass_prof=:pw";
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':id', $id);
			$commande->bindParam(':pw', $pw);
			
			$bool = $commande->execute(); 
			if ($bool) {
				$resultat = $commande->fetchAll(PDO::FETCH_ASSOC); 
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); 
		}
		if (count($resultat) == 0) {
			$url = "index.php?controle=utilisateur&action=errorConnection";
			header ("Location:" . $url); 
			return false; 
		}
		else {
			if(loadProf($id, $pw)) { // Connecte Prof
				if (!loadGerantEDT()) { // regarde si c'est un gerant edt
					loadGerantMat(); // regarde si c'est un gérant de matière
				}
			}
			loadCreneau();
			$url = "index.php?controle=utilisateur&action=accueil";
			header ("Location:" . $url); 
			return true;
		}
}

function loadGerantMat() {
	require('./M/connectBD.php');
	$sql="SELECT * FROM `prof_roles` WHERE id_prof=:id AND bResp='1' AND objet='matiere';";
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':id', $_SESSION['id']);
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
			$_SESSION['type_user'] = "respMat";
			$_SESSION['label_role'] = $tuple['label'];
			$_SESSION['id_objet'] = $tuple['id_objet'];
		}
		return true;
	}
	return false;
}

function loadGerantEDT() {
	require('./M/connectBD.php'); 
	$sql="SELECT * FROM `prof_roles` WHERE id_prof=:id AND bResp='1' AND objet='edt';";
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':id', $_SESSION['id']);
		
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
			$_SESSION['type_user'] = "respEDT";
			$_SESSION['label_role'] = $tuple['label'];
			$_SESSION['id_objet'] = $tuple['id_objet'];
		}
		return true;
	}
	return false;
}

function loadProf($id, $pw) {
	require('./M/connectBD.php'); 
	$sql="SELECT * FROM `prof` WHERE login_prof=:id AND pass_prof=:pw";
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':id', $id);
		$commande->bindParam(':pw', $pw);
		
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
			$_SESSION['id'] = $tuple['id_prof'];
			$_SESSION['pw'] = $tuple['pass_prof'];
			$_SESSION['prenom'] = $tuple['prenom'];
			$_SESSION['nom'] = $tuple['nom'];
			$_SESSION['email'] = $tuple['email'];
			$_SESSION['genre'] = $tuple['genre'];
			$_SESSION['label'] = $tuple['label'];
			$_SESSION['date'] = $tuple['date_prof'];
			$_SESSION['urlPhoto'] = $tuple['urlPhoto'];
			$_SESSION['couleur'] = $tuple['couleur'];
			$_SESSION['bConnect'] = $tuple['bConnect'];
			$_SESSION['nom_complet'] = $tuple['prenom'] . " " . $tuple['nom'];
			$_SESSION['bConnect'] = 1;	
		}
		$_SESSION['login'] = $id;
		$_SESSION['type_user'] = "prof";
		setPresent();
		return true;
	}
	return false;
}

function loadEtudiant($id, $pw) {
	require('./M/connectBD.php'); 
	$sql="SELECT * FROM `etudiant` WHERE login_etu=:id AND pass_etu=:pw";
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':id', $id);
		$commande->bindParam(':pw', $pw);
		
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
			$_SESSION['id'] = $tuple['id_etu'];
			$_SESSION['pw'] = $tuple['pass_etu'];
			$_SESSION['prenom'] = $tuple['prenom'];
			$_SESSION['nom'] = $tuple['nom'];
			$_SESSION['email'] = $tuple['email'];
			$_SESSION['genre'] = $tuple['genre'];
			$_SESSION['id_grpe'] = $tuple['id_grpe'];
			$_SESSION['id_promo'] = $tuple['id_promo'];
			$_SESSION['urlPhoto'] = $tuple['urlPhoto'];
			$_SESSION['matricule'] = $tuple['matricule'];
			$_SESSION['bConnect'] = $tuple['bConnect'];
			$_SESSION['date'] = $tuple['date_etu'];
			$_SESSION['nom_complet'] = $tuple['prenom'] . " " . $tuple['nom'];	
			$_SESSION['bConnect'] = 1;		
		}
		$_SESSION['login'] = $id;
		$_SESSION['type_user'] = "etu";
		setPresent();
		return true;
	}
}

function loadCreneau() {
	require('./M/connectBD.php'); 
	$sql="SELECT * FROM `creneau` WHERE id_prof=:id";
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':id', $_SESSION['id']);
		
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
			$_SESSION['id_creneau'] = $tuple['id_creneau'];
			$_SESSION['tDeb'] = $tuple['tDeb'];
			$_SESSION['tFin'] = $tuple['tFin'];
			$_SESSION['id_edth'] = $tuple['id_edth'];
			$_SESSION['id_mat'] = $tuple['id_mat'];
			$_SESSION['id_prof'] = $tuple['id_prof'];
			$_SESSION['id_grpe'] = $tuple['id_grpe'];
			$_SESSION['id_salle'] = $tuple['id_salle'];
		}
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

function deconnexion() {
	$url = "index.php";
	$msg = "Vous avez bien été déconnecté !";
	header("Location:" .$url);
	session_destroy();
	setAbsent();
}

function compte() {
	$url = "./V/utilisateur/compte/compte.tpl";
	require("./V/design/header.tpl");
	require($url);
} 

function modifier_compte() {
	compte();
	require("./V/utilisateur/compte/modifier_compte.tpl");
}

function modif_login() {
	$new_login=  isset($_POST['new_login'])?($_POST['new_login']):'';
	$id = $_SESSION['id'];
	$type = $_SESSION['type_user'];
	if ($type == "etu") { // new_login
		require("./M/connectBD.php");
		$sql="UPDATE etudiant SET login_etu=:new_login WHERE id_etu=:id_etu";
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':new_login', $new_login);
			$commande->bindParam(':id_etu', $id);
			
			
			$bool = $commande->execute(); 
			if ($bool) {
				$msg = "<p class='text-success'>Modification effectuée avec succès !</p>";
				$url = "./V/utilisateur/compte/compte.tpl";
				require("./V/design/header.tpl");
				require($url); // on affiche la page compte avec msg de succes
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de modification : " . $e->getMessage() . "\n");
			die(); 
		}

	} else if ($type == "prof") {
		require("./M/connectBD.php");
		$sql="UPDATE prof SET login_prof=:new_login WHERE id_prof=:id_prof";
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':new_login', $new_login);
			$commande->bindParam(':id_prof', $id);
			
			
			$bool = $commande->execute(); 
			if ($bool) {
				$msg = "<p class='text-success'>Modification effectuée avec succès !</p>";
				$url = "./V/utilisateur/compte/compte.tpl";
				require("./V/design/header.tpl");
				require($url); // on affiche la page compte avec msg de succes
			}
		
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de modification : " . $e->getMessage() . "\n");
			die(); 
		}
	}
}

function modif_pw() {
	$new_pw=  isset($_POST['new_pw'])?($_POST['new_pw']):'';
	$id = $_SESSION['id'];
	$type = $_SESSION['type_user'];
	if ($type == "etu") { 
		require("./M/connectBD.php");
		$sql="UPDATE etudiant SET pass_etu=:new_pw WHERE id_etu=:id_etu";
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':new_pw', $new_pw);
			$commande->bindParam(':id_etu', $id);
			
			
			$bool = $commande->execute(); 
			if ($bool) {
				$msg = "<p class='text-success'>Modification effectuée avec succès !</p>";
				$url = "./V/utilisateur/compte/compte.tpl";
				require("./V/design/header.tpl");
				require($url); // on affiche la page compte avec msg de succes
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de modification : " . $e->getMessage() . "\n");
			die(); 
		}

	} else if ($type == "prof") {
		require("./M/connectBD.php");
		$sql="UPDATE prof SET pass_prof=:new_pw WHERE id_prof=:id_prof";
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':new_pw', $new_pw);
			$commande->bindParam(':id_prof', $id);
			
			
			$bool = $commande->execute(); 
			if ($bool) {
				$msg = "<p class='text-success'>Modification effectuée avec succès !</p>";
				$url = "./V/utilisateur/compte/compte.tpl";
				require("./V/design/header.tpl");
				require($url); // on affiche la page compte avec msg de succes
			}
		
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de modification : " . $e->getMessage() . "\n");
			die(); 
		}
	}
}

function modif_email() {
	$new_email=  isset($_POST['new_email'])?($_POST['new_email']):'';
	$id = $_SESSION['id'];
	$type = $_SESSION['type_user'];
	if ($type == "etu") { 
		require("./M/connectBD.php");
		$sql="UPDATE etudiant SET email=:new_email WHERE id_etu=:id_etu";
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':new_email', $new_email);
			$commande->bindParam(':id_etu', $id);
			
			
			$bool = $commande->execute(); 
			if ($bool) {
				$msg = "<p class='text-success'>Modification effectuée avec succès !</p>";
				$url = "./V/utilisateur/compte/compte.tpl";
				require("./V/design/header.tpl");
				require($url); // on affiche la page compte avec msg de succes
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de modification : " . $e->getMessage() . "\n");
			die(); 
		}

	} else if ($type == "prof") {
		require("./M/connectBD.php");
		$sql="UPDATE prof SET email=:new_email WHERE id_prof=:id_prof";
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':new_email', $new_email);
			$commande->bindParam(':id_prof', $id);
			
			
			$bool = $commande->execute(); 
			if ($bool) {
				$msg = "<p class='text-success'>Modification effectuée avec succès !</p>";
				$url = "./V/utilisateur/compte/compte.tpl";
				require("./V/design/header.tpl");
				require($url); // on affiche la page compte avec msg de succes
			}
		
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de modification : " . $e->getMessage() . "\n");
			die(); 
		}
	}
}

function modif_couleur() {
	$new_couleur=  isset($_POST['new_couleur'])?($_POST['new_couleur']):'';
	$id = $_SESSION['id'];
	$type = $_SESSION['type_user'];
		require("./M/connectBD.php");
		$sql="UPDATE prof SET couleur=:new_couleur WHERE id_prof=:id_prof";
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':new_couleur', $new_couleur);
			$commande->bindParam(':id_prof', $id);
			
			
			$bool = $commande->execute(); 
			if ($bool) {
				$msg = "<p class='text-success'>Modification effectuée avec succès !</p>";
				$url = "./V/utilisateur/compte/compte.tpl";
				require("./V/design/header.tpl");
				require($url); // on affiche la page compte avec msg de succes
			}
		
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de modification : " . $e->getMessage() . "\n");
			die(); 
		}
	
}

function errorConnection() {
	$msg = "<p class='text-danger'>Connexion échouée.</p>";
	require('./V/utilisateur/ident.tpl');
	
}

function accueil() {
	$nom = $_SESSION['nom'] ;
	require ("./V/utilisateur/accueil.tpl");
}

function setPresent() {
	$id = $_SESSION['id'];
	$type = $_SESSION['type_user'];
	require("./M/connectBD.php");
	if ($type == "etu") { 
		$sql="UPDATE etudiant SET bConnect=1 WHERE id_etu=:id";
	}
	else if ($type == "prof") {
		$sql="UPDATE prof SET bConnect=1 WHERE id_prof=:id";
	}
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':id', $id);
		$bool = $commande->execute();
		
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de modification : " . $e->getMessage() . "\n");
		die(); 
	}
}

function setAbsent() {
	$id = $_SESSION['id'];
	$type = $_SESSION['type_user'];
	require("./M/connectBD.php");
	if ($type == "etu") { 
		$sql="UPDATE etudiant SET bConnect=0 WHERE id_etu=:id";
	}
	else if ($type == "prof") {
		$sql="UPDATE prof SET bConnect=0 WHERE id_prof=:id";
	}
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':id', $id);
		$bool = $commande->execute();
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de modification : " . $e->getMessage() . "\n");
		die(); 
	}
}


?>

<html>
<link rel = "stylesheet" href="https://bootswatch.com/4/slate/bootstrap.min.css"/>
<link rel = "stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">        
<link rel = "stylesheet" href="./V/styleCSS/style.css"/>
</html>