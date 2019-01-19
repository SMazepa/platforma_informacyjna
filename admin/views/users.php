<?php
use ADMIN\adminClass;
 ?>
<div class="wrapp">
  <?php require_once  './views/topMenu.php'; ?>

<?php

switch ($_GET['action']) {

  case 'edit':
    edit_users($admin);
    break;

  case 'delete':
    delete_users($admin);
    break;

  default:
    show_users($admin);
    break;
}



function edit_users($admin){
  $edit = $admin->editUsers();
  ?>
  <div class="content-top">
    <h1>Edytuj użytkownika</h1>
    <a href="?page=users">Zobacz wszytkich</a>
  </div>
  <div class="content">
    <?php $admin->showAlert($_GET['alert']); ?>
    <form class="formatForm" action="" method="post">
      <label>
        <h4>Login</h4>
        <input type="text" disabled placeholder="Login" required value="<?php echo $edit['uzy_login']; ?>">
        <p><i class="fas fa-info-circle"></i> Login użytkownika nie może być edytowany</p>
      </label>
      <label>
        <h4>Imię</h4>
        <input type="text" name="name" placeholder="Imię" required value="<?php echo $edit['uzy_imie']; ?>">
        <p><i class="fas fa-info-circle"></i> Wpisz imię uzytkownika</p>
      </label>
      <label>
        <h4>Nazwisko</h4>
        <input type="text" name="surname" placeholder="Nazwisko" required value="<?php echo $edit['uzy_nazwisko']; ?>">
        <p><i class="fas fa-info-circle"></i> Wpisz nazwisko użytkownika</p>
      </label>
      <label>
        <h4>Hasło</h4>
        <input type="password" name="pass" placeholder="Hasło" required>
        <p><i class="fas fa-info-circle"></i> Wpisz nowe hasło użytkownika</p>
      </label>
      <?php $admin->showRole($edit['uzy_rola']);?>      
      <label>
        <h4>Email</h4>
        <input type="email" name="email" placeholder="Email" required value="<?php echo $edit['uzy_mail']; ?>">
        <p><i class="fas fa-info-circle"></i> Wpisz nowy email użytkownika</p>
      </label>
      <label>
        <input type="hidden" name="editUse" value="1">
        <button type="submit" name="button">Zapisz</button>
      </label>
    </form>
  </div>
  <?php
}

function delete_users($admin){
  $admin->deleteUsers();
}

function show_users($admin){
  ?>
  <div class="content-top">
    <h1>Użytkownicy</h1>
  </div>
  <div class="content">
    <?php $admin->showAlert($_GET['alert']); ?>
    <ul>
      <li>ID</li>
      <li>Imię i nazwisko</li>
      <li>Rola</li>
    </ul>
    <?php echo $admin->showUsers(); ?>
  </div>
  <?php
}

 ?>

</div>
