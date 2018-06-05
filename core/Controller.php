<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author loic
 */
abstract class Controller {
    
    private $get;
    
    private $post;
    
    
    protected function inputGet(){
        return $this->get;
    }
    
    protected function inputPost() {
        return $this->post;
    }
    
    
    protected function render($pathToView,$datas) {
        
    }
}
