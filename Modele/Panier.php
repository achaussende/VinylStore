<?php

require_once 'Framework/Modele.php';

class Panier extends Modele {

    function getListArticle($courriel) {
        $sql = "SELECT p.V_ID AS id, v.V_ARTISTE AS artiste, v.V_NOM AS titre, "
                . "v.V_PRIX as prix, v.V_IMAGE as image, p.ARTPAN_QUANTITE AS quantite, "
                . "p.ARTPAN_ID AS numero_commande, p.ARTPAN_DATEAJOUT AS date_ajout "
                . "FROM T_ARTICLE_PANIER p JOIN T_CLIENT c ON c.C_ID = p.C_ID, T_VINYLE v "
                . "WHERE v.V_ID = p.V_ID AND c.C_COURRIEL='" . $courriel . "'";
        $list_article = $this->executerRequete($sql);
        return $list_article;
    }

    function nbArticle($courriel) {
        $sql = "SELECT SUM(p.ARTPAN_QUANTITE) AS nb_article"
                . " FROM T_ARTICLE_PANIER p JOIN T_CLIENT c ON c.C_ID=p.C_ID"
                . " WHERE c.C_COURRIEL='" . $courriel . "'";
        $nb_article = $this->executerRequete($sql);
        $nbArticle =$nb_article->fetch();
        if ($nbArticle != null) {
            return $nbArticle;
        } else {
            return array('nb_article' => 0);
        }
    }

    function ajouterArticle($idClient, $idVinyle, $quantite) {
        $sql = "INSERT INTO VINYLSTORE.T_ARTICLE_PANIER(C_ID,V_ID,ARTPAN_QUANTITE,ARTPAN_DATEAJOUT) VALUES"
                . "(" . $idClient . ", " . $idVinyle . ", " . $quantite . ", " . "CURRENT_DATE)";
        $this->executerRequete($sql);
    }

    /**
     * Renvoie la quantité si le produit existe déjà dans le panier, sinon renvoie 0
     */
    function quantiteProduitExistant($idClient, $idVinyle) {
        $sql = "SELECT p.ARTPAN_QUANTITE AS quantite "
                . "FROM T_ARTICLE_PANIER p "
                . "WHERE p.C_ID = '" . $idClient . "'" . " AND p.V_ID = '" . $idVinyle . "'";

        $quantite = $this->executerRequete($sql);
        if ($quantite->rowCount() == 1) {
            return $quantite->fetch();
        } else {
            return 0;
        }
    }
    
    function modifierQuantite($idClient, $idVinyle, $quantite) {
        $sql = "UPDATE T_ARTICLE_PANIER SET ARTPAN_QUANTITE = '" . $quantite . "'"
                . " WHERE C_ID = '" . $idClient . "' AND V_ID = '" . $idVinyle . "'";
        $this->executerRequete($sql);
    }

}
