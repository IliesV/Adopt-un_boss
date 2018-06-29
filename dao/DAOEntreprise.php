<?php


namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Offre;
use PDO;

class DAOEntreprise extends DAO{
    
    //Fonction qui récupère la liste des offres postées par une entreprise et qui ne sont pas encore validées
    //
        public function getEntrepriseWaitingOffre($id){

        $sql = "SELECT * FROM offre WHERE statut = false AND entreprise_user_id =".$id;
        $result=$this->getPdo()->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\Offre");
        $object = $result->fetchAll();
        return $object;

    }
    
    public function getEntrepriseOffreValide($id){

        $sql = "SELECT * FROM offre WHERE statut = true AND entreprise_user_id =".$id;
        $result=$this->getPdo()->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\Offre");
        $object = $result->fetchAll();
        return $object;
    }
    
    public function getEntrepriseMatch($id){

        $sql = "SELECT candidat.prenom, candidat.nom, offre.intitule
                FROM matching
                INNER JOIN candidat ON candidat.user_id = matching.candidat_user_id
                INNER JOIN offre ON offre.id = matching.offre_id 
                WHERE matching.entreprise_user_id=".$id;
        $result=$this->getPdo()->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\Match");
        $object=$result->fetchAll();
        return $object;
    }
    
    public function getEntrepriseInfos($id){

        $sql = "SELECT * FROM entreprise WHERE user_id=".$id;
        $result=$this->getPdo()->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\Entreprise");
        $object=$result->fetchAll();
        return $object;
    }
    public function create($entreprise) {
        $sql = "INSERT INTO entreprise (nom, tel, adresse, logo, salarie, description, site_web, date_creation, mail, password) VALUES ("
        .$entreprise->getNom().","
        .$entreprise->getTel().","
        .$entreprise->getAdresse().","
        .$entreprise->getLogo().","
        .$entreprise->getSalaries().","
        .$entreprise->getDescription().","
        .$entreprise->getSiteWeb().","
        .$entreprise->getDateCreation().","
        .$entreprise->getMail().","
        .$entreprise->getPassword().",";
        $this->getPdo()->query($sql);
        
    }

    public function delete($id) {
        $sql = "DELETE FROM";
        
    }
    
    public function getOffreWaiting($id){
        $sql = "SELECT";
    }

    public function getAll() {
        
    }

    public function getAllBy($filter) {
        
    }

    public function retrieve($id) {
        
    }

    public function update($array) {
        
    }

}
