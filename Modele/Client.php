<?php

require_once 'Framework/Modele.php';

class Client extends Modele {

    function recherche($courriel) {
        $sql = "SELECT C_ID As id,C_COURRIEL As courriel,C_MOT_DE_PASSE As mdp,C_NOM As nom"
                . ", C_PRENOM As prenom, C_ADRESSE As adresse, C_CODE_POSTAL As codePostal, C_VILLE As ville"
                . " FROM T_CLIENT WHERE C_COURRIEL = '" . $courriel . "'";
        $client = $this->executerRequete($sql);
        if ($client->rowCount() == 1) {
            return $client->fetch();
        } else {
            return false;
        }
    }

    function ajout($nom, $prenom, $adresse, $code_postal, $ville, $courriel, $mot_de_passe) {
        $sql = "INSERT INTO VINYLSTORE.T_CLIENT(C_NOM,C_PRENOM,C_ADRESSE,C_CODE_POSTAL,C_VILLE,C_COURRIEL,C_MOT_DE_PASSE) VALUES "
                . "('" . $nom . "','" . $prenom . "','" . $adresse . "','" . $code_postal . "','" . $ville . "','" . $courriel . "','" . $mot_de_passe . "')";
        $this->executerRequete($sql);
    }

    function modification($nom, $prenom, $adresse, $code_postal, $ville, $courriel, $mot_de_passe) {
        if ($nom != null) {
            $sql = "UPDATE T_CLIENT "
                    . "SET C_NOM='" . $nom ."'"
                    . " WHERE C_COURRIEL='" . $courriel ."'";
            $this->executerRequete($sql);
        }
        if ($prenom != null) {
            $sql = "UPDATE T_CLIENT "
                    . "SET C_PRENOM='" . $prenom ."'"
                    . " WHERE C_COURRIEL='" . $courriel ."'";
            $this->executerRequete($sql);
        }
        if ($adresse != null) {
            $sql = "UPDATE T_CLIENT "
                    . "SET C_ADRESSE='" . $adresse ."'"
                    . " WHERE C_COURRIEL='" . $courriel . "'";
            $this->executerRequete($sql);
        }
        if ($code_postal != null) {
            $sql = "UPDATE T_CLIENT "
                    . "SET C_CODE_POSTAL='" . $code_postal . "'"
                    . " WHERE C_COURRIEL='" . $courriel . "'";
            $this->executerRequete($sql);
        }
        if ($ville != null) {
            $sql = "UPDATE T_CLIENT "
                    . "SET C_VILLE='" . $ville ."'"
                    . " WHERE C_COURRIEL='" . $courriel . "'";
            $this->executerRequete($sql);
        }
        if ($mot_de_passe != null) {
            $sql = "UPDATE T_CLIENT "
                    . "SET C_MOT_DE_PASSE='" . $mot_de_passe . "'"
                    . " WHERE C_COURRIEL='" . $courriel . "'";
            $this->executerRequete($sql);
        }
        if ($courriel != null) {
            $sql = "UPDATE T_CLIENT "
                    . "SET C_COURRIEL='" . $courriel . "'"
                    . " WHERE C_COURRIEL='" . $courriel . "'";
            $this->executerRequete($sql);
        }
    }
}
