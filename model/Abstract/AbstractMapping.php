<?php

namespace model\Abstract;

abstract class AbstractMapping
{
    // constructeur - Appelé lors de l'instanciation
    public function __construct(array $tab)
    {
        // tentative d'hydration des données des classes enfants
        $this->hydrate($tab);
    }

    // création de notre hydratation, en partant d'un tableau associatif et de ses clefs, on va régénérer le nom des setters existants dans les classes enfants
    protected function hydrate(array $assoc): void
    {
        // tant qu'on a des éléments dans le tableau
        foreach ($assoc as $clef => $valeur) {
            // création du nom de la méthode de type setter
            $methodeName = "set" . str_replace("_", "", ucfirst($clef));
            // si la méthode existe
            if (method_exists($this, $methodeName)) {
                $this->$methodeName($valeur);
            }else{
                // sinon on affiche un message d'erreur
                echo "La méthode $methodeName n'existe pas</br>";
            }
        }
    }
}