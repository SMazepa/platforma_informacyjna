<?php
use ADMIN\adminClass;
 ?>
<div class="wrapp">
  <?php require_once  './views/topMenu.php'; ?>

<?php

switch ($_GET['action']) {
  case 'add':

    add_category($admin);
    break;

  case 'edit':
    edit_category($admin);
    break;

  case 'delete':
    delete_category($admin);
    break;

  default:
    show_category($admin);
    break;
}


function add_category($admin){
  if ($_POST['addCat']) {
    $admin->addCategory();
  }
  ?>
  <div class="content-top">
    <h1>Nowa kategoria</h1>
    <a href="?page=category">Zobacz wszytkie</a>
  </div>
  <div class="content">
    <?php $admin->showAlert($_GET['alert']); ?>
    <form class="formatForm" action="" method="post">
      <label>
        <h4>Nazwa</h4>
        <input required type="text" name="kat_nazwa" placeholder="Nazwa kategorii">
        <p><i class="fas fa-info-circle"></i> Wpisz pełną nazwę kategorii</p>
      </label>
      <label>
        <h4>Sortowanie</h4>
        <input required type="text" name="kat_sort" placeholder="1 - 999">
        <p><i class="fas fa-info-circle"></i> Liczba określająca pozycję na liście musi być liczbą</p>
      </label>
      <label>
        <input type="hidden" name="addCat" value="1">
        <button type="submit" name="button">Zapisz</button>
      </label>
    </form>
  </div>
  <?php
}

function edit_category($admin){
  $edit = $admin->editCategory();
  ?>
  <div class="content-top">
    <h1>Edytuj kategorię</h1>
    <a href="?page=category">Zobacz wszytkie</a>
  </div>
  <div class="content">
    <?php $admin->showAlert($_GET['alert']); ?>
    <form class="formatForm" action="" method="post">
      <label>
        <h4>Nazwa</h4>
        <input required type="text" name="kat_nazwa" placeholder="Nazwa kategorii" value="<?php echo $edit['kat_nazwa'] ?>">
        <p><i class="fas fa-info-circle"></i> Wpisz pełną nazwę kategorii</p>
      </label>
      <label>
        <h4>Sortowanie</h4>
        <input required type="text" name="kat_sort" placeholder="1 - 999" value="<?php echo $edit['kat_sort'] ?>">
        <p><i class="fas fa-info-circle"></i> Liczba określająca pozycję na liście musi być liczbą</p>
      </label>
      <label>
        <input type="hidden" name="editCat" value="1">
        <button type="submit" name="button">Zapisz</button>
      </label>
    </form>
  </div>
  <?php
}

function delete_category($admin){
  $admin->deleteCategory();
}

function show_category($admin){
  ?>
  <div class="content-top">
    <h1>Kategorie</h1>
    <a href="?page=category&action=add">Dodaj</a>
  </div>
  <div class="content">
    <?php $admin->showAlert($_GET['alert']); ?>
    <ul>
      <li>ID</li>
      <li>Nazwa</li>
      <li>Kolejność</li>
    </ul>
    <?php echo $admin->showCategory(); ?>
  </div>
  <?php
}

 ?>

</div>
