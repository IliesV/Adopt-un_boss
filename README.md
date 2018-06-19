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

### DAO

### views

### Security middleware
 