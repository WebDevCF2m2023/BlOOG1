<?php

// Espace de nom (isolation du code),
// nous sert également à organiser nos classes
// pour l'autoloading
namespace model\Interface;

// importation des classes nécessaires (qui se trouvent à la racine du projet,
// donc dans le namespace global pour Exception, ou dans le namespace model pour OurPDO)
use model\OurPDO;
use Exception;
// importation de la classe parenté de
// tous les mappings (polymorphisme)
use model\Abstract\AbstractMapping;

/**
 * Interface InterfaceManager
 *
 * Cette interface définit les méthodes que toute classe de type Manager doit implémenter.
 * Ces méthodes sont liées aux opérations CRUD de base (Créer, Lire, Mettre à jour, Supprimer).
 *
 */
interface InterfaceManager
{
    public function __construct(OurPDO $pdo);
    public function selectAll();
    public function selectOneById(int $id);
    public function insert(AbstractMapping $mapping);
    public function update(AbstractMapping $mapping);
    public function delete(int $id);
}