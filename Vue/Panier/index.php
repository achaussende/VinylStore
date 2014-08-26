<?php
$this->titre = "VinylStore - Panier";

require_once 'Vue/_Commun/barreNavigation.php';
?>
<?php
if ($this->nettoyer($nbArticles['nb_article']) == 0) {
    ?> <div class="alert alert-success col-lg-12">
        <h4>Panier vide</h4>
    </div> <?php
} else {
    ?>
    <div class="panel panel-default col-lg-10 col-lg-offset-1">
        <div class="panel-heading"><h4>Contenu du panier</h4></div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Image produit</th>
                    <th>Titre</th>
                    <th>Artiste</th>
                    <th>Prix unité</th>
                    <th>Quantité</th>
                    <th>Prix total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vinyles_panier as $vinyle) { ?>
                    <tr>
                        <td class="col-xs-6 col-sm-3 col-md-2">
                            <img class="img-thumbnail img-responsive col-xs-10 col-sm-10 col-md-10 col-sm-offset-1 col-md-offset-1"  rel="popover" 
                                 src="<?= $this->nettoyer($vinyle['image']) ?>"  
                                 alt="Image Album <?= $this->nettoyer($vinyle['titre']) ?>" 
                                 title="<?= $this->nettoyer($vinyle['titre']) ?>"/>
                        </td>
                        <td class="col-xs-6 col-sm-3 col-md-2"><a href="Navigation/vinyle/<?= $this->nettoyer($vinyle['id'])?>"><?= $this->nettoyer($vinyle['titre']) ?></a></td>
                        <td class="col-xs-6 col-sm-3 col-md-2"><?= $this->nettoyer($vinyle['artiste']) ?></td>
                        <td class="col-xs-6 col-sm-3 col-md-2"><?= $this->nettoyer($vinyle['prix']) ?> €</td>
                        <td class="col-xs-6 col-sm-3 col-md-2"><?= $this->nettoyer($vinyle['quantite']) ?></td>
                        <td class="col-xs-6 col-sm-3 col-md-2"><?= $this->nettoyer($vinyle['prix_total']) ?> €</td>
                    </tr>
                <?php }
                ?>
                    <tr>
                        <td class="">Total</td> 
                        <td></td> 
                    </tr>
            </tbody>
        </table>
    </div>
    <a href="Panier/#" type="button" class="btn">Valider vos achats</a>
<?php }
?>