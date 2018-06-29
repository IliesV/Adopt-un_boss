<?php
/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 26/06/2018
 * Time: 11:39
 */

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOEntreprise;

class EntrepriseController extends Controller
{
    
    private $dao_entreprise;
    
    function __construct() {
        parent::__construct();
        $this->dao_entreprise = new DAOEntreprise();
        
    }

    public function get_profil()
    {
        $entrepriseInfos = $this->dao_entreprise->getEntrepriseInfos(36);
        $offreWaiting = $this->dao_entreprise->getEntrepriseWaitingOffre(36);
        $offreValide = $this->dao_entreprise->getEntrepriseOffreValide(36);
        $entrepriseMatch = $this->dao_entreprise->getEntrepriseMatch(36);
        $this->render("profil_entreprise",array("entrepriseInfos"=>$entrepriseInfos,"offreWaiting"=>$offreWaiting, "offreValide"=>$offreValide,"entrepriseMatch"=>$entrepriseMatch));

    }
}
