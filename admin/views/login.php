<?php
//sa($_SESSION);

 ?>
<div class="panelLogin">
  <div class="panel">
  <?php $admin->showAlert($_GET['alert']); ?>
    <div class="login">
      <form class="formFormat" action="" method="post">
        <h1>Zaloguj się</h1>
        <ul>
          <p>Login:</p>
          <input type="text" name="login" placeholder="Login" required>
        </ul>
        <ul>
          <p>Hasło</p>
          <input type="password" name="pass" placeholder="Hasło" required>
        </ul>
        <ul>
          <input type="hidden" name="loginuser" value="1">
          <button type="submit" name="button">Zaloguj się</button>
        </ul>
      </form>
    </div>
    <div class="registration">
      <form class="formFormat" action="" method="post">
        <h1>Rejestracja</h1>
        <ul>
          <p>Imię:</p>
          <input type="text" name="name" required>
        </ul>
        <ul>
          <p>Nazwisko:</p>
          <input type="text" name="surname" required>
        </ul>
        <ul>
          <p>Login:</p>
          <input type="text" name="login" required>
        </ul>
        <ul>
          <p>Hasło</p>
          <input type="password" name="pass" required>
        </ul>
        <ul>
          <p>Email</p>
          <input type="email" name="email" required>
        </ul>
        <ul>
          <input type="hidden" name="registeruser" value="1">
          <button type="submit" name="button">Zarejestruj</button>
        </ul>
      </form>
    </div>
  </div>
</div>
