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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>

    <title>Atail &#8211; Unique portfolio solution for creatives</title>

    <link href="https://fonts.googleapis.com/css?family=Hind:300,400%7CMontserrat:400,700" rel="stylesheet" media="all">
    <link rel='stylesheet' href='css/icons.css' type='text/css' media='all'/>
    <link rel='stylesheet' href='css/font-awesome.min.css' type='text/css' media='all'/>
    <link rel='stylesheet' href='css/main.css' type='text/css' media='all'/>
    <link rel='stylesheet' href='css/setting.css' type='text/css' media='all'/>

</head>

<body data-share="[&quot;instagram&quot;,&quot;behance&quot;,&quot;linkedin&quot;]">

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

    <?php require "partials/header.php";?>

    <main>

        <div class="main-scroll">

            <div class="project-preview-images  ">
                <div class="preview-images-item">
                    <?php
                    $query = $db->query("SELECT * FROM portfolio", PDO::FETCH_ASSOC);
                    if ( $query->rowCount() ){
                    foreach( $query as $row ){
                    ?>
                    <img src="<?php print $row['image'];?>" alt="" class="project-<?php print $row['id'];?>">
                    <?php
                        }
                    } ?>
                </div>
            </div>

            <div class="row ">

                <div class="col-md-10 no-padding">

                    <div class="project-preview-arrow-wrapper">
                        <span class="project-preview-arrow">
                            <span>
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"  x="0px" y="0px"
                                     width="57.143px" height="34.454px" viewBox="0 0 57.143 34.454" enable-background="new 0 0 57.143 34.454" xml:space="preserve">
                                    <g>
                                        <g>
                                            <polygon points="51.908,17.599 46.891,13.1 46.891,17.094 6.904,17.094 6.904,18.094 46.891,18.094 46.891,22.099"/>
                                        </g>
                                    </g>
                                </svg>
                            </span>
                            <span>Kaydır</span>
                        </span>
                    </div>

                    <div class="project-preview" tabindex="0">
                        <?php
                        $count=1;
                        $query = $db->query("SELECT * FROM portfolio", PDO::FETCH_ASSOC);
                        if ( $query->rowCount() ){
                            foreach( $query as $row ){
                        ?>
                        <div class="display-table">
                            <div class="display-table-cell">

                                <div class="row-col-10"
                                     id="project-<?php print $row['id'];?>">
                                    <div class="col-xs-5 col-sm-5 col-md-2 project-count">
                                        <span><span class="project-count-number"><?php print $count;?></span></span>
                                        /
                                        <span><?php print $query->rowCount();?></span>
                                    </div>
                                    <div class="col-xs-7 col-sm-6 col-md-4 no-padding">
                                        <div class="content">
                                            <article>

                                                <div class="preview-article-header">
                                                    <h2  >
                                                        <a data-action="open-full-post" data-post="project.php?a=<?php print $row['id'];?>"
                                                           href="#"><?php print $row['title'];?></a>
                                                    </h2>
                                                </div>
                                                <div class="preview-article-text">
                                                    <div class="preview-text-content" style="background-color:white;border-radius: 15px;border:1px;">
                                                        <?php print $row['text'];?>
                                                    </div>
                                                </div>

                                                <a class="tmp-class open-full-post" data-action="open-full-post"
                                                   data-post="project-<?php print $row['id'];?>"
                                                   href="#"><span>Detay</span></a>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                                $count++;
                            }
                        }
                        ?>

                    </div>
                </div>
                <div class="col-md-2 all-projects-ajax-btn" style="padding-top: 40%;">
                    <a href="all-projects.php">Tüm Projeler</a>
                </div>
            </div>


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
<script type='text/javascript' src='js/retina.js'></script>

</body>
</html>
