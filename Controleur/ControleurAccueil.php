<?php

require_once 'ControleurPersonnalise.php';
require_once 'Framework/Vue.php';
require_once 'Modele/Vinyle.php';

/**
 * Description of ControleurAccueil
 *
 * @author Antoine
 */
class ControleurAccueil extends ControleurPersonnalise {

    private $vinyle;

    public function __construct() {
        $this->vinyle = new Vinyle();
    }

    public function index() {
        $NbVinylesParFormat = $this->vinyle->getNbVinylesParFormat();
        $idformat = 0;
        parent::genererVue(array('NbVinylesParFormat' => $NbVinylesParFormat, 'idformat' => $idformat), "index");
    }

}
