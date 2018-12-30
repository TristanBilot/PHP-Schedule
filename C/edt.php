<?php

function afficher($id_creneau) {
    require("./V/design/header.tpl");  
    require('./M/connectBD.php');

    viderVar();
    if ($id_creneau < 0 || $id_creneau > countCreneaux()) {
        echo "<p class='text-danger'> Le créneau est inatteignable </p>";
        $sql="SELECT DISTINCT id_mat, id_prof, id_grpe FROM `creneau`";
    $commande = $pdo->prepare($sql);
    
	try {
		$bool = $commande->execute();
		if ($bool) {
			$res = $commande->fetchAll(PDO::FETCH_ASSOC);
            $idMat;
            $idProf;
            $idGrpe;
            $i = 0;
            foreach ($res as $tuple) {
                $idMat[$i] = $tuple['id_mat'];
                $idProf[$i] = $tuple['id_prof'];
                $idGrpe[$i] = $tuple['id_grpe'];
                $i++;
            }
            $idMat = array_unique($idMat);
            $idProf = array_unique($idProf);
            $idGrpe = array_unique($idGrpe);
            echo '<form action="index.php?controle=edt&action=afficherTri&parametre="' . ($id_creneau-1) . '" method="post" style="width:400px;">';
            echo '<label>Trier par matière</label><select name="matiere" class="form-control selMat"><option></option>';
            foreach ($idMat as $tuple) {
                echo ('<option value="' . $tuple . '">' . getMatière($tuple) . '</option>');
            }
            echo '</select>';

            echo '<label>Trier par professeur</label><select name="professeur" class="form-control selPro"><option></option>';
            foreach ($idProf as $tuple) {
                echo ('<option value="' . $tuple . '">' . getProf($tuple) . '</option>');
            }
            echo '</select>';

            echo '<label>Trier par groupe</label><select name="groupe" class="form-control selGrp"><option></option>';
            foreach ($idGrpe as $tuple) {
                echo ('<option value="' . $tuple . '">' . $tuple . '</option>');
            }
            echo '</select>';
            echo '<input type="submit" class="btn btn-success btn-sm"/>';
            echo '</form>';
		}
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
    }
        require("./V/utilisateur/edt/edt.tpl");
        echo "<br><br><div style='margin-left:200px'>";
        echo "<a class='btn btn-primary' href=index.php?controle=edt&action=afficher&parametre=".($id_creneau-1)." class='button'><i class='fas fa-arrow-left'></i>&nbsp;Semaine Précedente</a>"; 
        echo "<a class='btn btn-primary' href=index.php?controle=edt&action=afficher&parametre=".($id_creneau+1)." class='button'>Semaine Suivante&nbsp;<i class='fas fa-arrow-right'></i></a>";
        echo "</div><br><br>";  
    } 
    else {
    if ($_SESSION['type_user'] == "prof" || $_SESSION['type_user'] == "respEDT" || $_SESSION['type_user'] == "respMat") {
        $sql="SELECT * FROM `creneau` WHERE id_prof=:id_prof AND id_creneau=:id_creneau";
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':id_prof', $_SESSION['id']);
        $commande->bindParam(':id_creneau', $id_creneau);
    }
    else if ($_SESSION['type_user'] == "etu") {
        $sql="SELECT * FROM `creneau` WHERE id_grpe=:id_grpe AND id_creneau=:id_creneau";
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':id_grpe', $_SESSION['id_grpe']);
        $commande->bindParam(':id_creneau', $id_creneau);
    }
	try {
		$bool = $commande->execute();
		if ($bool) {
			$resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
		}
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
    }
    $sql="SELECT DISTINCT id_mat, id_prof, id_grpe FROM `creneau`";
    $commande = $pdo->prepare($sql);
    
	try {
		$bool = $commande->execute();
		if ($bool) {
			$res = $commande->fetchAll(PDO::FETCH_ASSOC);
            $idMat;
            $idProf;
            $idGrpe;
            $i = 0;
            foreach ($res as $tuple) {
                $idMat[$i] = $tuple['id_mat'];
                $idProf[$i] = $tuple['id_prof'];
                $idGrpe[$i] = $tuple['id_grpe'];
                $i++;
            }
            $idMat = array_unique($idMat);
            $idProf = array_unique($idProf);
            $idGrpe = array_unique($idGrpe);
            echo '<form action="index.php?controle=edt&action=afficherTri&parametre="' . ($id_creneau-1) . '" method="post" style="width:400px;">';
            echo '<label>Trier par matière</label><select name="matiere" class="form-control selMat"><option></option>';
            foreach ($idMat as $tuple) {
                echo ('<option value="' . $tuple . '">' . getMatière($tuple) . '</option>');
            }
            echo '</select>';

            echo '<label>Trier par professeur</label><select name="professeur" class="form-control selPro"><option></option>';
            foreach ($idProf as $tuple) {
                echo ('<option value="' . $tuple . '">' . getProf($tuple) . '</option>');
            }
            echo '</select>';

            echo '<label>Trier par groupe</label><select name="groupe" class="form-control selGrp"><option></option>';
            foreach ($idGrpe as $tuple) {
                echo ('<option value="' . $tuple . '">' . $tuple . '</option>');
            }
            echo '</select>';
            echo '<input type="submit" class="btn btn-success btn-sm"/>';
            echo '</form>';
		}
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
    }
    
    $_SESSION['promo'] = getPromo();
    if (isset($resultat) && count($resultat) != 0) {
        date_default_timezone_set('Europe/Paris');
        
		foreach ($resultat as $tuple) {

            $durée = date('H', $tuple['tFin']) - date('H', $tuple['tDeb']);
            
            if (date('l', $tuple['tDeb']) == "Monday") {
                if (date('H:i', $tuple['tDeb']) == "08:00" ) {
                    $_SESSION['monday8_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['monday8_dur'] = $durée;
                    $_SESSION['monday8_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['monday8_nom'] = getNom($tuple['id_mat']);
                    $_SESSION['monday8_pro'] = getProf($tuple['id_prof']);
                    $_SESSION['monday8_sal'] = getSalle($tuple['id_salle']);
                }
                if (date('H:i', $tuple['tDeb']) == "09:30" ) {
                    $_SESSION['monday930_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['monday930_dur'] = $durée;
                    $_SESSION['monday930_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['monday930_nom'] = getNom($tuple['id_mat']);
                }
                if (date('H:i', $tuple['tDeb']) == "11:00" ) {
                    $_SESSION['monday11_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['monday11_dur'] = $durée;
                    $_SESSION['monday11_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['monday11_nom'] = getNom($tuple['id_mat']);
                }
                if (date('H:i', $tuple['tDeb']) == "14:00" ) {
                    $_SESSION['monday14_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['monday14_dur'] = $durée;
                    $_SESSION['monday14_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['monday14_nom'] = getNom($tuple['id_mat']);
                    $_SESSION['monday14_pro'] = getProf($tuple['id_prof']);
                    $_SESSION['monday14_sal'] = getSalle($tuple['id_salle']);
                }
                if (date('H:i', $tuple['tDeb']) == "15:30" ) {
                    $_SESSION['monday1530_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['monday1530_dur'] = $durée;
                    $_SESSION['monday1530_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['monday1530_nom'] = getNom($tuple['id_mat']);
                }
                if (date('H:i', $tuple['tDeb']) == "17:00" ) {
                    $_SESSION['monday17_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['monday17_dur'] = $durée;
                    $_SESSION['monday17_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['monday17_nom'] = getNom($tuple['id_mat']);
                }
            }

            if (date('l', $tuple['tDeb']) == "Tuesday") {
                if (date('H:i', $tuple['tDeb']) == "08:00" ) {
                    $_SESSION['tuesday8_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['tuesday8_dur'] = $durée;
                    $_SESSION['tuesday8_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['tuesday8_nom'] = getNom($tuple['id_mat']);
                    $_SESSION['tuesday8_pro'] = getProf($tuple['id_prof']);
                    $_SESSION['tuesday8_sal'] = getSalle($tuple['id_salle']);
                }
                if (date('H:i', $tuple['tDeb']) == "09:30" ) {
                    $_SESSION['tuesday930_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['tuesday930_dur'] = $durée;
                    $_SESSION['tuesday930_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['tuesday930_nom'] = getNom($tuple['id_mat']);
                }
                if (date('H:i', $tuple['tDeb']) == "11:00" ) {
                    $_SESSION['tuesday11_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['tuesday11_dur'] = $durée;
                    $_SESSION['tuesday11_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['tuesday11_nom'] = getNom($tuple['id_mat']);
                }
                if (date('H:i', $tuple['tDeb']) == "14:00" ) {
                    $_SESSION['tuesday14_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['tuesday14_dur'] = $durée;
                    $_SESSION['tuesday14_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['tuesday14_nom'] = getNom($tuple['id_mat']);
                    $_SESSION['tuesday14_pro'] = getProf($tuple['id_prof']);
                    $_SESSION['tuesday14_sal'] = getSalle($tuple['id_salle']);
                }
                if (date('H:i', $tuple['tDeb']) == "15:30" ) {
                    $_SESSION['tuesday1530_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['tuesday1530_dur'] = $durée;
                    $_SESSION['tuesday1530_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['tuesday1530_nom'] = getNom($tuple['id_mat']);
                }
                if (date('H:i', $tuple['tDeb']) == "17:00" ) {
                    $_SESSION['tuesday17_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['tuesday17_dur'] = $durée;
                    $_SESSION['tuesday17_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['tuesday17_nom'] = getNom($tuple['id_mat']);
                }
            }

            if (date('l', $tuple['tDeb']) == "Wednesday") {
                if (date('H:i', $tuple['tDeb']) == "08:00" ) {
                    $_SESSION['twednesday_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['twednesday_dur'] = $durée;
                    $_SESSION['twednesday_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['twednesday_nom'] = getNom($tuple['id_mat']);
                    $_SESSION['twednesday_pro'] = getProf($tuple['id_prof']);
                    $_SESSION['twednesday_sal'] = getSalle($tuple['id_salle']);
                }
                if (date('H:i', $tuple['tDeb']) == "09:30" ) {
                    $_SESSION['wednesday930_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['wednesday930_dur'] = $durée;
                    $_SESSION['wednesday930_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['wednesday930_nom'] = getNom($tuple['id_mat']);
                }
                if (date('H:i', $tuple['tDeb']) == "11:00" ) {
                    $_SESSION['wednesday11_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['wednesday11_dur'] = $durée;
                    $_SESSION['wednesday11_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['wednesday11_nom'] = getNom($tuple['id_mat']);
                }
                if (date('H:i', $tuple['tDeb']) == "14:00" ) {
                    $_SESSION['wednesday14_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['wednesday14_dur'] = $durée;
                    $_SESSION['wednesday14_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['wednesday14_nom'] = getNom($tuple['id_mat']);
                    $_SESSION['wednesday14_pro'] = getProf($tuple['id_prof']);
                    $_SESSION['wednesday14_sal'] = getSalle($tuple['id_salle']);
                }
                if (date('H:i', $tuple['tDeb']) == "15:30" ) {
                    $_SESSION['wednesday1530_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['wednesday1530_dur'] = $durée;
                    $_SESSION['wednesday1530_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['wednesday1530_nom'] = getNom($tuple['id_mat']);
                }
                if (date('H:i', $tuple['tDeb']) == "17:00" ) {
                    $_SESSION['wednesday17_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['wednesday17_dur'] = $durée;
                    $_SESSION['wednesday17_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['wednesday17_nom'] = getNom($tuple['id_mat']);
                }
            }
            // echo date('H:i', $tuple['tDeb']) . "<br>";
            // echo date('H:i', $tuple['tFin']) . "<br>";
		}
    }
    require("./V/utilisateur/edt/edt.tpl");
    echo "<br><br><div style='margin-left:200px'>";
    echo "<a class='btn btn-primary' href=index.php?controle=edt&action=afficher&parametre=".($id_creneau-1)." class='button'><i class='fas fa-arrow-left'></i>&nbsp;Semaine Précedente</a>"; 
    echo "<a class='btn btn-primary' href=index.php?controle=edt&action=afficher&parametre=".($id_creneau+1)." class='button'>Semaine Suivante&nbsp;<i class='fas fa-arrow-right'></i></a>";
    echo "</div><br><br>";  
}
}

function afficherTri($id_creneau) {
    require("./V/design/header.tpl");  
    require('./M/connectBD.php');
    $getPro = isset($_GET["professeur"])?$_GET["professeur"]:'';
    $getGrp = isset($_GET["groupe"])?$_GET["groupe"]:'';
    $getMat = isset($_GET["matiere"])?$_GET["matiere"]:'';
    $professeur = isset($_POST["professeur"])?$_POST["professeur"]:$getPro;
    $groupe = isset($_POST["groupe"])?$_POST["groupe"]:$getGrp;
    $matiere = isset($_POST["matiere"])?$_POST["matiere"]:$getMat;

    viderVar();
    if ($id_creneau < 0 || $id_creneau > countCreneaux()) {
        echo "<p class='text-danger'> Le créneau est inatteignable </p>";
    } 
    else {
    $id_mat = '';
    if($matiere!='') $id_mat = ' AND id_mat=' . $matiere;
    if (($_SESSION['type_user'] == "prof" || $_SESSION['type_user'] == "respEDT" || $_SESSION['type_user'] == "respMat") && $professeur != '') {
        $sql="SELECT * FROM `creneau` WHERE id_prof=:id_prof AND id_creneau=:id_creneau" . $id_mat;
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':id_prof', $professeur);
        $commande->bindParam(':id_creneau', $id_creneau);
    }
    else if (($_SESSION['type_user'] == "prof" || $_SESSION['type_user'] == "respEDT" || $_SESSION['type_user'] == "respMat") && $groupe != '') {
        $sql="SELECT * FROM `creneau` WHERE id_grpe=:id_grpe AND id_creneau=:id_creneau" . $id_mat;
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':id_grpe', $groupe);
        $commande->bindParam(':id_creneau', $id_creneau);
    }
    else if (($_SESSION['type_user'] == "prof" || $_SESSION['type_user'] == "respEDT" || $_SESSION['type_user'] == "respMat") && $matiere != '') {
        $sql="SELECT * FROM `creneau` WHERE id_creneau=:id_creneau" . $id_mat;
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':matiere', $matiere);
        $commande->bindParam(':id_creneau', $id_creneau);
    }
	try {
		$bool = $commande->execute();
		if ($bool) {
			$resultat = $commande->fetchAll(PDO::FETCH_ASSOC); 
		}
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
    }
        
    $sql="SELECT DISTINCT id_mat, id_prof, id_grpe FROM `creneau`";
    $commande = $pdo->prepare($sql);
        
	try {
		$bool = $commande->execute();
		if ($bool) {
			$res = $commande->fetchAll(PDO::FETCH_ASSOC);
            $idMat;
            $idProf;
            $idGrpe;
            $i = 0;
            foreach ($res as $tuple) {
                $idMat[$i] = $tuple['id_mat'];
                $idProf[$i] = $tuple['id_prof'];
                $idGrpe[$i] = $tuple['id_grpe'];
                $i++;
            }
            $idMat = array_unique($idMat);
            $idProf = array_unique($idProf);
            $idGrpe = array_unique($idGrpe);
            $proSel = '';
            $matSel = '';
            $grpSel = '';
            echo '<form action="index.php?controle=edt&action=afficherTri&parametre="' . ($id_creneau) . '" method="post" style="width:400px;">';
            echo '<label>Trier par matière</label><select name="matiere" class="form-control selMat"><option></option>';
            foreach ($idMat as $tuple) {
                if($tuple == $matiere) $matSel = " selected";
                echo ('<option value="' . $tuple . '"' . $matSel . '>' . getMatière($tuple) . '</option>');
                $matSel = '';
            }
            echo '</select>';

            echo '<label>Trier par professeur</label><select name="professeur" class="form-control selPro"><option></option>';
            foreach ($idProf as $tuple) {
                if($tuple == $professeur) $proSel = " selected";
                echo ('<option value="' . $tuple . '"' . $proSel . '>' . getProf($tuple) . '</option>');
                $proSel = '';
            }
            echo '</select>';

            echo '<label>Trier par groupe</label><select name="groupe" class="form-control selGrp"><option></option>';
            foreach ($idGrpe as $tuple) {
                if($tuple == $groupe) $grpSel = " selected";
                echo ('<option value="' . $tuple . '"' . $grpSel . '>' . $tuple . '</option>');
                $grpSel = '';
            }
            echo '</select>';
            echo '<input type="submit" class="btn btn-success btn-sm"/>';
            echo '</form>';
		}
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
    }
    
    $_SESSION['promo'] = getPromo();
    if (isset($resultat) && count($resultat) != 0) {
        date_default_timezone_set('Europe/Paris');
        
		foreach ($resultat as $tuple) {

            $durée = date('H', $tuple['tFin']) - date('H', $tuple['tDeb']);
            
            if (date('l', $tuple['tDeb']) == "Monday") {
                if (date('H:i', $tuple['tDeb']) == "08:00" ) {
                    $_SESSION['monday8_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['monday8_dur'] = $durée;
                    $_SESSION['monday8_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['monday8_nom'] = getNom($tuple['id_mat']);
                    $_SESSION['monday8_pro'] = getProf($tuple['id_prof']);
                    $_SESSION['monday8_sal'] = getSalle($tuple['id_salle']);
                }
                if (date('H:i', $tuple['tDeb']) == "09:30" ) {
                    $_SESSION['monday930_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['monday930_dur'] = $durée;
                    $_SESSION['monday930_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['monday930_nom'] = getNom($tuple['id_mat']);
                }
                if (date('H:i', $tuple['tDeb']) == "11:00" ) {
                    $_SESSION['monday11_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['monday11_dur'] = $durée;
                    $_SESSION['monday11_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['monday11_nom'] = getNom($tuple['id_mat']);
                }
                if (date('H:i', $tuple['tDeb']) == "14:00" ) {
                    $_SESSION['monday14_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['monday14_dur'] = $durée;
                    $_SESSION['monday14_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['monday14_nom'] = getNom($tuple['id_mat']);
                    $_SESSION['monday14_pro'] = getProf($tuple['id_prof']);
                    $_SESSION['monday14_sal'] = getSalle($tuple['id_salle']);
                }
                if (date('H:i', $tuple['tDeb']) == "15:30" ) {
                    $_SESSION['monday1530_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['monday1530_dur'] = $durée;
                    $_SESSION['monday1530_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['monday1530_nom'] = getNom($tuple['id_mat']);
                }
                if (date('H:i', $tuple['tDeb']) == "17:00" ) {
                    $_SESSION['monday17_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['monday17_dur'] = $durée;
                    $_SESSION['monday17_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['monday17_nom'] = getNom($tuple['id_mat']);
                }
            }

            if (date('l', $tuple['tDeb']) == "Tuesday") {
                if (date('H:i', $tuple['tDeb']) == "08:00" ) {
                    $_SESSION['tuesday8_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['tuesday8_dur'] = $durée;
                    $_SESSION['tuesday8_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['tuesday8_nom'] = getNom($tuple['id_mat']);
                    $_SESSION['tuesday8_pro'] = getProf($tuple['id_prof']);
                    $_SESSION['tuesday8_sal'] = getSalle($tuple['id_salle']);
                }
                if (date('H:i', $tuple['tDeb']) == "09:30" ) {
                    $_SESSION['tuesday930_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['tuesday930_dur'] = $durée;
                    $_SESSION['tuesday930_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['tuesday930_nom'] = getNom($tuple['id_mat']);
                }
                if (date('H:i', $tuple['tDeb']) == "11:00" ) {
                    $_SESSION['tuesday11_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['tuesday11_dur'] = $durée;
                    $_SESSION['tuesday11_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['tuesday11_nom'] = getNom($tuple['id_mat']);
                }
                if (date('H:i', $tuple['tDeb']) == "14:00" ) {
                    $_SESSION['tuesday14_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['tuesday14_dur'] = $durée;
                    $_SESSION['tuesday14_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['tuesday14_nom'] = getNom($tuple['id_mat']);
                    $_SESSION['tuesday14_pro'] = getProf($tuple['id_prof']);
                    $_SESSION['tuesday14_sal'] = getSalle($tuple['id_salle']);
                }
                if (date('H:i', $tuple['tDeb']) == "15:30" ) {
                    $_SESSION['tuesday1530_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['tuesday1530_dur'] = $durée;
                    $_SESSION['tuesday1530_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['tuesday1530_nom'] = getNom($tuple['id_mat']);
                }
                if (date('H:i', $tuple['tDeb']) == "17:00" ) {
                    $_SESSION['tuesday17_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['tuesday17_dur'] = $durée;
                    $_SESSION['tuesday17_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['tuesday17_nom'] = getNom($tuple['id_mat']);
                }
            }

            if (date('l', $tuple['tDeb']) == "Wednesday") {
                if (date('H:i', $tuple['tDeb']) == "08:00" ) {
                    $_SESSION['twednesday_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['twednesday_dur'] = $durée;
                    $_SESSION['twednesday_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['twednesday_nom'] = getNom($tuple['id_mat']);
                    $_SESSION['twednesday_pro'] = getProf($tuple['id_prof']);
                    $_SESSION['twednesday_sal'] = getSalle($tuple['id_salle']);
                }
                if (date('H:i', $tuple['tDeb']) == "09:30" ) {
                    $_SESSION['wednesday930_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['wednesday930_dur'] = $durée;
                    $_SESSION['wednesday930_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['wednesday930_nom'] = getNom($tuple['id_mat']);
                }
                if (date('H:i', $tuple['tDeb']) == "11:00" ) {
                    $_SESSION['wednesday11_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['wednesday11_dur'] = $durée;
                    $_SESSION['wednesday11_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['wednesday11_nom'] = getNom($tuple['id_mat']);
                }
                if (date('H:i', $tuple['tDeb']) == "14:00" ) {
                    $_SESSION['wednesday14_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['wednesday14_dur'] = $durée;
                    $_SESSION['wednesday14_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['wednesday14_nom'] = getNom($tuple['id_mat']);
                    $_SESSION['wednesday14_pro'] = getProf($tuple['id_prof']);
                    $_SESSION['wednesday14_sal'] = getSalle($tuple['id_salle']);
                }
                if (date('H:i', $tuple['tDeb']) == "15:30" ) {
                    $_SESSION['wednesday1530_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['wednesday1530_dur'] = $durée;
                    $_SESSION['wednesday1530_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['wednesday1530_nom'] = getNom($tuple['id_mat']);
                }
                if (date('H:i', $tuple['tDeb']) == "17:00" ) {
                    $_SESSION['wednesday17_mat'] = getMatière($tuple['id_mat']);
                    $_SESSION['wednesday17_dur'] = $durée;
                    $_SESSION['wednesday17_cou'] = getCouleur($tuple['id_mat']);
                    $_SESSION['wednesday17_nom'] = getNom($tuple['id_mat']);
                }
            }
            echo date('H:i', $tuple['tDeb']) . "<br>";
            echo date('H:i', $tuple['tFin']) . "<br>";
		}
    }
    }
    require("./V/utilisateur/edt/edt.tpl");
}

function countCreneaux() {
    require ("./M/connectBD.php") ;
    $sql="SELECT * FROM creneau;";
		try {
            $commande = $pdo->prepare($sql);
			$bool = $commande->execute();
			if ($bool) {
                $resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
                $cpt = 0;
				foreach ($resultat as $tuple) {
                    $cpt++;
                }
            }
        } catch (PDOException $e) {
            echo utf8_encode("Echec de modification : " . $e->getMessage() . "\n");
            die(); 
        }
    return $cpt;
}

function viderVar() {
    unset($_SESSION['monday8_mat']);
    unset($_SESSION['monday8_dur']);
    unset($_SESSION['monday8_cou']);
    unset($_SESSION['monday8_nom']);
    unset($_SESSION['monday8_pro']);
    unset($_SESSION['monday8_sal']);

    unset($_SESSION['monday930_mat']);
    unset($_SESSION['monday930_dur']);
    unset($_SESSION['monday930_cou']);
    unset($_SESSION['monday930_nom']);

    unset($_SESSION['monday11_mat']);
    unset($_SESSION['monday11_dur']);
    unset($_SESSION['monday11_cou']);
    unset($_SESSION['monday11_nom']);

    unset($_SESSION['monday14_mat']);
    unset($_SESSION['monday14_dur']);
    unset($_SESSION['monday14_cou']);
    unset($_SESSION['monday14_nom']);
    unset($_SESSION['monday14_pro']);
    unset($_SESSION['monday14_sal']);

    unset($_SESSION['monday1530_mat']);
    unset($_SESSION['monday1530_dur']);
    unset($_SESSION['monday1530_cou']);
    unset($_SESSION['monday1530_nom']);

    unset($_SESSION['monday17_mat']);
    unset($_SESSION['monday17_dur']);
    unset($_SESSION['monday17_cou']);
    unset($_SESSION['monday17_nom']);

    unset($_SESSION['tuesday8_mat']);
    unset($_SESSION['tuesday8_dur']);
    unset($_SESSION['tuesday8_cou']);
    unset($_SESSION['tuesday8_nom']);
    unset($_SESSION['tuesday84_pro']);
    unset($_SESSION['tuesday8_sal']);

    unset($_SESSION['tuesday930_mat']);
    unset($_SESSION['tuesday930_dur']);
    unset($_SESSION['tuesday930_cou']);
    unset($_SESSION['tuesday930_nom']);

    unset($_SESSION['tuesday11_mat']);
    unset($_SESSION['tuesday11_dur']);
    unset($_SESSION['tuesday11_cou']);
    unset($_SESSION['tuesday11_nom']);

    unset($_SESSION['tuesday14_mat']);
    unset($_SESSION['tuesday14_dur']);
    unset($_SESSION['tuesday14_cou']);
    unset($_SESSION['tuesday14_nom']);
    unset($_SESSION['tuesday14_pro']);
    unset($_SESSION['tuesday14_sal']);

    unset($_SESSION['tuesday1530_mat']);
    unset($_SESSION['tuesday1530_dur']);
    unset($_SESSION['tuesday1530_cou']);
    unset($_SESSION['tuesday1530_nom']);

    unset($_SESSION['tuesday17_mat']);
    unset($_SESSION['tuesday17_dur']);
    unset($_SESSION['tuesday17_cou']);
    unset($_SESSION['tuesday17_nom']);

    unset($_SESSION['twednesday_mat']);
    unset($_SESSION['twednesday_dur']);
    unset($_SESSION['twednesday_cou']);
    unset($_SESSION['twednesday_nom']);
    unset($_SESSION['twednesday_pro']);
    unset($_SESSION['twednesday_sal']);

    unset($_SESSION['wednesday930_mat']);
    unset($_SESSION['wednesday930_dur']);
    unset($_SESSION['wednesday930_cou']);
    unset($_SESSION['wednesday930_nom']);

    unset($_SESSION['wednesday11_mat']);
    unset($_SESSION['wednesday11_dur']);
    unset($_SESSION['wednesday11_cou']);
    unset($_SESSION['wednesday11_nom']);

    unset($_SESSION['wednesday14_mat']);
    unset($_SESSION['wednesday14_dur']);
    unset($_SESSION['wednesday14_cou']);
    unset($_SESSION['wednesday14_nom']);
    unset($_SESSION['wednesday14_pro']);
    unset($_SESSION['wednesday14_sal']);

    unset($_SESSION['wednesday1530_mat']);
    unset($_SESSION['wednesday1530_dur']);
    unset($_SESSION['wednesday1530_cou']);
    unset($_SESSION['wednesday1530_nom']);

    unset($_SESSION['wednesday17_mat']);
    unset($_SESSION['wednesday17_dur']);
    unset($_SESSION['wednesday17_cou']);
    unset($_SESSION['wednesday17_nom']);




    
    // faire pour toute les sessions
}

// retourne le nom de la matière à partir de l'id
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

function getCouleur($id_mat) {
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
            return $tuple['couleur'];
        }
    }
}

function getNom($id_mat) {
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
            return $tuple['nom'];
        }
    }
}

function getProf($id_prof) {
    require('./M/connectBD.php');
    $sql="SELECT * FROM `prof` WHERE id_prof=:id_prof";
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':id_prof', $id_prof);
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

function getSalle($id_salle) {
    require('./M/connectBD.php');
    $sql="SELECT * FROM `salle` WHERE id_salle=:id_salle";
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':id_salle', $id_salle);
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

function getPromo() {
    require('./M/connectBD.php');
    $sql="SELECT * FROM `promotion` WHERE id_promo=:id_promo";
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':id_promo', $_SESSION['id_promo']);
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

function activer_notif() {
    require("./V/design/header.tpl");
    require("./V/utilisateur/users/activer_notifs.tpl");
}

function setNotif() {
    require("./M/connectBD.php") ;
    $id = $_SESSION['id'];
    $notif = isset($_POST['activer'])?($_POST['activer']):'';
    $notif = $notif == "on" ? 1:0; // 1 si on, 0 si off

    $sql="UPDATE etudiant SET notif=:notif WHERE id_etu=:id";
		try {
			$commande = $pdo->prepare($sql);
            $commande->bindParam(':notif', $notif);
            $commande->bindParam(':id', $id);
            
			$bool = $commande->execute(); 
			if ($bool) {
                require("./V/design/header.tpl");
                $msg = "<center><p class='text-success'>Le changement a bien été éffectué!</p>";
                require("./V/utilisateur/users/activer_notifs.tpl");          
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); 
        }

}

function gestionEDT() {
    require("./V/design/header.tpl");
    require("./V/utilisateur/edt/gestionEDT.tpl");
}

function ajouterEdth() {
    require("./M/connectBD.php") ;
    $dateDeb = isset($_POST['date'])?($_POST['date']):'';
    $label = isset($_POST['label'])?($_POST['label']):'';
    $bCourant = isset($_POST['bCourant'])?($_POST['bCourant']):'';
    $bCourant = $bCourant == "on" ? 1:0; // 1 si on, 0 si off
    $timestamp = strtotime($dateDeb); // date en timestamp

    $sql="INSERT INTO edth VALUES (DEFAULT, :dateDeb, :label, :bCourant);";
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':dateDeb', $timestamp);
            $commande->bindParam(':label', $label);
            $commande->bindParam(':bCourant', $bCourant);
			
			$bool = $commande->execute(); 
			if ($bool) {
                $msg = "<p class='text-success'>Insertion effectuée avec succès !</p>";				
                require("./V/design/header.tpl");
                require("./V/utilisateur/edt/gestionEDT.tpl");
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de la requête : " . $e->getMessage() . "\n");
			die(); 
		}
	}


?>