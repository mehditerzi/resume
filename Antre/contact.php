<!DOCTYPE html>
<?php $filename = "contact"; ?>
<html lang="en-US">
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

            <div class="row ">
                <div class="col-md-2 "></div>
                <div class="col-md-4 no-padding-left">
                    <h2>Contact our<br>team</h2>
                </div>
                <div class="col-md-4 no-padding-left">
                    <p>
                        Don't hesitate to get in touch with us! We love the challenge of turning your ideas into reality
                        and are always ready to talk through any message.
                    </p>
                </div>
                <div class="col-md-2 "></div>
            </div>

            <div class="google-map-wrapper" id="map"></div>

            <div class="row ">

                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2 no-padding-left col-sm-4">
                    <div class="atail-place ">
                        <span class="atail-place-title">San francisco</span>
                        <span class="atail-place-text">Address<span>41 Madison Ave, Flr 25 New York, NY 10010 1-877-932-7111</span></span>
                        <span class="atail-place-text">email<span><a href="mailto:sample@gmail.com"><span>sample@gmail.com</span></a></span></span>
                        <span class="atail-place-text">Phone<span>+1 256 258 25 45</span></span>
                    </div>
                </div>
                <div class="col-md-2 no-padding-left col-sm-4">
                    <div class="atail-place ">
                        <span class="atail-place-title">Bejing</span>
                        <span class="atail-place-text">Address<span>41 Madison Ave, Flr 25 New York, NY 10010 1-877-932-7111</span></span>
                        <span class="atail-place-text">email<span><a href="mailto:sample@gmail.com"><span>sample@gmail.com</span></a></span></span>
                        <span class="atail-place-text">Phone<span>+1 256 258 25 45</span></span>
                    </div>
                </div>
                <div class="col-md-2 no-padding-left col-sm-4">
                    <div class="atail-place ">
                        <span class="atail-place-title">New York</span>
                        <span class="atail-place-text">Address<span>41 Madison Ave, Flr 25 New York, NY 10010 1-877-932-7111</span></span>
                        <span class="atail-place-text">email<span><a href="mailto:sample@gmail.com"><span>sample@gmail.com</span></a></span></span>
                        <span class="atail-place-text">Phone<span>+1 256 258 25 45</span></span>
                    </div>

                    <form action="#" method="POST" class="contact-form">
                        <input type="text" placeholder="Name" name="name" required="">
                        <input type="email" placeholder="Email" name="email" required="">
                        <textarea placeholder="Message" name="text" cols="30" rows="10" required=""></textarea>
                        <button type="submit">Send</button>
                    </form>
                    
                </div>
                <div class="col-md-4 ">
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

<!-- Init Google Maps API -->
<!-- https://developers.google.com/maps/documentation/javascript/tutorial -->
<script>
    function initMap() {

        // Specify features and elements to define styles.
        var styleArray = [
            {
                featureType: "all",
                stylers: [
                    { saturation: -100 }
                ]
            }
        ];

        var myLatLng = {lat: -34.397, lng: 150.644};

        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            scrollwheel: false,
            draggable: false,
            styles: styleArray,
            zoom: 8
        });

        // Create a marker and set its position.
        // uncomment if you want use it
//        var marker = new google.maps.Marker({
//            map: map,
//            position: myLatLng,
//            title: 'Hello World!'
//        });
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTRpEm6exIs_F5dgG1dCftSpt_AY_k7EU&callback=initMap"></script>



</body>
</html>
