<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="utf-8">
  <title>Eksioglu Onur Yapı | Projelerimiz</title>
  <meta content="" name="description">
  <meta content="" name="author">
  <meta content="" name="keywords">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
  <!-- favicon -->
  <link href="assets/img/favicon.png" rel="icon" sizes="32x32" type="image/png">
  <!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- font themify CSS -->
  <link rel="stylesheet" href="assets/css/themify-icons.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
  <!-- metro CSS -->
  <link href="assets/css/animated-metro.css" rel="stylesheet">
  <link href="assets/css/owl.carousel.css" rel="stylesheet">
  <link href="assets/css/owl.theme.css" rel="stylesheet">
  <link href="assets/css/owl.transitions.css" rel="stylesheet">
  <link href="assets/css/metro-style.css" rel="stylesheet">
  <link href="assets/css/queries-metro.css" media="all" rel="stylesheet" type="text/css">
</head>

<body>

  <!-- preloader -->
  <div class="bg-preloader"></div>
  <div class="preloader">
    <div class="mainpreloader">
      <img class="logo-preloader" alt="preloaderlogo" src="assets/img/logo-preloader.png">
    </div>
  </div>
  <!-- preloader end -->

  <!-- content wraper -->
  <div class="content-wrapper">

      <?php require "parts/main/_nav.php";?>

    <!-- slideshowbg -->
    <div class="mainbg" style="background-image:url(assets/img/bg2.jpg)"></div>
    <div class="overlay-page"></div>
    <!-- spacer -->
    <div class="space-double"></div>

    <!-- section porto -->
    <section class="no-bottom" id="porto" aria-label="porto">

      <!-- text -->
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-9 col-xs-12">
            <div class="onStep" data-animation="fadeInUp" data-time="300">
              <article>
                <h3>Our Works</h3>
                <span class="devider-cont"></span>
                <p>
                  <em>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia, otam rem
                    aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                    explicabo.</em><br>

                  Etiam purus lorem, aliquet a eros sit amet, vestibulum finibus augue. Cras egestas neque vitae dui
                  tincidunt, vitae tristique tellus volutpat. Fusce justo ante, interdum in augue in, commodo imperdiet
                  turpis. Maecenas justo neque, efficitur sit amet scelerisque eu, ornare a justo. Morbi scelerisque ex
                  ut consequat vestibulum.
              </article>
            </div>
          </div>


        </div>
      </div>
    </section>
    <!-- section porto end -->

    <!-- section projects -->
    <section class="no-top no-bottom" id="projects">

      <div class="container-fluid">
        <div class="row">

          <!-- filter project -->
          <div class="onStep" data-animation="fadeInUp" data-time="900">
            <div class="filter-wraper">
              <ul id="filter-porto">

                <li class="filt-projects" data-project=".Tamamlandı"><div class="pro-btn" style="background: #242D3D!important;width: 125px;">TAMAMLANAN</div></li>

                <li class="space">.</li>

                <li class="filt-projects" data-project=".Devam"><div class="pro-btn" style="background: #242D3D!important;width: 125px;">DEVAM EDEN</div></li>

                <li class="space">.</li>

                <li class="filt-projects" data-project=".Gelecek"><div class="pro-btn" style="background: #242D3D!important;width: 125px;">GELECEK PROJELER</div></li>

                <li class="space">.</li>

                <li class="filt-projects active" data-project="*"><div class="pro-btn" style="background: #242D3D!important;width: 100px;">HEPSİ</div>
                </li>
              </ul>
            </div>
          </div>
          <!-- filter project end -->

          <!-- start gallery -->
          <div class="no-gutter onStep" data-animation="fadeInUp" data-time="600" id="projects-wrap">
              <?php
              $query = $db->query("SELECT * FROM projects", PDO::FETCH_ASSOC);
              if ( $query->rowCount() ){
                  foreach( $query as $row ){
              ?>
            <div class="col-md-6 col-sm-6 col-xs-12 item <?php print $row['category'];?>">
              <div class="projects-grid">
                <a href="project-detail.php?<?php print $row['id'];?>">
                  <div class="hovereffect">
                    <img alt="imageportofolio" class="img-responsive" src="<?php print $row['image'];?>" width="325px"
                      height="220px" style="height: 650px!important;">
                    <div class="overlay">
                      <h3>
                          <?php print $row['name'];?> <br> <br>
                        İncele
                      </h3>
                    </div>
                  </div>
                </a>
              </div>
            </div>
              <?php }
              } ?>
          </div>
          <!-- gallery end -->

        </div>
      </div>

      <div class="space-double"></div>
    </section>
    <!-- section projects end -->


    <!-- spacer -->
    <div class="space-double"></div>

      <?php require "parts/main/_footer.html";?>

    <!-- ScrolltoTop -->
    <div id="totop">
      <span class="ti-angle-up"></span>
    </div>

  </div>
  <!-- content wraper end -->

  <!-- plugin JS -->
  <script src="assets/plugin/pluginsmetro.js" type="text/javascript"></script>
  <!-- slider revolution  -->
  <script type="text/javascript" src="assets/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
  <!-- metro JS -->
  <script src="assets/js/metro.js" type="text/javascript"></script>
  <script src="assets/js/plugin-set.js" type="text/javascript"></script>
</body>

</html>