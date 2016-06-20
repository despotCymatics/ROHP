<?php
/**
 * The template for displaying archive pages
 */
?>
<?php get_header(); ?>
<?php

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    if (is_category( )) {
          $cat = get_query_var('cat');
          $yourcat = get_category ($cat);
          $ctg = $yourcat->slug;
    }
      
    $args= array(
    'category_name' => $ctg,
    'paged' => $paged
    );
    query_posts($args);
?>

<div class="gutter">
    <div class="content">
        <div class="row no-margin no-padding">
            <div class="col-lg-12">
                <div class="pageTitle">
                    <h1>Blog - <?php single_cat_title(); ?></h1>
                </div>
            </div>
        </div>
	    <div class="row no-margin no-padding">
		    <div class="col-sm-12">
			    <div class="articleBody">
				    <div class="row no-margin no-padding" style="margin-bottom: 0">
					    <?php
					    $postCount = 1;
					    if(have_posts()): while(have_posts()): the_post(); ?>
						    <!-- Blog post -->

						    <div class="col-md-4">
							    <div class="post-item" id="post-<?php the_ID(); ?>">
								    <?php if ( has_post_thumbnail() ) {

									    $url = get_the_post_thumbnail( $post->ID, 'large');?>
									    <a class="image-box" href="<?php the_permalink(); ?>"><?php echo $url; ?></a>
								    <?php }  ?>
								    <div class="post-data">
									    <span class="post-date"><?php echo get_the_date(); ?> | </span><span>In</span><span class="post-cat">
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
									    <div class="post-title">
										    <h2>
											    <?php
											    $title = get_the_title();
											    if(strlen($title) > 42){echo substr(get_the_title(), 0 , 42)."...";}
											    else{echo $title;}
											    ?>
										    </h2>
									    </div>
                            <span class="post-intro">
                                <?php echo substr(get_the_excerpt(), 0 , 180)."..."; ?>
                            </span><br>
									    <a href="<?php the_permalink(); ?>" class="post-more">read more >></a>
								    </div>


								    <span class="post-author"><?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?></span>

							    </div>
						    </div>
						    <?php if($postCount%3 == 0) echo '</div><div class="row no-margin no-padding" style="margin-bottom: 0">'; ?>
						    <!-- Blog post end -->
						    <?php
						    $postCount++;
					    endwhile;
						    echo '</div>';
						    ?>

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
		    </div>
	    </div>



<?php get_footer(); ?>