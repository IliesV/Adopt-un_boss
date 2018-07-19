<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\News;
use PDO;

/**
 * Description of DAONews
 *
 * @author amchi
 */
class DAONews extends DAO {

    public function create($array) {
        
    }

    public function delete($id) {
        
    }

    public function getAll() {
        
    }

    public function getAllBy($filter) {
        
    }

    /**
     * Fonction permettant de récupérer une news en fonction de son id.
     * Il faut d'abord passer par une vérification de l'id
     * 
     * @param int correspondant à l'id de la news à retrieve
     * @return objet
     */
    public function retrieve($id) {
        $result = $this->getPdo()->query("SELECT * FROM actualite WHERE id=" . $id);
        $result->setFetchMode(PDO::FETCH_CLASS, News::class);
        $donnees = $result->fetch();
        return $donnees;
    }

    public function update($array) {
        
    }

    /**
     * Fonction qui permet de retourner tous les news actives.
     * (statut=false)
     * 
     * @return list d'objet.
     */
    public function retrieve_active_news() {
        $result = $this->getPdo()->query("SELECT * FROM `actualite` WHERE statut=false ORDER BY date_creation ASC");
        $result->setFetchMode(PDO::FETCH_CLASS, News::class);
        $donnees = $result->fetchAll();
        return $donnees;
    }

    /**
     * Fonction qui delete une actualité, elle ne sera plus visible (statut=true)
     * 
     * @param int $id
     * @return type
     */
    public function delete_news($id) {
        $result = $this->getPdo()->query("UPDATE actualite SET statut=true WHERE id=" . $id);
        return $result->fetchAll();
    }

    /**
     * Fonction qui stocke une actualité en base de données.
     * 
     * @param array $datas correspond à un array de valeur a stockées.
     */
    public function create_news($datas) {
        $result = $this->getPdo()->query("INSERT INTO actualite(titre, texte, date_creation) VALUES ('" . $datas['titre'] . "','" . $datas['texte'] . "','" . $datas['date'] . "')");
    }

}
