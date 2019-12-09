<?php
//html
ob_start();
  ?>
        <?php foreach ($selectedArticle as $article) {
          ?>
            <form class="" action="/articles/<?php echo $article['slug']; ?>" method="post">
              <input type="text" name="title" value="<?php echo $article["title"]; ?>">
              <span><?php echo isset($_SESSION['errors']['title']) ? $_SESSION['errors']['title'] : "";?></span>
              <textarea name="contenu" rows="8" cols="80"><?php echo $article['contenu']; ?></textarea>
              <span><?php echo isset($_SESSION['errors']['title']) ? $_SESSION['errors']['title'] : "";?></span>
              <input type="submit" name="editedArticle" value="Edit">
            </form>
          <?php
        } ?>
  <?php
  $mainContent = ob_get_clean();
  require VIEW . '/Template.php';

unset($_SESSION['errors']);
