<?php

use model\Abstract\AbstractMapping;

// Autoload classes
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require '../../' .$class . '.php';
});

class TestAbstractMapping extends AbstractMapping
{
    public function __construct(array $tab)
    {
        parent::__construct($tab);
    }

    public function test()
    {
        echo 'Test';
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
                echo "La méthode $methodeName n'existe pas";
            }
        }
    }
}

$test = new TestAbstractMapping(['test_poi_lulu' => 'test']);
$test->test();
