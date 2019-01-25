<?php
namespace ADMIN;
/**
 * Panel admina
 */
class adminClass
{

  function __construct(){
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'portal');

    $con= mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($con,"utf8");

    $this->$link = $con;
  }
  // alerty
   function showAlert($data){
     switch ($data) {
       case 1:
         echo '<div class="alert-error"><i class="fas fa-exclamation-circle"></i> Ups! Nie działa usupełnij wszytkie pola!</div>';
         break;
       case 2:
         echo '<div class="alert-success"><i class="fas fa-check-circle"></i> Ok! Udało się!</div>';
         break;
       case 3:
         echo '<div class="alert-success"><i class="fas fa-check-circle"></i> Ok! Kategoria została usunięta!</div>';
         break;
       case 4:
         echo '<div class="alert-success"><i class="fas fa-check-circle"></i> Zapisano!</div>';
         break;
       case 5:
         echo '<div class="alert-error"><i class="fas fa-check-circle"></i> Ups! Nie możesz sam siebie usunąć.</div>';
         break;
       case 6:
         echo '<div class="alert-success"><i class="fas fa-check-circle"></i> Ok! Użytkownik został usunięty!</div>';
         break;
       case 7:
         echo '<div class="alert-error"><i class="fas fa-check-circle"></i> Ups! uzupełnij wszystkie dane lub login juz jest zajęty</div>';
         break;
       case 8:
         echo '<div class="alert-success"><i class="fas fa-check-circle"></i> Ok! Zostałeś zarejestrowany!</div>';
         break;
       case 9:
         echo '<div class="alert-error"><i class="fas fa-check-circle"></i> Ups! błędne dane logowania</div>';
         break;
       case 10:
         echo '<div class="alert-success"><i class="fas fa-check-circle"></i> Ok! Twój artykuł został dodany!</div>';
         break;
       case 11:
         echo '<div class="alert-error"><i class="fas fa-check-circle"></i> Ups! musisz uzupełni wszystkie dane</div>';
         break;
       case 12:
         echo '<div class="alert-success"><i class="fas fa-check-circle"></i> Ok! Twój artykuł został usunięty z bazy!</div>';
         break;
       case 13:
         echo '<div class="alert-success"><i class="fas fa-check-circle"></i> Zmiany zostały zapisane</div>';
         break;
       case 14:
         echo '<div class="alert-success"><i class="fas fa-check-circle"></i> Komentarz został usunięty</div>';
         break;
       case 15:
         echo '<div class="alert-error"><i class="fas fa-check-circle"></i> Tylko Redaktor Naczelny ma prawa do tej akcji</div>';
         break;
     }
   }




// sprawdzanie czy uzytkownik jest zalogowany
  function is_login(){
    if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == 3) {
      return true;
    }else{
      return false;
    }
  }
// sprawdzanie czy uzytkownik jest redakrorem naczelnym
  function is_admin(){
    if(!empty($_SESSION['rola']) && $_SESSION['rola'] == 1) {
      return true;
    }else{
      return false;
    }
  }
// sprawdzanie czy uzytkownik jest dzienkikarzem
  function is_author(){
    if(!empty($_SESSION['rola']) && $_SESSION['rola'] == 2) {
      return true;
    }else{
      return false;
    }
  }



