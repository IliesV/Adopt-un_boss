<?php

/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 03/07/2018
 * Time: 14:06
 */

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\controllers\SecurityController;
use BWB\Framework\mvc\dao\DAOConnexion;

class LoginController1 extends Controller {

    private $dao_connexion;
    private $security_controller;

    /**
     * LoginController constructor.
     * @param $dao_view_candidat
     * @param $dao_view_entreprise
     */
    function __construct() {
        parent::__construct();
        $this->dao_connexion = new DAOConnexion();
        $this->security_controller = new SecurityController();
    }

    public function get_view_login() {
        echo'ds';
        $this->render("login");
    }

    public function verif_user() {
        $email = $this->inputPost()['email'];
        $password = $this->inputPost()['password'];
        $candidat = $this->inputPost()['candidat'];
        $entreprise = $this->inputPost()['entreprise'];
        $permission = $candidat ? $candidat : $entreprise;
        $user = $this->dao_connexion->verif_and_retrieve_user($email, $password, $permission);
        if ($user == null):
            $permission = 'admin';
            $user = $this->dao_connexion->verif_and_retrieve_user($email, $password, $permission);
//            if ($user == null):
//                header('Location: /login/candidat');
//            endif;
        endif;
        $this->security_controller->generate_token($user);
        header('Location: /');
    }

    public function get_data_candidat() {
        $this->render("login_candidat");
    }

//    public function get_view_entreprise()
//    {
//        if($element === 'entrerpise')
//        {
//            $loginEntreprise = $this->dao_view_entreprise->get_entreprise();
//            $this->render("login/candidat",array(
//                "loginCandidat"=>$loginEntreprise,
//            ));
//        }
//    }
}
