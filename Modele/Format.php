<?php

require_once 'Framework/Modele.php';

class Format extends Modele {

    function getFormatParId($id) {
        $sql = "SELECT F_NOM As nom FROM T_FORMAT WHERE F_ID =" . $id;
        $nom_format = $this->executerRequete($sql);
        if ($nom_format->rowCount() == 1) {
            return $nom_format->fetch();
        } else {
            throw new Exception("Aucun Vinyle Disponible dans cette catégorie");
        }
    }

}
