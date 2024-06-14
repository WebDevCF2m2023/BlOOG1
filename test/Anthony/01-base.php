<?php

use model\Abstract\AbstractMapping;

// Autoload classes
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require '../../' .$class . '.php';
});

class TestAbstractMapping extends AbstractMapping
{
    protected ?string $article_title;
    protected ?string $article_date_update;

    public function __construct(array $tab)
    {
        parent::__construct($tab);
    }

    public function setArticleTitle(string $value):void{
        $this->article_title = $value;
    }
   

    protected function hydrate(array $assoc): void
    {
        // tant qu'on a des éléments dans le tableau
        foreach ($assoc as $clef => $valeur) {

            explode("_", $clef);

           $majuscule =  array_map("ucfirst",$tab);

           $nouveauNomEnCamelCase =  implode($majuscule);
              // création du nom de la méthode de type setter

            $methodeName = "set" . $nouveauNomEnCamelCase;
            // si la méthode existe
            if (method_exists($this, $methodeName)) {
                $this->$methodeName($valeur);
            }else{
                // sinon on affiche un message d'erreur
                echo "La méthode $methodeName n'existe pas<br>";
            }
        }
    }
  
}

$test = new TestAbstractMapping(['bla_bla_bla' => 'test',
                                'test_coucou ' => 'youpi',
                                'article_title' =>'un titre']);

  var_dump($test);


