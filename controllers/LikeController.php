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


class LikeController extends Controller
{
    private $dao_candidat;
    
    function __construct() {
        parent::__construct();
        $this->dao_candidat = new DAOCandidat();
        
    }

    public function dislike($id_candidat, $id_offre)
    {
        $offreLiked = $DAO->get_candidat_like(4);


        $matchsCandidat = $DAO->get_candidat_matchs(4);
        $waitingCandidat = $DAO->get_candidat_bookmark(4);
        $this->render("profil_candidat",array());

    }
}