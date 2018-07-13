<?php
/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 02/07/2018
 * Time: 09:53
 */

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAORegister;

class RegisterController extends Controller
{

    private $dao_register;
    
    function __construct() {
        parent::__construct();
        $this->dao_register = new DAORegister;
    }

    


    public function get_view_register()
    {
        $this->render("inscription");
    }
    
    public function add_user() {
        var_dump($this->inputPost());
        $date = time();
        $adresse = $this->inputPost()['adresse']." ".$this->inputPost()['code_postal']." ".$this->inputPost()['ville'];
        var_dump($adresse);
        if($this->inputPost()['perm']=="entreprise"):
        $this->dao_register->add_user_entreprise($this->inputPost()[],$date, $adresse);
            else:
        $this->dao_register->add_user_candidat($this->inputPost(),$date, $adresse);
        endif;
    }
    
    protected function check_user(){
        
    }
}
