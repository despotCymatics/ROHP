<?php
/**
 * Template Name: Blog
 */
?>
<?php get_header(); ?>
<?php
$args = array(
    'posts_per_page' => 5,
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
                        <div class="col-md-6">
                            <div class="post-item" id="post-<?php the_ID(); ?>">
                                <?php if ( has_post_thumbnail() ) {

                                    $url = get_the_post_thumbnail( $post->ID, 'large');?>
                                    <a href="<?php the_permalink(); ?>"><?php echo $url; ?></a>
                                <?php }  ?>
                                <div class="post-title">
                                    <h2>
                                        <?php
                                        $title = get_the_title();
                                        if(strlen($title) > 42){echo substr(get_the_title(), 0 , 42)."...";}
                                        else{echo $title;}
                                        ?>
                                    </h2>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="post-more">read more >></a>
                                <div class="post-divider"></div>
                                <!--
                         <span class="post-date"><?php echo get_the_date(); ?> | </span>
                        <span>Post by</span> <span class="post-author"><?php echo get_the_author(); ?></span> |
                        <span>In</span><span class="post-cat">

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
                       </span><br>-->

                            </div>
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