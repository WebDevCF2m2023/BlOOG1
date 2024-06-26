
    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">
    <title><?=$title?></title>
</head>
    <body>
    <main class="w-screen h-screen flex justify-center items-center dark:bg-gray-900">
  <div class="max-w-7xl dark:bg-gray-950 dark:text-white">
    <form class=" w-full p-4 rounded shadow-md" action="" method="POST">
      <h2 class="text-xl mb-4 tracking-wider font-lighter text-gray-900 dark:text-gray-200">Changer un Article</h2>

<?php var_dump($selectOneArticle) ?>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
      <div class="mb-4">
          <input
        type="text"
        id="artId"
        name="artId"
        class="hidden w-full px-3 py-2 dark:bg-gray-900 rounded-sm border dark:border-none border-gray-300 focus:outline-none border-solid focus:border-dashed"
        placeholder="id*"
        value="<?=$selectOneArticle->getArticleId()?>"
        required
      />
        </div>
        <div class="mb-4">
          <input
        type="text"
        id="artTitleUpdate"
        name="artTitleUpdate"
        class="w-full px-3 py-2 dark:bg-gray-900 rounded-sm border dark:border-none border-gray-300 focus:outline-none border-solid focus:border-dashed"
        placeholder="id*"
        value="<?=$selectOneArticle->getArticleTitle()?>"
        required
      />
        </div>

      </div>
      <div class="mb-4 col-span-1 md:col-span-3">
          <input
        id="artTextUpdate"
        name="artTextUpdate"
        class="w-full px-3 py-2 dark:bg-gray-900 rounded-sm border dark:border-none border-gray-300 focus:outline-none border-solid focus:border-dashed resize-none"
        value="<?=$selectOneArticle->getArticleText()?>"
        

        required
      >
        </div>
      <div class="flex justify-end">
        <button
        type="submit"
        class="py-4 px-6 bg-blue-950 text-white rounded-sm hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-800"
      >
        Changer Article →
      </button>
      </div>
    </form>
  </div>
</main>
    </body>
</html>