<!DOCTYPE html>
<!-- Affichage des erreurs -->

<?php $titre = 'Erreur Sur VinylStore'; ?>

<?php ob_start() ?>
<div class="alert col-lg-10 col-lg-offset-1 alert-danger">
    <h3>Une erreur est survenue :</h3>
    <p><?= utf8_decode($msgErreur) ?></p>
</div>  

<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>