<?php
namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ViewController
 *
 * @author loic
 */
class DefaultController extends Controller{
    

    public function getDefault() {
        
        $this->render("default");
    }
}
