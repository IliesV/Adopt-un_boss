<?php

/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 26/06/2018
 * Time: 11:39
 */

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\controllers\SecurityController;
use BWB\Framework\mvc\dao\DAOContrat;
use BWB\Framework\mvc\dao\DAOEntreprise;
use BWB\Framework\mvc\dao\DAOOffre;
use BWB\Framework\mvc\dao\DAOTechno;
use BWB\Framework\mvc\SecurityMiddleware;

class EntrepriseController extends Controller {

    private $dao_entreprise;
    private $dao_offre;
    private $security_middleware;
    private $security_controller;
    private $dao_techno;
    private $dao_contrat;

    function __construct() {
        parent::__construct();
        $this->dao_entreprise = new DAOEntreprise();
        $this->dao_offre = new DAOOffre();
        $this->dao_techno = new DAOTechno();
        $this->security_middleware = new SecurityMiddleware();
        $this->security_controller = new SecurityController();
        $this->dao_contrat = new DAOContrat();
        }

    public function get_id() {
        return $this->security_middleware->verifyToken($_COOKIE['tkn'])->id;
    }

    public function get_role() {
        return $this->security_middleware->verifyToken($_COOKIE['tkn'])->role;
    }

    /**
     * Fonction qui réupère toutes les informations utiles à afficher dans le profil d'une entreprise.
     * Ses informations, les offres qu'elle a posté(Validée ou non) ainsi que ses matchs.
     */
    public function get_profil() {
        $id_user = 20;
        $technos= $this->dao_techno->getAll();
        $types= $this->dao_contrat->getAll();
        $entrepriseInfos = $this->dao_entreprise->getEntrepriseInfos($id_user);
        $offreWaiting = $this->dao_entreprise->getEntrepriseWaitingOffre($id_user);
        $offreValide = $this->dao_entreprise->getEntrepriseOffreValide($id_user);
        $entrepriseMatch = $this->dao_entreprise->getEntrepriseMatch($id_user);
        $this->render("profil_entreprise", array(
            "types"=>$types,
            "technos"=>$technos,
            "entrepriseInfos" => $entrepriseInfos,
            "offreWaiting" => $offreWaiting,
            "offreValide" => $offreValide,
            "entrepriseMatch" => $entrepriseMatch));
    }

    public function view_profil($id) {
        $entrepriseInfos = $this->dao_entreprise->getEntrepriseInfos($id);
        $secteur = $this->dao_entreprise->get_entreprise_secteur_from_entreprise_id($id);
        $offres = $this->dao_offre->get_last_five_offres_from_entreprise_id($id);
        $this->render(
                "profil_public_entreprise", array(
            "entreprise" => $entrepriseInfos,
            "secteur" => $secteur,
            "offres" => $offres
        ));
    }

}
