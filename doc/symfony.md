# SYMFONY

C'est un framework PHP (cadriciel), une boîte à outils logicielle. CRUD (Create / Read / Update / Delete) -> Symfony va nous permettre de faciliter le développement d'applis en PHP

* logiciel libre créé en 2009 par Fabien Potencier
* v.5.2
* c'est un ensemble de composants (components) dont le coeur s'appelle le kernel en anglais (noyau). On peut installer uniquement le kernel mais son fonctionnement sera limité. il faudra installer d'autres composants.

## LES COMPOSANTS

* doctrine : gère la BDD / ORM (object relation manager) -> dans l'appli symfony on ne connaît que l'ORM
* twig : va servir à faire des templates (gabarit) HTML // composant qui va gérer un fichier
* monolog : outil pour gérer les journaux de logiciels (historique, journaux d'utilisation)
* API : sert à créer une architecture pour que le dev front puisse accéder à ses données
On peut utiliser chacun de ces composants séparemment

## COMPOSER

* Composer s'utilise dans le terminal (il faut installer un terminal et composer)
* Ces composants sont installés avec un outil PHP -> Composer
* Pour installer doctrine :
        ////////////////// composer require doctrine //////////////

* Tout programme qui respecte les conventions psr-4 peut être chargé avec Composer (installé et utilisé)
**Installation de Symfony -> pour créer mon_projet**

      * composer create-project symfony/website-skeleton nom_projet
      * composer require symfony/apache-pack
      * php bin/console make:controller
      * composer require annotations
      * php bin/console debug:router

## INSTALLATION DE SYMFONY

1. copie des fichiers
pour installer un projet symfony : "nom_du_projet"

      * version complete : composer create-project symfony/website-skeleton my_project_name
      * version minimale : composer create-project symfony/skeleton my_project_name

2. installer le Apache pack
composer require symfony/apache-pack
3. créer la base de données (identifiant/mdp/bdd) puis configurer le fichier .env

## FLEX

* Aucun rapport avec le flex de CSS
* Flex est un logiciel qui va servir à gérer l'installation des composants
* Les devs écrivent une recette qui explique comment va s'insataller les composants de Symfony

## LES RÉPERTOIRES

* bin : fichiers exécutables si PHP est installé, des outils pour nous simplifier la vie (la console, phpunit, etc.)
* config : contient les fichiers de configurations de Symfony et de ses composants
* migrations : doctrine va versionner l'évolution de la structure de la BDD (fichiers PHP)
* public : dossier qu'il faudra rendre accessible par le serveur HTTP
* src : code de l'appli
* template : contient les gabarits HTML
* tests : endroit ou l'on écrit les tests
* translations : les traductions
* var : fichiers temporaires de Symfony (cache et journaux)
* vendor : pas lié à Symfony mais à Composer qui stocke à cet endroit tous les fichiers

## LES FICHIERS

* .env : fichier de config pour notre environnement (connexion à la BDD)
* composer.json : fichier utile à composer pour paramétrer le paquet

## ARCHITECTURE MVC

* *MVC est une façon d'écrire du code en séparant trois éléments*

* Modèle (model) : l'ensemble du code qui va interagir avec la BDD
* Vue (view) : ce qui va concerner le rendu visuel
* Contrôleur (controller) : lien entre les deux et authentification des droits de modification

Intérêts :

* Façon d'organiser le code à plusieurs (pour les intégrateurs)
* Façon d'optimiser les performances (en séparant le code qui requête la BDD du code qui fait le rendu visuel)

D'autres architectures existent (ADR -> Action Domain Responder , DDD -> Domain Driven Design , etc.).

## DEBUG

Pour debuger on va utiliser essentiellement deux fonctions :

* dd()     -> dump and die : formater et avec des outils qui tuent la mort
* dump()   -> s'affiche dans le profiler (petite cible) avec des outils de recherche

Quelques outils :

* la couleur (coloration syntaxique)
* outil de repli des propriétés
* recherche avec 'ctrl + f' -> chercher des propriétés
Ce composant s'installe grâce à `composer req symfony/var-dumper`

## ANNOTATIONS

* Symfony utilise des annotations pour définir des ppropriétés en plus du code.
* EXEMPLES :
        /*exemple de commentaire multiligne*/
        /** Exemple d'annotations */

* Une annotation commence par @ et doit être importée avec un use etc.

## ROUTE

* Elle est légèrement différente d'une URL
* Morceau d'URL à laquelle va correspondre une action dans notre application
ex :
        /articles           : liste de tous les articles
        /articles/new       : créer un article
        /articles/1         : afficher l'article 1
        /articles/1/edit    : modifier l'article 1
        /articles/1/delete  : supprimer l'article 1

Pour utiliser les annotations dans le controller :

1. installer le paquet annotations 'composer require annotations'
2. utiliser un commentaire miltiligne pour donner une @Route
3. debug avec php bin/console debug:router
4. voir ArticlesController.php

## ENTITY (ENTITÉ)

Une table sera représentée par une classe dans Symfony. Les propriétés vont représenter les champs de la table. Seules les propriétés qui auront été marquées par des annotations seront converties dans la base de données en champs.
Pour créer la table il faut lancer la console :
```php bin/console doctrine:schema:update --force```
(déconseillé car pas de migrations (pas de maj automatique))
Pour générer plus facilement les entités, on peut utiliser :
```php bin/console make:entity```

Trois façons de créer une table :

1. Version compliquée, on se prend la tête : à rechercher dans la doc
        *Créer une nouvelle classe dans entity et l'annoter avec @ORM\ENtity
        * Dans cette classe on créera nos intitulés de colonnes que l'on définiera grâce aux annotations
        *On fait un getter pour l'id et un getter et un setter pour les autres intitulés de colonnes
        * Aller dans la console et taper `php bin/console doctrine:schema:update --force`
2. version moins compliquée mais pas propre quand même
        *Dans la console on met : `php bin/console make:entity`
        * La console nous propose de créer les colonnes et de leur donner une valeur (pas besoin de l'index / ajouter automatiquement)
        *On vérifie ce qu'il y a dans notre page qui a été créée
        * Aller dans la console et taper `php bin/console doctrine:schema:update --force`
3. version moins compliquée et propre
        *Dans la console on met : `php bin/console make:entity`
        * La console nous propose de créer les colonnes et de leur donner une valeur (pas besoin de l'index / ajouter automatiquement)
        *On vérifie ce qu'il y a dans notre page qui a été créée
        * Aller dans la console et taper `php bin/console make:migration`
        *Vérifier la classe créée
        * Lancer dans la console : `php bin/console doctrine:migrations:migrate` ou pour les feignasses : `php bin/console d:m:m`

## REPOSITORY

À côté de l'entité est créé un repository qui servira à contenir les fonctions de recherche dans la base de données.

## INJECTION DE DÉPENDANCES (dependency injection)

Lorsque l'on travaille dans le contrôleur (controller), on aura besoin de nombreux outils externes :

* l'outil de recherche dans une entité (BDD), le repository
* un outil d'envoi de mail (mailer)
* un outil pour hasher le mdp
* etc.
Dans Symfony, on accède facilement à ces instances grâce à l'injection de dépendances ; il suffit d'écrire le type et un nom de variable dans la méthode. Si Symfony connaît ce type, il l'instanciera et nous le fournira.
Quand Symfony met en relation nos fonctions et ses dépendances, on parle d'"autowiring".
La liste complète des dépendances utilisables :
```php bin/console debug:autowiring```
