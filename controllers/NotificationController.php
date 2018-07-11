<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;

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

    function __construct() {
        parent::__construct();
        $this->dao_notif = new DAONotif;
    }

    public function get_notifs($id_user) {
        return array(
            "message" => $this->get_message_notif($id_user),
            "like" => $this->get_like_notif($id_user),
            "match" => $this->get_match_notif($id_user)
        );
    }

    protected function get_message_notif($id_user) {
        $old_message = $this->dao_notif->old_message($id_user);
        $new_message = $this->dao_notif->new_message($id_user);
        if ($old_message - $new_message !== 0):
            return false;
        else:
            return true;
        endif;
    }

    protected function get_like_notif($id_user) {
        $old_like = $this->dao_notif->old_like($id_user);
        $new_like = $this->dao_notif->new_like($id_user);
        if ($old_like - $new_like !== 0):
            return false;
        else:
            return true;
        endif;
    }

    protected function get_match_notif($id_user) {
        $old_match = $this->dao_notif->old_match($id_user);
        $new_match = $this->dao_notif->new_match($id_user);
        if ($old_match - $new_match == 0):
            return false;
        else:
            return true;
        endif;
    }

}
