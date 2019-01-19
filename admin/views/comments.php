<?php
use ADMIN\adminClass;
 ?>
<div class="wrapp">
  <?php require_once  './views/topMenu.php'; ?>

<?php

switch ($_GET['action']) {
  case 'add':

    add_comment($admin);
    break;

  case 'delete':
    delete_comment($admin);
    break;

  default:
    show_comment($admin);
    break;
}



function delete_comment($admin){
  $admin->deleteComment();
}

function show_comment($admin){
  ?>
  <div class="content-top">
    <h1>Komentarze</h1>
  </div>
  <div class="content">
    <?php $admin->showAlert($_GET['alert']); ?>
    <ul>
      <li>ID</li>
      <li>Nazwa</li>
      <li>Data</li>
    </ul>
    <?php echo $admin->showComment(); ?>
  </div>
  <?php
}
 ?>
</div>
