<?php
/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 26/06/2018
 * Time: 11:08
 */

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOCandidat;


class CandidatController extends Controller
{
    private $dao_candidat;
    
    function __construct() {
        parent::__construct();
        $this->dao_candidat = new DAOCandidat();
        $this->securityLoader();
        
    }
    
    public function get_profil()
    {
        if($this->security->acceptConnexion()){
            $this->dao_candidat->get_user_data(4);
            $offreLiked = $this->dao_candidat->get_candidat_like(4);
            $matchsCandidat = $this->dao_candidat->get_candidat_matchs(4);
            $waitingCandidat = $this->dao_candidat->get_candidat_bookmark(4);
            $user = $this->dao_candidat->get_user_data(4);
            $this->render("profil_candidat",array(
                "matchsCandidat"=>$matchsCandidat,
                "offreLiked"=>$offreLiked,
                "waitingCandidat"=>$waitingCandidat,
                "user"=>$user
            ));
        }

    }
    public function update_profil(){
        header('Location: /profil');
        $update = $this->dao_candidat->update_profil($_POST['nom'],$_POST['prenom'],$_POST['age'],$_POST['adresse'],$_POST['tel'],$_POST['mail'],$_POST['photo'],$_POST['description'],4);

    }

    public function unlike_offre($id_user, $id_offre)
    {
        $DAO = new DAOCandidat();
        $DAO->unlike_offre($id_user,$id_offre);
        header('Location: /profil');

    }

    public function unwait_offre($id_user, $id_offre)
    {
        $DAO = new DAOCandidat();
        $DAO->unwait_offre($id_user, $id_offre);
        header('Location: /profil');
    }

}