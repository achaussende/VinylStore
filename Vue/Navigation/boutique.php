<!-- Vue : Fiche Produit -->
<?php
$nom_produit = $this->nettoyer($infos_vinyle['nom']);
$this->titre = "VinylStore - " . $nom_produit;
?>
<?php require_once("Vue/_Commun/barreNavigation.php");?>

<!-- Fil d'Ariane -->
<ul class="breadcrumb">
    <li><span class="glyphicon glyphicon-home"></span> 
        <a href="">Accueil</a>
    </li>
    <li>
        <span class="glyphicon glyphicon-music"></span> 
        <a href="navigation/index/<?= $this->nettoyer($idformat) ?>"> 
            <?= $this->nettoyer($nom_format) ?> </a>
    </li>
    <li>
        <span class="glyphicon glyphicon-record"></span> 
        <a href="boutique/index/<?= $this->nettoyer($infos_vinyle['id']) ?>" > 
            <?= $nom_produit ?> de <?= $this->nettoyer($infos_vinyle['artiste']) ?> 
        </a>
    </li>       
</ul>

<!-- Menu de Navigation -->
<menu class="col-lg-2">
    <?php require_once("Vue/_Commun/menuNavigation.php"); ?> 
</menu>

<!-- Corps de la vue : Fiche produit -->
<section class="col-lg-10">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4>
                <?= $this->nettoyer($infos_vinyle['nom']) ?> de <?= $this->nettoyer($infos_vinyle['artiste']) ?>
            </h4>   
        </div>
        <div class="panel-body">
            <div class="col-sm-5 col-md-4 panel-body">
                <img class="img-thumbnail img-responsive" rel="popover" 
                     src="<?= $this->nettoyer($infos_vinyle['image']) ?>"  
                     alt="Image Album <?= $this->nettoyer($infos_vinyle['nom']) ?>" 
                     title="<?= $this->nettoyer($infos_vinyle['nom']) ?>"/>
            </div>
            <div class="col-sm-5 col-md-4">
                <h3 class="text-left">Prix du Produit: <?= $this->nettoyer($infos_vinyle['prix']) ?> € </h3>
                <h4 class="text-left">Fabricant: <?= $this->nettoyer($nom_presseur['nom_presseur']) ?> </h4>
                <h4 class="text-left">Date d'Ajout: <?= $this->nettoyer($infos_vinyle['date']) ?> </h4>
            </div>
            <div class="col-sm-5 col-md-6 text-center">
                <a class="btn btn-primary btn-lg" href="Panier/ajouter"><span class="glyphicon glyphicon-shopping-cart"></span>  Commander</a>
            </div>
        </div>
    </div>
    <section>
