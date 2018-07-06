<?php


namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Entreprise;
use BWB\Framework\mvc\models\Offre;
use PDO;

class DAOEntreprise extends DAO{
    
    /**
     * Fonction qui récupère les offres postées par une entreprise et qui sont en attente de validation.
     * @param int correspondant à l'id de l'entreprise dont on veut récupérer les offres.
     * @return toutes les offres en attentes de validation sous forme d'objet.
     */
        public function getEntrepriseWaitingOffre($id){

        $sql = "SELECT * FROM offre WHERE statut = false AND entreprise_user_id =".$id;
        $result=$this->getPdo()->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\Offre");
        $object = $result->fetchAll();
        return $object;

    }

        /**
     * Fonction qui récupère les offres validées postées par une entreprise.
     * @param int correspondant à l'id de l'entreprise dont on veut récupérer les offres.
     * @return toutes les offres validées sous forme d'objet.
     */
    
    public function getEntrepriseOffreValide($id){

        $sql = "SELECT * FROM offre WHERE statut = true AND entreprise_user_id =".$id;
        $result=$this->getPdo()->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\Offre");
        $object = $result->fetchAll();
        return $object;
    }
    
    /**
     * Fonction qui récupère le nom et le prénom des candidats ayant matchés avec l'entreprise ainsi que l'intitule de l'offre
     * sur la quelle le match à eu lieu.
     * @param int corespondant à l'id de l'entreprise dont on veut récupérer les infos liées au match.
     * @return type
     */
    
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

    public function get_new_entreprise() {
        $result = $this->getPdo()->query("SELECT * FROM entreprise ORDER BY date_creation DESC LIMIT 5");
        $result->setFetchMode(PDO::FETCH_CLASS, Entreprise::class);
        $donnees = $result->fetchAll();
        return $donnees;
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
