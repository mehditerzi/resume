<!DOCTYPE html>
<html lang="en-US">
<?php $filename = "index";
try {
    $db = new PDO("mysql:host=localhost;dbname=antredesignstudio;charset=utf8", "Mehti", "asd12345");
} catch (PDOException $e) {
    print $e->getMessage();
}
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

<body data-share="[&quot;facebook&quot;,&quot;twitter&quot;,&quot;facebook&quot;,&quot;googleplus&quot;,&quot;pinterest&quot;]">

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

            <div class="row all-atail-projects-wrapper">

                <div class="col-md-10 col-xs-8 no-padding">
                    <div class="all-atail-projects row-col-10">

                        <?php
                        $count=1;
                        $query = $db->query("SELECT * FROM portfolio", PDO::FETCH_ASSOC);
                        if ( $query->rowCount() ){
                        foreach( $query as $row ){
                        ?>

                        <div <?php if ($count==1)print 'style="margin-top: 30px;"';?>  class="row-col-10 all-atail-projects-single" data-categories="<?php
                        $cats = explode(",",$row['category']);;
                        foreach ($cats as $cat){
                            print "cat-".$cat." ";
                        }
                        ?>">
                            <div class="col-md-4 col-md-push-2 no-padding all-atail-projects-article col-xs-10 col-sm-6" style="padding-top: 200px;padding-left: 50px;">
                                <article>
                                    <h2>
                                        <a href="project.php?id=<?php print $row['id'];?>">
                                            <?php print $row['title'];?>
                                        </a>
                                    </h2>
                                    <a class="open-full-post" data-post="post-70"
                                       href="project.php?id=<?php print $row['id'];?>">
                                        <span>Detay</span>
                                    </a>
                                </article>
                            </div>
                            <div class="col-md-4 no-padding all-atail-projects-img col-xs-10 col-sm-4" style="margin-left: -50px;">
                                <img width="500" height="350"
                                     src="<?php print $row['image'];?>"
                                     alt="<?php print $row['title'];?>"/>
                            </div>
                        </div>

                        <?php
                            $count++;
                            }
                        }
                        ?>



                    </div>
                </div>

                <div class="all-atail-projects-category col-md-2 col-xs-4">
                    <div class="all-atail-projects-category-wrapper">
                        <div class="all-atail-projects-category-table">
                            <ul class="no-list">
                                <li>
                                    <a href="#" class="active" data-action="show-category" data-category="cat-all">All</a>
                                </li>
                                <?php
                                $query = $db->query("SELECT * FROM categories", PDO::FETCH_ASSOC);
                                if ( $query->rowCount() ){
                                foreach( $query as $row ){
                                ?>
                                <li>
                                    <a href="#" data-action="show-category" data-category="cat-<?php print $row['id'];?>"><?php print $row['name'];?></a>
                                </li>
                                <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
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
<script type='text/javascript' src='js/retina.js'></script>

</body>
</html>
