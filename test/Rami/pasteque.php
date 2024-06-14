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

   
}

$test = new TestAbstractMapping([
    'test_poi_lulu' => 'test',
    'test_coucou' => 'youpie',
    'article_title'=>"un titre",
    'article_date_update'=>"2024-03-17 21:45",
]);


