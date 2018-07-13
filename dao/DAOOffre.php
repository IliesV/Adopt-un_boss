<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Like;
use BWB\Framework\mvc\models\Offre;
use BWB\Framework\mvc\models\OffreVue;
use PDO;

/**
 * Description of DAOOffre
 *
 * @author ilies
 */
class DAOOffre extends DAO {

    public function create($offre) {
        $sql = "INSERT INTO offre (,) VALUES ("
                . $offre->getIntitule() . ","
                . $offre->getPoste() . ","
                . $offre->getLieu() . ","
                . $offre->getSalaire() . ","
                . $offre->getDetail() . ","
                . $offre->getDateCreation() . ","
                . $offre->getStatut() . ","
                . $offre->getEdition_Possible() . ")";
        $this->getPdo()->query($sql);
    }

    public function delete($id) {
        
    }

    /**
     * Fonction permettant de récupérer une offre en fonction de son id.
     * 
     * @param int correspondant à l'id de l'offre à retrieve
     * @return objet
     */
    public function retrieve($id) {
        $result = $this->getPdo()->query("SELECT * FROM offre WHERE id=" . $id);
        $result->setFetchMode(PDO::FETCH_CLASS, Offre::class);
        $object = $result->fetch();
        return $object;
    }

    /**
     * Fonction qui récupère toutes les offres validées et les retourne par ordre de création.
     * @return liste des offres validées sous forme d'objets.
     */
    public function retrieve_all_validated() {
        $result = $this->getPdo()->query("SELECT * FROM offre WHERE statut = 1 ORDER BY date_creation DESC");
        $result->setFetchMode(PDO::FETCH_CLASS, OffreVue::class);
        $objects = $result->fetchAll();
        foreach ($objects as $object) {
            $nomBoite = $this->get_entreprise_nom($object->getEntreprise_user_id());
            $technos = $this->get_offre_techno($object->getId());
            $typeContrat = $this->get_offre_contrat($object->getId());
            $object->setNomBoite($nomBoite);
            $object->setTechnos($technos);
            $object->setTypeContrat($typeContrat);
        }

        return $objects;
    }

    /**
     * Fonction qui récupère toutes les offres validées et les retourne par ordre de création.
     * @return liste des offres validées sous forme d'objets.
     */
    public function retrieve_last_five_validated() {
        $result = $this->getPdo()->query("SELECT * FROM offre WHERE statut = 1 ORDER BY date_creation DESC");
        $result->setFetchMode(PDO::FETCH_CLASS, OffreVue::class);
        $objects = $result->fetchAll();
        foreach ($objects as $object) {
            $nomBoite = $this->get_entreprise_nom($object->getEntreprise_user_id());
            $technos = $this->get_offre_techno($object->getId());
            $typeContrat = $this->get_offre_contrat($object->getId());
            $object->setNomBoite($nomBoite);
            $object->setTechnos($technos);
            $object->setTypeContrat($typeContrat);
        }

        return $objects;
    }

    /**
     * Fonction qui récupère toutes les offres validée d'une entreprise sauf celle consultée actuellement.
     * @param L'id de l'entreprise.
     * @param L'id de l'offre courante.
     * @return La liste des offres sous forme d'objets.
     */
    public function retrieve_all_validated_from_entreprise_id($idBoite, $idOffre) {
        $result = $this->getPdo()->query("SELECT * FROM offre WHERE statut = 1 AND entreprise_user_id =" . $idBoite . " AND id <>" . $idOffre . " ORDER BY date_creation DESC");
        if (!isset($result)) {
            return false;
        } else {
            $result->setFetchMode(PDO::FETCH_CLASS, OffreVue::class);
            $objects = $result->fetchAll();
            foreach ($objects as $object) {
                $nomBoite = $this->get_entreprise_nom($object->getEntreprise_user_id());
                $technos = $this->get_offre_techno($object->getId());
                $typeContrat = $this->get_offre_contrat($object->getId());
                $object->setNomBoite($nomBoite);
                $object->setTechnos($technos);
                $object->setTypeContrat($typeContrat);
            }

            return $objects;
        }
    }

    /**
     * Fonction qui récupère les cinq dernières offres postées par une entreprise.
     * @param L'id de l'entreprise.
     * @return La liste des offres sous forme d'objets.
     */
    public function get_last_five_offres_from_entreprise_id($idBoite) {

        $result = $this->getPdo()->query("SELECT * FROM offre WHERE statut = 1 AND entreprise_user_id =" . $idBoite . " ORDER BY date_creation DESC LIMIT 5");
        $result->setFetchMode(PDO::FETCH_CLASS, OffreVue::class);
        $objects = $result->fetchAll();
        foreach ($objects as $object) {
            $nomBoite = $this->get_entreprise_nom($object->getEntreprise_user_id());
            $technos = $this->get_offre_techno($object->getId());
            $typeContrat = $this->get_offre_contrat($object->getId());
            $object->setNomBoite($nomBoite);
            $object->setTechnos($technos);
            $object->setTypeContrat($typeContrat);
        }

        return $objects;
    }

