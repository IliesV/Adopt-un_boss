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
use BWB\Framework\mvc\dao\DAOOffre;

class EntrepriseController extends Controller
{
    
    private $dao_entreprise;
    private $dao_offre;
    
    function __construct() {
        parent::__construct();
        $this->dao_entreprise = new DAOEntreprise();
        $this->dao_offre = new DAOOffre();
        
    }

    /**
     * Fonction qui réupère toutes les informations utiles à afficher dans le profil d'une entreprise.
     * Ses informations, les offres qu'elle a posté(Validée ou non) ainsi que ses matchs.
     */
    public function get_profil()
    {
        $entrepriseInfos = $this->dao_entreprise->getEntrepriseInfos(36);
        $offreWaiting = $this->dao_entreprise->getEntrepriseWaitingOffre(36);
        $offreValide = $this->dao_entreprise->getEntrepriseOffreValide(36);
        $entrepriseMatch = $this->dao_entreprise->getEntrepriseMatch(36);
        $this->render("profil_entreprise",array("entrepriseInfos"=>$entrepriseInfos,"offreWaiting"=>$offreWaiting, "offreValide"=>$offreValide,"entrepriseMatch"=>$entrepriseMatch));

    }
    
    public function view_profil($id){
        $entrepriseInfos = $this->dao_entreprise->getEntrepriseInfos($id);
        $secteur = $this->dao_entreprise->get_entreprise_secteur_from_entreprise_id($id);
        $offres = $this->dao_offre->get_last_five_offres_from_entreprise_id($id) ;
        $this->render("profil_public_entreprise",array(
            "entreprise"=>$entrepriseInfos,
            "secteur"=>$secteur,
            "offres"=>$offres
        ));
        
        
    }
}
