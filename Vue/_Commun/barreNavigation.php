<?php $prenom = $this->nettoyer($client['prenom']); ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">Vinyl Store</a>
        </div>
        <div class="collapse  navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="">Accueil</a></li>                                
                <li><a href="#about">A propos</a></li>
                <li><a href="#contact">Contacts</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php if ($prenom == null) { ?>
                    <li class="text-primary">Non connecté</li>
                <?php } else { ?>
                    <li class="text-primary">Bienvenue, <?= $prenom ?> </li>
                    <li>
                        <a href="Panier" type = "button" class = "btn btn-default navbar-btn">
                            <span class="glyphicon glyphicon-shopping-cart"></span>
                            Panier
                            <span class="badge"><?= $this->nettoyer($nbArticles['nb_article']) ?></span>
                        </a>
                    </li>
                <?php } ?>
                <li class="dropdown">
                    <?php if ($prenom == null) { ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="Connexion/index">Se connecter</a></li>
                            <li><a href="Connexion/index">Inscription</a></li>
                        </ul>
                    <?php } else { ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mon compte<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="disabled"><a>Se connecter</a></li>
                            <li class="divider"></li>
                            <li><a href="Client/index">Modifier mes informations personnelles</a></li>
                            <li class="divider"></li>
                            <li><a href="Connexion/deconnecter">Déconnexion</a></li>
                        </ul>
                    <?php } ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
