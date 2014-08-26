<?php

require_once 'Framework/Controleur.php';

abstract class ControleurPersonnalise extends Controleur {

    protected function genererVue($donneesVue = array(), $action = null) {
        $client = null;
        $nbArticles = array("nb_article" => 0);
        if ($this->requete->getSession()->existeAttribut("client")) {
            $client = $this->requete->getSession()->getAttribut("client");
        }

        if ($this->requete->getSession()->existeAttribut("nbArticles")) {
            $nbArticles = $this->requete->getSession()->getAttribut("nbArticles");
        }
        
        parent::genererVue($donneesVue + array('client' => $client, "nbArticles" => $nbArticles), $action);
    }

}
