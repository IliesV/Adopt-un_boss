<?php

namespace BWB\Framework\mvc\Controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOUser;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AjaxController
 *
 * @author amchi
 */
class AjaxController extends Controller {

//
//    private $dao_user;
//
//    function __construct() {
//        parent::__construct();
//        $this->dao_user = new DAOUser();
//    }

    public function update_dashboard($view) {
        $dao = new DAOUser();
        switch ($view):
            case 'user':
                $array_data = array();
                $datas = $dao->retrieve_waiting_users();
                foreach ($datas as $data) {
                    array_push($array_data, $data->to_array());
                }
                break;
        endswitch;
        
        $this->retour_ajax($array_data);
    }

    protected function retour_ajax($datas) {
        header('Content-Type: application/json');
        echo json_encode($datas);
    }

}
