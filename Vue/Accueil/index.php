<!-- Vue : Page d'Accueil -->
<?php $this->titre = "Accueil";?>
<?php require_once("Vue/_Commun/barreNavigation.php");?>

<!-- Fil d'Ariane -->
<ul class="breadcrumb">
    <li><span class="glyphicon glyphicon-home"></span> <a href="">Accueil</a></li>
</ul>

<!-- Menu de Navigation -->
<menu class="col-lg-2">
    <?php require("Vue/_Commun/menuNavigation.php"); ?> 
</menu>

<!-- Corps de la vue : Page d'Accueil -->
<div class="col-lg-6">
    <h1 class="text-center"> Bienvenue sur VinylStore </h1>
</div>
<div class="col-lg-4">
    <img class="img-thumbnail img-responsive" title="Platine" alt="Image d'un platine" src="Contenu/Images/platine-noirblanc.jpg">
</div>
