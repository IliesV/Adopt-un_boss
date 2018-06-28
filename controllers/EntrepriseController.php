<?php
/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 26/06/2018
 * Time: 11:39
 */

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use DAOEntreprise;

class EntrepriseController extends Controller
{

    public function getProfil()
    {
        $DAOEntreprise = new DAOEntreprise();
        $entrepriseLiked = $DAOEntreprise->get_entreprise_like(20);
        $this->render("profil_entreprise", array("entrepriseLiked" => $entrepriseLiked));

    }
}
