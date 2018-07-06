<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\controllers\ChatController;
use BWB\Framework\mvc\dao\DAOUser;
use function GuzzleHttp\json_encode;

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

    public function chat_get_messages($id_user, $id_recepteur) {
        $this->retour_ajax($this->chat_controller->get_messages($id_user, $id_recepteur)); 
    }

    /**
     * Méthode qui retourne les données apres success de la requete ajax
     * 
     * @param type $datas
     */
    protected function retour_ajax($datas) {
        header('Content-Type: application/json');
        echo json_encode($datas);
    }

}
