<?php
/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 02/07/2018
 * Time: 09:53
 */

namespace BWB\Framework\mvc\controllers;
use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOCandidat;
use BWB\Framework\mvc\dao\DAOEvent;
use BWB\Framework\mvc\dao\DAOOffre;
use BWB\Framework\mvc\dao\DAOEntreprise;

class HomeController extends Controller
{

    private $dao_event;
    private $dao_offre;
    private $dao_candidat;
    private $dao_entreprise;

    /**
     * HomeController constructor.
     * @param $dao_event
     * @param $dao_offres
     * @param $dao_candidats
     * @param $dao_entreprises
     */
    public function __construct()
    {
        parent::__construct();

        $this->dao_event = new DAOEvent();
        $this->dao_offre = new DAOOffre();
        $this->dao_candidat = new DAOCandidat();
        $this->dao_entreprise = new DAOEntreprise();
        $this->security = new ConnexionController();
    }


    public function get_view()
    {

        $events = $this->dao_event->get_event_valide();
        $offres = $this->dao_offre->get_new_offre();
        $candidats = $this->dao_candidat->get_new_candidat();
        $entreprises = $this->dao_entreprise->get_new_entreprise();
        $this->render("home",array(
            "events"=>$events,
            "offres"=>$offres,
            "candidats"=>$candidats,
            "entreprises"=>$entreprises
        ));
    }

}
