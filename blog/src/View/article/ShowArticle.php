<?php
//html
ob_start();
  ?>

        <?php foreach ($selectedArticle as $selectedArticle) {
          ?>
            <div class="">
              <p>titre : <?php echo $selectedArticle['title'];?></p>
              <p>article : <?php echo $selectedArticle['contenu'];?></p>
            </div>
            <form class="" action="/articles/<?php echo $selectedArticle['slug'] ?>/delete" method="post">
              <input type="submit" name="delete" value="delete">
            </form>
            <a href="/articles/<?php echo $article['slug'] ?>/edit">edit</a>
          <?php
        } ?>

  <?php
  $mainContent = ob_get_clean();
  require VIEW . '/Template.php';
