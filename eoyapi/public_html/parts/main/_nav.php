<!-- nav -->
<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=eoyapi_main;charset=utf8", "eoyapi_admin", "GDstHyKXPZ6T");
} catch ( PDOException $e ){
    print $e->getMessage();
}
?>
<div class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid" style="padding: 0 45px;">
    <div class="row">

      <!-- menu mobile display -->
      <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse">
        <span class="icon icon-bar"></span>
        <span class="icon icon-bar"></span>
        <span class="icon icon-bar"></span>
      </button>


      <!-- logo -->
      <a style="margin-top: 2px;" class="navbar-brand" href="/"><img alt="logo" src="assets/img/logo.png"></a>

      <!-- mainmenu start -->
      <div class="menu-init" id="main-menu">
        <nav class="homepage-nav">
          <ul>
            <li><a href="/">Anasayfa</a></li>
            <li><a href="/hakkimizda">Hakkımızda</a></li>
            <li><a href="/projeler">Projeler</a></li>
            <li><a href="/iletisim">İletişim</a></li>
          </ul>
        </nav>
      </div>
      <!-- mainmenu end -->

    </div>
  </div>
  <!-- container -->
</div>
<!-- nav end -->