<div class="search">
  <form class="form-search" action="" method="post">
    
  </form>
  <div class="userData">
    <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>"><i class="fas fa-home"></i></a>
    <i class="fas fa-user"></i>
    <p><?php echo $_SESSION['name'].' '.$_SESSION['surname'] ?></p>
    <a href="?page=wyloguj">Wyloguj</a>
  </div>
</div>
