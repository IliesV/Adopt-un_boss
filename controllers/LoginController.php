<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOConnexion;

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

    function __construct() {
        parent::__construct();
        $this->dao_connexion = new DAOConnexion();
        $this->security_controller = new SecurityController();
    }

    public function get_view_login() {
        $this->render("login");
    }

    public function verif_user() {
        $email = $this->inputPost()['email'];
        $password = $this->inputPost()['password'];
        $permission = $this->inputPost()['perm'];
        $user = $this->dao_connexion->verif_and_retrieve_user($email, $password, $permission);
        if ($user == null):
            $permission = 'admin';
            $user = $this->dao_connexion->verif_and_retrieve_user($email, $password, $permission);
            if ($user == null):
                header('Location: /login/candidat');
            endif;
        endif;
        $this->security_controller->generate_token($user);
        header('Location: /');
    }

}
