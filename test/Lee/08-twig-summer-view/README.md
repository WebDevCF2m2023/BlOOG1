# BlOOG1

Blog en PHP 8 - MVC OO - Travail du Groupe 1

## Installation

1. Créez un fork du projet
2. Clonez le fork du projet sur votre machine
3. Créez un upstream pour pouvoir récupérer les mises à jour du projet
4. Dupliquez le fichier `config.php.ini` en `config.php` et configurez les variables d'environnement
5. Importez la base de données `datas/bioog-v3-structure-datas.sql` sur votre serveur de bases de données `MySQL 8`
6. Créez un dossier avec votre prénom dans le dossier `test`, c'est dans ce dossier que vous allez travailler

### Composer

Installation de composer :

https://getcomposer.org/download/

### Twig

Documentation : https://twig.symfony.com/doc/3.x/

#### Installation
```bash
composer require "twig/twig:^3.0"
```

Dans `index.php` :

```php
###
// chemin vers les classes Twig
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

###
// chargement de l'autoload de composer
require_once PROJECT_DIRECTORY.'/vendor/autoload.php';

// chemin vers les templates twig
$loader = new FilesystemLoader(PROJECT_DIRECTORY.'/view/');
// création d'une instance de $twig
$twig = new Environment($loader, [
    'cache' => false, // pas de cache en dev
    // 'cache' => '/path/to/compilation_cache', // chemin du cache pour la prod
    // activation du debug en dev
    'debug' => true,
]);
###
```



### Trello

https://trello.com/b/Ek39OVjJ/bloog1

### Permissions
- administrateur
- modérateur
- Auteur
- Abonné

### Utilisateurs
- Administrateur :
    - login : admin
    - mot de passe : admin
- Modérateur :
    - login : modo
    - mot de passe : modo
- Auteur :
    - login : hugove
    - mot de passe : hugove
- Abonné :
    - login : abonne1
    - mot de passe : abonne1
    - login : abonne2
    - mot de passe : abonne2