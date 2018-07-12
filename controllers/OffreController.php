<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOContrat;
use BWB\Framework\mvc\dao\DAOEntreprise;
use BWB\Framework\mvc\dao\DAOOffre;
use BWB\Framework\mvc\dao\DAOTechno;
use BWB\Framework\mvc\SecurityMiddleware;

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
    
    private $security_middleware; 
    private $security_controller; 

    function __construct() {
        parent::__construct();
        $this->dao_offre = new DAOOffre();
        $this->dao_entreprise = new DAOEntreprise();
        $this->dao_techno = new DAOTechno();
        $this->dao_contrat = new DAOContrat();
        
        $this->security_middleware = new SecurityMiddleware(); 
        $this->security_controller = new SecurityController(); 

    }

    public function get_offres() {

        $offres = $this->dao_offre->retrieve_all_validated();
        $technos = $this->dao_techno->getAll();
        $contrats = $this->dao_contrat->getAll();
        $this->render("offres", array(
            "offres" => $offres,
            "technos" => $technos,
            "contrats" => $contrats
        ));
    }

    public function get_offres_tri($arg) {

        $check = $this->dao_offre->check_argument($arg);

        if ($check) {
            $offres = $this->dao_offre->get_offre_by_techno($arg);
        } else {
            $offres = $this->dao_offre->get_offre_by_contrat($arg);
        }
        $technos = $this->dao_techno->getAll();
        $contrats = $this->dao_contrat->getAll();
        $this->render("offres", array(
            "offres" => $offres,
            "technos" => $technos,
            "contrats" => $contrats
        ));
    }

    public function get_offre($id) {
        $id_user = $this->get_id() ;
        $bool = $this->dao_offre->check_if_already_liked($id_user, $id);
        $offre = $this->dao_offre->retrieve_current_offre($id);
        $idEntreprise = $this->dao_offre->get_entreprise_id_from_offre_id($id);
        $entreprise = $this->dao_entreprise->getEntrepriseInfos($idEntreprise);
        $technos = $this->dao_techno->getAll();
        $secteur = $this->dao_entreprise->get_entreprise_secteur_from_entreprise_id($idEntreprise);
        $otherOffres = $this->dao_offre->retrieve_all_validated_from_entreprise_id($idEntreprise, $id);
        $this->render("offre", array(
            "offre" => $offre,
            "entreprise" => $entreprise,
            "technos" => $technos,
            "secteur" => $secteur,
            "otherOffres" => $otherOffres,
            "id_user"=>$id_user,
            "bool"=>$bool
        ));
    }

    public function get_id() {
        return $this->security_middleware->verifyToken($_COOKIE['tkn'])->id;
    }
    
    public function like($id_offre){
        $id_user = $this->get_id();
        $this->dao_offre->like_offre($id_user, $id_offre);
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
    
    public function post_new_offre(){
        $id = $this->get_id();
        
        $this->dao_offre->create_new_offre($id, $_POST['intitule'], $_POST['poste'], $_POST['lieu'], $_POST['salaire'], $_POST['detail']);
        $this->dao_techno->getAll();
        
        header('Location: /profil');
    }
}
