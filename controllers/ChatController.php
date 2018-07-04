<?php

namespace BWB\Framework\mvc\Controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOMatch;
use BWB\Framework\mvc\dao\DAOOffre;
use BWB\Framework\mvc\dao\DAOUser;

class ChatController extends Controller {

    private $dao_match;
    private $dao_user;
    private $dao_offre;

    function __construct() {
        parent::__construct();
        $this->dao_match = new DAOMatch();
        $this->dao_user = new DAOUser();
        $this->dao_offre = new DAOOffre();
    }

    /**
     * Méthode qui retourne la vue.
     */
    public function get_view() {
        $this->render("chat");
    }

    /**
     * Méthode qui recherche les utilisateurs a qui l'utilisateur connecté peut 
     * envoyé un message. Il faut qu'il y ai un match.
     * 
     * @param type $id
     */
    public function get_users($id) {
        $permission_user = $this->dao_user->get_user_permission($id);
        $permission_recepteur = ($permission_user == "entreprise" ? "candidat" : "entreprise");
        $matchs = $this->dao_match->get_match($id, $permission_user, $permission_recepteur);
        $matchs_object = $this->match_to_object($matchs, $permission_recepteur);
        var_dump($matchs_object);
    }
    
    /**
     * Méthode qui transforme les entité récupéré dans les match en objet.
     * 
     * @param type $matchs
     * @param type $permission_recepteur
     * @return array
     */
    protected function match_to_object($matchs, $permission_recepteur){
        $array = array();
        foreach ($matchs as $match):
            $user = $this->dao_user->retrieve_user($permission_recepteur, $match[$permission_recepteur . '_user_id']);
            $offre = $this->dao_offre->retrieve($match['offre_id']);
            $temp= array(
                "user"=>$user->to_array(),
                "offre"=>$offre->to_array()
            );
            array_push($array, $temp);
        endforeach;
        return $array;
    }
}
