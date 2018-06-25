<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\controllers;

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

    public function getView() {
        $dao_user = new DAOUser();
        $waiting_user = $dao_user->retrieve_waiting_user();
        $this->render("gestion_admin", array("waiting_user" => $waiting_user));
    }

}
