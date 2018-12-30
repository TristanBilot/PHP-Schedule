

    <div id ="main" class="form-group" style="width:400px;margin-left:100px"> 
	<form action="index.php?controle=utilisateur&action=modif_login" method="post" style="margin-bottom:20px;">
		Changer identifiant <br><input placeholder="Nouvel identifiant" name="new_login" value="<?php echo $_SESSION['login'] ?>" class="form-control-sm"  style="width:250px;"/>  <br/>
		<input type= "submit" value= "Changer" class="btn btn-success btn-sm" style="margin:5px;"/>                       
	</form>

    <form action="index.php?controle=utilisateur&action=modif_pw" method="post" style="margin-bottom:20px;">
		Changer mot de passe <br><input placeholder="Nouveau mot de passe" type= "text" name="new_pw" value="" class="form-control-sm" style="width:250px;"/> <br/>	 
		<input type= "submit" value= "Changer" class="btn btn-success btn-sm" style="margin:5px;"/>                       
	</form>

    <form action="index.php?controle=utilisateur&action=modif_email" method="post" style="margin-bottom:20px;">
		Changer l'adresse email <br><input placeholder="Nouvel email" type= "text" name="new_email" value="<?php echo $_SESSION['email'] ?>" class="form-control-sm" style="width:250px;"/> <br/>	 
		<input type= "submit" value= "Changer" class="btn btn-success btn-sm" style="margin:5px;"/>                       
	</form>
<?php 
    if ($_SESSION['type_user'] == "prof") {
        echo "
            <form action='index.php?controle=utilisateur&action=modif_couleur' method='post' style='margin-bottom:20px;'>
                Changer ma couleur <br><input placeholder='Nouvelle couleur (hex)' type= 'text' name='new_couleur' value='" . $_SESSION['couleur'] . "' class='form-control-sm' style='width:250px;'/> <br/>	 
                <input type= 'submit' value= 'Changer' class='btn btn-success btn-sm' style='margin:5px;'/>                       
            </form>
        ";
    }
?>

<form enctype="multipart/form-data" action='index.php?controle=fichiers&action=charger_image' method="post" style="margin-bottom:20px;">

  <input class="form-control-file" type="hidden" name="15000000" value="30000" aria-describedby="fileHelp"/>

  Changer mon image <input name="userfile" type="file" />
  <input type="submit" class="btn btn-success btn-sm" value="Envoyer le fichier" />
</form>

</div>

