<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\Controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOEvent;
use BWB\Framework\mvc\dao\DAOOffre;
use BWB\Framework\mvc\dao\DAOUser;
use BWB\Framework\mvc\dao\DAOVerif;

/**
 * Description of UserController
 *
 * @author NootNoot
 */
class AdminController extends Controller {

    private $dao_user;
    private $dao_verif;
    private $dao_offre;
    private $dao_event;

    function __construct() {
        parent::__construct();
        $this->dao_user = new DAOUser();
        $this->dao_verif = new DAOVerif();
        $this->dao_offre = new DAOOffre();
        $this->dao_event = new DAOEvent();
    }

    /**
     * Fonction appelé lorsque URI = /gestion, /gestion/(:), /gestion/(:)/(:)
     * Récupère :
     *  - la liste d'users en attente
     *  - la liste d'offres en attente
     *  - la liste d'events en attente
     * 
     * Redirige vers gestion_admin avec les donnees necessaires.
     */
    public function get_view($view, $id) {
        if (!isset($view)):
            $this->render("gestion_admin", array("view" => "dashboard_home"));
        else:
            switch ($view):
                case "users":
                    $datas = $this->dao_user->retrieve_waiting_users();
                    $data_by_id = $this->check_user_by_id($id);
                    break;
                case "offres":
                    $datas = $this->dao_offre->retrieve_waiting_offres();
                    $data_by_id = $this->check_offre_by_id($id);
                    break;
                case "events":
                    echo'lol';
                    $datas = $this->dao_event->retrieve_waiting_events();
                    $data_by_id = $this->check_event_by_id($id);
                    break;
            endswitch;
            $this->render("gestion_admin", array("datas" => $datas, "view" => "dashboard_" . $view, "data_by_id" => $data_by_id));
        endif;
    }

    protected function check_user_by_id($id) {
        if (isset($id)):
            $checked_id = $this->dao_verif->check_status_user($id);
            if (!$checked_id):
                return false;
            endif;
            $user = $this->dao_user->retrieve_user($checked_id['permission'], $id);
            return $user;
        endif;
    }

    protected function check_offre_by_id($id) {
        if (isset($id)):
            $checked_id = $this->dao_verif->check_status_offre($id);
            if (!$checked_id):
                return false;
            endif;
            $offre = $this->dao_offre->retrieve($id);
            return $offre;
        endif;
    }
    
    protected function check_event_by_id($id) {
        if (isset($id)):
            $checked_id = $this->dao_verif->check_status_event($id);
            if (!$checked_id):
                return false;
            endif;
            $event = $this->dao_event->retrieve($id);
            return $event;
        endif;
    }

    public function validation($view, $id) {
        switch ($view):
            case "user":
                $retour = $this->user_to_valid($id);
                header("Location: /gestion/users");
                break;
            case "offre":
                $retour = $this->offre_to_valid($id);
                header("Location: /gestion/offres");
                break;
            case "event":
                $retour = $this->event_to_valid($id);
                header("Location: /gestion/events");
                break;
        endswitch;
    }

    protected function user_to_valid($id) {
        $checked_id = $this->dao_verif->check_status_user($id);
        if (!$checked_id) {
            return false;
        }
        $this->dao_user->validation_user($id);
        return true;
    }

    protected function offre_to_valid($id) {
        $checked_id = $this->dao_verif->check_status_offre($id);
        if (!$checked_id) {
            return false;
        }
        $this->dao_offre->validation_offre($id);
        return true;
    }

    protected function event_to_valid($id) {
        $checked_id = $this->dao_verif->check_status_event($id);
        if (!$checked_id) {
            return false;
        }
        $this->dao_user->validation_user($id);
        return true;
    }

    public function delete($view, $id) {
        switch ($view):
            case "user":
                $retour = $this->user_to_delete($id);
                header("Location: /gestion/users");
                break;
            case "offre":
                $retour = $this->offre_to_delete($id);
                header("Location: /gestion/offres");
                break;
            case "event":
                $retour = $this->event_to_delete($id);
                header("Location: /gestion/events");
                break;
        endswitch;
    }

    protected function user_to_delete($id) {
        $checked_id = $this->dao_verif->check_status_user($id);
        if (!$checked_id) {
            return false;
        }
        $this->dao_user->delete_user($id);
        return true;
    }

    protected function offre_to_delete($id) {
        $checked_id = $this->dao_verif->check_status_offre($id);
        echo 'lol';
        if (!$checked_id) {
            return false;
        }
                echo 'lol';

        $this->dao_offre->delete_offre($id);
        return true;
    }

    protected function event_to_delete($id) {
        $checked_id = $this->dao_verif->check_status_user($id);
        if (!$checked_id) {
            return false;
        }
        $this->dao_user->delete_user($id);
        return true;
    }

}


