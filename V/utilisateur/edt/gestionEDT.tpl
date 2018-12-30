<h2 style='margin:20px;'> Ajouter un nouvel edth</h2>

<form action="index.php?controle=edt&action=ajouterEdth" method="post">
<input name="date" type="date"/>
<input name="label" type="text"/>
<input name="bCourant" type="checkbox" checked/>
<input type= "submit" value= "Ajouter" class="btn btn-success" style="margin:20px;"/>

<?php 
    if (isset($msg)) {
        echo $msg;
    }
?>