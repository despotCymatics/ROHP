<?php
/**
 * The template for displaying all pages
 */
?>
<?php get_header(); ?>

<div class="gutter">

    <?php
    if ( has_post_thumbnail() ) :
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
        ?>
        <div class="featuredImage" style="background-image: url('<?php echo $image[0];?>')">
            <?php //the_post_thumbnail(); ?>
            <!--img src="images/featured.jpg"-->
        </div>
    <?php endif; ?>

    <div class="content">
        <div class="row no-margin no-padding">
            <div class="col-lg-12">
                <div class="pageTitle">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
        <div class="row no-margin no-padding">
            <div class="col-sm-8">
                <div class="articleBody">
                    <?php if ( have_posts() ) : while( have_posts() ) : the_post();
                        $innerMenu = get_post_meta(get_the_ID(), "meta-box-dropdown", true);
                        if($innerMenu != "No Menu") { ?>
                        <div class="pageMenu">
                            <?php 
                            $args = array(
                                'theme_location'  => '',
                                'menu'            => $innerMenu,
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => 'inner-menu',
                                'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'depth'           => 2,
                                'walker'          => ''
                            );

            wp_nav_menu( $args );

                            ?>

                        </div>
                        <?php } ?>
                        <?php the_content();
                    endwhile; endif; ?>

                </div>
            </div>
            <div class="col-sm-4">
                <div class="sidebar">
                    <?php if(get_field('qlinks') != '') { ?>

                        <div class="quick-links">
                            <h4><i class="fa fa-link"></i> Quick links</h4>
                            <ul>
                                <?php
                                $qlinks = get_field('qlinks');
                                echo do_shortcode($qlinks);
                                ?>
                            </ul>
                        </div>
                    <?php } else { ?>
                    <div class="quick-links">
                        <h4><i class="fa fa-link"></i> Quick links</h4>
                        <?php dynamic_sidebar('quick-links' );?>
                        <!--<ul>
                            <li><a href="/contact" title="Contact Us">Contact Us</a></li>
                            <li><a href="/about-us/coaches/" title="High Performance Team ">High Performance Team</a></li>
                            <li><a href="/about-us/training-philosophy/" title="Training Philosophy">Training Philosophy</a></li>
                            <li><a href="/strength-conditioning/sc-individual-training/individual-training/" title="Private Strength & Conditioning Training">Private Strength & Conditioning Training</a></li>
                        </ul>-->
                    </div>
                        <?php } ?>

                    <!--div class="textWidget">
                        <p><img src="/wp-content/uploads/2015/08/volleyball-canada.png"></p>
                        <p>Corporis ipsa fugit velit officia unde temporibus est excepturi praesentium eligendi minima, soluta harum nisi quam asperiores dolores voluptatibus alias porro dolor beatae dignissimos assumenda iste laudantium quisquam, ipsam? Reprehenderit exercitationem quas aut nostrum eius ullam cum sed illo dolore soluta facere ratione provident, alias itaque, explicabo, similique sit culpa! A corrupti exercitationem ratione voluptatem nostrum debitis quod sint vel provident.</p>
                    </div-->

                </div>
            </div>
        </div>
    </div>


<?php get_footer(); ?>


