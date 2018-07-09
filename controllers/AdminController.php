<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\Controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOEvent;
use BWB\Framework\mvc\dao\DAONews;
use BWB\Framework\mvc\dao\DAOOffre;
use BWB\Framework\mvc\dao\DAOStat;
use BWB\Framework\mvc\dao\DAOUser;
use BWB\Framework\mvc\dao\DAOVerif;
use PHPMailer\PHPMailer\PHPMailer;
use TheSeer\Tokenizer\Exception;

/**
 * Description of UserController
 *
 * @author NootNoot
 */
class AdminController extends Controller {

    private $dao_user;
    private $dao_verif;
    private $dao_offre;
    private $dao_event;
    private $dao_news;
    private $dao_stat;

    function __construct() {
        parent::__construct();
        $this->dao_user = new DAOUser();
        $this->dao_verif = new DAOVerif();
        $this->dao_offre = new DAOOffre();
        $this->dao_event = new DAOEvent();
        $this->dao_news = new DAONews();
        $this->dao_stat = new DAOStat();
    }

    /**
     * Fonction appelé lorsque URI = /gestion, /gestion/view/(:), /gestion/view/(:)/(:)
     * Récupère :
     *  - la liste d'users en attente
     *  - un user particulier
     *  - la liste d'offres en attente
     *  - une offre particulière
     *  - la liste d'events en attente
     *  - un event particulier
     *  - la liste des news en attente
     *  - une news particulières
     * 
     * Redirige vers gestion_admin avec les donnèes necessaires.
     */
    public function get_view($view = null, $id = null) {
        if (!isset($view)):
            $datas = $this->get_stats();
            $this->render("gestion_admin", array("view" => "dashboard_home", "datas" => $datas));
        else:
            switch ($view):
                case "users":
                    $datas = $this->dao_user->retrieve_waiting_users();
                    $data_by_id = $this->check_user_by_id($id);
                    break;
                case "offres":
                    $datas = $this->dao_offre->retrieve_waiting_offres();
                    $data_by_id = $this->check_offre_by_id($id);
                    break;
                case "events":
                    $datas = $this->dao_event->retrieve_waiting_events();
                    $data_by_id = $this->check_event_by_id($id);
                    break;
                case"news":
                    $datas = $this->dao_news->retrieve_active_news();
                    $data_by_id = $this->check_news_by_id($id);
                    break;
                default:
                    $this->render("gestion_admin", array("view" => "dashboard_" . $view));
            endswitch;
            $this->render("gestion_admin", array("datas" => $datas, "view" => "dashboard_" . $view, "data_by_id" => $data_by_id));
        endif;
    }

    /**
     * Fonctions check_entitée_by_id
     * Permet de vérifier une entitée puis de la retrieve
     * 
     * @param int $id
     * @return boolean si l'entité n'est pas vérifié
     * @return object si l'entité est vérifié
     */
    protected function check_user_by_id($id) {
        if (isset($id)):
            $checked_id = $this->dao_verif->check_status_user($id);
            if (!$checked_id):
                return false;
            endif;
            $user = $this->dao_user->retrieve_user($checked_id['permission'], $id);
            return $user;
        endif;
    }

    protected function check_offre_by_id($id) {
        if (isset($id)):
            $checked_id = $this->dao_verif->check_status_offre($id);
            if (!$checked_id):
                return false;
            endif;
            $offre = $this->dao_offre->retrieve($id);
            return $offre;
        endif;
    }

    protected function check_event_by_id($id) {
        if (isset($id)):
            $checked_id = $this->dao_verif->check_status_event($id);
            if (!$checked_id):
                return false;
            endif;
            $event = $this->dao_event->retrieve($id);
            return $event;
        endif;
    }

    protected function check_news_by_id($id) {
        if (isset($id)):
            $checked_id = $this->dao_verif->check_status_news($id);
            if (!$checked_id):
                return false;
            endif;
            $event = $this->dao_news->retrieve($id);
            return $event;
        endif;
    }

    /**
     * Validation redirige vers la méthode dédié pour chaque entitée
     * 
     * @param char $view correponds à la vue depuis laquelle la méthode est appellée.
     * @param int $id correspond à l'id de l'entitée à valider
     * @return pas de retour car on redirige vers une URI
     */
    public function validation($view, $id) {
        switch ($view):
            case "user":
                $retour = $this->user_to_valid($id);
                header("Location: /ajax/update/user");
                break;
            case "offre":
                $retour = $this->offre_to_valid($id);
                header("Location: /gestion/view/offres");
                break;
            case "event":
                $retour = $this->event_to_valid($id);
                header("Location: /gestion/view/events");
                break;
        endswitch;
    }

    /**
     * Fonctions entite_to_valid :
     *  Permet de check une entitèe et de la validé en passant son statut a true.
     * 
     * @param int $id corresponds à l'id de l'entitée à validée
     * @return booleen en fonction du check de l'id
     */
    protected function user_to_valid($id) {
        $checked_id = $this->dao_verif->check_status_user($id);
        if (!$checked_id) {
            return false;
        }
        $this->dao_user->validation_user($id);
        return true;
    }

