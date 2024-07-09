<?php

// Espace de nom (isolation du code)
namespace model\Abstract;

// Classe abstraite qui ne peut être instanciée.
// Elle est la base de tous les mappings de tables
abstract class AbstractMapping
{
    // constructeur - Appelé lors de l'instanciation
    public function __construct(array $tab)
    {
        // tentative d'hydration des données des classes enfants
        $this->hydrate($tab);
    }

    // création de notre hydratation, en partant d'un tableau associatif et de ses clefs,
    // on va régénérer le nom des setters existants dans les classes enfants
    protected function hydrate(array $assoc): void
    {
        // tant qu'on a des éléments dans le tableau
        foreach ($assoc as $key => $value) {

            // création du nom d'un setter (méthode publique de modification)
            $tab = explode("_", $key);
            $majuscule = array_map('ucfirst',$tab);
            $newNameCamelCase = implode($majuscule);
            $methodeName = "set" . $newNameCamelCase;
            
            // si la méthode existe
            if (method_exists($this, $methodeName)) {
                // on hydrate le paramètre avec la valeur
                $this->$methodeName($value);
            }
        }
    }

    
}