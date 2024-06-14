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

    public function setArticleTitle(string $value) {
        $this->article_title = $value;
    }

    public function setArticleDateTitle ($value) {
    
        $this->article_date_update = $value;
    }

    protected function hydrate(array $assoc): void
    {
        // tant qu'on a des éléments dans le tableau
        foreach ($assoc as $clef => $valeur) {
            $tab = explode("_",$clef);      // breaks everything apart where it finds a _
            $majuscule = array_map("ucfirst",$tab); // changes the first letter to Maj for each entry to array $tab
            $nomEnCamel = implode ($majuscule); // sticks everything back together
            $methodeName = "set" . $nomEnCamel; // create the setter Name
         
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
                                'article_title' =>'un titre',
                                'article_date_title' => '2024-03-17 21:45']);

var_dump($test);