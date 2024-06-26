<div class="w-full max-w-xs">
  <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="artText">
        Text :
      </label>
      <textarea class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
             id="artText"
             name="artText" 
             type="text"
             rows="10"
             cols="80" 
             ><?=$selectOneArticle->getArticleText()?>
      </textarea>
    </div>

    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
        Mettre à Jour
      </button>

    </div>
  </form>
</div>

<h4>ID : <?=$selectOneArticle->getArticleId()?></h4>
    
    <p><?=$selectOneArticle->getArticleDateCreate()?></p><hr>
