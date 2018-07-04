<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOContrat;
use BWB\Framework\mvc\dao\DAOEntreprise;
use BWB\Framework\mvc\dao\DAOOffre;
use BWB\Framework\mvc\dao\DAOTechno;

/**
 * Description of OffreController
 *
 * @author ilies
 */
class OffreController extends Controller {
    
       private $dao_offre;
       private $dao_entreprise;
       private $dao_techno;
       private $dao_contrat;
    
    function __construct() {
        parent::__construct();
        $this->dao_offre = new DAOOffre();
        $this->dao_entreprise = new DAOEntreprise();
        $this->dao_techno = new DAOTechno();
        $this->dao_contrat = new DAOContrat();
    }
    
    public function get_offres(){
        
        $offres = $this->dao_offre->retrieve_all_validated();
        $technos = $this->dao_techno->getAll();
        $contrats = $this->dao_contrat->getAll();
        $this->render("offres",array(
            "offres"=>$offres,
            "technos"=>$technos,
            "contrats"=>$contrats
        ));   
    }
    
        public function get_offres_tri($arg){
        
        $check = $this->dao_offre->check_argument($arg);
        
        if($check){
        $offres = $this->dao_offre->get_offre_by_techno($arg);
        }else{
        $offres = $this->dao_offre->get_offre_by_contrat($arg);
        }
        $technos = $this->dao_techno->getAll();
        $contrats = $this->dao_contrat->getAll();
        $this->render("offres",array(
            "offres"=>$offres,
            "technos"=>$technos,
            "contrats"=>$contrats
        ));   
    }
    
}
