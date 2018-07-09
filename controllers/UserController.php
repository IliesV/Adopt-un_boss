<?php

/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 29/06/2018
 * Time: 11:48
 */

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOUser;

class UserController extends Controller {

    private $dao_user;
    private $controller_candidat;
    private $controller_entreprise;
    private $controller_admin;

    function __construct() {
        parent::__construct();
        $this->dao_user = new DAOUser();
        $this->controller_candidat = new CandidatController;
        $this->controller_entreprise = new EntrepriseController;
        $this->controller_admin = new AdminController;
    }

    /**
     * Fonction qui retournera l'ID du l'utilisateur courant à l'aide du token.
     * Codée en dur pour l'instant.
     * @return int
     */
    protected function get_id() {
        return 4;
    }

    /**
     * Fonction permettant de rediriger l'utilisateur sur le bon profil à afficher en fonction de son statut sur le site.
     * (Admin, candidat ou entreprise)
     */
    public function redirection() {
        $id = $this->get_id();
        $permission = $this->dao_user->get_user_permission($id);

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
