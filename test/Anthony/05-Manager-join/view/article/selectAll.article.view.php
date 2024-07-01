<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple de l'ArticleManager::selectAll()</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

    <div class="text-center mb-5 mt-7 ">
        <?php
        require 'menu.article.view.php';

        if (is_null($selectAllUser)) :
        ?>
            <h3>Pas encore d'articles!</h3>


        <?php

        endif;
        ?>
    </div>
    <h1 class="text-2xl  font-serif text-center pt-5 mb-7">
        User Manager
        Article
    </h1>
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
        <div class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-white  px-12">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center leading-4  tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4  tracking-wider">Nom Complet</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4  tracking-wider">Plus de détails</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4  tracking-wider">Modifier</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider">Supprimer</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <?php foreach ($selectAllUser as $item) : ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-center">
                                <div class="flex items-center justify-center">
                                    <div>
                                        <div class="text-sm leading-5 text-gray-800"><?= $item->getUserId() ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-center">
                                <div class="text-sm leading-5 text-blue-900"><?= $item->getUserFullName() ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-center  text-sm leading-5">
                                <a href="?view=<?= $item->getUserId() ?>" class="flex items-center justify-center text-pink-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                    </svg>

                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-center  text-sm leading-5">
                                <a href="?update=<?= $item->getUserId() ?>" class="flex items-center justify-center text-emerald-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-center  text-sm leading-5">
                                <a href="?delete=<?= $item->getUserId() ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');" class="flex items-center justify-center  text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>

                                </a>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>