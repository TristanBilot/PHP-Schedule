<h2 style="margin:20px;" >Modifier le Type d'enseignement de mon cours</h2>

<span style="margin:40px;"> La salle de votre cours actuel de votre cours est : <?php if (isset($new_type_salle)) { echo $new_type_salle; } ?></span>

<div id ="main" class="form-group" style="width:400px;margin:50px"> 
	<form action="index.php?controle=prof&action=setNewTypeEns" method="post" style="margin-bottom:20px;">
		Changer le label <br><input name="new_type_salle" class="form-control-sm"  style="width:250px;"/>  <br/>
		<input type= "submit" value= "Changer" class="btn btn-success btn-sm" style="margin:5px;"/>                       
	</form>
	
	<form action="index.php?controle=prof&action=setNewTypeEns" method="post" style="margin-bottom:20px;">
		
		<div class="form-group">
			<h4>Amphi</h4>

				<label>Type de classe</label>
				<select name="typeA" class="form-control">
					<option value="" selected>Selectionnez</option>
					<option value="promo">Promo</option>
					<option value="mono">Mono groupe</option>
					<option value="bi">Bi-groupe</option>
				</select>

				<label>Temps de cours</label>
				<select name="tempsA" class="form-control">
					<option value="" selected>Selectionnez</option>
					<option value="1.5">1h30</option>
					<option value="3">3h</option>
					<option value="4.5">4h30</option>
				</select>
		</div>
			
		<div class="form-group">
			<h4>Tableau</h4>

			<label>Type de classe</label>
				<select name="typeT" class="form-control">
					<option value="" selected>Selectionnez</option>
					<option value="promo">Promo</option>
					<option value="mono">Mono groupe</option>
					<option value="bi">Bi-groupe</option>
				</select>

				<label>Temps de cours</label>
				<select name="tempsT" class="form-control">
					<option value="" selected>Selectionnez</option>
					<option value="1.5">1h30</option>
					<option value="3">3h</option>
					<option value="4.5">4h30</option>
				</select>
		</div>
		
		<div class="form-group">
			<h4>Machine</h4>

				<label>Type de classe</label>
				<select name="typeM" class="form-control">
					<option value="" selected>Selectionnez</option>
					<option value="promo">Promo</option>
					<option value="mono">Mono groupe</option>
					<option value="bi">Bi-groupe</option>
				</select>

				<label>Temps de cours</label>
				<select name="tempsM" class="form-control">
					<option value="" selected>Selectionnez</option>
					<option value="1.5">1h30</option>
					<option value="3">3h</option>
					<option value="4.5">4h30</option>
				</select>
		</div>
		
		<input type= "submit" value= "Changer" class="btn btn-success btn-sm" style="margin:5px;"/>                       
	</form>


</div>