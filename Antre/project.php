<!DOCTYPE html>
<html lang="en-US">
<?php try {
    $db = new PDO("mysql:host=localhost;dbname=antredesignstudio;charset=utf8", "Mehti", "asd12345");
} catch ( PDOException $e ){
    print $e->getMessage();
}
$filename = "index";
?>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Unique portfolio solution for creatives">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title>Chinese girl posing &#8211; Atail</title>

    <link href="https://fonts.googleapis.com/css?family=Hind:300,400%7CMontserrat:400,700" rel="stylesheet" media="all">
    <link rel='stylesheet' href='css/icons.css' type='text/css' media='all'/>
    <link rel='stylesheet' href='css/font-awesome.min.css' type='text/css' media='all'/>
    <link rel='stylesheet' href='css/main.css' type='text/css' media='all'/>
    <link rel='stylesheet' href='css/setting.css' type='text/css' media='all'/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

</head>

<body class="single single-atail_projects" data-token="#"
      data-share="[&quot;facebook&quot;,&quot;twitter&quot;]">

<!--Preloader-->
<div class="atail-preloader-wrapper">
    <span>
        <span class="atail-dot"></span>
        <span class="atail-dot"></span>
        <span class="atail-dot"></span>
    </span>
    <div class="atail-preloader">
        <span>
            <span class="atail-dot"></span>
            <span class="atail-dot"></span>
            <span class="atail-dot"></span>
        </span>
    </div>
</div>
<!--/Preloader-->

<div class="atail  container-fluid  ">

    <?php require "partials/header.php";
    $id = $_GET['id'];
    if (!isset($_GET['id']))header('location: index.php');
    $query = $db->query("SELECT * FROM portfolio WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);?>

    <main>

        <div class="main-scroll">

            <!--Get Meta data-->
            <div class="splide" style="height: 800px;overflow: hidden;object-fit: contain;">
                <div class="splide__track">
                    <ul class="splide__list">

                        <li class="splide__slide"><img  src="<?php print $query['image'];?>"></li>
                        <?php
                        $slides = $query['slides'];
                        $slides=explode(",",$slides);
                        if (empty($slides)){
                        foreach ($slides as $slide){
                            ?>
                            <li class="splide__slide"><img src="<?php print $slide;?>"></li>
                        <?php
                        }}
                        ?>
                    </ul>
                </div>
            </div>

            <div class="single-project row-col-12">

                <div class="col-sm-4 col-md-push-2 no-padding-left">
                    <h2><?php print $query['title'];?></h2>
                </div>


            </div>

            <div class="row-col-12" style="padding-left: 15%;">
                <?php print htmlspecialchars_decode(stripslashes($query['content'])); ;?>
            </div>

            <div class="row-col-12">

                <div class="col-xs-6 col-md-4  col-md-push-2 no-padding">
                    <div class="single-project-prev atail-project-nav ">

                        <a href="all-projects.php" class="single-project-link-arrow">
                            <span class="single-project-arrow">
                              <svg version="1.1"
                                   xmlns="http://www.w3.org/2000/svg"
                                   x="0px"
                                   y="0px"
                                   width="57.143px"
                                   height="34.454px"
                                   viewBox="0 0 57.143 34.454"
                                   enable-background="new 0 0 57.143 34.454"
                                   xml:space="preserve">
                                  <g>
                                      <g>
                                          <polygon
                                              fill=""
                                              points="51.908,17.599 46.891,13.1 46.891,17.094 6.904,17.094 6.904,18.094 46.891,18.094 46.891,22.099">
                                          </polygon>
                                      </g>
                                  </g>
                              </svg>
                            </span>
                            <span>Tüm Projeler</span>
                        </a>

                    </div>
                </div>

                <div class="col-xs-6 col-md-4  col-md-push-2 no-padding">
                    <div class="single-project-next atail-project-nav  atail-no-thumbnail ">

                    </div>
                </div>

            </div>

            <!-- post navigation -->

        </div> <!-- main-scroll -->

        <div class="grid-bg row">
            <div class="col-md-2"></div>
            <div class="col-md-2"></div>
            <div class="col-md-2"></div>
            <div class="col-md-2"></div>
            <div class="col-md-2"></div>
            <div class="col-md-2"></div>
        </div>

    </main> <!-- main -->

    <div class="sides">
        <div class=" container-fluid ">
            <div class="left-side">
                <div class="side-content">
                    <a href="https://www.facebook.com/ItemBridge"> Facebook </a>
                    <a href="https://twitter.com/Itembridge"> Twitter </a>
                    <a href="https://instagram.com/itembridge/"> Instagram </a>
                    <a href="https://www.behance.net/itembridge"> Behance </a>
                </div>
            </div>

            <div class="right-side">
                <div class="side-content">
                    <p class="copyright">
                        © 2016 Itembridge LLC </p>
                </div>
            </div>
        </div>
    </div> <!-- sides -->

</div> <!-- atail -->

<script type='text/javascript' src="js/jquery-3.1.1.min.js"></script>
<script type='text/javascript' src='js/main.js'></script>
<script type='text/javascript' src='js/jssocials.js'></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
<script>

    new Splide( '.splide' ).mount();
</script>

</body>
</html>
