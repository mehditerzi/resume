<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="utf-8">
  <title>Eksioglu Onur Yapı - Hakkımızda</title>
  <meta content="" name="description">
  <meta content="" name="author">
  <meta content="" name="keywords">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
  <!-- favicon -->
  <link href="assets/img/favicon.png" rel="icon" sizes="32x32" type="assets/image/png">
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

    <!-- section contact -->
    <section aria-label="contact">
      <div class="container-fluid">
        <div class="row">

          <div class="no-gutter">

            <!-- contact form -->
            <div class="col-md-6 col-sm-12" style="padding-left: 0px; padding-right: 0px;">
              <div class="onStep" data-animation="fadeInUp" data-time="300" id="contact" style=" background-color: white;">
                <h4>Bize Yazın</h4>
                <hr>
                <div id="form-contact" name="form-contact">
                  <input id="name-contact" name="name" placeholder="İsminiz Soyisminiz" type="text" style="background-color: gray;">
                  <input id="email-contact" name="email" placeholder="Mailiniz" type="email" style="background-color: gray;">
                  <textarea cols="50" id="message-contact" name="message" placeholder="Mesajınız" rows="4" style="background-color: gray;"></textarea>
                  <div class="success" id="mail_success">
                    Teşekkürler, mesajınız yollandı.
                  </div>

                  <div class="error" id="mail_failed">
                    Hata! Lütfen belli bir süre sonra tekrar deneyin.
                  </div>
                  <button class="btn-contact" onclick="sendMail()" id="send-contact" type="button">Gönder</button>
                </div>
              </div>
            </div>
            <!-- contact form end -->

            <div class="col-md-1 col-sm-12"></div>

            <!-- address -->
            <div class="col-md-5 col-sm-12">
              <div class="wrapaddres onStep" data-animation="fadeInRight" data-time="600">
                <br>
                <address style="font-size: x-large;">
                  <span><strong>ADDRESS</strong><br>
                    129 Park street,<br>
                    New York City, NY 10903</span> <span><strong>PHONE</strong><br>
                    (+6221) 000 888 999</span> <span><strong>EMAIL</strong><br>
                    <a href="mailto:companyname@eksiogluonuryapi.com">companyname@gmail.com</a></span>
                  <span><strong>WEB</strong><br>
                    <a href="#">www.eksiogluonuryapi.com</a></span>
                </address>
              </div>
            </div>
            <!-- address end -->

            <!-- map -->
            <div class="col-md-12 col-sm-12">
              <div class="onStep" data-animation="fadeInLeft" data-time="300" id="map">
              </div>
            </div>
            <!-- map end -->

          </div>

        </div>
      </div>
    </section>
    <!-- section contact end -->


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
  <!--  map google  -->
  <script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCQ5KODzqooIP496GPLRaMAsZ4eN8Vro_U"></script>
  <script src="assets/js/map.js" type="text/javascript"></script>
  <!-- slider revolution  -->
  <script type="text/javascript" src="assets/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
  <!-- metro JS -->
  <script src="assets/js/metro.js" type="text/javascript"></script>
  <script src="assets/js/send-mail.js" type="text/javascript"></script>
  <script src="assets/js/plugin-set.js" type="text/javascript"></script>
</body>

</html>