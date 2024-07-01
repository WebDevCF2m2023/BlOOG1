<?php

// session
session_start();

// on va utiliser notre connexion personnalisée (singleton)
use model\OurPDO;

// Appel de la config
require_once "../config.php";

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
