<?php
/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 03/07/2018
 * Time: 14:06
 */

namespace BWB\Framework\mvc\controllers;
use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\Candidat;
use BWB\Framework\mvc\models\Entreprise;
use BWB\Framework\mvc\dao\DAOConnexion;


class LoginController extends Controller
{
    private $dao_connexion;
    private $controller_connexion;

    /**
     * LoginController constructor.
     * @param $dao_view_candidat
     * @param $dao_view_entreprise
     */

    function __construct()
    {
        parent::__construct();
        $this->dao_connexion = new DAOConnexion();
        $this->security = new ConnexionController();
        //$this->securityLoader();
    }

    public function get_view_candidat()
    {
            $this->render("login_candidat",array(
            ));
    }

    public function verif_user(){

        $username = $this->inputPost()['username'];
        $password = $this->inputPost()['password'];
        $result = $this->dao_connexion->verif_user($username, $password);
        $this->security->generate_token($result);
        $this->security->acceptConnexion();
        header( 'Location: /');

    }

    public function test(){
        var_dump($this->security->acceptConnexion());
        var_dump($_COOKIE);
    }

    public function get_data_candidat()
    {
        $this->render("login_candidat");
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