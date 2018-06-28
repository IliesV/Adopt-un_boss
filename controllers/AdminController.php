<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\Controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOUser;
use BWB\Framework\mvc\dao\DAOVerif;

/**
 * Description of UserController
 *
 * @author NootNoot
 */
class AdminController extends Controller {

    function __construct() {
        parent::__construct();
    }

    /**
     * Fonction appelé lorsque URI = /gestion
     * Récupère :
     *  - la liste d'users en attente
     *  - la liste d'offres en attente
     * 
     * Redirige vers gestion_admin avec les valeurs.
     */
    public function get_view($view, $id) {
        $dao_user = new DAOUser();
        if (!isset($view)):
            $this->render("gestion_admin", array("view" => "dashboard_home"));
        else:
            switch ($view):
                case "users":
                    $datas = $dao_user->retrieve_waiting_users();
                    $data_by_id = $this->check_user_by_id($id);
                    break;
                case "offres":
                    $datas = $dao_user->retrieve_waiting_offres();
                    $this->check_id_offre($id);
                    break;
                case "events":
                    $datas = $dao_user->retrieve_waiting_events();
                    break;
            endswitch;
            $this->render("gestion_admin", array("datas" => $datas, "view" => "dashboard_" . $view, "data_by_id" => $data_by_id));
        endif;
    }

    protected function check_user_by_id($id) {
        if (isset($id)):
            $dao_verif = new DAOVerif();
            $checked_id = $dao_verif->check_status_user($id);
            $dao_user = new DAOUser();
            $user = $dao_user->retrieve_user($checked_id['permission'], $id);
        endif;
        return $user;
    }

    protected function check_id_offre($id) {
        $dao_user = new DAOUser();
        if (isset($id)):
            $checked_id = $dao_user->check_status_offre($id);
        endif;
    }

}


