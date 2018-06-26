<?php
/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 26/06/2018
 * Time: 11:39
 */

namespace BWB\Framework\mvc\controllers;
use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOLike;

class EntrepriseController extends Controller
{

    public function getProfil()
    {
        $DAOLike = new DAOLike();
        $entrepriseLiked = $DAOLike->get_entreprise_like(20);
        $this->render("entreprise", array("entrepriseLiked" => $entrepriseLiked));

    }
}