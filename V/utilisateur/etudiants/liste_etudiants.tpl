<meta charset="UTF-8">
<div id ="main" class="form-group" style="width:400px;margin:50px"> 
<h2 style="margin:20px;">Lister les élèves par groupe</h2>
	<form action="index.php?controle=prof&action=lister_etudiants" method="post">
		Numéro de groupe (ex: 1, 2, 3...)<br><input name="groupe" value="<?php if(isset($id)) {echo $id;} ?>" class="form-control-sm"  style="width:250px;margin-bottom:10px"/>  <br/>

		<input type= "submit" value= "Chercher" class="btn btn-success" style="margin:20px;"/>                       
	</form>
	<div id ="m"> <?php if(isset($msg)) { echo $msg;} ?> </div>
</div>