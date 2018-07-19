<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BarnavController
 *
 * @author NootNoot
 */

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOUser;
use BWB\Framework\mvc\SecurityMiddleware;

class BarnavController extends Controller {

    private $dao_user;
    private $security_middleware;
    private $security_controller;

    function __construct() {
        parent::__construct();
        $this->dao_user = new DAOUser();
        $this->security_middleware = new SecurityMiddleware();
        $this->security_controller = new SecurityController();
    }

    public function get_id() {
        return $this->security_middleware->verifyToken($_COOKIE['tkn'])->id;
    }

    public function get_role() {
        return $this->security_middleware->verifyToken($_COOKIE['tkn'])->role;
    }
    
    public function get_user() {
        $id = $this->get_id();
        $permission = $this->get_role();
        return $this->dao_user->retrieve_user($permission, $id);
    }

}
