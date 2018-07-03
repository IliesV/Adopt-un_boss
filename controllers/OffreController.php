<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOEntreprise;
use BWB\Framework\mvc\dao\DAOOffre;

/**
 * Description of OffreController
 *
 * @author ilies
 */
class OffreController extends Controller {
    
       private $dao_offre;
       private $dao_entreprise;
    
    function __construct() {
        parent::__construct();
        $this->dao_offre = new DAOOffre();
        $this->dao_entreprise = new DAOEntreprise();
    }
    
    public function get_offres(){
        
        $offres = $this->dao_offre->retrieve_all_validated();
        $this->render("offres",array(
            "offres"=>$offres
        ));   
    }
    
}
