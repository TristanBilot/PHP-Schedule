<!doctype html>
<html><head>
  <meta charset="utf-8">
  <title>Test mvc 11</title>
  <link rel="stylesheet" href="./V/styleCSS/style.css"/>

</head>
<?php  require ("./V/design/header.tpl"); ?>	
<body>

<br><br>
		
   <!-- fin du menu nav -->
<?php if (isset($_SESSION['annotation'])) { echo "<p class='text-success' style='margin-left:20px;'>" . $_SESSION['annotation'] . "</p>";} ?>

<div id ="main" class="form-group" style="width:400px;margin-left:50px"> 
	<form action="index.php?controle=utilisateur&action=verif_ident" method="post">
		Identifiant <br><input name="id" value="" class="form-control-sm"  style="width:250px;margin-bottom:10px"/>  <br/>
		Mot de passe <br><input type= "password" name="pw" value="" class="form-control-sm" style="width:250px"/> <br/>	 
		<input type= "submit" value= "Connexion" class="btn btn-success" style="margin:20px;"/>                       
	</form>
	<div id ="m"> <? if (isset($msg)) {php echo $msg;} ?> </div>
</div>

</body></html>
