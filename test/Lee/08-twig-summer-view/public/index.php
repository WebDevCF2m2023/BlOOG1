<?php

// session
session_start();

// chemin vers les classes Twig
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

// on va utiliser notre connexion personnalisée (singleton)
use model\OurPDO;

// Appel de la config
require_once "../config.php";

// Notre autoload de classe
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY.'/' .$class . '.php';
});

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
$twig->addExtension(new \Twig\Extension\DebugExtension());

try {
// connexion à la database singleton
    $db = OurPDO::getInstance(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET,
        DB_LOGIN,
        DB_PWD);
// résultats en tableau associatif
    $db->setAttribute(OurPDO::ATTR_ERRMODE, OurPDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}catch (Exception $e){
    die($e->getMessage());
}
// chemin qui sera utilisé pour les liens absolus dans les vues
$root = "/test/Michael/08-twig-public-view/public/";


// Appel du router général
require_once PROJECT_DIRECTORY.'/controller/routerController.php';

// fermeture de la connexion
$db = null;