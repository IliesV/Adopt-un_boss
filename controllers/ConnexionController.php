<?php
/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 04/07/2018
 * Time: 11:14
 */

namespace BWB\Framework\mvc\controllers;

use Exception;
use Firebase\JWT\JWT;
use BWB\Framework\mvc\models\Candidat;

class ConnexionController {

    private $payload;
    private $expiration = (60 * 60 * 24);
    private $passport = "Bonjour a tous";

    public function generate_token($usern) {
        if ($usern) {
            $this->payload = array(
                "nom" => $usern->getNom(),
                "prenom" => $usern->getPrenom(),
//            "id" => $user->getId(),
                "exp" => time() + $this->expiration
            );
            //var_dump($this->payload);
            $tkn = JWT::encode($this->payload, $this->passport);
            setcookie("tkn", $tkn, $this->payload['exp'], "/");
            return $tkn;
        } else {
            ?>
            <h1><?= 'une erreur est servenue lors de la connexion, veuilez verifiez vos identifiant' ?></h1>
            <meta http-equiv='Refresh' content='3;URL=/login/candidat'>
            <?php
        }
    }

    /**
     * verifie l'integrité du token envoyé par le client
     *
     * @param string $jwt le token reçu par le serveur
     * @return mixed le payload si le token est valide, faux dans LES cas contraires.
     */
    public function verifyToken($jwt) {
        try {
            $payload = JWT::decode($jwt, $this->passport, array('HS256'));
            $candidat = new Candidat();
            $candidat->transform($payload);
            return $candidat;
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
