<?php

// session
session_start();

// Appel de la config
require_once "../config.php";

// on va utiliser notre connexion personnalisée (singleton)
use model\OurPDO;


// chemin vers Twig
use Twig\Loader\FilesystemLoader;
use Twig\Environment;


// chargement de l'autoload
require_once '../vendor/autoload.php';


// chemin vers les templates twig
$loader = new FilesystemLoader('../view/');
// création d'une instance de $twig
$twig = new Environment($loader, [
    'cache' => false, // pas de cache en dev
    // 'cache' => '/path/to/compilation_cache', // chemin du cache pour la prod
    // activation du debug en dev
    'debug' => true,
]);


// our autoload
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY.'/' .$class . '.php';
});

// connect database
$dbConnect = OurPDO::getInstance( DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,
    DB_LOGIN,
    DB_PWD);
// résultats en tableau associatif
$dbConnect->setAttribute(OurPDO::ATTR_ERRMODE, OurPDO::ERRMODE_EXCEPTION);

// create routerController into the controller folder
require_once PROJECT_DIRECTORY."/controller/routerController.php";



// fermeture de la connexion
$dbConnect = null;
