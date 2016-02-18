<?php
/**
 * Template Name: Blog
 */
?>
<?php get_header(); ?>
<?php
    $args = array(
        'posts_per_page' => 10,
        'paged' => $paged

    );

    $wp_query = new WP_Query($args);
?>
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
                    <?php if($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post(); ?>


                    <!-- Blog post -->
                    <div class="post-item" id="post-<?php the_ID(); ?>">

                        <p>
                            <?php
                                $categories = get_the_category();
                                $separator = ' ';
                                $output = '';
                                if ( ! empty( $categories ) ) {
                                    foreach( $categories as $category ) {
                                        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                                    }
                                    echo trim( $output, $separator );
                                }
                            ?>
                        </p>
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

                        <div class="introtext">
                            <?php echo substr(get_the_excerpt(), 0 , 256)."..."; ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="more">
                            Read More
                            
                        </a>
                        <hr>
                    </div>
                    <!-- Blog post end -->
                    <?php endwhile;?>


                    <?php
                    the_posts_pagination( array(
                        'screen_reader_text' => ' ',
                        'mid_size'           => 2,
                        'prev_text'          => __( 'prev', 'richmondoval' ),
                        'next_text'          => __( 'next', 'richmondoval' ),
                        //'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'richmondoval' ) . ' </span>',
                    ) );
                    ?>
                    <?php endif; ?><?php wp_reset_postdata();?>

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
                        <ul>
                            <li><a href="/contact" title="Contact Us">Contact Us</a></li>
                            <li><a href="/about-us/team" title="High Performance Team ">High Performance Team</a></li>
                            <li><a href="/about-us/training-philosophy/" title="Training Philosophy">Training Philosophy</a></li>
                            <li><a href="/strength-conditioning/sc-individual-training/individual-training/" title="Private Strength & Conditioning Training">Private Strength & Conditioning Training</a></li>
                        </ul>
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