<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="utf-8">
  <title>Eksioglu Onur Yapı | Hakkımızda</title>
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
    <div class="space-single"></div>

    <!-- section about -->
    <section aria-label="about" id="about">
      <div class="container-fluid">
        <div class="row">

          <!-- history -->
          <div class="col-md-9">

            <!-- article -->
            <article>
              <h3 class="onStep" data-animation="bounceInLeft" data-time="300">
                Hakkımızda
              </h3>
              <span class="devider-cont onStep" data-animation="bounceInLeft" data-time="400"></span>
              <p class="onStep" data-animation="fadeInDown" data-time="600">
                  <?php $query = $db->query("SELECT * FROM about WHERE id = 1")->fetch(PDO::FETCH_ASSOC);
                  if ( $query ){
                      print $query['body'];
                  } ?>
              </p>
            </article>
            <div class="space-double"></div>
            <!-- article -->
          </div>
          <!-- history end -->

        </div>
      </div>
    </section>
    <!-- section about end -->

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