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


class UnlikeController extends Controller
{

    public function unlike_offre($id_user, $id_offre)
    {
        $DAO= new DAOCandidat();
        $DAO->unliked_offre($id_user,$id_offre);
        header('Location: http://adopt-un-boss.bwb/profil');

    }
}