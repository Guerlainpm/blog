<?php
//html
ob_start();
  ?>

      <form class="" action="/articles" method="post">
        <label for="title">titre</label>
        <input type="text" name="title" value="">
        <span><?php echo isset($_SESSION['errors']['title']) ? $_SESSION['errors']['title'] : "";?></span>
        <label for="contenu">contenu</label>
        <textarea name="contenu" rows="8" cols="80"></textarea>
        <span><?php echo isset($_SESSION['errors']['title']) ? $_SESSION['errors']['title'] : "";?></span>
        <input type="submit" name="create" value="Create">
      </form>

  <?php
  $mainContent = ob_get_clean();
  require VIEW . '/Template.php';

unset($_SESSION['errors']);
