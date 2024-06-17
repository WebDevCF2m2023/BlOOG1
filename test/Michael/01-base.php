<?php

use model\Abstract\AbstractMapping;

// Autoload classes
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require '../../' .$class . '.php';
});

// chemin inexistant
// $lala = new nimport\quoi();

// on ne peut pas instancier une classe abstraite
//new AbstractMapping([]);

class TestAbstractMapping extends AbstractMapping
{
    protected ?string $article_title;
    protected ?string $article_date_update;


    public function __construct(array $tab)
    {
        parent::__construct($tab);
    }

    public function setArticleTitle(string $value): void
    {
        $this->article_title = $value;
    }

    public function setArticleDateUpdate(string $value): void
    {
        $this->article_date_update = $value;
    }


    protected function hydrate(array $assoc): void
    {
        // tant qu'on a des éléments dans le tableau
        foreach ($assoc as $clef => $valeur) {
            // on fait exploser la clef où on trouve des _
            $tab = explode("_",$clef);
            // on met en majuscule le nom de chaque clef du tableau
            // array_map est un raccourci pour appliquer une fonction
            // à chaque élément d'un tableau (+ rapide que foreach)
            $majuscule = array_map('ucfirst',$tab);
            // on remet le tout ensemble (on implose quoi)
            $nouveauNomEnCamelCase = implode($majuscule);
            // création du nom de la méthode de type setter
            $methodeName = "set" . $nouveauNomEnCamelCase;
            
            // si la méthode existe
            if (method_exists($this, $methodeName)) {
                // on hydrate le paramètre avec la valeur
                $this->$methodeName($valeur);
            }
        }
    }

}

$test = new TestAbstractMapping([
    'test_poi_lulu' => 'test',
    'test_coucou' => 'youpie',
    'article_title'=>"un titre",
    'article_date_update'=>"2024-03-17 21:45",
    'lala_ca_va'=>'lulu',
]);

var_dump($test);