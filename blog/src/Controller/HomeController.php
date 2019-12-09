<?php
  function home(){
    require MODEL.'/ArticleModel.php';
    $articles = getLastfive();
    require VIEW.'/Home.php';
  }
