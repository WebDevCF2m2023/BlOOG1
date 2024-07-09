<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple de l' ArticleManager::update()</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="text-center mb-5 mt-7 ">
        <?php
        require 'menu.article.view.php';
        if (is_null($selectOneUser)) :
        ?>
            <h3>article inexistant</h3>

        <?php
        else :
            if (isset($error)) echo "<h4>$error</h4>";
        ?>
    </div>
<?php
        endif;
?>
<div class="flex flex-col items-center justify-center h-screen -mt-7">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Modification d'un article</h2>

        <form action="" method="post" class="flex flex-col">

            <label for="user_login" class="text-sm font-medium text-gray-600 mb-2">Login :</label>
            <input type="text" id="user_login" name="user_login" class="bg-gray-100 text-gray-800 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-emerald-500 transition ease-in-out duration-150" value="<?= $selectOneUser->getUserLogin() ?>" required>


            <label for="user_password" class="text-sm font-medium text-gray-600 mb-2">Mot de passe :</label>
            <input type="password" id="user_password" name="user_password" class="bg-gray-100 text-gray-800 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-pink-500 transition ease-in-out duration-150" value="<?= $selectOneUser->getUserPassword() ?>" required>


            <label for="user_full_name" class="text-sm font-medium text-gray-600 mb-2">Nom complet :</label>
            <input type="text" id="user_full_name" name="user_full_name" class="bg-gray-100 text-gray-800 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-emerald-500 transition ease-in-out duration-150" value="<?= $selectOneUser->getUserFullName() ?>" required>


            <label for="user_mail" class="text-sm font-medium text-gray-600 mb-2">Email :</label>
            <input type="email" id="user_mail" name="user_mail" class="bg-gray-100 text-gray-800 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-pink-500 transition ease-in-out duration-150" value="<?= $selectOneUser->getUserMail() ?>" required>


            <label for="user_status" class="text-sm font-medium text-gray-600 mb-2">Statut :</label>
            <input type="text" id="user_status" name="user_status" class="bg-gray-100 text-gray-800 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-emerald-500 transition ease-in-out duration-150" value="<?= $selectOneUser->getUserStatus() ?>" required>


            <label for="user_secret_key" class="text-sm font-medium text-gray-600 mb-2">Clé secrète :</label>
            <input type="text" id="user_secret_key" name="user_secret_key" class="bg-gray-100 text-gray-800 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-pink-500 transition ease-in-out duration-150" value="<?= $selectOneUser->getUserSecretKey() ?>" required>


            <label for="permission_permission_id" class="text-sm font-medium text-gray-600 mb-2">ID Permission :</label>
            <input type="number" id="permission_permission_id" name="permission_permission_id" class="bg-gray-100 text-gray-800 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-emerald-500 transition ease-in-out duration-150" value="<?= $selectOneUser->getPermissionPermissionId() ?>" readonly>


            <button class="bg-gradient-to-r from-emerald-500 to-pink-500 text-white font-bold py-2 px-4 rounded-md mt-4 hover:bg-emerald-500 hover:to-pink-500 transition ease-in-out duration-150" type="submit">
                Modifier
            </button>
        </form>
    </div>
</div>




</body>

</html>