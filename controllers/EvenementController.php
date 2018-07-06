<?php
/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 05/07/2018
 * Time: 10:29
 */

namespace BWB\Framework\mvc\controllers;
use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOEvent;

class EvenementController extends Controller
{
    private $dao_evenement;

    function __construct() {
        parent::__construct();
        $this->dao_evenement = new DAOEvent();

    }

    public function get_all_event()
    {
        $events = $this->dao_evenement->get_all_event();
        $this->render("evenement",array(
            "events"=>$events,
        ));

    }

    public function get_event_id($id){
        $eventId = $this->dao_evenement->get_event_id($id);
        $this->render("evenement_id",array(
            "eventId"=>$eventId,
        ));
    }
}