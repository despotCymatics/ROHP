<?php
require("shortcodes.php");
//show_admin_bar( true );
//add_theme_support( 'menus' );
add_theme_support( 'html5', array( 'searchform' ) );
add_theme_support( 'widgets' );

//FILTERS
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);

add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

add_filter( 'wpcf7_support_html5_fallback', '__return_true' );

function remove_width_attribute( $html ) {
    $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
    return $html;
}

/**
 * Enqueue scripts and styles for front-end.
 */

function rohp_scripts_styles() {
	global $wp_styles;
	wp_deregister_script('jquery');
	//wp_deregister_style('open-sans');
	wp_register_script('jquery', (get_template_directory_uri() . '/js/jquery-1.11.1.min.js'), false, false);

	// Adds JavaScript for handling the navigation menu hide-and-show behavior.
   wp_enqueue_script( 'rohp-prefixfree', (get_template_directory_uri() . '/js/prefixfree.min.js'), array(), false, false );
	wp_enqueue_script( 'rohp-modernizr.custom', get_template_directory_uri() . '/js/modernizr.custom.js', array(), false, false );
    wp_enqueue_script( 'rohp-jquery' );
	wp_enqueue_script( 'rohp-jquery.slimscroll', get_template_directory_uri() . '/js/jquery.slimscroll.min.js', array(), false, true );
    wp_enqueue_script( 'rohp-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), false, true );
	wp_enqueue_script( 'rohp-slick', get_template_directory_uri() . '/js/slick.js', array(), false, true );
	wp_enqueue_script( 'rohp-tw-feed', get_template_directory_uri() . '/js/tw-feed.js', array(), false, true );
	wp_enqueue_script( 'rohp-custom', get_template_directory_uri() . '/js/misc.js', array(), false, false );

	// Loads our main stylesheet.
    wp_enqueue_style( 'rohp-bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), false, "screen, projection" );
    wp_enqueue_style( 'rohp-general', get_template_directory_uri() . '/css/general.css', array(), false, "screen, projection" );
	wp_enqueue_style( 'rohp-template', get_template_directory_uri() . '/css/template.css', array(), false, "screen, projection" );
    wp_enqueue_style( 'rohp-mobile', get_template_directory_uri() . '/css/mobile.css', array(), false, "only screen and (max-width: 1280px)" );
    wp_enqueue_style( 'rohp-slick', get_template_directory_uri() . '/css/slick.css', array(), false, "screen, projection" );
    wp_enqueue_style( 'rohp-fonts', get_template_directory_uri() . '/css/fonts.css', array(), false, "screen, projection" );
	wp_enqueue_style( 'rohp-font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), false, "screen, projection" );

}
add_action( 'wp_enqueue_scripts', 'rohp_scripts_styles' );


/**
 * Adds select menu box
 *
 */
function menu_select_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
 
    ?>
        <div>
 		<?php $option_values = get_terms( 'nav_menu', array( 'hide_empty' => true ) ); ?>
				
            <!--label for="meta-box-dropdown">Select:</label-->
            <select name="meta-box-dropdown">
            	<option>No Menu</option>
                <?php 
                    $option_values = get_terms( 'nav_menu', array( 'hide_empty' => false ) );

                    foreach($option_values as $key => $value) 
                    {

                        if($value->name == get_post_meta($object->ID, "meta-box-dropdown", true))
                        {
                            ?>
                                <option selected="selected"><?php echo $value->name; ?></option>
                            <?php    
                        }
                        else
                        {
                            ?>
                                <option><?php echo $value->name; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
            <br>
        </div>
    <?php  
}


function add_menu_select_box()
{
    add_meta_box("menu-select", "Menu select", "menu_select_markup", "page", "side", "low", null);
}
 
add_action("add_meta_boxes", "add_menu_select_box");


function save_custom_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;
 
    if(!current_user_can("edit_post", $post_id))
        return $post_id;
 
    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;
 
    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_dropdown_value = "";
 
    if(isset($_POST["meta-box-dropdown"]))
    {
        $meta_box_dropdown_value = $_POST["meta-box-dropdown"];
        
    }   

    update_post_meta($post_id, "meta-box-dropdown", $meta_box_dropdown_value);
}
 
add_action("save_post", "save_custom_meta_box", 10, 3);


/**
 * Register sidebars and widgetized areas.
 *
 */


function widgets_init() {

    register_sidebar(array(
        'name' => __( 'Quick Links Sidebar', 'rohp' ),
        'id' => 'quick-links',
        'description' => __('Appears as the page right side', 'rohp'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}
add_action( 'widgets_init', 'widgets_init' );


/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 */
function rohp_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'High Performance' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'rohp_wp_title', 10, 2 );



/** Breadcrumbs
/*********************************************************************************/
/*
function the_breadcrumb () {

    // Settings
    $separator  = '&gt;';
    $id         = 'breadcrumbs';
    $class      = 'breadcrumbs';
    $home_title = 'Homepage';

    // Get the query & post information
    global $post,$wp_query;
    $category = get_the_category();

    // Build the breadcrums
    echo '<ul id="' . $id . '" class="' . $class . '">';

    // Do not display on the homepage
    if ( !is_front_page() ) {

        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';

        if ( is_single() ) {

            // Single post (Only display the first category)
            echo '<li class="item-cat item-cat-' . $category[0]->term_id . ' item-cat-' . $category[0]->category_nicename . '"><a class="bread-cat bread-cat-' . $category[0]->term_id . ' bread-cat-' . $category[0]->category_nicename . '" href="' . get_category_link($category[0]->term_id ) . '" title="' . $category[0]->cat_name . '">' . $category[0]->cat_name . '</a></li>';
            echo '<li class="separator separator-' . $category[0]->term_id . '"> ' . $separator . ' </li>';
            echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

        } else if ( is_category() ) {

            // Category page
            echo '<li class="item-current item-cat-' . $category[0]->term_id . ' item-cat-' . $category[0]->category_nicename . '"><strong class="bread-current bread-cat-' . $category[0]->term_id . ' bread-cat-' . $category[0]->category_nicename . '">' . $category[0]->cat_name . '</strong></li>';

        } else if ( is_page() ) {

            // Standard page
            if( $post->post_parent ){

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );
                //var_dump($anc);

                // Get parents in the right order
                $anc = array_reverse($anc);
                $parents = "";
                // Parent page loop
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }

                // Display parent pages
                echo $parents;

                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

            } else {

                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';

            }

        } else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id = get_query_var('tag_id');
            $taxonomy = 'post_tag';
            $args ='include=' . $term_id;
            $terms = get_terms( $taxonomy, $args );

            // Display the tag name
            echo '<li class="item-current item-tag-' . $terms[0]->term_id . ' item-tag-' . $terms[0]->slug . '"><strong class="bread-current bread-tag-' . $terms[0]->term_id . ' bread-tag-' . $terms[0]->slug . '">' . $terms[0]->name . '</strong></li>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';

        } else if ( is_month() ) {

            // Month Archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';

        } else if ( is_year() ) {

            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';

        } else if ( is_author() ) {

            // Auhor archive

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';

        } else if ( get_query_var('paged') ) {

            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';

        } else if ( is_search() ) {

            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';

        } elseif ( is_404() ) {

            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }

    }

    echo '</ul>';

}
*/




/*

class description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
           $attributes .= ! empty( $item->description )        ? ' data-icon-fa="'   . esc_attr( $item->description        ) .'"' : '';

           $prepend = '<strong>';
           $append = '</strong>';
           //$description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;

            $item_output .= '</a>';
          $item_output .= $description.$args->link_after;
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}

class sub_class_menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dl-submenu\">\n";
    }
}

*/


// Facebook Open Graph
/*add_action('wp_head', 'add_fb_open_graph_tags');
function add_fb_open_graph_tags() {
	if (is_single()) {
		global $post;
		if(get_the_post_thumbnail($post->ID, 'thumbnail')) {
			$thumbnail_id = get_post_thumbnail_id($post->ID);
			$thumbnail_object = get_post($thumbnail_id);
			$image = $thumbnail_object->guid;
		} else {	
			$image = ''; // Change this to the URL of the logo you want beside your links shown on Facebook
		}
		//$description = get_bloginfo('description');
		$description = my_excerpt( $post->post_content, $post->post_excerpt );
		$description = strip_tags($description);
		$description = str_replace("\"", "'", $description);
?>
<meta property="og:title" content="<?php the_title(); ?>" />
<meta property="og:type" content="article" />
<meta property="og:image" content="<?php echo $image; ?>" />
<meta property="og:url" content="<?php the_permalink(); ?>" />
<meta property="og:description" content="<?php echo $description ?>" />
<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />

<?php 	}
}*/

add_theme_support( 'post-thumbnails' );

// hide admin bar for non-user
if (!current_user_can('edit_posts')) {
    show_admin_bar(false);
}
