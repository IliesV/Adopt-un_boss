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
    
    function __construct() {
        $this->config = json_decode(
                file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/config/routing.json")
                , true
                );
    }

}
