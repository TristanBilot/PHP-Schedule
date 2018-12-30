
<h2 style="margin:20px;">Envoyer un message à <?php echo $_SESSION['nom_complet_dest'] ?> </h2>

    <div class="form-group" style="width:50%;margin:40px;">
      <label for="text">Tapez votre message ici</label>
      <form action="index.php?controle=message&action=send_msg" method="post">
        <textarea name="contenu" class="form-control" id="text" rows="3"></textarea>
        <input type= "submit" value= "Envoyer" class="btn btn-success" style="margin:20px;"/>  
      </form>
      <div id ="m"> <?php echo $msg; ?> </div>
    </div>
