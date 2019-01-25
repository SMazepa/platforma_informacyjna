<?php
use ADMIN\adminClass;
 ?>
<div class="wrapp">
  <?php require_once  './views/topMenu.php'; ?>

<?php

switch ($_GET['action']) {
  case 'add':

    add_article($admin);
    break;

  case 'edit':
    edit_article($admin);
    break;

  case 'delete':
    delete_article($admin);
    break;

  default:
    show_article($admin);
    break;
}


function add_article($admin){
  if ($_POST['addArt']) {
    $admin->addArticle();
  }
  ?>
  <div class="content-top">
    <h1>Nowy artykuł</h1>
    <a href="?page=articles">Zobacz wszytkie</a>
  </div>
  <div class="content">
    <?php $admin->showAlert($_GET['alert']); ?>
    <form class="formatForm" action="" method="post">
      <label>
        <h4>Tytuł</h4>
        <input type="text" required name="art_tytul" placeholder="Tytuł artykułu" style="width:100%;">
        <p><i class="fas fa-info-circle"></i> Wpisz pełną nazwę kategorii</p>
      </label>
      <label>
        <h4 style="margin:0 0 10px 0;">Kategorie</h4>
        <?php $admin->showCategoryAlricle($_GET['id']); ?>
        <p style="margin:10px 0 0 0;"><i class="fas fa-info-circle"></i> Kategorie przypisane do postu</p>
      </label>
      <label>
        <h4>Treśc</h4>
        <textarea name="art_tresc" required></textarea>
        <p><i class="fas fa-info-circle"></i> Miejsce na wpisanie całego artykułu</p>
      </label>
      <label>
        <h4>Zdjęcie</h4>
        <input type="text" name="art_zdjecie" placeholder="Zdjęcie artykułu">
        <p><i class="fas fa-info-circle"></i> https://static.independent.co.uk/s3fs-public/thumbnails/image/2018/07/04/12/warsaw-2.jpg</p>
      </label>
      <label>
        <input type="hidden" name="addArt" value="1">
        <button type="submit" name="button">Zapisz</button>
      </label>
    </form>
  </div>
  <?php
}

function edit_article($admin){
  $edit = $admin->editArticle();
  ?>
  <div class="content-top">
    <h1>Edytuj artykuł</h1>
    <a href="?page=articles">Zobacz wszytkie</a>
  </div>
  <div class="content">
    <?php $admin->showAlert($_GET['alert']); ?>
    <form class="formatForm" action="" method="post">
      <label>
        <h4>Tytuł</h4>
        <input type="text" required name="art_tytul" placeholder="Tytuł artykułu" value="<?php echo $edit['art_tytul'] ?>" style="width:100%;">
        <p><i class="fas fa-info-circle"></i> Wpisz pełną nazwę kategorii</p>
      </label>
      <label>
        <h4 style="margin:0 0 10px 0;">Kategorie</h4>
        <?php $admin->showCategoryAlricle($_GET['id']); ?>
        <p style="margin:10px 0 0 0;"><i class="fas fa-info-circle"></i> Kategorie przypisane do postu</p>
      </label>
      <label>
        <h4>Treśc</h4>
        <textarea name="art_tresc" required><?php echo $edit['art_tresc'] ?></textarea>
        <p><i class="fas fa-info-circle"></i> Miejsce na wpisanie całego artykułu</p>
      </label>
      <label>
        <h4>Zdjęcie</h4>
        <input type="text" name="art_zdjecie" placeholder="Zdjęcie artykułu" value="<?php echo $edit['art_obraz'] ?>">
        <p><i class="fas fa-info-circle"></i> https://static.independent.co.uk/s3fs-public/thumbnails/image/2018/07/04/12/warsaw-2.jpg</p>
      </label>
      <label>
        <input type="hidden" name="editArt" value="1">
        <button type="submit" name="button">Zapisz</button>
      </label>
    </form>
  </div>
  <?php
}

function delete_article($admin){
  $admin->deleteArticle();
}

function show_article($admin){
  ?>
  <div class="content-top">
    <h1>Artykuły</h1>
    <a href="?page=articles&action=add">Dodaj</a>
  </div>
  <div class="content">
    <?php $admin->showAlert($_GET['alert']); ?>
    <ul>
      <li>ID</li>
      <li>Nazwa</li>
      <li>Data</li>
    </ul>
    <?php echo $admin->showArticle(); ?>
  </div>
  <?php
}
 ?>
</div>
