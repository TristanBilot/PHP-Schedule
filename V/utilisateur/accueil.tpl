<!doctype html>
<html><head>
  <meta charset="utf-8">
  <title>Accueil</title>
  <link rel="stylesheet" href="./V/styleCSS/style.css"/>
</head>

<body>

<nav>
	<?php  require ("./V/design/header.tpl"); ?>	
</nav>    <!-- fin du menu nav -->

<div id ="main">
	<h2 style="margin:20px;"> Bienvenue <?php echo $_SESSION['nom_complet']; ?>
	</h2>
  <p> </p>
</div>  <!-- fin de la partie principale  -->
<?php 
  if ($_SESSION['type_user'] == "prof") 
  if(isset($_POST['submit']))
  {
?>
  <div class="list-group" style="width: 40%;margin:50px">

    <a href="index.php?controle=prof&action=chercher_eleves" class="list-group-item list-group-item-action active">
      <i class="fas fa-user-graduate"></i> Chercher des élèves par groupe 
    </a>

    <a href="index.php?controle=prof&action=users_connectes" class="list-group-item list-group-item-action active">
      <i class="fas fa-plug"></i> Consulter les utilisateurs connectés 
    </a>

    <a href="index.php?controle=message&action=messages_recus" class="list-group-item list-group-item-action active">
      <i class="far fa-envelope"></i> Consulter mes messages reçus 
    </a>

    <a href="index.php?controle=message&action=messages_envoyes" class="list-group-item list-group-item-action active">
       <i class="fas fa-arrow-right"></i> Consulter mes messages envoyés
    </a>

    <a href="index.php?controle=edt&action=activer_notif" class="list-group-item list-group-item-action active">
      <i class="far fa-bell"></i> Activer mes notifiactions
    </a>

    <a href="index.php?controle=prof&action=press_lister_profs" class="list-group-item list-group-item-action active">
      <i class="fas fa-chalkboard-teacher"></i> Consulter les professeurs associés à une matière
    </a>

    <a href="index.php?controle=prof&action=press_changer_couleur" class="list-group-item list-group-item-action active">
      <i class="fas fa-palette"></i> Changer la couleur de mon cours
    </a>
    <a href="index.php?controle=prof&action=setNewTypeEns" class="list-group-item list-group-item-action active">
      <i class="fas fa-palette"></i> Changer la couleur de mon courss
    </a>

</div>
<?php
  }
 ?>

 <?php 
  if ($_SESSION['type_user'] == "etu") {
?>
  <div class="list-group" style="width: 40%;margin:50px">

    <a href="index.php?controle=prof&action=press_activer_notif" class="list-group-item list-group-item-action active">
      <i class="far fa-bell"></i> Activer mes notifiactions
    </a>

    <a href="index.php?controle=prof&action=press_lister_profs" class="list-group-item list-group-item-action active">
      <i class="fas fa-chalkboard-teacher"></i> Consulter les professeurs associés à une matière
    </a>

</div>
<?php
  }
 ?>

