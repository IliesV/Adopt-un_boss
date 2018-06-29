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
        
    }
    
    public function get_profil()
    {
        $this->dao_candidat->get_user_data(4);
        $offreLiked = $this->dao_candidat->get_candidat_like(4);
        $matchsCandidat = $this->dao_candidat->get_candidat_matchs(4);
        $waitingCandidat = $this->dao_candidat->get_candidat_bookmark(4);
        $this->render("profil_candidat",array(
            "matchsCandidat"=>$matchsCandidat,
            "offreLiked"=>$offreLiked,
            "waitingCandidat"=>$waitingCandidat,
            "user"=>$user,
        ));
    }
    public function update_profil(){
        $update = $this->dao_candidat->update_profil($_POST['nom'],$_POST['prenom'],$_POST['age'],$_POST['adresse'],$_POST['tel'],$_POST['mail'],$_POST['photo'],$_POST['description'],4);
        $this->render("profil_candidat",array("update"=>$update));
        header('Location: http://adopt-un-boss.bwb/profil');

    }
}