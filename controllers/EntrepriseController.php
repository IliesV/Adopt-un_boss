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

    public function getProfil()
    {
        $DAO= new DAOEntreprise();
        $entrepriseInfos = $DAO->getEntrepriseInfos(36);
        $offreWaiting = $DAO->getEntrepriseWaitingOffre(36);
        $offreValide = $DAO->getEntrepriseOffreValide(36);
        $entrepriseMatch = $DAO->getEntrepriseMatch(36);
        $this->render("profil_entreprise",array("offreWaiting"=>$offreWaiting, "offreValide"=>$offreValide,"entrepriseMatch"=>$entrepriseMatch));

    }
}
