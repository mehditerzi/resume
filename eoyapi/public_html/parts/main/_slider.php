<!-- revolution slider -->
<!-- Slider Arrow Color Change: assets/rs-plugin/css/settings.css ".tp-leftarrow.default" -->
<div id="revolution-slider">
    <ul>

        <?php
        $query = $db->query("SELECT * FROM slider", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
            foreach( $query as $row ){
        ?>
        <li data-transition="fade" data-slotamount="10" data-masterspeed="200" data-thumb="">
            <!--  BACKGROUND IMAGE -->
            <img src="<?php print $row['image'];?>" alt="" />
            <div class="overlay-page"></div>
            <div class="tp-caption big-heading sft" data-x="50" data-y="200" data-speed="800" data-start="400"
                data-easing="easeInOutExpo" data-endspeed="450">
                <?php print $row['header'];?>
            </div>

            <div class="tp-caption sub-heading sft" data-x="50" data-y="270" data-speed="1000" data-start="800"
                data-easing="easeOutExpo" data-endspeed="400">
                <?php print $row['subheader'];?>
            </div>
            <?php
            if ($row['buttontext']=="")
            {}
            else{
            ?>
            <div class="tp-caption sfb" data-x="50" data-y="370" data-speed="400" data-start="800"
                data-easing="easeInOutExpo">
                <div class="btn-slider"><a class="link-class " href="<?php print $row['buttonlink'];?>"><?php print $row['buttontext'];?></a></div>
            </div>
        </li>
        <?php
            }
            }
        }
        ?>
    </ul>
</div>
<!-- revolution slider end -->