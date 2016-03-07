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
                <div class="post-title">
                    <h1><?php the_title(); ?></h1>
                    <div class="post-divider"></div>
                </div>
                <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
                <span class="post-date"><?php echo get_the_date(); ?> | </span>
                <span>Post by</span> <span class="post-author"><?php echo get_the_author();//echo the_field('article_author_name'); ?></span> |
                <span>In</span>
                <span class="post-cat">
                <?php
                $categories = get_the_category();
                $separator = ', ';
                $output = '';
                if ( ! empty( $categories ) ) {
                    foreach( $categories as $category ) {
                        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                    }
                    echo trim( $output, $separator );
                }
                ?>
                </span>
            </div>
        </div>
        <div class="row no-margin single-content">
            <div class="col-sm-8">
                <div class="articleBody">

                    <?php the_content(); endwhile; endif; ?>
                    <!--  Next/Prev Post -->
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    ?>
                    <div class="next-prev">
                        <span class="prev-post pull-left">
                            <?php if (!empty( $prev_post )): ?>
                                <a href="<?php echo get_permalink( $prev_post->ID ); ?>"><span><i class="fa fa-chevron-left"></i> Previous</span></a><br>
                                <span class="title">"<?php echo $prev_post->post_title; ?>"</span>

                            <?php endif; ?>
                        </span>
                        <span class="next-post pull-right">
                            <?php if (!empty( $next_post )): ?>
                                <a href="<?php echo get_permalink( $next_post->ID ); ?>"><span>Next <i class="fa fa-chevron-right"></i></span></a><br>
                                <span class="title">"<?php echo $next_post->post_title; ?>"</span>
                            <?php endif; ?>
                        </span>
                    </div>
                </div><!--  Next/Prev Post End-->

            </div>
            <div class="col-sm-4">
                <div class="sidebar">
                    <div class="quick-links">

                        <?php
                        $args = array(
                            'show_option_all'    => '',
                            'orderby'            => 'name',
                            'order'              => 'ASC',
                            'style'              => 'list',
                            'show_count'         => 0,
                            'hide_empty'         => 1,
                            'use_desc_for_title' => 1,
                            'child_of'           => 0,
                            'feed'               => '',
                            'feed_type'          => '',
                            'feed_image'         => '',
                            'exclude'            => '',
                            'exclude_tree'       => '',
                            'include'            => '',
                            'hierarchical'       => 1,
                            'title_li'           => __( '<h4><i class="fa fa-list-ul"></i> Categories</h4>' ),
                            'show_option_none'   => __( '' ),
                            'number'             => null,
                            'echo'               => 1,
                            'depth'              => 0,
                            'current_category'   => 0,
                            'pad_counts'         => 0,
                            'taxonomy'           => 'category',
                            'walker'             => null
                        );
                        wp_list_categories( $args );
                        ?>

                    </div>

                </div>
                <div class="sidebar">
                    <div class="quick-links">
                        <h4><i class="fa fa-link"></i> Quick links</h4>
                        <ul>
                            <li><a href="#" title="Become a Member">Become a Member</a></li>
                            <li><a href="#" title="Drop-in Schedules">Drop-in Schedules</a></li>
                            <li><a href="#" title="Membership &amp; Admission Rates">Membership &amp; Admission Rates</a></li>
                            <li><a href="#" title="Become a Member">About Us</a></li>
                            <li><a href="#" title="Become a Member">Explore</a></li>

                        </ul>
                    </div>
                    <!--div class="textWidget">
                        <p><img src="/wp-content/uploads/2015/08/volleyball-canada.png"></p>
                        <p>Corporis ipsa fugit velit officia unde temporibus est excepturi praesentium eligendi minima, soluta harum nisi quam asperiores dolores voluptatibus alias porro dolor beatae dignissimos assumenda iste laudantium quisquam, ipsam? Reprehenderit exercitationem quas aut nostrum eius ullam cum sed illo dolore soluta facere ratione provident, alias itaque, explicabo, similique sit culpa! A corrupti exercitationem ratione voluptatem nostrum debitis quod sint vel provident.</p>
                    </div-->

                </div>
            </div>
        </div>
    </div>


    <?php get_footer(); ?>


