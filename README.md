# FRAMEWORK PHP MVC BEWEB 
## Description
Ce projet est une etude de php a travers la mise en place d'un "framework" basé sur le modèle mvc   
Cette implémentation est le résultat du TD mis en place au sein de l'ecole beWeb.   

## Installation
1. clonez le dépôt a la racine de votre serveur web.
2. mettez en place les virtualhosts (si necessaire).
3. installez les dépendances avec la commande : composer install
4. configurez les accés en base de données dans le fichier database.json
5. effetuez une requette http a la racine (ex : http://php-mvc.bwb/)
6. Vous devrez voir apparaitre le texte suivant : FRAMEWORK MVC PHP beWeb

## Structure
Le framework s'appuie sur le modèle MVC afin de s'assurer la séparation des tâches.   
Il est donc livré avec les dossiers et les fichiers permettant de pouvoir travailler sur la logique métier.   

1. Le dossier core/   
il contient tous les fichiers necessaires au fonctionnement du framework. 
2. Le dossier config/   
Contient les fichiers de configuration :
 * database.json : configuration de la base de données
 * routing.json : configuration du mapping entre les routes et les controleurs
3. Le dossier controllers/   
Doit contenir les controleurs qui vont être invoqués lors des requêtes http
4. Le dossier dao/   
Doit contenir les fichiers DAO pour l'accés aux données
5. Le dossier models/   
Doit contenir les entités correspondant a la logique metier de l'application
6. Le dossier views/   
Doit contenir toutes les vues de l'application
7. Le dossier vendor/   
Qui contient les dépendances récupérées via composer
8. A la racine   
 * le fichier index.php qui est le point d'entrée de l'application
 * le fichier composer.json qui est le fichier de configuration de composer
 * le fichier .htaccess qui override la configuration d'apache (assurez vous d'avoir le mod_rewrite activé et opérationnel)

## Fonctionnement

### Prise en main

### Controller
Les fichiers controllers contiennent les methodes qui seront invoquées par l'objet Routing.   
L'implémentation des methodes correspond aux traitements effectués par le backend.  

Il faut creer une nouvelle classe héritant de Controller dans le dossier controllers/.   
Vous allez implémenter les méthodes décrites dans le fichier routing.json :   
```
{
    "/home":"ViewController:getHome"
}
```
dans le fichier ViewController.php :   
```
class ViewController extends Controller{

    public function getHome(){
        // traitement de la methode 
    }
}
```
vous pouvez acceder aux superglobales $_GET & $_POST via les methodes : 
````
inputGet();
inputPost();
````
Pour retourner une vue vous devez utiliser la methode render qui prend en premier argument le nom du fichier de vue se trouvant dans le dossier views/.   
vous pouvez organiser vos vues avec des sous dossiers dans ce cas vous renseignez les sous dossiers (sousdossier/fichier).   
le deuxième argument est un tableau associatif "nomdeLavariable" => valeur.  

par exemple pour retourner une vue affichant un utilisateur :   

ViewController.php :
````
class ViewController extends Controller{
    
    public function getUser(){
        $data = array(
            "user"=>(new DAOUser())->retrieve(1)
        );
        $this->render("vue_user",$data);
    }
}
````
user.php :
````
<?php
    echo $user->getId(); 
    
````
La valeur de clé du tableau associatif est le nom de la variable dans le fichier de vue.   


### DAO

### views

### Security middleware
 