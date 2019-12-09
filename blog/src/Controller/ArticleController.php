<?php

  function articleIndex(){
    require MODEL.'/ArticleModel.php';
    $articleIndex=getAllArticles();
    require VIEW.'/article/ArticleIndex.php';
  }



  function showArticle($slug){
    require MODEL.'/ArticleModel.php';
    $selectedArticle = selectedArticle($slug);
    require VIEW.'/article/ShowArticle.php';
  }



  function editArticle($slug){
    require MODEL.'/ArticleModel.php';
    $selectedArticle = selectedArticle($slug);
    require VIEW.'/article/EditArticle.php';
  }



  function updateArticle($slug){
    require MODEL.'/ArticleModel.php';

    // valider verifie
      //if not ok
    if (isset($_POST['title']) && isset($_POST['contenu'])) {
      if (empty($_POST['title'])) {
        $_SESSION['errors']['title'] = 'le champ est requis!';
      }

      if (empty($_POST['contenu'])) {
        $_SESSION['errors']['contenu'] = 'le champ est requis!';
      }
      //if ok
      if(!isset($_SESSION['errors'])) {
        updatedArticle($slug);
        header('Location: /articles');
        exit();
      }
      header('Location: /articles/'.$slug.'/edit');
      exit();
    }
  }



  function deleteArticle($slug){
    require MODEL.'/ArticleModel.php';
    if (isset($_POST['delete'])) {
      deletedArticle($slug);
      header('Location: /articles');
      exit();
    }
  }



  function createArticle(){
    require VIEW.'/article/CreateArticle.php';
  }



  function storeArticle(){
    require MODEL.'/ArticleModel.php';
    if (isset($_POST['create'])) {

      if (empty($_POST['title'])) {
        $_SESSION['errors']['title'] = 'le champ est requis!';
      }

      if (empty($_POST['contenu'])) {
        $_SESSION['errors']['contenu'] = 'le champ est requis!';
      }
      if(!isset($_SESSION['errors'])) {
        createdArticle();
        header('Location: /articles');
        exit();
      }

      header('Location: /articles/create');
      exit();
    }
    require VIEW.'/article/StoreArticle.php';
  }
