<?php
/**
 * Classe OurPDO
 *
 * Cette classe hérite de la classe PDO de PHP.
 * Elle permet de se connecter à une base de données
 * en utilisant le principe de singleton.
 *
 * Le singleton est un patron de conception (design pattern)
 * qui permet de restreindre l'instanciation d'une classe à un seul objet.
 *
 * Cette approche garantit qu'il n'y aura qu'une seule
 * connexion à la base de données dans toute l'application,
 * ce qui peut améliorer les performances et la gestion
 * des ressources.
 *
 * PHP version 8.2
 */

namespace model;

use PDO;
use Exception;
use PDOStatement;

class OurPDO extends PDO
{

    // Instance unique de PDO pour le singleton
    private static ?OurPDO $instance = null;

    // Constructeur privé pour empêcher l'instanciation sans passer par la méthode getInstance
    private function __construct($dsn, $username = null, $password = null, $options = null)
    {
        // constructeur natif de PDO
        parent::__construct($dsn, $username, $password, $options);
    }

    // Méthode static publique pour obtenir l'instance unique de PDO
    // sera utilisée comme ça : $pdo = OurPDO::getInstance($dsn, $username, $password, $options);
    public static function getInstance($dsn, $username = null, $password = null, $options = null): OurPDO
    {
        if (self::$instance === null) {
            try {
                // Création de l'instance de PDO en utilisant le constructeur privé
                self::$instance = new OurPDO($dsn, $username, $password, $options);
            } catch (Exception $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }
        return self::$instance;
    }

    
}