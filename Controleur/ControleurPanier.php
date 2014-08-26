<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/Panier.php';
require_once 'Modele/Vinyle.php';
require_once 'Modele/Client.php';

class ControleurPanier extends ControleurSecurise {

    private $panier;
    private $vinyle;
    private $client;

    public function __construct() {
        $this->panier = new Panier();
        $this->vinyle = new Vinyle();
        $this->client = new Client();
    }

    public function index() {
        $this->executerAction("afficher");
    }

    public function afficher() {
        $vinyles_panier = array();

        $cli = $this->requete->getSession()->getAttribut("client");
        $articles = $this->panier->getListArticle($cli['courriel']);
        $nbArticles = $this->panier->nbArticle($cli['courriel']);
        $this->requete->getSession()->setAttribut("nbArticles", $nbArticles);
        foreach ($articles as $article) {
            $vinyl = $this->vinyle->getInfosVinyle($article['id']);
            $prixaconvertir = $article['quantite'] * $vinyl['prix'];
            $vinyles_panier = $vinyles_panier +
                    array($article['titre'] =>
                        array("image" => $vinyl['image'], "titre" => $vinyl['nom'],
                            "artiste" => $vinyl['artiste'], "prix" => $vinyl['prix'],
                            "quantite" => $article['quantite'],
                            "prix_total" => number_format($prixaconvertir, "2"),
                            "id" => $vinyl['id']
            ));
        }
        $this->genererVue(array(
            'articles' => $articles,
            'vinyles_panier' => $vinyles_panier
                ), "index");
    }

    public function ajouter() {
        $this->client = new Client();
        $this->panier = new Panier();
        $client = $this->client->recherche($this->requete->getSession()->getAttribut("client")['courriel']);
        $idClient = $client['id'];
        $idVinyle = $this->requete->getSession()->getAttribut('id_vinyle');
        $quantite = (int) $this->panier->quantiteProduitExistant($idClient, $idVinyle);
        if ($quantite > 0) {
            $this->panier->modifierQuantite($idClient, $idVinyle, $quantite + 1);
        } else {
            $this->panier->ajouterArticle($idClient, $idVinyle, 1);
        }
        $this->rediriger("Panier", "index");
    }

}
