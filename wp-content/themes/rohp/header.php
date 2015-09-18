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



</head>
<body <?php body_class(); ?>>
<div class="loader"><span></span></div>
<div class="pageWrap">
<header></header>
<div class="menuToggler"></div>
    <?php if(is_front_page()) { ?>
        <div class="slider">
            <div class="slick-slideshow">
                <div class="slide" style="background: url('<?=get_template_directory_uri()?>/images/slide01.jpg')"></div>
                <div class="slide" style="background: url('<?=get_template_directory_uri()?>/images/slide02.jpg')"></div>
                <div class="slide" style="background: url('<?=get_template_directory_uri()?>/images/slide03.jpg')"></div>
            </div>
        </div>
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
            <!--ul>
                <li>
                    <a href="#">High Performance Sports</a>
                    <ul>
                        <li>
                            <a href="">Volleyball</a>
                            <ul>
                                <li><a href="">Programs</a></li>
                                <li><a href="">Clinics</a></li>
                                <li><a href="">Camps</a></li>
                                <li><a href="">Private Lessons</a></li>
                            </ul>
                        </li>
                        <li><a href="">Baseball</a></li>
                        <li><a href="">TT</a></li>
                        <li><a href="">Hockey</a></li>
                        <li><a href="">Soccer</a></li>
                        <li><a href="">Rowing</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Strength and conditioning</a>
                    <ul>
                        <li>
                            <a href="">Volleyball</a>
                            <ul>
                                <li><a href="">Programs</a></li>
                                <li><a href="">Clinics</a></li>
                                <li><a href="">Camps</a></li>
                                <li><a href="">Private Lessons</a></li>
                            </ul>
                        </li>
                        <li><a href="">Baseball</a></li>
                        <li><a href="">TT</a></li>
                        <li><a href="">Hockey</a></li>
                        <li><a href="">Soccer</a></li>
                        <li><a href="">Rowing</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Performance Services</a>
                    <ul>
                        <li>
                            <a href="">Volleyball</a>
                            <ul>
                                <li><a href="">Programs</a></li>
                                <li><a href="">Clinics</a></li>
                                <li><a href="">Camps</a></li>
                                <li><a href="">Private Lessons</a></li>
                            </ul>
                        </li>
                        <li><a href="">Baseball</a></li>
                        <li><a href="">TT</a></li>
                        <li><a href="">Hockey</a></li>
                        <li><a href="">Soccer</a></li>
                        <li><a href="">Rowing</a></li>
                    </ul>
                </li>
                <li><a href="#">Sport Medical</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul-->
        </nav>
    </div>

    <div class="bottomMenu">
        <div class="searchBox">
            <i class="glyphicon glyphicon-search"></i>
            <input type="search" class="form-control" placeholder="Search" />
        </div>
        <div class="socialBox">
            <a href="#" class="fb"><i class="fa fa-facebook"></i></a>
            <a href="#" class="tw"><i class="fa fa-twitter"></i></a>
            <a href="#" class="yt"><i class="fa fa-youtube"></i></a>
            <a href="#" class="in"><i class="fa fa-instagram"></i></a>
            <br>

        </div>
        <p class="copyright">Copyright 2015 Richmond Olympic Oval</p>
    </div>

</div>





