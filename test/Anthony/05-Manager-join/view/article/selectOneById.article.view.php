<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple de l'ArticleManager::selectOneUser()</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div class="text-center mb-5 mt-7 ">
        <?php

        require 'menu.article.view.php';

        if (is_null($selectOneUser)) :
        ?>
            <h3>article inexistant</h3>

        <?php
        else :
        ?>

        <?php
        endif;
        ?>
    </div>
    <div class="mt-8 px-12 flex justify-center">
        <div class="max-w-4xl bg-white rounded-lg  p-6 mb-7">
            <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Détails de l'article</h2>
            <table class="min-w-full">
                <tbody>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm font-medium text-gray-600">ID :</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5 text-gray-800"><?= $selectOneUser->getUserId() ?></td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm font-medium text-gray-600">Nom Complet :</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5 text-gray-800"><?= $selectOneUser->getUserFullName() ?></td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm font-medium text-gray-600">Login :</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5 text-gray-800"><?= $selectOneUser->getUserLogin() ?></td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm font-medium text-gray-600">Mot de passe :</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5 text-gray-800"><?= $selectOneUser->getUserPassword() ?></td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm font-medium text-gray-600">Email :</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5 text-gray-800"><?= $selectOneUser->getUserMail() ?></td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm font-medium text-gray-600">Statut :</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5 text-gray-800"><?= $selectOneUser->getUserStatus() ?></td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm font-medium text-gray-600">Clé secrète :</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5 text-gray-800"><?= $selectOneUser->getUserSecretKey() ?></td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm font-medium text-gray-600">Permission :</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5 text-gray-800"><?= $selectOneUser->getPermissionPermissionId() ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center mb-5">
        <?php
        var_dump($dbConnect, $userManager, $selectOneUser);
        ?>
    </div>
</body>

</html>