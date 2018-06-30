<?php
namespace BWB\Framework\mvc;

use BWB\Framework\mvc\SecurityMiddleware;

/**
 * 
 * La classe Controller sert de conteneur pour les developpeurs souhaitant beneficier
 * d'un cadre de developpement de la couche "active".
 * Le fonctionnement est que le client web utilise le protocole http 
 * pour executer la bonne methode du controlleur.
 * Le controlleur effectue le traitement et si besoin, s'appuie sur le dao.
 * a la fin du traitement le controlleur retourne la réponse au client.
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
     * REST : La methode post est utilisée pour Ajouter une ressource
     * 
     * @var array 
     */
    private $post;
    
    /**
     * Cette propriété correspond a la variable superglobale $_POST, 
     * elle sera initialisée a la création d'un controlleur
     * 
     * REST : La methode put est utilisée pour mettre a jour une ressource
     * 
     * @var array 
     */
    private $put;
    
    /**
     *
     * Cette propriété sera initialisée lors de l'appel de la methode 
     * securityLoader()
     * @var SecurityMiddleware 
     */
    protected $security;
    
    /**
     * Initialise le contexte de security.
     */
    protected function securityLoader() {
        $this->security = new SecurityMiddleware();
    }
    /**
     * Le constructeur sera invoqué a la création des objets heritant de cette classe
     * il initialisera les propriétés avec les valeurs des superglobales.
     * 
     */
    function __construct() {
        $this->get = $_GET;
        $this->post = $_POST;
        parse_str(file_get_contents("php://input"), $this->put);
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
    
    /**
     * retourne la propriété $put afin de la rendre disponible aux developpeurs
     * souhaitant étendre cette classe
     * 
     * @return array
     */
    protected function inputPut() {
        return $this->put;
    }
    
    /**
     * La methode render afficher la vue selectionnée grace au premier argument
     * La methode utilise les indirection pour generer dynamiquement les noms des variables
     * utilisées dans la vue.
     * 
     * @param string $pathToView chemin du fichier de vue demandé
     * @param array $datas La valeur par defaut permet de retourner des vues statiques
     */
    final protected function render($pathToView,$datas=null) {
        $user = null;
        if(!is_null($this->security)){
            $user = $this->security->acceptConnexion();
            $user = (!$user)?null:$user;
        }        
        if(is_array($datas)){
            foreach ($datas as $key => $value) {
                $$key = $value;
            }
        }
        include './views/' . $pathToView . ".php";
    }
}
