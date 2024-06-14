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
}

$test = new TestAbstractMapping(['test_poi_lulu' => 'test']);
$test->test();

