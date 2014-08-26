<!doctype html>
<!-- Squelette du site web -->
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <base href="<?= $racineWeb ?>">
        <link rel="shortcut icon" href="Contenu/Images/favicon.ico">
        <title><?= $titre ?></title> 

        <!-- CSS de Bootstrap -->
        <link href="Librairies/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- CSS particulier au site web -->
        <link href="Contenu/style.css" rel="stylesheet">

    </head>

    <body>
        <!-- Contenu des pages du site web -->
        <div id="contenu" class="container-fluid">
            <div class="row">
                <?= $contenu ?>
            </div>
        </div>

        <!-- Footer du site web -->
        <footer id="footer">
            <div class="container-fluid">
                <p class="text-muted text-center ">Créé par Antoine Caron et Adrien Chaussende.</p>
            </div>
        </footer>

        <!-- Emplacement des javascripts -->
        <script src="Librairies/bootstrap/js/jquery-2.1.0.js"></script>          
        <script src="Librairies/bootstrap/js/bootstrap.min.js"></script> 
    </div>
</body>
</html>
