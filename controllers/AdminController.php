<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\Controllers;
use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOUser;


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
    public function getView() {
        $dao_user = new DAOUser();
        $waiting_users = $dao_user->retrieve_waiting_user();
        $waiting_offres = $dao_user->retrieve_waiting_offre();
        $waiting_events = $dao_user->retrieve_waiting_event();
        $this->render("gestion_admin", array("waiting_users" => $waiting_users, "waiting_offres"=> $waiting_offres,"waiting_events" => $waiting_events));
    }
    
}
