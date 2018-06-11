<?php
namespace BWB\Framework\mvc;
/**
 * Cette interface fourni les methodes pour la manipulation
 * des collections d'objets
 * @author beweb-loic
 */
interface RepositoryInterface {
    
    public function getAll();
    
    public function getAllBy($filter);
}
