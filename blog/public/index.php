<?php
  session_start();

  define('SRC', __DIR__.'/../src/');
  define('CONTROLLER', __DIR__.'/../src/Controller');
  define('MODEL', __DIR__.'/../src/Model');
  define('VIEW', __DIR__.'/../src/View');

  define('DATABASE', 'blog');
  define('USER', 'root');
  define('PASSWORD', 'root');

try {
  function slugify($text)
    {
      // replace non letter or digits by -
      $text = preg_replace("~[^\pL\d]+~u", "-", $text);
      // transliterate
      $text = iconv("utf-8", "us-ascii//TRANSLIT", $text);
      // remove unwanted characters
      $text = preg_replace("~[^-\w]+~", " ", $text);
      // trim
      $text = trim($text, "-");
      // remove duplicate -
      $text = preg_replace("~-+~", "-", $text);
      // lowercase
      $text = strtolower($text);
      return $text;
    }

    $bdd = new PDO("mysql:host=localhost;dbname=".DATABASE.";charset=utf8", USER, PASSWORD);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    require_once SRC.'router.php';

    run();
} catch (\Exception $e) {

}