// logowanie i rejestracja uzytkownika
  function login($data = null){
    // logowanie
    if(!empty($_POST['login']) && !empty($_POST['pass']) && !empty($_POST['loginuser'])) {
      $login = $_POST['login'];
      $pass = md5($_POST['pass']);
      //$_SESSION = null;
      $sql = mysqli_query($this->$link,
      "SELECT * FROM `uzytkownik`
      WHERE `uzy_login` = '$login'
      AND `uzy_haslo` = '$pass'
      ");
      $row = mysqli_fetch_all($sql, MYSQLI_ASSOC);
      $row = $row[0];
      //sa($row);
      if ($row) {
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $row['uzy_id'];
        $_SESSION['login'] = $row['uzy_login'];
        $_SESSION['rola'] = $row['uzy_rola'];
        $_SESSION['name'] = $row['uzy_imie'];
        $_SESSION['surname'] = $row['uzy_nazwisko'];
        return header('location: /');
      }else{
        return header('location: /admin/?alert=9');
      }
    }else{
      //rejestracja
     $login = $_POST['login'];
     $name = $_POST['name'];
     $surname = $_POST['surname'];
     $email = $_POST['email'];
     $pass = md5($_POST['pass']);
     if (!empty($_POST['registeruser'])) {
     $sql = mysqli_query($this->$link,
       "SELECT * FROM `uzytkownik` WHERE  `uzy_login` = '$login';");
       $count = mysqli_num_rows($sql);
       if($count == 0 && !empty($login) && !empty($name) &&
          !empty($surname) && !empty($pass)) {
          $sql = mysqli_query($this->$link,
          "INSERT INTO `uzytkownik` (`uzy_id`, `uzy_rola`, `uzy_imie`, `uzy_nazwisko`, `uzy_login`, `uzy_haslo`, `uzy_mail`)
          VALUES (NULL, 3, '$name', '$surname', '$login', '$pass', '$email');");
          return header('location: /admin/?alert=8');
       }else{
         return header('location: /admin/?alert=7');
       }
     }
    }
    if ($this->is_login()) {
      return header('location: /');
    }
  }



// wylogowanie uzytkownika
 function logOut(){
   session_destroy();
   return header('location: /');
 }




///////////////////////////////KATEGORIE///////////////////////////////
// dodanie nowej kategorii
 function addCategory(){
   if (!empty($_POST['kat_nazwa']) AND !empty($_POST['kat_sort'])) {
     $nazwa = $_POST['kat_nazwa'];
     $sort = $_POST['kat_sort'];

     if (!is_numeric($sort)) {
       $sort = 0;
     }

     $sql = mysqli_query($this->$link,
     "INSERT INTO `kategoria` (`kat_id`, `kat_typ`, `kat_sort`, `kat_nazwa`)
     VALUES (NULL, 0, $sort, '".$nazwa."');");
     return header('location: /admin/?page=category&alert=2');
   }else{
     return header('location: /admin/?page=category&action=add&alert=1');
   }
 }


// edycja kategorii
 function editCategory(){
   $id = $_GET['id'];
   if ($_GET['page'] === 'category' && $_GET['action'] === 'edit' && !empty($_POST['editCat'])) {
     $nazwa = $_POST['kat_nazwa'];
     $sort = $_POST['kat_sort'];
     if (is_numeric($id)) {
       $sql = mysqli_query($this->$link,
       "UPDATE `kategoria` SET
       `kat_typ` = 0, `kat_sort` = $sort, `kat_nazwa` = '$nazwa'
       WHERE `kat_id` = $id LIMIT 1;");
       return header('location: /admin/?page=category&action=edit&id='.$id.'&alert=4');
     }
   }
   //pobranie tablicy edytowanej kategorii
   if (is_numeric($id)) {
     $sql = mysqli_query($this->$link,
     "SELECT * FROM `kategoria` WHERE  `kat_id` = $id LIMIT 1;");
     $row = mysqli_fetch_array($sql);
   }
    return $row;
 }



// wyswietlenie wszystkich kategorii
 function showCategory(){
   $sql = mysqli_query($this->$link,
   "SELECT * FROM `kategoria` ORDER BY `kat_sort` ASC;");
   $row = mysqli_fetch_all($sql,MYSQLI_ASSOC);
   if ($row) {
     foreach ($row as $key => $val) {
       $content .= '
       <ul>
         <li>'.$val['kat_id'].'</li>
         <li>
           <p>'.$val['kat_nazwa'].'</p>
           <span>
             <a href="?page=category&action=edit&id='.$val['kat_id'].'"><i class="fas fa-pen-square"></i>Edytuj</a>
             <a href="?page=category&action=delete&id='.$val['kat_id'].'"><i class="fas fa-trash"></i>Usuń</a>
           </span>
         </li>
         <li>'.$val['kat_sort'].'</li>
       </ul>
       ';
     }
   }else{
     $content .= '
     <div class="noData">Brak kategorii w bazie</div>
     ';
   }
   echo $content;
 }



 // skasowanie kategorii
  function deleteCategory(){
	if($this->is_admin()){
		if ($_GET['page'] === 'category' && $_GET['action'] === 'delete') {
		  $id = $_GET['id'];
		  if (is_numeric($id)) {
			$sql = mysqli_query($this->$link,
			"DELETE FROM `kategoria` WHERE `kat_id` = $id LIMIT 1;");
		  }
		  return header('location: /admin/?page=category&alert=3');
		}
	}else{
		return header('location: /admin/?page=category&alert=15');
	}

  }
///////////////////////////////END KATEGORIE///////////////////////////////










///////////////////////////////UZYTKOWNICY///////////////////////////////
// wyswietlenie wszystkich uzytkownikow
 function showUsers(){
   $sql = mysqli_query($this->$link,
   "SELECT * FROM `uzytkownik` ORDER BY `uzy_id` ASC;");
   $row = mysqli_fetch_all($sql,MYSQLI_ASSOC);
   if ($row) {
     foreach ($row as $key => $val) {
       $content .= '
       <ul>
         <li>'.$val['uzy_id'].'</li>
         <li>
           <p>'.$val['uzy_imie'].' '.$val['uzy_nazwisko'].' <b>'.$val['uzy_login'].'</b></p>
           <span>
             <a href="?page=users&action=edit&id='.$val['uzy_id'].'&author='.$val['uzy_id'].'"><i class="fas fa-pen-square"></i>Edytuj</a>
             <a href="?page=users&action=delete&id='.$val['uzy_id'].'"><i class="fas fa-trash"></i>Usuń</a>
           </span>
         </li>
         <li>';
         switch ($val['uzy_rola']) {
           case 1:
             $content .= 'Redaktor naczelny';
             break;
           case 2:
             $content .= 'Dziennikarz';
             break;
           case 3:
             $content .= 'Czytelnik';
             break;
         }
         $content .= '</li>
       </ul>
       ';
     }
   }else{
     $content .= '
     <div class="noData">Brak użytkowników w bazie</div>
     ';
   }
   echo $content;
 }


// edycja uzytkownika
  function editUsers(){
    $id = intval($_GET['id']);
	$author = intval($_GET['author']);
      if ($_GET['page'] === 'users' && $_GET['action'] === 'edit' && !empty($_POST['editUse'])) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $rola = $_POST['rola'];
        $pass = md5($_POST['pass']);
        if (is_numeric($id) && ($this->is_admin() || $author == $_SESSION['rola'])) {
          if (!empty($name) && !empty($surname) && !empty($pass)) {

            if ($this->is_admin()) {
              $q = "UPDATE `uzytkownik` SET
              `uzy_rola` = '$rola', `uzy_imie` = '$name', `uzy_nazwisko` = '$surname', `uzy_haslo` = '$pass', `uzy_mail` = '$email'
              WHERE `uzy_id` = $author LIMIT 1;";
            }else{
              $q = "UPDATE `uzytkownik` SET
              `uzy_imie` = '$name', `uzy_nazwisko` = '$surname', `uzy_haslo` = '$pass', `uzy_mail` = '$email'
              WHERE `uzy_id` = $author LIMIT 1;";
            }

            $sql = mysqli_query($this->$link, $q);
            return header('location: /admin/?page=users&action=edit&id='.$id.'&alert=4&author='.$author.'');
          }else {
            return header('location: /admin/?page=users&action=edit&id='.$id.'&alert=1&author='.$author.'');
          }
        }else {
          return header('location: /admin/?page=users&action=edit&id='.$id.'&alert=15&author='.$author.'');
        }
      }

    //pobranie tablicy uzytkownikow
    if (is_numeric($id)) {
      $sql = mysqli_query($this->$link,
      "SELECT * FROM `uzytkownik` WHERE  `uzy_id` = $id LIMIT 1;");
      $row = mysqli_fetch_array($sql);
    }
     return $row;
  }


// dodanie nowej kategorii
  function deleteUsers(){
    if ($this->is_admin()) {
      if ($_GET['page'] === 'users' && $_GET['action'] === 'delete') {
        $id = $_GET['id'];
        if ($_SESSION['id'] != $id) {
          if (is_numeric($id)) {
            $sql = mysqli_query($this->$link,
            "DELETE FROM `uzytkownik` WHERE `uzy_id` = $id LIMIT 1;");
          }
        }else{
          return header('location: /admin/?page=users&alert=5');
        }
        return header('location: /admin/?page=users&alert=6');
      }
    }else {
      return header('location: /admin/?page=users&alert=15');
    }
  }


  function showRole($role){
    $text = '
    <label>
      <h4>Ranga</h4>
      <select class="rola" name="rola" required>
        <option '.(($role == 1)? 'selected' : '').' value="1">Redaktor naczelny</option>
        <option '.(($role == 2)? 'selected' : '').' value="2">Dziennikarz</option>
        <option '.(($role == 3)? 'selected' : '').' value="3">Czytelnik</option>
      </select>
      <p><i class="fas fa-info-circle"></i> Nadaj prawa użytkownikowi</p>
    </label>
    ';
    echo $text;
  }
///////////////////////////////END UZYTKOWNICY///////////////////////////////










///////////////////////////////ARTYKULY///////////////////////////////
// dodanie nowego artykulu
 function addArticle(){
   if (!empty($_POST['art_tytul']) AND !empty($_POST['art_tresc'])) {
     $id_user = $_SESSION['id'];
     $title = $_POST["art_tytul"];
     $content = $_POST["art_tresc"];
     $date = date('Y-m-d');
     $image = $_POST["art_zdjecie"];
     $categories = $_POST["art_category"];

     $sql = mysqli_query($this->$link,
     "INSERT INTO `artykul`
     (`art_id`, `uzy_id`, `art_tytul`, `art_tresc`, `art_data`, `art_obraz`, `art_wyswietlenia`) VALUES
     (NULL, '$id_user', '$title', '$content', '$date', '$image', '');");

     $sql = mysqli_query($this->$link,
     "SELECT MAX(art_id) FROM `artykul`");
     $art_id = mysqli_fetch_all($sql,MYSQLI_ASSOC);

     $art_id = $art_id[0]['MAX(art_id)'];

     if ($categories) {
       foreach ($categories as $key => $kat_id) {
         $sql = mysqli_query($this->$link,
         "INSERT INTO `artykul_kategoria` (`id`, `kat_id`, `art_id`)
         VALUES (NULL, $kat_id, $art_id);");
       }
     }
     return header('location: /admin/?page=articles&alert=10');
   }else{
     return header('location: /admin/?page=articles&action=add&alert=11');
   }
 }


 function showCategoryAlricle($id_art){
   $id_art = intval($id_art);
   $sql = mysqli_query($this->$link,
   "SELECT * FROM `kategoria` ORDER BY `kat_sort` ASC;");
   $row = mysqli_fetch_all($sql,MYSQLI_ASSOC);

   $sql = mysqli_query($this->$link,
     "SELECT `kat_id` FROM `artykul_kategoria` WHERE `art_id` = $id_art");
   $allCat = mysqli_fetch_all($sql,MYSQLI_ASSOC);
   $allCatArr[] = null;
   foreach ($allCat as $k => $v) {
     $allCatArr[] = $v['kat_id'];
   }

   if ($row) {
     foreach ($row as $key => $val) {
       $content .= '
       <input style="width:auto;" '.((in_array($val['kat_id'], $allCatArr))? 'checked' : '').' type="checkbox" name="art_category[]" value="'.$val['kat_id'].'">
       <span>'.$val['kat_nazwa'].'</span>
       ';
     }
   }
   echo $content;
 }


// edycja artykulu
 function editArticle(){
   $id = intval($_GET['id']);
   $author = intval($_GET['author']);
   if ($_GET['page'] === 'articles' && $_GET['action'] === 'edit' && !empty($_POST['editArt'])) {
     $id_user = $_SESSION['id'];
     $title = $_POST["art_tytul"];
     $content = $_POST["art_tresc"];
     $image = $_POST["art_zdjecie"];
     $categories = $_POST["art_category"];


     if (is_numeric($id) && ($this->is_admin() || $author == $_SESSION['rola'])) {
       $sql = mysqli_query($this->$link,
       "UPDATE `artykul` SET
       `uzy_id`=$id_user, `art_tytul`='$title',
       `art_tresc`='$content', `art_obraz`='$image'
       WHERE `art_id`=$id LIMIT 1");

       if ($categories) {

         $sql = mysqli_query($this->$link,
         "DELETE FROM `artykul_kategoria` WHERE `art_id` = $id;");

         foreach ($categories as $key => $kat_id) {
           $sql = mysqli_query($this->$link,
           "INSERT INTO `artykul_kategoria` (`id`, `kat_id`, `art_id`)
           VALUES (NULL, $kat_id, $id);");
         }
         return header('location: /admin/?page=articles&action=edit&id='.$id.'&alert=13&author='.$author.'');
       }
     }else {

       return header('location: /admin/?page=articles&action=edit&id='.$id.'&alert=15&author='.$author.'');
     }
   }
   //pobranie tablicy edytowanej kategorii
   if (is_numeric($id)) {
     $sql = mysqli_query($this->$link,
     "SELECT * FROM `artykul` WHERE  `art_id` = $id LIMIT 1;");
     $row = mysqli_fetch_array($sql);
   }
    return $row;
 }



// wyswietlenie wszystkich artykulow
 function showArticle(){

   $sql = mysqli_query($this->$link,
   "SELECT * FROM `artykul` ORDER BY `art_id` DESC;");
   $row = mysqli_fetch_all($sql,MYSQLI_ASSOC);
   if ($row) {
     foreach ($row as $key => $val) {
       $content .= '
       <ul>
         <li>'.$val['art_id'].'</li>
         <li>
           <p>'.$val['art_tytul'].'</p>
           <span>
             <a href="?page=articles&action=edit&id='.$val['art_id'].'&author='.$val['uzy_id'].'"><i class="fas fa-pen-square"></i>Edytuj</a>
             <a href="?page=articles&action=delete&id='.$val['art_id'].'&author='.$val['uzy_id'].'"><i class="fas fa-trash"></i>Usuń</a>
           </span>
         </li>
         <li>'.$val['art_data'].'</li>
       </ul>
       ';
     }
   }else{
     $content .= '
     <div class="noData">Brak artykułów w bazie</div>
     ';
   }
   echo $content;
 }



 // skasowanie kategorii
  function deleteArticle(){
    $author = intval($_GET['author']);
    if ($this->is_admin() || $author == $_SESSION['rola']) {
      if ($_GET['page'] === 'articles' && $_GET['action'] === 'delete') {
        $id = $_GET['id'];
        if (is_numeric($id)) {
          $sql = mysqli_query($this->$link,
          "DELETE FROM `artykul` WHERE `art_id` = $id LIMIT 1;");
        }
        return header('location: /admin/?page=articles&alert=12');
      }
    }else{
      return header('location: /admin/?page=articles&alert=15');
    }
  }
///////////////////////////////END ARTYKULY///////////////////////////////










///////////////////////////////KOMENTARZE///////////////////////////////
 function showComment(){

   $sql = mysqli_query($this->$link,
   "SELECT *
     FROM `komentarz`
     LEFT JOIN `uzytkownik`
     ON `komentarz`.`uzy_id` = `uzytkownik`.`uzy_id`
     ORDER BY `komentarz`.`kom_id` DESC;");
   $row = mysqli_fetch_all($sql,MYSQLI_ASSOC);
   if ($row) {
     foreach ($row as $key => $val) {
       $content .= '
       <ul>
         <li>'.$val['kom_id'].'</li>
         <li>
           <p><b>'.$val['uzy_imie'].' '.$val['uzy_nazwisko'].'</b></p>
           <p>'.$val['kom_tresc'].'</p>
           <span>
             <a href="?page=comments&action=delete&id='.$val['kom_id'].'"><i class="fas fa-trash"></i>Usuń</a>
           </span>
         </li>
         <li>'.$val['kom_data'].'</li>
       </ul>
       ';
     }
   }else{
     $content .= '
     <div class="noData">Brak komentarzy w bazie</div>
     ';
   }
   echo $content;
 }



 // skasowanie kategorii
  function deleteComment(){
    $id = intval($_GET['id']);
    if ($this->is_admin()) {
      if ($_GET['page'] === 'comments' && $_GET['action'] === 'delete') {
        if (is_numeric($id)) {
          $sql = mysqli_query($this->$link,
          "DELETE FROM `komentarz` WHERE `kom_id` = $id LIMIT 1;");
        }
        return header('location: /admin/?page=comments&alert=13');
      }
    }else {
      return header('location: /admin/?page=comments&alert=15&id='.$id);
    }
  }
///////////////////////////////END KOMENTARZE///////////////////////////////












///////////////////////////////FRONT PAGE///////////////////////////////
// wyswietlenie wszystkich kategorii w menu
 function showCategoryMenu(){
   $sql = mysqli_query($this->$link,
   "SELECT * FROM `kategoria` ORDER BY `kat_sort` ASC;");
   $row = mysqli_fetch_all($sql,MYSQLI_ASSOC);
   if ($row) {
     foreach ($row as $key => $val) {
       $content .= '
       <a href="/?kategoria='.$val['kat_id'].'">'.$val['kat_nazwa'].'</a>
       ';
     }
   }
   echo $content;
 }



 // wyswietlenie wszystkich artykulow
  function showArticleFront(){

    if (empty($_GET['artykul']) && empty($_GET['kategoria'])) {

      $sql = mysqli_query($this->$link,
      "SELECT *
      FROM `artykul` LEFT JOIN `uzytkownik`
      ON `artykul`.`uzy_id` = `uzytkownik`.`uzy_id`
      ORDER BY `art_id` DESC;");
      $row = mysqli_fetch_all($sql,MYSQLI_ASSOC);

      if ($row) {
        $content .= $this->getArticels($row, true);
      }else{
        $content .= '
        <div class="noData">Brak artykułów w bazie</div>
        ';
      }

    }elseif (is_numeric($_GET['artykul'])) {
      $idart = intval($_GET['artykul']);
	  
	  
      $sql = mysqli_query($this->$link,
      "UPDATE `artykul` SET `art_wyswietlenia` = `art_wyswietlenia` + 1
       WHERE `art_id` = $idart");
	  
      $sql = mysqli_query($this->$link,
      "SELECT *
      FROM `artykul` LEFT JOIN `uzytkownik`
      ON `artykul`.`uzy_id` = `uzytkownik`.`uzy_id`
      WHERE `artykul`.`art_id` = $idart");
      $row = mysqli_fetch_all($sql,MYSQLI_ASSOC);

      if ($row) {
        $content .= $this->getArticels($row, false);
      }

      $content .= $this->getComments();

    }elseif (is_numeric($_GET['kategoria'])) {
      $idCat = intval($_GET['kategoria']);
      $sql = mysqli_query($this->$link,
      "SELECT *
        FROM `artykul_kategoria`
        LEFT JOIN `artykul`
        ON `artykul_kategoria`.`art_id` = `artykul`.`art_id`
        LEFT JOIN `uzytkownik`
        ON `artykul`.`uzy_id` = `uzytkownik`.`uzy_id`
        WHERE `artykul_kategoria`.`kat_id` = $idCat
        ORDER BY `artykul`.`art_id` DESC;");
      $row = mysqli_fetch_all($sql,MYSQLI_ASSOC);


      if ($row) {
      $content .= $this->getArticels($row, true);
      }else{
        $content .= '
        <div class="noData">Brak artykułów w tej kategorii</div>
        ';
      }
    }
    echo $content;
  }

function getArticels($row, $string){
  foreach ($row as $key => $val) {
    if ($val['art_obraz']) {
      $img = '<img src="'.$val['art_obraz'].'">';
    }else {
      $img = null;
    }
    if ($string) {
      $contentText = substr($val['art_tresc'], 0, 600);
    }else {
      $contentText = $val['art_tresc'];
    }
    $content .= '
    <ul>
      <a href="/?artykul='.$val['art_id'].'">
      <li>
        <h1>'.$val['art_tytul'].'</h1>
        <span>
        <i class="fas fa-user"></i>'.$val['uzy_imie'].' '.$val['uzy_nazwisko'].'
        <i class="fas fa-calendar"></i>'.$val['art_data'].'
        <i class="fas fa-eye"></i>'.$val['art_wyswietlenia'].'
        </span>
        '.$img.'
        <p>'.nl2br($contentText).'</p>
      </li>
      </a>
    </ul>
    ';
  }
  return $content;
}

function getComments(){
  $id_art = intval($_GET["artykul"]);
  if ($this->is_login()) {
    $id_user = intval($_SESSION['id']);
    $addCom = $_POST["addCom"];
    $comment = $_POST["comment"];
    $data = date('Y-m-d');

    if (!empty($addCom) && !empty($comment)) {
      $sql = mysqli_query($this->$link,
      "INSERT INTO `komentarz` (`kom_id`, `uzy_id`, `art_id`, `kom_tresc`, `kom_data`)
      VALUES (NULL, $id_user, $id_art, '$comment', '$data' );");
      return header('location: /?artykul='.$id_art);
    }
  }

// tu bedzie komentarz co dana funkcja poniżej robi
  $sql = mysqli_query($this->$link,
  "SELECT *
    FROM `komentarz`
    LEFT JOIN `uzytkownik`
    ON `komentarz`.`uzy_id` = `uzytkownik`.`uzy_id`
    WHERE `komentarz`.`art_id` = $id_art
    ORDER BY `komentarz`.`kom_id` DESC;");
  $row = mysqli_fetch_all($sql,MYSQLI_ASSOC);
  if ($row) {
    foreach ($row as $key => $value) {
      $comAll .= '
      <ul>
        <li>
          <h4>'.$value['uzy_imie'].' '.$value['uzy_nazwisko'].'</h4>
          <span><i class="fas fa-calendar"></i>'.$value['kom_data'].'</span>
        </li>
        <li>
          <p>'.$value['kom_tresc'].'</p>
        </li>
      </ul>
      ';
    }
  }else{
    $comAll .= '
    <ul>
      <li>
        <p>
        Ten wpis nie ma jeszcze komentarzy.
        </p>
      </li>
    </ul>
    ';
  }


  $comments = '
  <div class="comments" id="comments">
    <h3>Komentarze</h3>
    <ul>
      <form class="comPost" action="#comments" method="post">
        <textarea required name="comment"></textarea>
        <input type="submit" name="addCom" value="Dodaj komentarz">
        '.(($this->is_login())? '' : '<a href="/admin">Zaloguj się</a>, aby dodac komentarz').'
      </form>
    </ul>
    '.$comAll.'
  </div>
  ';
  return $comments;
}


}
