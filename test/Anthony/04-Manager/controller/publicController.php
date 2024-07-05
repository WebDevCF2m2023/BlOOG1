<?php

use model\Manager\UserManager;
use model\Mapping\UserMapping;




// Instanciation de la classe ArticleManager
$userManager = new UserManager($dbConnect);


// Appel de la méthode selectAllArticleHomepage
$userPerm = $userManager->selectAllWithPermission();



var_dump($userPerm);






  
