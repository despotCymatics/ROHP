<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head lang="en">

    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <meta name="Author" content="Richmond Oval High Performance">
    <meta name="Keywords" content="some, key, words">
    <meta name="description" content="Description">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="icon" type="image/png" href="<?=get_template_directory_uri()?>/images/favicon.png" sizes="16x16" />

    <?php wp_head();?>

    <!-- IE conditional CSS -->
    <!--[if IE 8]>
    <link rel="stylesheet" type="text/css" href="../css/ie8.css" media="screen" />
    <![endif]-->

    <!--[if IE 9]>
    <link rel="stylesheet" type="text/css" href="../css/ie9.css" media="screen" />
    <![endif]-->

    <!--[if lt IE 9]>
    <script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.min.js"></script>
    <script src="http://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <script type="text/javascript" src="js/selectivizr-min.js"></script>
    <noscript><link rel="stylesheet" href="[fallback css]" /></noscript>
    <![endif]-->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-68610770-2', 'auto');
        ga('send', 'pageview');

    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NLCDPL');</script>
    <!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NLCDPL"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="loader"><span></span></div>
<div class="pageWrap">
    <header>
        <div class="topBar">
            <div class="combinedMenu">
                <a class="rox" title="Richmond Oval Experience" href="http://therox.richmondoval.ca/"><span>Olympic Museum</span></a>
                <a class="ro" title="Richmond Oval" href="http://richmondoval.ca/"><span>Richmond Oval</span></a>
                <a class="yyoga" title="Yyoga" href="http://yyoga.ca/"><span>YYoga.ca</span></a>
                <!--<a class="onsite" title="On site services" href="#">On Site Services</a>-->

            </div>
        </div>
    </header>

    <div class="menuToggler"></div>

    <?php if(is_front_page()) {

        $args = array(
        'post_type' => 'Home Slides',
        'post_status' => 'publish',
        'posts_per_page' => 10,
        'caller_get_posts' => 1,
        );

        $query = null;
        $query = new WP_Query($args);

        if ($query->have_posts()) {


            ?>

        <div class="slider">
            <div class="slick-slideshow">
                <?php while ($query->have_posts()) {

                    $query->the_post();
                    if ( has_post_thumbnail() ) {
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');

                        if(get_field('video_source') != '') { ?>
                            <div class="video-slide" style="background: url('<?php echo $image[0];?>') no-repeat center / cover">
                                <video width="100%" height="100%" autoplay preload="metadata" loop>
                                    <source src="<?=get_field('video_source');?>" type="video/mp4">
                                </video>
                                <script type="text/javascript">
                                    $('.slick-slideshow').on('beforeChange', function(event, slick, currentSlide){
                                        console.log(currentSlide);
                                        if (currentSlide == 0) {
                                            $('.slick-slideshow').slick('slickPause');
                                            //myVideo.play();
                                        }
                                    });
                                </script>
                            </div>


                            <?php
                        }else { ?>
                            <!--<div class="slide" style="background: url('<?php /*echo $image[0];*/?>')"></div>
                        <script>
                            $('.slick-slideshow').slick({
                             autoplay: true,
                             arrows: false,
                             pauseOnHover: false,
                             fade: true,
                             speed: 4000,
                             autoplaySpeed: 6000

                             });
                        </script>-->
                        <?php
                        }

                    }
                }
                ?>

            </div>
        </div>

        <?php }

        wp_reset_query();

    } ?>

    <div class="mainMenu">
        <div class="logo"><a href="<?php echo get_home_url(); ?>"><img src="<?=get_template_directory_uri()?>/images/rohp-logo.png"></a></div>
        <div class="scrollable">
            <nav>

                <?php

                $args = array(
                    'theme_location'  => '',
                    'menu'            => 'Main Menu',
                    'container'       => '',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'main-menu',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 4,
                    'walker'          => ''
                );

                wp_nav_menu( $args );
                ?>

            </nav>
        </div>

        <div class="bottomMenu">
            <?php echo get_search_form(); ?>
            <!--div class="searchBox">
                <i class="glyphicon glyphicon-search"></i>
                <input type="search" class="form-control" placeholder="Search" />
            </div-->
            <!--
            <div class="socialBox">
                <a href="#" class="fb"><i class="fa fa-facebook"></i></a>
                <a href="#" class="tw"><i class="fa fa-twitter"></i></a>
                <a href="#" class="yt"><i class="fa fa-youtube"></i></a>
                <a href="#" class="in"><i class="fa fa-instagram"></i></a>
                <br>
            </div>
            -->
            <p class="copyright">Copyright <?=date('Y');?> Richmond Olympic Oval</p>
        </div>
    </div>

<?php
if(is_front_page()) {
    $args = array(
        'post_type' => 'News Flash',
        'post_status' => 'publish',
        'posts_per_page' => 5,
        'caller_get_posts' => 1,
    );

    $query = null;
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        ?>
        <div class="news-flash-container">
            <div id="news-flash">
                <?php
                $i = 1;
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="news-flash-<?= $i ?>">
                        <h3><a href="<?php the_permalink();?>"
                               title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>

                        <p class="news-flash-text"><?php echo preg_replace("/<p>(.*?)<\/p>/", "$1", get_the_excerpt()); ?></p>
                        <a class="more" href="<?php the_permalink();?>" title="<?php the_title(); ?>">Read more</a>
                    </div>
                    <?php
                    $i++;
                endwhile;
                ?>

            </div>
            <div class="news-nav"></div>
        </div>

    <?php
    }
    wp_reset_query();  // Restore global post data stomped by the_post().
}
?>





