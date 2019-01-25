<section class="secrionNazwa">
  <div class="wrapp">
    <div class="block"></div>
  </div>
</section>


<section class="secrionTopMenu">
  <div class="wrapp">
    <div class="block">
      <h1>Info<span>News+</span></h1>
      <p>
      <?php
        if ($_SESSION['loggedin'] == true) {
          echo 'Witaj, '.$_SESSION['name'].' '.$_SESSION['surname'].' <a href="/admin/?page=wyloguj">[ wyloguj ]</a>';
        }else {
          echo '<a href="/admin">Zaloguj się</a>';
        }
       ?>
      </p>
    </div>
    <div class="block">
      <nav>
        <ul>
          <li>
            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>">Start</a>
            <?php $admin->showCategoryMenu(); ?>
            <a href="/admin">PANEL</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</section>


<section class="sectionContent">
  <div class="wrapp">
    <div class="block">
      <?php $admin->showArticleFront(); ?>
    </div>
    <div class="block">
      <h3>NA ŻYWO</h3>
      <?php
      $xml = simplexml_load_file("https://www.tvn24.pl/najnowsze.xml");
      foreach ($xml->channel as $value) {
          foreach ($value->item as $key => $news) {
            echo '
            <ul>
              <a href="'.$news->link.'"><i class="fas fa-chevron-right"></i> '.$news->title.'</a>
            </ul>
            ';
          }
      }
       ?>
    </div>
  </div>
</section>
