<?php
use ADMIN\adminClass;
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require_once  './admin/admin.class.php';
$admin = new adminClass;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'header.php';
?>
  <div class="panelAdmin">
<?php
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

      default:
        require_once  './views/home.php';
        break;
    }
  ?>
  </div>
<?php
require_once 'footer.php';
?>
