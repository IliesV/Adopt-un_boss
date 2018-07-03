<?php
/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 26/06/2018
 * Time: 11:06
 */

namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Offre;
use PDO;
class DAOCandidat extends DAO
{
    //Récupération des "likes" du candidat par rapport a son id
    public function get_candidat_like($id){

        $sql = "SELECT intitule FROM offre WHERE id IN (SELECT offre_id FROM candidat_liked_offre WHERE candidat_user_id =".$id.")";
        $result=$this->getPdo()->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\Offre");
        $object = $result->fetchAll();
        return $object;

    }

    //Récupération des "matchs" du candidat par rapport a son id
    public function get_candidat_matchs($id){

        $sql = "SELECT entreprise.nom, offre.intitule
                FROM matching
                INNER JOIN entreprise ON entreprise.user_id = matching.entreprise_user_id
                INNER JOIN offre ON offre.id = matching.offre_id 
                WHERE matching.candidat_user_id=".$id;
        $result=$this->getPdo()->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\Match");
        $object=$result->fetchAll();
        return $object;
    }

    //Récupération des offres "a lire plus tard" du candidat par rapport a son id
    public function get_candidat_bookmark($id){

        $sql = "SELECT offre.intitule, entreprise.nom FROM candidat_bookmarked_offre
                INNER JOIN offre ON offre_id = offre.id
                INNER JOIN entreprise ON offre.entreprise_user_id = entreprise.user_id";
        $result=$this->getPdo()->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\Offre");
        $object = $result->fetchAll();
        return $object;

    }

    //Récupération des information du candidat par rapport a son id pour les afficher dans son profil
    public function get_user_data($id){

        $sql = "SELECT * FROM candidat WHERE user_id=".$id;
        $result=$this->getPdo()->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\Candidat");
        $object = $result->fetch();
        return $object;

    }

    // Envoi l'update du profil dans la BDD grace au button editer de la vue candidat
    public function update_profil($nom, $prenom, $age, $adresse, $tel, $mail, $photo, $description, $id){

        $sql = "UPDATE candidat SET nom=".$nom.",prenom=".$prenom.",age=".$age." ,adresse=".$adresse." ,tel=".$tel." ,mail=".$mail.",photo=".$photo.", description=".$description." WHERE user_id =".$id;
        echo $sql;
        $this->getPdo()->query($sql);


    }


    public function create($array)
    {
        // TODO: Implement create() method.
    }

    public function retrieve($id)
    {
        // TODO: Implement retrieve() method.
    }

    public function update($array)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement update() method.
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getAllBy($filter)
    {
        // TODO: Implement getAllBy() method.
    }
}