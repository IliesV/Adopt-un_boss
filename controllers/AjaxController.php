<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\controllers\ChatController;
use BWB\Framework\mvc\dao\DAOUser;
use function GuzzleHttp\json_encode;

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

    private $dao_user;
    private $chat_controller;

    function __construct() {
        parent::__construct();
        $this->dao_user = new DAOUser();
        $this->chat_controller = new ChatController();
    }

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

    public function chat_get_users($id) {
        $this->retour_ajax($this->chat_controller->get_users($id));
    }

    protected function retour_ajax($datas) {
        header('Content-Type: application/json');
        echo json_encode($datas);
    }

}
