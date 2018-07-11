<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOChat;
use BWB\Framework\mvc\dao\DAONotif;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NotificationController
 *
 * @author NootNoot
 */
class NotificationController extends Controller {

    private $dao_notif;
    private $dao_chat;

    function __construct() {
        parent::__construct();
        $this->dao_notif = new DAONotif();
        $this->dao_chat = new DAOChat();
    }

    public function get_notifs($id_user, $role_user) {
        return array(
            "message" => $this->get_message_notif($id_user),
            "like" => $this->get_like_notif($id_user, $role_user),
            "match" => $this->get_match_notif($id_user, $role_user)
        );
    }

    protected function get_message_notif($id_user) {
        $old_message = $this->dao_notif->old_message($id_user)[0];
        $new_message = $this->dao_notif->new_message($id_user);
        if (intval($old_message) - intval($new_message) == 0):
            return false;
        else:
            return true;
        endif;
    }

    protected function get_like_notif($id_user, $role_user) {
        $role_recepteur = ($role_user == "entreprise" ? "candidat" : "entreprise");
        $old_like = $this->dao_notif->old_like($id_user)[0];
        $new_like = $this->dao_notif->new_like($id_user, $role_user, $role_recepteur);
        if (intval($old_like) - intval($new_like) == 0):
            return false;
        else:
            return true;
        endif;
    }

    protected function get_match_notif($id_user, $role_user) {
        $old_match = $this->dao_notif->old_match($id_user)[0];
        $new_match = $this->dao_notif->new_match($id_user, $role_user);
        if (intval($old_match) - intval($new_match) == 0):
            return false;
        else:
            return true;
        endif;
    }

}
