<?php
/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 29/06/2018
 * Time: 11:48
 */

namespace BWB\Framework\mvc\controllers;


use BWB\Framework\mvc\Controller;
use PDO;

class UserController extends Controller
{
    protected function get_id()
    {
        return 4;
    }

    public function redirection()
    {
        $id = $this->get_id();
        $sql = "SELECT permission FROM user WHERE id=".$id;
        $result=$this->getPdo()->query($sql);
        var_dump($result);
    }



}