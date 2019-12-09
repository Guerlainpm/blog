<?php

  ?>
    <!DOCTYPE html>
    <html lang="fr" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="/build/style.min.css">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
      </head>
      <body>
        <nav>
          <?php include VIEW . '/Nav.php'; ?>
        </nav>
        <main>
          <?php echo $mainContent ?>
        </main>
      </body>
    </html>
  <?php
