<?php

require_once 'Framework/Modele.php';

class Vinyle extends Modele {

    //Récupère une liste de nombres de vinyles par format
    function getNbVinylesParFormat() {
        $sql = 'SELECT v.F_ID AS id,f.F_NOM As format,count(*) AS nb_vinyles'
                . ' FROM T_VINYLE v INNER JOIN T_FORMAT f ON v.F_ID=f.F_ID'
                . ' GROUP BY v.F_ID';
        $nb_vinyles = $this->executerRequete($sql);
        return $nb_vinyles;
    }

    //Récupère les vinyles présents dans la base de données
    function getInfosVinyle($id) {
        $sql = 'SELECT V_ID AS id, F_ID AS format, P_ID AS presseur, '
                . 'V_ARTISTE AS artiste, V_NOM AS nom, DATE_FORMAT(V_DATEAJOUT,\'%d-%m-%Y\') AS date, '
                . 'V_PRIX AS prix, V_IMAGE AS image FROM T_VINYLE WHERE V_ID=' . $id;
        $vinyles = $this->executerRequete($sql);
        if ($vinyles->rowCount() == 1) {
            return $vinyles->fetch();
        } else {
            throw new Exception("Le Vinyle correspondant n'existe pas.");
        }
    }
    
    //Récupère l'image d'un vinyle suivant l'id (mais aussi son nom et l'artiste)
    function getImageVinyleParFormat($id) {
        $sql = 'SELECT V_IMAGE AS image, V_NOM AS nom, V_ARTISTE AS artiste, V_ID AS id FROM T_Vinyle WHERE F_ID=' . $id;
        $images_vinyles = $this->executerRequete($sql);
        return $images_vinyles;
    }

}
