<?php
/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 26/06/2018
 * Time: 11:08
 */

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\controllers\SecurityController;
use BWB\Framework\mvc\dao\DAOCandidat;
use BWB\Framework\mvc\dao\DAOMatch;
use BWB\Framework\mvc\dao\DAOOffre;
use BWB\Framework\mvc\SecurityMiddleware;

class CandidatController extends Controller {

    private $dao_candidat;
    private $dao_match;
    private $dao_offre;
    private $security_middleware;
    private $security_controller;

    function __construct() {
        parent::__construct();
        $this->dao_candidat = new DAOCandidat();
        $this->dao_match = new DAOMatch();
        $this->dao_offre = new DAOOffre();
        $this->security_middleware = new SecurityMiddleware();
        $this->security_controller = new SecurityController();
    }

    public function get_id() {
        return $this->security_middleware->verifyToken($_COOKIE['tkn'])->id;
    }

    public function get_role() {
        return $this->security_middleware->verifyToken($_COOKIE['tkn'])->role;
    }

    public function view_profil($id) {
        $user = $this->dao_candidat->get_user_data($id);
        $permission = $this->get_role();
        $idBoite = $this->get_id() ;
        $offres = $this->dao_offre->retrieve_all_validated_from_entrepriseId($idBoite);
        $this->render("profil_public_candidat", array(
            "user" => $user,
            "offres"=>$offres,
            "permission"=>$permission
        ));
    }
    
    public function like($id_candidat){
        
        $id_user = $this->get_id();
        $id_offre = $this->dao_offre->get_offre_id_from_intitule($_POST['intitule']);
        $this->dao_candidat->like_candidat($id_user, $id_candidat, $id_offre['id']);
        if($this->dao_match->check_if_match_candidat($id_candidat, $id_offre['id'])){
            $this->dao_match->new_match($id_user, $id_candidat, $id_offre['id']);   
        }
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }


    /**
     * Fonction qui permet de récupérer toutes les informations utiles à afficher dans le profil d'un candidat.
     * Ses informations personelles, les offres qu'il a likés, ses matchs ainsi que les offres bookmarkées.
     */
    public function get_profil() {
        $id_user = $this->get_id();
        if ($this->security_controller->is_connected()) {
            $offreLiked = $this->dao_candidat->get_candidat_like($id_user);
            $matchsCandidat = $this->dao_candidat->get_candidat_matchs($id_user);
            $waitingCandidat = $this->dao_candidat->get_candidat_bookmark($id_user);
            $user = $this->dao_candidat->get_user_data($id_user);
            $this->render("profil_candidat", array(
                "matchsCandidat" => $matchsCandidat,
                "offreLiked" => $offreLiked,
                "waitingCandidat" => $waitingCandidat,
                "user" => $user,
            ));
        } else {
            ?>
            <h1 style="text-align: center; margin-top: 50px; color: red"><?= 'Une Erreur est survenue lors de la connexion, Veuilez vous connectez' ?></h1>
            <meta http-equiv='Refresh' content='2;URL=/login/candidat'>
            <?php
        }
    }

    public function unlike_offre($id_offre) {
        $id_user = $this->get_id();
        $this->dao_candidat->unlike_offre($id_user, $id_offre);
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }

    public function unwait_offre($id_offre) {
        $id_user = $this->get_id();
        $this->dao_candidat->unwait_offre($id_user, $id_offre);
        header('Location: /profil');
    }

}
