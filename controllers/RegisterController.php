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


    /**
     * RegisterController constructor.
     * @param $dao_register

     */
//    public function __construct()
//    {
//        parent::__construct();
//
//        $this->dao_register = new DAORegister();
//    }


    public function get_view_register()
    {
        $this->render("inscription");
    }

}
