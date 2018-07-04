<?php

namespace BWB\Framework\mvc\Controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOUser;


/**
 * Description of AjaxController
 *
 * @author amchi
 */
class AjaxController extends Controller {

    /**
     * Méthode qui retourne les utilisateurs en attente.
     * 
     * @param type $view
     */
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
