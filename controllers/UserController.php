<?php

/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 29/06/2018
 * Time: 11:48
 */

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\controllers\AdminController;
use BWB\Framework\mvc\controllers\SecurityController;
use BWB\Framework\mvc\dao\DAOUser;
use BWB\Framework\mvc\SecurityMiddleware;

class UserController extends Controller {

    private $dao_user;
    private $controller_candidat;
    private $controller_entreprise;
    private $security_middleware;
    private $security_controller;

    function __construct() {
        parent::__construct();
        $this->dao_user = new DAOUser();
        $this->controller_candidat = new CandidatController();
        $this->controller_entreprise = new EntrepriseController();
        $this->security_middleware = new SecurityMiddleware();
        $this->security_controller = new SecurityController();
    }

    public function get_role() {
        return $this->security_middleware->verifyToken($_COOKIE['tkn'])->role;
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
            echo'lol';
        elseif ($permission == 'entreprise'):
            $this->controller_entreprise->view_profil($id);
        endif;
    }

}
