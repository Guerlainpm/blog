<?php
  function run(){
    if ($_SERVER['REQUEST_URI'] == '/') {
      require CONTROLLER.'/HomeController.php';
      home();
    }



    elseif ($_SERVER['REQUEST_URI'] == '/articles' && $_SERVER['REQUEST_METHOD'] == "POST") {
      //Enregistre un nouvel article dans la BDD 'INSER INTO'
      require CONTROLLER.'/ArticleController.php';
      storeArticle();
      header("Location: articles/");
    }



    elseif (preg_match('#^\/articles\/([a-zA-Z0-9_-]+)$#', $_SERVER['REQUEST_URI'], $matches ) && $_SERVER['REQUEST_METHOD'] == "POST") {
      //met a jour un article 'UPDATE'
      require CONTROLLER.'/ArticleController.php';
      updateArticle($matches[1]);
      header("Location: articles/".$matches[1]);
    }



    elseif (preg_match('#^\/articles\/([a-zA-Z0-9_-]+)\/delete#', $_SERVER['REQUEST_URI'], $matches ) && $_SERVER['REQUEST_METHOD'] == "POST") {
      //supprime un article
      require CONTROLLER.'/ArticleController.php';
      deleteArticle($matches[1]);
      header("Location: articles");
    }



    elseif ($_SERVER['REQUEST_URI'] == '/articles') {
      //affiche une page avec tout les articles
      require CONTROLLER.'/ArticleController.php';
      articleIndex();
    }



    elseif (preg_match('#^\/articles\/([a-zA-Z0-9_-]+)$#', $_SERVER['REQUEST_URI'], $matches ) && $_SERVER['REQUEST_URI'] != '/articles/create') {
      //affiche un seul article
      require CONTROLLER.'/ArticleController.php';
      showArticle($matches[1]);
    }



    elseif (preg_match('#^\/articles\/([a-zA-Z0-9_-]+)\/edit$#', $_SERVER['REQUEST_URI'], $matches )) {
      //Affiche la page qui permet d'editer un article
      require CONTROLLER.'/ArticleController.php';
      editArticle($matches[1]);
    }



    elseif ($_SERVER['REQUEST_URI'] == '/articles/create') {
      //affiche une page qui permet de creer un article
      require CONTROLLER.'/ArticleController.php';
      createArticle();
    }
  }
