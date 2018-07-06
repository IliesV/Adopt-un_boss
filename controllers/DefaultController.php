<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\DefaultModel;

/**
 * Ceci est un exemple de contrôleur 
 * il charge le security middleware dans le constructeur
 * 
 *
 * @author loic
 */
class DefaultController extends Controller {

    /**
     * Le constructeur de la classe Controller charge les datas passées par le client,
     * Pour charger le security middleware, le contrôleur concret invoque la methode
     * @see \BWB\Framework\mvc\Controller::securityLoader() 
     * pour charger la couche securité.
     */
    function __construct() {
        parent::__construct();
        $this->securityLoader();
    }

    /**
     * Retourne la vue default.php qui se trouve dans le dossier views.
     * 
     * @link / methode invoquée lors d'une requête à la racine de l'application
     */
    public function getDefault() {
        $this->render("default");
    }

    /**
     * Simule un utilisateur qui se loggue.
     * On utilise l'objet {@see DefaultModel} qui retourne des valeurs par defaut
     * pour la generation du token. 
     * 
     * @link /login URI definie dans le fichier config/routing.json     * 
     * 
     */
    public function login() {
        $this->security->generateToken(new DefaultModel());
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/token");
    }

    /**
     * Simule un utilisateur qui se deconnecte.
     * La metode effectue une redirection 
     * 
     * 
     * @link /logout URI definie dans le fichier config/routing.json  
     * 
     */
    public function logout() {
        $this->security->deactivate();
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/");
    }

    /**
     * Cette methode simule la verification du client
     * Affichage des informations du token pour s'assurer de l'identité. 
     *  
     * A tester apres s'etre connecté et a pres s'etre déconnecté afin de voir le comportement.
     * 
     * @link /token URI definie dans le fichier config/routing.json     * 
     * 
     */
    public function token() {

        var_dump($this->security->acceptConnexion());
//        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/");


    }

    /* Les methodes suivantes correspondent aux URI de test qui gèrent les verbes HTTP */
    
    /** 
     * Exemple d'utilisation avec la superglobale $_GET
     * 
     * @see Controller::inputGet() retourne la superglobale $_GET
     * 
     * @example /api/default/?test=petitMessage&key=valeur2 avec cette URI la methode retourne un tableau associatif correspondant aux données passées en arguments à l'URL
     */
    public function getDatasFromGET(){
        var_dump($this->inputGet());
    }
    
    /** 
     * Exemple d'utilisation avec la superglobale $_POST
     * 
     * @see Controller::inputPost() retourne la superglobale $_POST
     * 
     * @example /api/default ajouter dans le corps de la requete des données au format : x-www-form-urlencoded
     */
    public function getDatasFromPOST(){
        var_dump($this->inputPost());
    }
    
    /** 
     * Exemple d'utilisation avec la mise a jour d'une ressource via la methode PUT 
     * 
     * @see Controller::inputPut() retourne les données sous la forme d'un tableau associatif 
     * 
     * @example /api/default ajouter dans le corps de la requete des données au format : x-www-form-urlencoded
     */
    public function getDatasFromPUT(){
        var_dump($this->inputPut());
    }
    
    /** 
     * Ici la methode sera invoquée lors d'une requête HTTP dont le verbe est DELETE. 
     * L'exemple retourne les données des propriétés put, post et get. 
     * 
     * N'hésitez pas tester !
     */
    public function delete(){
        var_dump($this->inputPut());
        var_dump($this->inputPost());
        var_dump($this->inputGet());
    }
    
    /**
     * La methode affiche les données variables de l'URI comme definies dans le fichier routing.json. 
     * 
     * 
     * @param type $value correspond a la partie variable de l'URI dont le pattern est : (:).
     * 
     * @example /api/default/bonjour retournera bonjour. 
     * @example /api/default/32 retournera 32. 
     */
    public function getByValue($value){
        echo "valeur passée dans l'uri : " . $value;
    }
}
