<?php
/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 26/06/2018
 * Time: 11:08
 */

namespace BWB\Framework\mvc\controllers;
use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOLike;

class CandidatController extends Controller
{

    public function getProfil()
    {
        $DAOLike = new DAOLike();
        $offreLiked = $DAOLike->get_candidat_like(4);
        $this->render("candidat",array("offreLiked"=>$offreLiked));

    }
    
    public function retrieve($id){
        
    }
}

