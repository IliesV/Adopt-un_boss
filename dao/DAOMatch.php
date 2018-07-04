<?php

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;

class DAOMatch extends DAO {

    public function create($array) {
        
    }

    public function delete($id) {
        
    }

    public function getAll() {
        
    }

    public function getAllBy($filter) {
        
    }

    public function retrieve($id) {
        
    }

    public function update($array) {
        
    }

    public function get_match($id, $type, $table) {
        return $result = $this->getPdo()->query("SELECT " . $table . "_user_id, offre_id FROM matching WHERE " . $type . "_user_id=" . $id)->fetchAll();
    }

}
