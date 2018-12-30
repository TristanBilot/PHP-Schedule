

<form action="index.php?controle=utilisateur&action=verif_ident" method="post">
		<select name='comune' onchange="alert('Id choisi = '+this.value)">
            <option value = 'VE' >
            <option value = 'CG' >
            <option value = 'PG' >
        </select>

		<input type= "submit" value= "Connexion" class="btn btn-success" style="margin:20px;"/>                       
	</form>