<?php 
  if ($_SESSION['type_user'] == "respMat") {
?>

<div class="list-group" style="width: 40%;margin:50px">

    <a href="index.php?controle=prof&action=chercher_eleves" class="list-group-item list-group-item-action active">
      <i class="fas fa-user-graduate"></i> Chercher des élèves par groupe 
    </a>

    <a href="index.php?controle=prof&action=users_connectes" class="list-group-item list-group-item-action active">
      <i class="fas fa-plug"></i> Consulter les utilisateurs connectés 
    </a>

    <a href="index.php?controle=message&action=messages_recus" class="list-group-item list-group-item-action active">
      <i class="far fa-envelope"></i> Consulter mes messages reçus 
    </a>

    <a href="index.php?controle=message&action=messages_envoyes" class="list-group-item list-group-item-action active">
       <i class="fas fa-arrow-right"></i> Consulter mes messages envoyés
    </a>

    <a href="index.php?controle=edt&action=activer_notif" class="list-group-item list-group-item-action active">
      <i class="far fa-bell"></i> Activer mes notifiactions
    </a>

    <a href="index.php?controle=prof&action=press_lister_profs" class="list-group-item list-group-item-action active">
      <i class="fas fa-chalkboard-teacher"></i> Consulter les professeurs associés à une matière
    </a>

    <a href="index.php?controle=prof&action=press_changer_couleur" class="list-group-item list-group-item-action active">
      <i class="fas fa-palette"></i> Changer la couleur de mon cours
    </a>

  <a href="index.php?controle=prof&action=changerLabelMatière" class="list-group-item list-group-item-action active">
      <i class="fas fa-tags"></i> Changer le label de mon cours
    </a>
    
    <a href="index.php?controle=prof&action=displayTypeEnsPage" class="list-group-item list-group-item-action active">
      <i class="fas fa-user-graduate"></i> Changer le type d'enseignement
    </a>

    <a href="index.php?controle=prof&action=listerIntervenants" class="list-group-item list-group-item-action active">
      <i class="fas fa-list-ol"></i> Lister les intervenants et leurs matières
    </a>

</div>

<?php
  }
 ?>


<?php 
  if ($_SESSION['type_user'] == "respEDT") {
?>

<div class="list-group" style="width: 40%;margin:50px">

    <a href="index.php?controle=prof&action=chercher_eleves" class="list-group-item list-group-item-action active">
      <i class="fas fa-user-graduate"></i> Chercher des élèves par groupe 
    </a>

    <a href="index.php?controle=prof&action=users_connectes" class="list-group-item list-group-item-action active">
      <i class="fas fa-plug"></i> Consulter les utilisateurs connectés 
    </a>

    <a href="index.php?controle=message&action=messages_recus" class="list-group-item list-group-item-action active">
      <i class="far fa-envelope"></i> Consulter mes messages reçus 
    </a>

    <a href="index.php?controle=message&action=messages_envoyes" class="list-group-item list-group-item-action active">
       <i class="fas fa-arrow-right"></i> Consulter mes messages envoyés
    </a>

    <a href="index.php?controle=edt&action=activer_notif" class="list-group-item list-group-item-action active">
      <i class="far fa-bell"></i> Activer mes notifiactions
    </a>

    <a href="index.php?controle=prof&action=press_lister_profs" class="list-group-item list-group-item-action active">
      <i class="fas fa-chalkboard-teacher"></i> Consulter les professeurs associés à une matière
    </a>

    <a href="index.php?controle=prof&action=press_changer_couleur" class="list-group-item list-group-item-action active">
      <i class="fas fa-palette"></i> Changer la couleur de mon cours
    </a>

    <a href="index.php?controle=prof&action=changerLabelMatière" class="list-group-item list-group-item-action active">
      <i class="fas fa-tags"></i> Changer le label de mon cours
    </a>
    <a href="index.php?controle=prof&action=displayTypeEnsPage" class="list-group-item list-group-item-action active">
      <i class="fas fa-user-graduate"></i> Changer le type d'enseignement
    </a>

  <a href="index.php?controle=prof&action=listerMatières" class="list-group-item list-group-item-action active">
      <i class="fas fa-palette"></i> Gérer les couleurs de chaque cours
    </a>

    <a href="index.php?controle=edt&action=gestionEDT" class="list-group-item list-group-item-action active">
      <i class="far fa-calendar-alt"></i> Gérer les emplois du temps
    </a>
    
    <a href="index.php?controle=prof&action=displayExportPage" class="list-group-item list-group-item-action active">
      <i class="far fa-file-excel"></i> Exporter mes cours dans un fichier Excel
    </a>

    <a href="index.php?controle=prof&action=listerIntervenants" class="list-group-item list-group-item-action active">
      <i class="fas fa-list-ol"></i> Lister les intervenants et leurs matières
    </a>

</div>

<?php
  }
 ?>



</body></html>
