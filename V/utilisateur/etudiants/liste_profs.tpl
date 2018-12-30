
<h2 style="margin:20px">Liste des professeurs par matière</h2>
<div id ="main" class="form-group" style="width:400px;margin:50px"> 
	<form action="index.php?controle=prof&action=lister_profs" method="post">
		Matière enseignée <br><input name="matiere" class="form-control-sm"  style="width:250px;margin-bottom:10px"/>  <br/>

		<input type= "submit" value= "Chercher" class="btn btn-success" style="margin:20px;"/>                       
	</form>
	<div id ="m"> <?php echo $msg; ?> </div>
</div>