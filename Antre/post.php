<!DOCTYPE html>
<html lang="en-US">
<?php $filename = "blog"; ?>
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

<body class="single-post" data-share="[&quot;facebook&quot;,&quot;twitter&quot;]">

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
    <?php try {
        $db = new PDO("mysql:host=localhost;dbname=antredesign", "root", "");
    } catch ( PDOException $e ){
        print $e->getMessage();
    }
    $id = $_GET['post'];
    if (!isset($_GET['post']))header('location: index.php');
    $query = $db->query("SELECT * FROM blog WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
    ?>

    <main>

        <div class="main-scroll">

            <div class="atail-post row-col-12">

                <div class="atail-post-line"></div>


                <div class="atail-post-title ">
                    <h1><?php print $query['title']; ?></h1>
                    <img src="<?php print $query['image']; ?>" alt="<?php print $query['title']; ?>"/>
                </div>

                <div class="col-md-8">
                    <div class="row-col-8">

                        <div class="atail-post-content col-md-6 col-md-push-1  no-padding">

                            <div class="post-content-info">
                                <span class="content-info-date">
                                     <a href="#"><?php print $query['date']; ?></a>
                                </span>
                            </div>
                            <div class="post-content-tags">
                                <span class="small-title">Tags: </span>
                                <a href="#" rel="tag">atail</a>,
                                <a href="#" rel="tag">post</a>
                            </div>

                            <div class="post-content-text">
                                <?php print $query['content']; ?>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-md-3 post-sidebar">
                    <div class="widget widget_atail_recent_posts_widget">

                        <div class="widget-title"><span class="small-title">Recent Posts</span></div>
                        <ul>
                            <?php
                            $query = $db->query("SELECT * FROM blog ORDER BY  RAND() LIMIT 10", PDO::FETCH_ASSOC);
                            if ( $query->rowCount() ){
                                foreach( $query as $row ){
                            ?>
                            <li>
                                <img src="<?php print $row['image']; ?>" alt="<?php print $row['title']; ?>"/>
                                <div>
                                    <a href="post?post=<?php print $row['id']; ?>"><?php print $row['title']; ?></a>
                                    <div class="recent-post-info">
                                        <span class="post-date"><?php print $row['date']; ?></span>
                                    </div>

                                </div>
                            </li>
                            <?php
                                }
                            } ?>
                        </ul>
                    </div>
                </div>

                <div class="col-md-12 atail-post-navigation no-padding">
                    <div class="row-col-12">
                        <div class="col-xs-4 no-padding">
                            <a href="#" rel="prev">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"  x="0px" y="0px" width="12.45px" height="21.15px" viewBox="0 0 12.45 21.15" enable-background="new 0 0 12.45 21.15" xml:space="preserve"><g><g><path vector-effect="none"  fill-rule="evenodd" clip-rule="evenodd" d="M9.068,5.618c1.104,0,2-0.896,2-2c0-1.105-0.895-2-2-2 c-1.105,0-2,0.895-2,2C7.068,4.723,7.964,5.618,9.068,5.618z M3.068,8.618c-1.105,0-2,0.896-2,2c0,1.105,0.895,2,2,2s2-0.895,2-2 C5.068,9.514,4.173,8.618,3.068,8.618z M9.068,15.618c-1.105,0-2,0.895-2,1.999c0,1.105,0.895,2,2,2c1.104,0,2-0.895,2-2 C11.068,16.514,10.173,15.618,9.068,15.618z"/></g></g></svg>
                            </a>                            <!--Previous post-->
                        </div>
                        <div class="col-xs-4 no-padding">
                            <a href="blog.php">BLOG </a>
                            <!--Go to blog-->
                        </div>
                        <div class="col-xs-4 no-padding">
                            <a href="#" rel="next">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"  x="0px" y="0px" width="12.45px" height="21.15px" viewBox="0 0 12.45 21.15" enable-background="new 0 0 12.45 21.15" xml:space="preserve"><g><g><path vector-effect="none"  fill-rule="evenodd" clip-rule="evenodd" d="M9.068,5.618c1.104,0,2-0.896,2-2c0-1.105-0.895-2-2-2 c-1.105,0-2,0.895-2,2C7.068,4.723,7.964,5.618,9.068,5.618z M3.068,8.618c-1.105,0-2,0.896-2,2c0,1.105,0.895,2,2,2s2-0.895,2-2 C5.068,9.514,4.173,8.618,3.068,8.618z M9.068,15.618c-1.105,0-2,0.895-2,1.999c0,1.105,0.895,2,2,2c1.104,0,2-0.895,2-2 C11.068,16.514,10.173,15.618,9.068,15.618z"/></g></g></svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div> <!-- main-scroll -->

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
                        © 2016 Itembridge LLC
                    </p>
                </div>
            </div>
        </div>
    </div> <!-- sides -->

</div> <!-- atail -->


<script type='text/javascript' src="js/jquery-3.1.1.min.js"
></script>
<script type='text/javascript' src='js/main.js'></script>
<script type='text/javascript' src='js/jssocials.js'></script>
<script type='text/javascript' src='js/retina.js'></script>

</body>
</html>
