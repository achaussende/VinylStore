<?php
$this->titre = "VinylStore - Mon Compte";
?>
<?php require_once("Vue/_Commun/barreNavigation.php"); ?> 
<section class="col-lg-10">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4>
                Informations personnelles :
            </h4>   
        </div>
        <div class="panel-body well">
            <div class="row">
                <form class="form-horizontal" role="form" action="Client/modifier" method="post">
                    <div class="form-group">
                        <label class="col-sm-4 col-md-5 control-label">Nom</label>
                        <div class="col-sm-6 col-md-4">
                            <input name="nom" type="text" class="form-control" value="<?= $this->nettoyer($client['nom']) ?>" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-md-5 control-label">Prénom</label>
                        <div class="col-sm-6 col-md-4">
                            <input name="prenom" type="text" class="form-control" value="<?= $this->nettoyer($client['prenom']) ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-md-5 control-label">Adresse</label>
                        <div class="col-sm-6 col-md-4">
                            <input name="adresse" type="text" class="form-control" value="<?= $this->nettoyer($client['adresse']) ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-md-5 control-label">Code postal</label>
                        <div class="col-sm-3 col-md-2">
                            <input name="codePostal" type="text" class="form-control" value="<?= $this->nettoyer($client['codePostal']) ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-md-5 control-label">Ville</label>
                        <div class="col-sm-6 col-md-4">
                            <input name="ville" type="text" class="form-control" value="<?= $this->nettoyer($client['ville']) ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-md-5 control-label">Courriel</label>
                        <div class="col-sm-6 col-md-4">
                            <input name="courriel" type="email" class="form-control" value="<?= $this->nettoyer($client['courriel']) ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-md-5 control-label">Mot de passe</label>
                        <div class="col-sm-6 col-md-4">
                            <input name="mdp" type="password" class="form-control" value="<?= $this->nettoyer($client['mdp']) ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-5">
                            <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-edit"></span> Modifier</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


