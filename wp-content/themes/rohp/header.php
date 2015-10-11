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

    <!-- Icon -->
    <!--
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/apple-touch-icon-152x152.png">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16" />
    <meta name="application-name" content="Kancelarija za saradnju sa civilnim društvom">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">
    <meta name="msapplication-square310x310logo" content="/mstile-310x310.png">
    -->

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
</head>

<body <?php body_class(); ?>>
<div class="loader"><span></span></div>
<div class="pageWrap">
<header></header>
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

        if ($query->have_posts()) { ?>

        <div class="slider">
            <div class="slick-slideshow">
                <?php while ($query->have_posts()) {

                    $query->the_post();
                    if ( has_post_thumbnail() ) {
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                ?>
                    <div class="slide" style="background: url('<?php echo $image[0];?>')"></div>

                <?php
                    }
                }
                ?>

            </div>
        </div>

        <?php }

        wp_reset_query();

        ?>

    <?php } ?>

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
        <p class="copyright">Copyright 2015 Richmond Olympic Oval</p>
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





