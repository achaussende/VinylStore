<?php

require_once 'ControleurPersonnalise.php';
require_once 'Framework/Vue.php';
require_once 'Modele/Vinyle.php';
require_once 'Modele/Format.php';
require_once 'Modele/Presseur.php';

/**
 * Description of ControleurAccueil
 *
 * @author Adrien 
 */
class ControleurNavigation extends ControleurPersonnalise {

    private $vinyle;
    private $format;
    private $presseur;

    public function __construct() {
        $this->vinyle = new Vinyle();
        $this->format = new Format();
        $this->presseur = new Presseur();
    }

    public function index() {
        $NbVinylesParFormat = $this->vinyle->getNbVinylesParFormat();
        $idformat = $this->requete->getParametre("id");
        $nom_format = $this->format->getFormatParId($idformat);
        $images_vinyles = $this->vinyle->getImageVinyleParFormat($idformat);
        parent::genererVue(array('images_vinyles' => $images_vinyles, 'NbVinylesParFormat' => $NbVinylesParFormat, 'nom_format' => $nom_format, 'idformat' => $idformat));
    }

    public function vinyle() {
        $NbVinylesParFormat = $this->vinyle->getNbVinylesParFormat();
        $id = $this->requete->getParametre("id");
        $infos_vinyle = $this->vinyle->getInfosVinyle($id);
        $this->requete->getSession()->setAttribut("id_vinyle",$id);
        $idformat = $infos_vinyle['format'];

        //Récupération du nom du format à partir de son id
        $format = new Format();
        $nom_format = $format->getFormatParId($idformat)['nom'];

        $nom_presseur = $this->presseur->getNomPresseurparId($infos_vinyle['presseur']); 
        parent::genererVue(array(
            'infos_vinyle' => $infos_vinyle,
            'NbVinylesParFormat' => $NbVinylesParFormat,
            'idformat' => $idformat,
            'nom_presseur' => $nom_presseur,
            'nom_format' => $nom_format),"Boutique");
    }
}
