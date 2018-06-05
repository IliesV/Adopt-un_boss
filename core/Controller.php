<?php
/**
 * Description of Controller
 *
 * @author loic
 */
abstract class Controller {
    /**
     * Cette propriété correspond a la variable superglobale $_GET, 
     * elle sera initialisée a la création d'un controlleur 
     * 
     * @var array
     */
    private $get;
    
    /**
     * Cette propriété correspond a la variable superglobale $_POST, 
     * elle sera initialisée a la création d'un controlleur
     * 
     * @var array 
     */
    private $post;
    
    
    /**
     * Le constructeur sera invoqué a la création des objets heritant de cette classe
     * il initialisera les propriétés avec les valeurs des superglobales.
     * 
     */
    function __construct() {
        $this->get = $_GET;
        $this->post = $_POST;
    }

    /**
     * retourne la propriété $get afin de la rendre disponible aux developpeurs
     * souhaitant étendre cette classe
     * 
     * @return array
     */
    protected function inputGet(){
        return $this->get;
    }
    
    /**
     * retourne la propriété $post afin de la rendre disponible aux developpeurs
     * souhaitant étendre cette classe
     * 
     * @return array
     */
    protected function inputPost() {
        return $this->post;
    }
    
    
    protected function render($pathToView,$datas) {
        
    }
}
