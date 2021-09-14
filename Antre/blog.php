<!DOCTYPE html>
<html lang="en-US">
<?php try {
    $db = new PDO("mysql:host=localhost;dbname=antredesignstudio;charset=utf8", "Mehti", "asd12345");
} catch ( PDOException $e ){
    print $e->getMessage();
}
$filename = "blog";
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

<body data-share="[&quot;facebook&quot;,&quot;twitter&quot;]">

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

            <section class="atail-slider">
                <?php
                $query = $db->query("SELECT * FROM blog LIMIT 5", PDO::FETCH_ASSOC);
                if ( $query->rowCount() ){
                    $total = $query->rowCount();
                    require_once 'php/Pagination.class.php';

                    // set the page number (based on a URL param; cast as an int; ensure min page number)
                    $page = $_GET['page'] ?? 1;
                    $page = (int) $page;
                    $page = min($page, 1);

                    // instantiate; set current page; set number of records per page; number of records in total
                    $pagination = new Pagination();
                    $pagination->setCurrent($page);
                    $pagination->setRPP(5);
                    $pagination->alwaysShowPagination(true);
                    $pagination->setTotal($total);
                    $low = $page*5;
                    $low=$low-5;
                    $hi = $page*5;
                    // grab rendered pagination markup
                    $markup = $pagination->parse();
                    foreach( $query as $row ){
                        ?>
                <div>
                    <img src="<?php print $row['image'];?>" alt="colored-pencils-in-open-box">
                    <div class="atail-slider-content">
                        <h1><a href="#"><?php print $row['title'];?></a></h1>
                        <a href="#" class="blog-date"><span><?php print $row['date'];?></span></a>
                    </div>
                </div>
                        <?php
                    }
                } ?>

            </section>

            <section class="simple-post">
                <?php
                $query = $db->query("SELECT * FROM blog LIMIT ".$low.",".$hi, PDO::FETCH_ASSOC);
                if ( $query->rowCount() ){
                foreach( $query as $row ){
                ?>
                <div class="row-col-12" id="post-270">

                    <div class="col-md-2 col-md-push-2 no-padding blog-thumbnail col-sm-4">
                        <a href="post.php?post=<?php print $row['id']; ?>">
                            <img src="<?php print $row['image'];?>" style="width: 200%;height: 200;" alt="<?php print $row['title'];?>"/>
                        </a>
                    </div>

                    <div class="col-md-4 atail-post-content col-md-push-2 no-padding blog-list-info col-sm-6" style="padding-top: 50px;padding-left: 120px;">

                        <h3>
                            <a href="post.php?post=<?php print $row['id']; ?>"><?php print $row['title'];?></a>
                        </h3>
                        <p><?php print $row['description'];?></p>
                        <div class="blog-info">
                            <a href="#" class="blog-date"><?php print $row['date'];?></a>
                        </div>

                    </div>

                </div>
                <?php
                    }
                }
                ?>


                <div class="pagination navigation">
                    <div class='nav-links'>
                        <?php
                        print $markup;?>
                    </div>
                </div>

            </section>

            <section class="blog-promo-box">
                <div class="promo-box ">
                    <span class="small-title">Promo block</span>
                    <p>
                        For good, too; though, in consequence of my previous emotions, I was still occasionally seized
                        with a stormy sob .
                    </p>
                    <a href="#" class="button">Learn more</a>
                </div>
            </section>


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
                        © 2016 Itembridge LLC
                    </p>
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
