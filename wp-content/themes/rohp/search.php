<?php
/**
 * The template for displaying Search Results pages.
 *
 */
?>

<?php get_header(); ?>


<div class="gutter">
    <div class="content">
    <div class="row no-margin no-padding">
        <div class="col-lg-12">
            <div class="pageTitle">
                <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'shape' ), '<em>' . get_search_query() . '</em>' ); ?></h1>
            </div>
        </div>
    </div>
    <div class="row no-margin no-padding">
        <div class="col-sm-8">
            <div class="articleBody">

                <?php
                if ( have_posts() ) {

                    /* Start the Loop */
                    while (have_posts()) { ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php
                        the_post();
                        the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
                        the_excerpt();
                        get_template_part('content', 'search');

                    ?>
                    </article>
                    <?php
                    }
                    // Previous/next page navigation.
                    the_posts_pagination( array(
                        'screen_reader_text' => ' ',
                        'mid_size'           => 2,
                        'prev_text'          => __( '<i class="fa fa-chevron-left"></i>', 'richmondoval' ),
                        'next_text'          => __( '<i class="fa fa-chevron-right"></i>', 'richmondoval' ),
                        //'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'richmondoval' ) . ' </span>',
                    ) );

                } else {
                   echo 'No Results!';
                }
                ?>

            </div>
        </div>
        <div class="col-sm-4">
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
            </div>
        </div>
    </div>
    </div>

<?php get_footer();

