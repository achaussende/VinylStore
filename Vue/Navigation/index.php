<!-- Vue : Liste de Vinyles selon leur format -->
<?php
$f_nom = $this->nettoyer($nom_format['nom']);
$this->titre = "VinylStore - " . $f_nom;
?>
<?php require_once("Vue/_Commun/barreNavigation.php");?>

<!-- Fil d'Ariane -->
<ul class="breadcrumb">
    <li><span class="glyphicon glyphicon-home"></span> <a href="">Accueil</a></li>
    <li><span class="glyphicon glyphicon-music"></span> <a href="navigation/index/<?= $this->nettoyer($idformat) ?>"> <?= $f_nom ?> </a></li>
</ul>

<!-- Menu de Navigation -->
<menu class="col-lg-2">
    <?php require_once("Vue/_Commun/menuNavigation.php"); ?> 
</menu>

<!-- Corps de la vue : Affichage de la liste de Vinyles selon leur format -->
<section class="col-lg-10">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4>
                Liste des produits de Format : <?= $f_nom ?>
            </h4>   
        </div>
        <!-- Affichage des vinyles -->
        <vinyle>
            <div class="panel-body">
                <div class="row">
                    <?php foreach ($images_vinyles as $image): ?>
                        <div class="col-xs-6 col-sm-3 col-md-2" id="Vinyle">
                            <a   href="navigation/vinyle/<?= $this->nettoyer($image['id']) ?>">
                                <img class="img-thumbnail img-responsive" rel="popover" 
                                     src="<?= $this->nettoyer($image['image']) ?>"  
                                     alt="Image Album <?= $this->nettoyer($image['nom']) ?>" 
                                     title="<?= $this->nettoyer($image['artiste']) ?> - <?= $this->nettoyer($image['nom']) ?>"/>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </vinyle>
    </div>
</section>
