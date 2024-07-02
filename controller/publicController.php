<?php

use model\Manager\UserManager;

echo __FILE__;
echo "<br>";
echo __DIR__;
echo "<br>";
echo __LINE__;
echo "<br>";
echo PHP_VERSION;
echo "<br>";
echo PHP_OS;
echo "<br>";
$newUser = new UserManager($db);
var_dump($newUser);