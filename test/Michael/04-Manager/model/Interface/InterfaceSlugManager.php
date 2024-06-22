<?php

// Espace de nom (isolation du code)
namespace model\Interface;

/**
 * Interface InterfaceSlugManager
 *
 * Cette interface définit la méthode que
 * toute classe l'implémentant doit fournir.
 * Cette méthode est liée à la récupération
 * d'un enregistrement par son slug.
 */
interface InterfaceSlugManager
{
    /**
     * Sélectionner un enregistrement par son slug.
     *
     * Cette méthode doit renvoyer un seul enregistrement correspondant au slug fourni.
     *
     * @param string $slug Le slug de l'enregistrement à récupérer.
     */
    public function selectOneBySlug(string $slug);
}