<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\controllers\ChatController;
use BWB\Framework\mvc\controllers\SecurityController;
use BWB\Framework\mvc\controllers\RegisterController;
use BWB\Framework\mvc\controllers\NotificationController;
use BWB\Framework\mvc\dao\DAOChat;
use BWB\Framework\mvc\dao\DAOConnexion;
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
    private $notif_controller;
    private $security_middleware;
    private $security_controller;
    private $dao_connexion;
    private $register_controller;

    function __construct() {
        parent::__construct();
        $this->dao_user = new DAOUser();
        $this->dao_chat = new DAOChat();
        $this->dao_connexion = new DAOConnexion();
        $this->chat_controller = new ChatController();
        $this->register_controller = new RegisterController();
        $this->notif_controller = new NotificationController();
        $this->security_controller = new SecurityController();
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
        $this->retour_ajax($this->chat_controller->get_users($id_user));
//        var_dump($this->chat_controller->get_users($id_user));
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

    public function verif_cookie() {
        $this->retour_ajax(json_decode($_COOKIE["user_message"]));
    }

    public function update_new_message($id) {
        $id_user = $this->get_id();
        $role_user = $this->get_role();
        $this->chat_controller->update_nombre_message($id_user, $role_user, $id);
    }

    public function get_notifs() {
        $id_user = $this->get_id();
        $role_user = $this->get_role();
        $this->retour_ajax($this->notif_controller->get_notifs($id_user, $role_user));
    }

    public function update_notifs() {
        $id_user = $this->get_id();
        $role_user = $this->get_role();
        $this->notif_controller->update_notifs($id_user, $role_user);
    }

    public function check_user() {
        $email = $this->inputPost()['email'];
        $password = $this->inputPost()['password'];
        $permission = $this->inputPost()['perm'];
        $id = $this->dao_connexion->get_id_when_mail_match($email, $permission)['user_id'];
        if ($id == null):
            $id = $this->dao_connexion->get_id_when_mail_match($email, "admin")['user_id'];
            if ($id == null):
                $this->retour_ajax(
                        array(
                            "mail" => false));
            else:
                $this->check_password($id, $password, "admin");
            endif;
        else:
            if($this->dao_user->get_status($id) === 1):
                            $this->check_password($id, $password, $permission);
            else:
                $this->retour_ajax(
                        array(
                            "statut" => false));
            endif;
        endif;
    }

    protected function check_password($id, $password, $permission) {
        $user = $this->dao_connexion->check_password($id, $password, $permission);
        if ($user == null):
            $this->retour_ajax(
                    array(
                        "mail" => true,
                        "password" => false
            ));
        else:
            $this->security_controller->generate_token($user);
            $this->retour_ajax(
                    array(
                        "connected" => true
            ));
        endif;
    }

    public function register_user() {
        $data = $this->inputPost();
        $verif1 = $this->register_controller->check_email($data['email'], "entreprise");
        $verif2 = $this->register_controller->check_email($data['email'], "candidat");
        $verif3 = $this->register_controller->check_email($data['email'], "admin");
        if ($verif1 !== false OR $verif2 !== false OR $verif3 !== false) {
            $this->retour_ajax(
                    array(
                        "register" => false,
                        "perm" => $data['perm'])
            );
        } else {
            $this->register_controller->register_user($data);
            $this->retour_ajax(array("register" => true));
        }
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
