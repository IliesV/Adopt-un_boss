<?php
/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 03/07/2018
 * Time: 14:06
 */

namespace BWB\Framework\mvc\controllers;
use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOConnexion;

class LoginController extends Controller
{
    private $dao_view_candidat;
    private $dao_view_entreprise;

    /**
     * LoginController constructor.
     * @param $dao_view_candidat
     * @param $dao_view_entreprise
     */

    function __construct()
    {
        parent::__construct();
        $this->dao_view_candidat = new DAOConnexion();
        $this->dao_view_entreprise = new DAOConnexion();
        $this->securityLoader();
    }

    public function get_view_candidat()
    {
            $loginCandidat = $this->dao_view_candidat->get_view_candidat();
            $this->render("login_candidat",array(
                "loginCandidat"=>$loginCandidat,

    ));
    }

    public function verif_user(){
        $username = $this->inputPost()['username'];
        $password = $this->inputPost()['password'];
        $DAO = new DAOConnexion();
        $result = $DAO->verif_user($username, $password);
        if(!$result){
            $this->security->generateToken($result);

        }
            header('Location: /');

//        var_dump($result);


    }

//    public function get_view_entreprise()
//    {
//        if($element === 'entrerpise')
//        {
//            $loginEntreprise = $this->dao_view_entreprise->get_entreprise();
//            $this->render("login/candidat",array(
//                "loginCandidat"=>$loginEntreprise,
//            ));
//        }
//    }




}