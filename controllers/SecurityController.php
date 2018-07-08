<?php

/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 04/07/2018
 * Time: 11:14
 */

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\dao\DAOUser;
use BWB\Framework\mvc\models\Candidat;
use Exception;
use Firebase\JWT\JWT;

class SecurityController {

    private $payload;
    private $expiration = (60 * 60 * 24);
    private $passport = "Bonjour a tous";
    private $dao_user;

    function __construct() {
        $this->dao_user = new DAOUser();
    }

    public function generate_token($user) {
        $this->payload = array(
            "id" => $user->getUser_id(),
            "role" => $user->getRoles(),
            "exp" => time() + $this->expiration
        );
        $tkn = JWT::encode($this->payload, $this->passport);
        setcookie("tkn", $tkn, $this->payload['exp'], "/");
        return $tkn;
    }

    /**
     * verifie l'integrité du token envoyé par le client
     *
     * @param string $jwt le token reçu par le serveur
     * @return mixed le payload si le token est valide, faux dans LES cas contraires.
     */
    public function verifyToken() {
        try {
            $payload = JWT::decode($_COOKIE['tkn'], $this->passport, array('HS256'));
            var_dump($payload);
            $user = new Candidat();
            $user->transform($payload);
            return $user;
        } catch (Exception $ex) {
            return false;
        }
    }

    /**
     * La methode est invoquée dans la methode du controlleur où
     * l'on veut effectuer la verification.
     * La methode est utilisées lorsque le token transite via les cookies
     *
     * @return mixed le payload si le token est valide, faux dans LES cas contraires.
     */
    public function is_connected() {
        $connected = (isset($_COOKIE['tkn'])) ? true : false;
        return $connected;
    }

    /**
     * Désactive le cookie du coté serveur
     * @return boolean true si la modification a fonctionnée, false dans le cas contraire
     */
    public function deactivate() {
        return setcookie("tkn", null, time());
    }

}
