<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOConnexion;
use BWB\Framework\mvc\SecurityMiddleware;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginController
 *
 * @author amchi
 */
class LoginController extends Controller {

    private $dao_connexion;
    private $security_controller;
    private $security_middleware;

    function __construct() {
        parent::__construct();
        $this->dao_connexion = new DAOConnexion();
        $this->security_controller = new SecurityController();
        $this->security_middleware = new SecurityMiddleware();
    }

    public function get_role() {
        return $this->security_middleware->verifyToken($_COOKIE['tkn'])->role;
    }

    public function get_view_login() {
        $this->render("login");
    }

    public function get_view_login_admin() {
        if (isset($_COOKIE['tkn'])):
            if ($this->get_role() === "admin"):
                $this->render("gestion_admin");
            else:
                header('Location: http://adopt-un-boss.bwb/logout');
            endif;
        else:
            header('Location: http://adopt-un-boss.bwb/login');
        endif;
    }

}
