<?php


use model\Manager\PermissionManager;

$permissionManager = new PermissionManager($dbConnect);

$users = $permissionManager->selectAll();

$usersHomepage = $permissionManager->selectAllWithUsers();

echo "<h1>Instance de PermissionManager</h1>";
//var_dump($permissionManager);
echo "<h2>PermissionManager::selectAll()</h2>";
//var_dump($users);
echo "<h2>PermissionManager::selectAllArticleHomepage()</h2>";
var_dump($usersHomepage);

foreach ($usersHomepage as $permission) {
    echo "<h3>".$permission->getPermissionName()."</h3>";
    if($permission->getUser()!==null){
        foreach($permission->getUser() as $user){
            echo $user->getUserFullName();
        }
    }
}

/*
foreach ($usersHomepage as $permission) {
    if($permission->getUser()->getUserId()===null) continue;
    echo "<h4>User</h4>";
    echo "<p>Permission User ID: " . $permission->getUser()->getUserId() . "</p>";
    echo "<p>Permission User Login: " . $permission->getUser()->getUserLogin() . "</p>";
    echo "<p>Permission User Full Name: " . $permission->getUser()->getUserFullName() . "</p>";
    


    }
    */
