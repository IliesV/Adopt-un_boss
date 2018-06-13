<?php
namespace BWB\Framework\mvc;

use PDO;
/**
 * Cette classe sert de conteneur aux objets gérant l'accès aux données
 * Les implémentations concrètes implémenterons les interfaces
 * la connexion a la base de données est initialisée à la création
 * de l'objet via le fichier de configuration 
 * @link config/database.json fichier de configuration de l'accès axu données
 *
 * @author beweb-loic
 */
abstract class DAO implements CRUDInterface, RepositoryInterface{
    /**
     * Cette propriété est une variable partagée entre toutes les instances
     * DAO ce qui evitera d'avoir plusieurs objets PDO tentant d'acceder 
     * en base de données.
     * Elle est donc privée avec un getter protected
     * @var PDO 
     */
    static private $pdo;  
    
    /**
     * Tous les objets DAO doivent avoir access à l'objet PDO, 
     * L'instanciation du premier objet, initialise le PDO avec les données
     * du fichier database.json
     * 
     */
    function __construct() {
        if(is_null(DAO::$pdo)){
            $config = json_decode(file_get_contents("./config/database.json"), true);
            DAO::$pdo = new PDO(
                    $config['driver'] . ":"
                    . "host=" . $config['host']
                    . ((empty($config['port'])) ? $config['port'] : (";port=" . $config['port']) )
                    . ";dbname=" . $config['dbname'], $config['username'], $config['password']
            );
        }       
    }
    
    /**
     * 
     * Ici l'accesseur est protected car l'objet PDO doit être accessible 
     * aux instances du DAO pour effectuer les requêtes 
     * sur le serveur de base de données.
     *  
     * @return DAO l'objet pdo stocké en variable de classe. 
     */
    protected function getPdo(){
        return DAO::$pdo;
    }

}
