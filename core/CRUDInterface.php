<?php
namespace BWB\Framework\mvc;
/**
 * Cette interface fournie les methodes du CRUD 
 * ( manipulation d'une seule entité)
 * @author beweb-loic
 */
interface CRUDInterface {
    
    public function create($array);
    
    public function retrieve($id);
    
    public function update($array);
    
    public function delete($id);    
}
