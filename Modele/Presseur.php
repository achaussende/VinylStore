<?php

/**
 * Description of Presseur
 *
 * @author Adrien
 */
require_once 'Framework/Modele.php';

class Presseur extends Modele {

//Récupère le nom du presseur en fonction de son id
    function getNomPresseurparId($id) {
        $sql = "SELECT P_NOM as nom_presseur FROM T_PRESSEUR WHERE P_ID =" . $id;
        $nom_presseur = $this->executerRequete($sql);
        if ($nom_presseur->rowCount() == 1) {
            return $nom_presseur->fetch();
        } else {
            throw new Exception("Le Presseur correspondant n'existe pas.");
        }
    }

}
