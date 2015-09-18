<?php
/**
 * The template for displaying Search Results pages.
 *
 */
?>

<?php get_header(); ?>

<div class="within inner">
    <?php //the_breadcrumb(); ?>
    <div class="clear"></div>

    <header class="page-header">
        <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    </header><!-- .page-header -->

<?php
    if ( have_posts() ) {

        /* Start the Loop */
        while (have_posts()) {
            the_post();
            get_template_part('content', 'search');
        }

        // Previous/next page navigation.
        the_posts_pagination(array(
            'prev_text' => __('Previous', 'richmondoval'),
            'next_text' => __('Next', 'richmondoval'),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('', 'richmondoval') . ' </span>',
        ));

    } else {
        get_template_part( 'no-results', 'search' );
    }
?>
</div>
<?php get_footer();

