<?php

use model\Mapping\ArticleMapping;
use model\Manager\UserManager;

// Instanciation de la classe ArticleManager
$userManager = new UserManager($dbConnect);

// Appel de la méthode selectAll
$users = $userManager->selectAll();
// Appel de la méthode selectAllArticleHomepage
$usersHomepage = $userManager->selectAllUserHomepage();

echo "<h1>Instance de ArticleManager</h1>";
var_dump($userManager);
echo "<h2>ArticleManager::selectAll()</h2>";
var_dump($users);
echo "<h2>ArticleManager::selectAllArticleHomepage()</h2>";
var_dump($usersHomepage);
foreach ($usersHomepage as $permission) {
    echo "<h4>User</h4>";
    echo "<p>Article User ID: " . $permission->getUser()->getUserId() . "</p>";
    echo "<p>Article User Login: " . $permission->getUser()->getUserLogin() . "</p>";
    echo "<p>Article User Full Name: " . $permission->getUser()->getUserFullName() . "</p>";
    if ($permission->getPermissions() !== null):
        echo "<h4>Categories</h4>";
        foreach ($permission->getPermissions() as $category):
            echo "<p>Article Category ID: " . $category->getPermissionId() . "</p>";
            echo "<p>Article Category Name: " . $category->getPermissionName() . "</p>";
            echo "<p>Article Category Slug: " . $category->getPermissionDescription() . "</p>";

        endforeach;
    endif;


    }
