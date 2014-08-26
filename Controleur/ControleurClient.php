<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/Client.php';

class ControleurClient extends ControleurSecurise {

    private $client;

    public function __construct() {
        $this->client = new Client();
    }

    public function index() {
        parent::executerAction("afficher");
    }
    
    public function afficher() {
        $this->genererVue(array(),"index");
    }

    public function modifier() {
        $this->client = new Client();
        try {
            $client = array('nom' => $this->requete->getParametre("nom"),
                'prenom' => $this->requete->getParametre("prenom"),
                'adresse' => $this->requete->getParametre("adresse"),
                'codePostal' => $this->requete->getParametre("codePostal"),
                'ville' => $this->requete->getParametre("ville"),
                'courriel' => $this->requete->getParametre("courriel"),
                'mdp' => $this->requete->getParametre("mdp"));
            $this->client->modification($client['nom'], $client['prenom'], $client['adresse'], $client['codePostal'], $client['ville'], $client['courriel'], $client['mdp']);
            $this->requete->getSession()->setAttribut("client", $client);
            parent::genererVue(array(),"modificationReussie");
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
