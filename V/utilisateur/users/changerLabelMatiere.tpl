<h2 style="margin:20px;" >Modifier le label de mon cours</h2>

<span style="margin:40px;"> Le label actuel de votre cours est : <?php echo $label; ?></span>

<div id ="main" class="form-group" style="width:400px;margin:50px"> 
	<form action="index.php?controle=prof&action=setNewLabel" method="post" style="margin-bottom:20px;">
		Changer le label <br><input name="new_label" class="form-control-sm"  style="width:250px;"/>  <br/>
		<input type= "submit" value= "Changer" class="btn btn-success btn-sm" style="margin:5px;"/>                       
	</form>

</div>