<?php

    if ($_SESSION['type_user'] == "etu") {
        echo "<h2 style='margin:20px;'>Mon compte étudiant</h2>";
        echo "<br>
<center>
<table class='table table-hover' style='width:50%'>

  <tbody>
    <tr class='table-secondary'>
      <th scope='row'>Prenom</th>
      <td>"  . $_SESSION['prenom'] . "</td>

    </tr>
    <tr class='table-primary'>
      <th scope='row'>Nom</th>
      <td>"  . $_SESSION['nom'] . "</td>
    </tr>
    <tr class='table-secondary'>
      <th scope='row'>Adresse email</th>
      <td>"  . $_SESSION['email'] . "</td>
    </tr>
    <tr class='table-primary'>
      <th scope='row'>Identifiant</th>
      <td>"  . $_SESSION['login'] . "</td>
    </tr>
    <tr class='table-secondary'>
      <th scope='row'>Sexe</th>
      <td>"  . $_SESSION['genre'] . "</td>
    </tr>
  <tr class='table-primary'>
      <th scope='row'>Photo</th>
    <td>";
    if ($_SESSION['urlPhoto'] == "") {
      echo "<img style='height: 200px; width: 100%; display: block;' src='data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E' alt='Card image'>";
   } else {
      echo "<img style='height: 200px; width: 160px; display: block;' src='" . $_SESSION['urlPhoto'] . "'/>";
    }
    echo "
    </td>
    </tr>

  </tbody>
</table> 
<a class='btn btn-secondary my-2 my-sm-0' href='index.php?controle=utilisateur&action=modifier_compte' role='button'>Modifier mes informations &nbsp;<i class='fas fa-cog'></i></a>

</center>


";
    }

    else if ($_SESSION['type_user'] == "prof" || $_SESSION['type_user'] == "respEDT" || $_SESSION['type_user'] == "respMat") {
        echo "<h2 style='margin:20px;'>Mon compte professeur</h2>";
        echo "<br>
<center>
<table class='table table-hover' style='width:50%'>

  <tbody>
    <tr class='table-secondary'>
      <th scope='row'>Prenom</th>
      <td>"  . $_SESSION['prenom'] . "</td>

    </tr>
    <tr class='table-primary'>
      <th scope='row'>Nom</th>
      <td>"  . $_SESSION['nom'] . "</td>
    </tr>
    <tr class='table-secondary'>
      <th scope='row'>Adresse email</th>
      <td>"  . $_SESSION['email'] . "</td>
    </tr>
    <tr class='table-primary'>
      <th scope='row'>Identifiant</th>
      <td>"  . $_SESSION['login'] . "</td>
    </tr>
    <tr class='table' style='color:white;background:" . $_SESSION['couleur'] . "'>
      <th scope='row'>Couleur de mon cours</th>
      <td>"  . $_SESSION['couleur'] . "</td>
    </tr>
    <tr class='table-primary'>
      <th scope='row'>Sexe</th>
      <td>"  . $_SESSION['genre'] . "</td>
    </tr>
    <tr class='table-secondary'>
      <th scope='row'>Photo</th>
      <td>";
      if ($_SESSION['urlPhoto'] == "") {
        echo "<img style='height: 200px; width: 100%; display: block;' src='data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E' alt='Card image'>";
      } else {
        echo "<img style='height: 200px; width: 140px; display: block;' src='" . $_SESSION['urlPhoto'] . "'/>";
      }
      echo "
      </td>
      </tr>

  </tbody>
</table> 
<a class='btn btn-secondary my-2 my-sm-0' href='index.php?controle=utilisateur&action=modifier_compte' role='button'>Modifier mes informations &nbsp;<i class='fas fa-cog'></i></a>

</center>

";
    }
    
    //echo "<div style='margin:30px'>" . $msg . "</div>";
?>