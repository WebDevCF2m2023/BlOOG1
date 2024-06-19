<?php

// Espace de nom (isolation du code),
// nous sert également à organiser nos classes
// pour l'autoloading
namespace model\Interface;

// importation des classes nécessaires (qui se trouvent à la racine du projet,
// donc dans le namespace global pour Exception, ou dans le namespace model pour OurPDO)
use model\OurPDO;
use Exception;

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
    public function selectAll(): array;
    public function selectOneById(int $id): object;
    public function insert(object $object): void;
    public function update(object $object): void;
    public function delete(int $id): void;
}