    public function update($array) {
        
    }

    public function getAll() {
        
    }

    public function getAllBy($filter) {
        
    }

    /**
     * Fonction qui permet de retourner toutes les offres en attente de validation.
     * (statut=false)
     * Appelle list_object_offres pour le retour.
     * 
     * @return list d'objet.
     */
    public function retrieve_waiting_offres() {
        $result = $this->getPdo()->query("SELECT * FROM offre WHERE statut=false");
        $result->setFetchMode(PDO::FETCH_CLASS, Offre::class);
        $donnees = $result->fetchAll();
        return $donnees;
    }

    /**
     * Fonction qui permet de valider une offre(statut=false -> statut=true)
     * Attention : il faut d'abord vérifié que le statut de l'offre est sur false.
     * Voir DAOVerif.
     * 
     * @param int correspondant à l'id de l'offre à valider
     * @return type
     */
    public function validation_offre($id) {
        $result = $this->getPdo()->query("UPDATE offre SET statut=true WHERE id=" . $id);
        return $result->fetchAll();
    }

    /**
     * Fonction qui permet de supprimer une offre.
     * Attention : il faut d'abord vérifié que le statut de l'offre est sur false.
     * Voir DAOVerif.
     * 
     * @param int correspondant à l'id de l'user à delete
     * @return type
     */
    public function delete_offre($id) {
        $result = $this->getPdo()->query("DELETE FROM offre WHERE id=" . $id);
        return $result->fetchAll();
    }

    public function get_entreprise_id_from_offre_id($id) {
        $sql = "SELECT entreprise_user_id FROM offre WHERE id =" . $id;
        $result = $this->getPdo()->query($sql)->fetch();
        return $result[0];
    }

    public function get_entreprise_nom($id) {
        $sql = "SELECT nom FROM entreprise where user_id=" . $id;
        $result = $this->getPdo()->query($sql)->fetch();
        return $result[0];
    }

    public function get_offre_techno($id) {
        $sql = "SELECT nom FROM techno WHERE id IN (SELECT techno_id FROM offre_has_techno WHERE offre_id =" . $id . ")";
        $result = $this->getPdo()->query($sql)->fetchAll();
        return $result;
    }

    public function get_offre_contrat($id) {
        $sql = "SELECT type_de_contrat FROM type_de_contrat where id IN (SELECT type_de_contrat_id FROM offre_has_type_de_contrat WHERE offre_id =" . $id . ")";
        $result = $this->getPdo()->query($sql)->fetch();
        return $result[0];
    }

    /**
     * Fonction qui récupère toutes les offres contenant
     * la technologie passée en argument.
     * @param le nom de la techno.
     * @return La liste des offres sous forme d'objets.
     */
    public function get_offre_by_techno($techno) {
        $result = $this->getPdo()->query("SELECT * FROM offre WHERE statut = 1 AND id IN"
                . "(SELECT offre_id FROM offre_has_techno WHERE techno_id IN"
                . "(SELECT id FROM techno WHERE nom = '" . $techno . "'))");
        $result->setFetchMode(PDO::FETCH_CLASS, OffreVue::class);
        $objects = $result->fetchAll();
        foreach ($objects as $object) {
            $nomBoite = $this->get_entreprise_nom($object->getEntreprise_user_id());
            $technos = $this->get_offre_techno($object->getId());
            $typeContrat = $this->get_offre_contrat($object->getId());
            $object->setNomBoite($nomBoite);
            $object->setTechnos($technos);
            $object->setTypeContrat($typeContrat);
        }
        return $objects;
    }

    /**
     * Fonction qui récupère toutes les offres dont le type de contrat correspond
     * à celui passé en argument.
     * @param le nom du type de contrat.
     * @return La liste des offres sous forme d'objets.
     */
    public function get_offre_by_contrat($contrat) {
        $result = $this->getPdo()->query("SELECT * FROM offre WHERE statut = 1 AND id IN"
                . "(SELECT offre_id FROM offre_has_type_de_contrat WHERE type_de_contrat_id IN"
                . "(SELECT id FROM type_de_contrat WHERE type_de_contrat = '" . $contrat . "'))");
        $result->setFetchMode(PDO::FETCH_CLASS, OffreVue::class);
        $objects = $result->fetchAll();
        foreach ($objects as $object) {
            $nomBoite = $this->get_entreprise_nom($object->getEntreprise_user_id());
            $technos = $this->get_offre_techno($object->getId());
            $typeContrat = $this->get_offre_contrat($object->getId());
            $object->setNomBoite($nomBoite);
            $object->setTechnos($technos);
            $object->setTypeContrat($typeContrat);
        }
        return $objects;
    }

