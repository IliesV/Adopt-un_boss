<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\controllers\ChatController;
use BWB\Framework\mvc\dao\DAOChat;
use BWB\Framework\mvc\dao\DAOUser;
use BWB\Framework\mvc\SecurityMiddleware;
use function GuzzleHttp\json_decode;
use function GuzzleHttp\json_encode;

/**
 * Description of AjaxController
 *
 * @author amchi
 */
class AjaxController extends Controller {

    private $dao_user;
    private $dao_chat;
    private $chat_controller;
    private $security_middleware;
    private $security_controller;

    function __construct() {
        parent::__construct();
        $this->dao_user = new DAOUser();
        $this->dao_chat = new DAOChat();
        $this->chat_controller = new ChatController();
        $this->security_middleware = new SecurityMiddleware();
    }

    public function get_id() {
        return $this->security_middleware->verifyToken($_COOKIE['tkn'])->id;
    }

    public function get_role() {
        return $this->security_middleware->verifyToken($_COOKIE['tkn'])->role;
    }

    public function update_dashboard($view) {
        switch ($view):
            case 'user':
                $array_data = array();
                $datas = $this->dao_user->retrieve_waiting_users();
                foreach ($datas as $data) {
                    array_push($array_data, $data->to_array());
                }
                break;
        endswitch;

        $this->retour_ajax($array_data);
    }

    public function chat_get_users() {
        $id_user = $this->get_id();
       var_dump($this->chat_controller->get_users($id_user));
//        $this->retour_ajax($this->chat_controller->get_users($id_user));
    }

    public function chat_get_messages($id_recepteur) {
        $id_user = $this->get_id();
        $this->retour_ajax($this->chat_controller->get_messages($id_user, $id_recepteur));
    }

    public function save_message($id_recepteur) {
        $id_user = $this->get_id();
        $msg = $this->inputPost()['msg'];
        $this->chat_controller->save_message($id_user, $id_recepteur, $msg);
    }
    
    public function verif_cookie(){
        $this->retour_ajax(json_decode($_COOKIE["user_message"]));
    }

    public function update_new_message($id) {
        $id_user = $this->get_id();
        $role_user = $this->get_role();
        $this->retour_ajax($this->chat_controller->update_nombre_message($id_user, $role_user, $id));
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