    protected function offre_to_valid($id) {
        $checked_id = $this->dao_verif->check_status_offre($id);
        if (!$checked_id) {
            return false;
        }
        $this->dao_offre->validation_offre($id);
        return true;
    }

    protected function event_to_valid($id) {
        $checked_id = $this->dao_verif->check_status_event($id);
        if (!$checked_id) {
            return false;
        }
        $this->dao_user->validation_user($id);
        return true;
    }

    /**
     * Delete redirige vers la méthode dédié pour chaque entitée
     * 
     * @param char $view correponds à la vue depuis laquelle la méthode est appellée.
     * @param int $id correspond à l'id de l'entitée à valider
     * @return pas de retour car on redirige vers une URI
     */
    public function delete($view, $id) {
        switch ($view):
            case "user":
                $retour = $this->user_to_delete($id);

                break;
            case "offre":
                $retour = $this->offre_to_delete($id);
                header("Location: /gestion/view/offres");
                break;
            case "event":
                $retour = $this->event_to_delete($id);
                header("Location: /gestion/view/events");
                break;
            case "news":
                $retour = $this->news_to_delete($id);
                header("Location: /gestion/view/news");
                break;
        endswitch;
    }

    /**
     * Fonctions entite_to_delete :
     *  Permet de check une entitèe et de la supprimer.
     * 
     * @param int $id corresponds à l'id de l'entitée à validée
     * @return booleen en fonction du check de l'id
     */
    protected function user_to_delete($id) {
        $checked_id = $this->dao_verif->check_status_user($id);
        if (!$checked_id) {
            return false;
        }
        $this->dao_user->delete_user($id);
        return true;
    }

    protected function offre_to_delete($id) {
        $checked_id = $this->dao_verif->check_status_offre($id);
        if (!$checked_id) {
            return false;
        }
        $this->dao_offre->delete_offre($id);
        return true;
    }

    protected function event_to_delete($id) {
        $checked_id = $this->dao_verif->check_status_user($id);
        if (!$checked_id) {
            return false;
        }
        $this->dao_event->delete_event($id);
        return true;
    }

    protected function news_to_delete($id) {
        $checked_id = $this->dao_verif->check_status_news($id);
        if (!$checked_id) {
            return false;
        }
        $this->dao_news->delete_news($id);
        return true;
    }

    /**
     * Fonction pour créer des entitées.
     * 
     * @param char $view correspond à la vue depuis laquelle la méthode est appelé
     * et corresponde à l'entité à créer.
     */
    public function creation($view) {
        switch ($view):
            case 'news':
                $this->stockage_news();
                header("Location: /gestion/view/news");
                break;
            case 'newsletter':
                $this->envoi_newsletter();
                header("Location: /gestion/view/newsletter");
                break;
        endswitch;
    }

    /**
     * Fonction de création de l'entitée News.
     */
    protected function stockage_news() {
        $datas = array(
            "titre" => $this->inputPost()['titre_news'],
            "texte" => $this->inputPost()['texte_news'],
            "date" => date('Y-m-d')
        );
        var_dump($datas);
        $this->dao_news->create_news($datas);
    }

    /**
     * Méthode d'envoi de newsletter.
     * L'admin choisit la cible de la newsletter.
     * On part chercher les emails et on les envoie vers envoi_newsletter
     */
    public function preparation_newsletter() {
        header('Content-Type: application/json');
        if ($this->inputPost()['user'] == 'Deux'):
            $permission = 'candidat';
            $permission1 = 'entreprise';
        else :
            $permission = strtolower($this->inputPost()['user']);
        endif;
        $mails = $this->dao_user->retrieve_email($permission, $permission1);
        foreach ($mails as $value):
            $this->envoi_newsletter($this->inputPost()['titre'], $this->inputPost()['texte'], $value['mail']);
        endforeach;
    }
    
    /**
     * Utilisation du composer PHP MAILER pour envoyer les mails. 
     * 
     * @param type $titre
     * @param type $corp
     * @param type $mail_user
     */
    protected function envoi_newsletter($titre, $corp, $mail_user) {
        try {
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = 5;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'adopt.un.boss@gmail.com';
            $mail->Password = 'Adopt-un-b0ss';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('adopt.un.boss@gmail.com', 'Adopt-un-boss');
            $mail->addAddress($mail_user);
            $mail->isHTML(true);
            $mail->Subject = $titre;
            $mail->Body = $corp;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }

    /**
     * Méthode de récupération des stats
     * 
     * @return array
     */
    protected function get_stats() {
        $user = $this->dao_stat->count_user();
        $entreprise = $this->dao_stat->count_entreprise();
        $candidat = $this->dao_stat->count_candidat();
        $offre = $this->dao_stat->count_offre();
        $like = $this->dao_stat->count_like();
        $match = $this->dao_stat->count_match();
        return array(
            'user' => $user,
            'entreprise' => $entreprise,
            'candidat' => $candidat,
            'offre' => $offre,
            'like' => $like,
            'match' => $match
        );
    }

}