    /**
     * Fonction permettant de vérifier si le tag sur le quel l'utilisateur à cliqué est une technologie ou
     * un type de contrat. 
     * @param l'argument présent dans l'URI. 
     * @return boolean
     */
    public function check_argument($arg) {
        $sql = "SELECT nom FROM techno";
        $result = $this->getPdo()->query($sql);
        $technos = $result->fetchAll();
        foreach ($technos as $techno) {
            if ($techno[0] == $arg) {
                return TRUE;
            }
        }
        return FALSE;
    }

    /**
     * Fonction permettant de récupérer une offre les dernieres offres
     *
     * @param int correspondant à l'id de l'user à retrieve
     * @return objet
     */
    public function get_new_offre() {
        $result = $this->getPdo()->query("SELECT * FROM offre WHERE statut=true ORDER BY date_creation DESC LIMIT 5");
        $result->setFetchMode(PDO::FETCH_CLASS, Offre::class);
        $donnees = $result->fetchAll();
        return $donnees;
    }

    /**
     * Fonction qui récupère toute les infos de l'offre courante.
     * @param L'id de l'offre.
     * @return L'offre sous forme d'objet.
     */
    public function retrieve_current_offre($id) {
        $result = $this->getPdo()->query("SELECT * FROM offre WHERE id =" . $id);
        $result->setFetchMode(PDO::FETCH_CLASS, OffreVue::class);
        $object = $result->fetch();
        $nomBoite = $this->get_entreprise_nom($object->getEntreprise_user_id());
        $technos = $this->get_offre_techno($object->getId());
        $typeContrat = $this->get_offre_contrat($object->getId());
        $object->setNomBoite($nomBoite);
        $object->setTechnos($technos);
        $object->setTypeContrat($typeContrat);

        return $object;
    }

    public function like_offre($id_user, $id_offre) {
        $sql = "INSERT INTO candidat_liked_offre(candidat_user_id, offre_id) VALUES (" . $id_user . "," . $id_offre . ")";
        $this->getPdo()->query($sql);
    }

    public function like_candidat($id_user, $id_offre, $id_candidat) {
        $sql = "INSERT INTO entreprise_liked_candidat(entreprise_user_id, candidat_user_id, offre_id) VALUES (" . $id_user . "," . $id_offre . "," . $id_candidat . ")";
        $this->getPdo()->query($sql);
    }

    public function check_if_already_liked($id_user, $id_offre) {

        $sql = "SELECT * FROM candidat_liked_offre WHERE candidat_user_id =" . $id_user . " AND offre_id =" . $id_offre;
        $result = $this->getPdo()->query($sql);
        $check = $result->fetch();
        if (empty($check)) {
            return false;
        } else {
            return true;
        }
    }

    public function create_new_offre($id, $intitule, $poste, $lieu, $salaire, $detail, $type) {
        $date = date("Y-m-d");
        $sql = "INSERT INTO offre(entreprise_user_id, intitule, poste, lieu, salaire, "
                . "detail, date_creation, statut) "
                . "VALUES (" . $id . ",'" . $intitule . "','" . $poste . "','" . $lieu . "'," . $salaire . ",'" . $detail .
                "','" . $date . "',FALSE)";
        $this->getPdo()->exec($sql);
        $offre_id = $this->getPdo()->lastInsertId();
        $sql2 = "SET @id = (SELECT id FROM type_de_contrat WHERE type_de_contrat = '" . $type . "');
                 INSERT INTO offre_has_type_de_contrat(type_de_contrat_id, offre_id) VALUES (@id," . $offre_id . ")";
        $this->getPdo()->exec($sql2);
        return true;
    }

    public function add_technos_to_offre($technoId) {
        $sql = "SET @id =( SELECT id FROM offre ORDER BY id DESC LIMIT 1);
                INSERT INTO offre_has_techno(techno_id, offre_id) VALUES (" . $technoId . ",@id)";
        $this->getPdo()->exec($sql);
    }

    public function check_who_is_liking($offreId) {
        $sql = "SELECT candidat.prenom, candidat.nom, candidat.photo, candidat.user_id
                FROM candidat_liked_offre
                INNER JOIN candidat ON candidat.user_id = candidat_liked_offre.candidat_user_id 
                WHERE candidat_liked_offre.offre_id=" . $offreId;
        $result = $this->getPdo()->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, Like::class);
        $objects = $result->fetchAll();
        return $objects;
    }

    public function check_offre_statut_by_id($id) {
        if($this->getPdo()->query("SELECT * FROM `offre` WHERE id=".$id." AND statut=true")->fetch()==null):
            return false;
        else:
            return true;
        endif;
            
        
    }

}
