<h2 style="margin:20px;">Activer les Notifications<?php if (isset($nom_complet_dest)) { echo $_SESSION['nom_complet_dest']} ?> </h2>

    <div class="form-group" style="width:50%;margin:40px;margin-left:100px">
      <form action="index.php?controle=edt&action=setNotif" method="post">
        <p> Vous recevrez un message lors de la création d'un nouvel edt.</p>
        <input class="checkboxtext" name="activer" type="checkbox" checked/>
        <input type= "submit" value= "Modifier" class="btn btn-success" style="margin:20px;"/>  
      </form>
    </div>
    <style>
      input[type=checkbox]
        {
          /
          -ms-transform: scale(2); /* IE */
          -moz-transform: scale(2); /* FF */
          -webkit-transform: scale(2); /* Safari and Chrome */
          -o-transform: scale(2); /* Opera */
          padding: 10px;
        }

        .checkboxtext
        {
          font-size: 110%;
          display: inline;
        }
    </style>

<?php 
  if (isset($msg)) {
    echo $msg;
    unset($msg);
  }
?>