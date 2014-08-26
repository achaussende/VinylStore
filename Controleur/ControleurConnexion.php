<?php

require_once 'ControleurPersonnalise.php';
require_once 'Framework/Vue.php';
require_once 'Modele/Client.php';
require_once 'Modele/Panier.php';

/**
 * Description of ControleurConnexion
 *
 * @author Antoine CARON
 */
class ControleurConnexion extends ControleurPersonnalise {

    private $client;
    private $panier;

    public function __construct() {
        $this->client = new Client();
        $this->panier = new Panier();
    }

    public function index() {
        $this->genererVue();
    }

    public function connecter() {
        if ($this->requete->existeParametre("courriel") &&
                $this->requete->existeParametre("mdp")) {
            $courriel = $this->requete->getParametre("courriel");
            $mdp = $this->requete->getParametre("mdp");

            $client = $this->client->recherche($courriel);
            $nbArticles = $this->panier->nbArticle($courriel);
            if ($client != false) {
                if ($client['mdp'] == $mdp) {
                    $this->requete->getSession()->setAttribut("client", $client);
                    $this->requete->getSession()->setAttribut("nbArticles", $nbArticles);
                    $this->rediriger("Accueil");
                } else {
                    $this->genererVue(array('msgErreur' => 'Mot de passe incorrect'), "index");
                }
            } else {
                $this->genererVue(array('msgErreur' => 'Login incorrect'), "index");
            }
        } else {
            throw new Exception("Action impossible : login ou mot de passe non défini");
        }
    }

    public function deconnecter() {
        $this->requete->getSession()->detruire();
        $this->rediriger("Accueil");
    }

    public function inscrire() {
        if ($this->requete->existeParametre("courriel") && $this->requete->existeParametre("nom") && $this->requete->existeParametre("prenom") && $this->requete->existeParametre("adresse") && $this->requete->existeParametre("codePostal") && $this->requete->existeParametre("mdp") && $this->requete->existeParametre("ville")) {
            $client = array('nom' => $this->requete->getParametre("nom"),
                'prenom' => $this->requete->getParametre("prenom"),
                'adresse' => $this->requete->getParametre("adresse"),
                'codePostal' => $this->requete->getParametre("codePostal"),
                'ville' => $this->requete->getParametre("ville"),
                'courriel' => $this->requete->getParametre("courriel"),
                'mdp' => $this->requete->getParametre("mdp"));
            $this->client->ajout($client['nom'], $client['prenom'], $client['adresse'], $client['codePostal'], $client['ville'], $client['courriel'], $client['mdp']);
            $this->requete->getSession()->setAttribut("client", $client);
            $this->requete->getSession()->setAttribut("nbArticles", array("nb_article" => 0));
            $this->rediriger("Accueil");
        } else {
            throw new Exception("Action impossible : login ou mot de passe non défini");
        }
    }

}
