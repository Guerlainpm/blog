<?php

  function getLastFive(){
    global $bdd;
    //request SQL
    $req = $bdd->query("SELECT * FROM article ORDER BY created_at DESC LIMIT 5");
    $articles = $req->fetchAll();
    //return $article
    return $articles;
  }



  function getAllArticles(){
    global $bdd;
    //request SQL
    $req = $bdd->query("SELECT * FROM article ORDER BY created_at DESC ");
    $articleIndex = $req->fetchAll();
    //return $articleIndex
    return $articleIndex;
  }



 function selectedArticle($slug){
   global $bdd;
   //request SQL
   $req = $bdd->prepare("SELECT * FROM article WHERE slug = :slug");
   $req->execute(array('slug'=>$slug));

   $selectedArticle = $req->fetchAll();
   //return $articleIndex
   return $selectedArticle;
 }



 function updatedArticle($slug){
   global $bdd;
   //request SQL
   $req = $bdd->prepare("UPDATE article SET title = :title , contenu = :contenu, slug = :newSlug WHERE slug = :slug");
   $req->execute(array('title'=>$_POST['title'], 'contenu'=>$_POST['contenu'], 'slug'=>$slug, 'newSlug' => slugify($_POST['title'])));
 }



 function deletedArticle($slug){
   global $bdd;
   //request SQL
   $req = $bdd->prepare("DELETE FROM article WHERE slug = :slug");
   $req->execute(array('slug'=>$slug));
 }


 function createdArticle(){
   global $bdd;
   //request SQL
   $req = $bdd->prepare("INSERT INTO article(title,contenu,user_id, slug) VALUES (:title, :contenu, :user_id, :slug)");
   $req->execute(array('title'=>$_POST['title'], 'contenu'=>$_POST['contenu'],'user_id'=>1, 'slug'=>slugify($_POST['title'])));
 }
