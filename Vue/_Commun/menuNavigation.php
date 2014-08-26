<!-- Menu de navigation par format de vinyle -->
<div class="panel panel-info">
    <div class="panel-heading">
        <h4>Liste des Types de produits</h4>
    </div>
    <div class="list-group">
        <?php
        foreach ($NbVinylesParFormat as $nb_vinyle):
            $id = $this->nettoyer($nb_vinyle['id']);
            ?>
            <a href = "navigation/index/<?= $id ?>" class = "list-group-item 
            <?php
            if ($this->nettoyer($idformat) == $id) {
                ?> active <?php
               }
               ?>">
                <span class = "badge"> 
                    <?= $this->nettoyer($nb_vinyle['nb_vinyles']) ?> 
                </span> <?= $this->nettoyer($nb_vinyle['format']) ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>
