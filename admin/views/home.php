<div class="wrapp">
  <?php
  require_once  './views/topMenu.php';

  ?>

  <div class="content-top">
    <h1>Statystyki</h1>
  </div>
  <div class="content">
    <div class="home-box">
      <div class="box">
        <i class="fas fa-users"></i>
        <p><?php $admin->stat('uzytkownik'); ?></p>
      </div>
      <div class="box">
        <i class="fas fa-newspaper"></i>
        <p><?php $admin->stat('artykul'); ?></p>
      </div>
      <div class="box">
        <i class="fas fa-comments"></i>
        <p><?php $admin->stat('komentarz'); ?></p>
      </div>
      <div class="box">
        <i class="fas fa-eye"></i>
        <p><?php $admin->stat('statystyka'); ?></p>
      </div>
    </div>
    <ul>
      <li>ID</li>
      <li>Statystyka</li>
      <li>...</li>
    </ul>
    <?php $admin->statArticle(); ?>
  </div>

</div>
