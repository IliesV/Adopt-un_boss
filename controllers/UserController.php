<?php

/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 29/06/2018
 * Time: 11:48
 */

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\controllers\SecurityController;
use BWB\Framework\mvc\dao\DAOCandidat;
use BWB\Framework\mvc\dao\DAOEntreprise;
use BWB\Framework\mvc\dao\DAOUser;
use BWB\Framework\mvc\SecurityMiddleware;

class UserController extends Controller {

    private $dao_user;
    private $dao_candidat;
    private $dao_entreprise;
    private $controller_candidat;
    private $controller_entreprise;
    private $security_middleware;
    private $security_controller;

    function __construct() {
        parent::__construct();
        $this->dao_user = new DAOUser();
        $this->dao_candidat = new DAOCandidat();
        $this->dao_entreprise = new DAOEntreprise();
        $this->controller_candidat = new CandidatController();
        $this->controller_entreprise = new EntrepriseController();
        $this->security_middleware = new SecurityMiddleware();
        $this->security_controller = new SecurityController();
    }

    public function get_role() {
        return $this->security_middleware->verifyToken($_COOKIE['tkn'])->role;
    }
    
        public function get_id() {
        return $this->security_middleware->verifyToken($_COOKIE['tkn'])->id;
    }

    /**
     * Fonction permettant de rediriger l'utilisateur sur le bon profil à afficher en fonction de son statut sur le site.
     * (Admin, candidat ou entreprise)
     */
    public function redirection() {
        $permission = $this->get_role();

        if ($permission == "candidat") {
            $this->controller_candidat->get_profil();
        } else if ($permission == "entreprise") {
            $this->controller_entreprise->get_profil();
        } else {
            header('Location: /gestion');
        }
    }

    public function redirection_profil($id) {
        $permission = $this->dao_user->get_user_permission($id);
        if ($permission == "candidat"):
            $this->controller_candidat->view_profil($id);
        elseif ($permission == 'entreprise'):
            $this->controller_entreprise->view_profil($id);
        endif;
    }

    /**
     * Fonction qui met à jour les informations personelles du candidat lorsqu'il édite son profil.
     */
    public function update_profil() {
        $permission = $this->get_role();
        $id = $this->get_id();
        if ($permission == 'entreprise') {
            $this->dao_entreprise->update_profil($_POST['nom'], $_POST['mail'], $_POST['tel'], $_POST['adresse'], $_POST['logo'], $_POST['salarie'], $_POST['site_web'], $_POST['description'], $id);
            header('Location: /profil');
        } elseif ($permission == 'candidat') {
            $this->dao_candidat->update_profil($_POST['nom'], $_POST['prenom'], $_POST['age'], $_POST['adresse'], $_POST['tel'], $_POST['mail'], $_POST['photo'], $_POST['description'], $id);
            header('Location: /profil');
        }
    }

}
