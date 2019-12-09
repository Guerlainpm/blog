<?php
//html
ob_start();
  ?>
  <div class="articlesAndTitle">
    <h2>Article</h2>
    <div class="articles">
      <?php foreach ($articles as $article) {
        ?>
        <div class="oneArticle">
          <div class="articleContent">
            <p>titre : <?php echo $article['title'];?></p>
            <p>article : <?php echo $article['contenu'];?></p>
          </div>
          <form class="" action="/articles/<?php echo $article['slug'] ?>/delete" method="post">
            <input type="submit" name="delete" value="delete">
          </form>
          <a href="/articles/<?php echo $article['slug'] ?>">show</a>
          <a href="/articles/<?php echo $article['slug'] ?>/edit">edit</a>

        </div>
        <?php
      } ?>
    </div>
  </div>
  <?php

  $mainContent = ob_get_clean();
  require VIEW . '/Template.php';
