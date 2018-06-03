<?php
/**
 * L'objet Routing va invoquer la methode 
 * definie dans le fichier de configuration selectionnée grace à l'URI
 * 
 *
 * @author loic
 */
class Routing {
    /**
     *
     * @var Array Tableau associatif representant le fichier de configuration 
     */
    private $config;
    
    /**
     * Tableau representant l'URI
     * @var array 
     */
    private $uri;
    
    /**
     * Tableau representant la route correspondante à l'URI     * @var array
     */
    private $route;
    
    /**
     * Le controleur correspondant à la route trouvée
     * @var string 
     */
    private $controller;
    
    /**
     * Tableau des arguments a passer à la methode du controleur
     * @var array
     */
    private $args;
    
    
    
    function __construct() {
        $this->config = json_decode(
                file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/config/routing.json")
                , true
                );
    }
    
    /**
     * Execute l'algorithme de routing
     */
    public function execute() {
        $this->uri = explode("/", $_SERVER['REQUEST_URI']);
        foreach ($this->config as $key => $value) {
            $this->route = explode("/", $key);
            if($this->isEqual()){
                $this->compare();
                break;
            }
        }
    }


    /**
     * Compare la longueur des tableaux
     */
    private function isEqual() {
        return (count($this->uri) === count($this->route))?true:false;
    }
    
    /**
     * Retourne la clé (le controleur) dans le tableau des routes
     */
    private function getValue() {
        
    }
    
    /**
     * Ajoute l'element variable de l'URI dans la liste des arguments
     */
    private function addArgument() {
        
    }
    
    /**
     * Effectue la comparaison des elements 
     * entre l'URI et la route
     */
    private function compare() {
        
    }
    
    /**
     * Invoque la methode selectionnée
     */
    private function invoke() {
        
    }
}
