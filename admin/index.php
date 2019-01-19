<?php
use ADMIN\adminClass;
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require_once  './admin.class.php';
$admin = new adminClass;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

function sa($data){
  echo '<pre>';
  print_r($data);
  echo '</pre>';
}

if ($_GET['page'] === 'wyloguj') {
  $admin->logOut();
}


require_once 'header.php';
if ($admin->is_admin() || $admin->is_author()) {
  ?>
  <div class="panelAdmin">
  <?php
  require_once  './views/menu.php';
    switch ($_GET['page']) {
      case 'home':
        require_once  './views/home.php';
        break;

      case 'home':
        require_once  './views/home.php';
        break;

      case 'category':
        require_once  './views/category.php';
        break;

      case 'users':
        require_once  './views/users.php';
        break;

      case 'articles':
        require_once  './views/article.php';
        break;

      case 'comments':
        require_once  './views/comments.php';
        break;

      case 'stats':
        require_once  './views/stats.php';
        break;

      default:
        require_once  './views/home.php';
        break;
    }
  ?>
  </div>
  <?php
}else{
  $admin->login();
  require_once  './views/login.php';
}



require_once 'footer.php';

 ?>
