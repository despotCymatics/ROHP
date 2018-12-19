<?php
/*
* Template Name: Contact
*/

get_header(); ?>


<div class="gutter">
    <?php
    if ( has_post_thumbnail() ) : ?>
        <div class="featuredImage">
            <?php the_post_thumbnail(); ?>
        </div>
    <?php endif; ?>

    <div class="content no-padding-right">
        <div class="row no-margin no-padding">
            <div class="contactBox">
                <div class="col-md-6">
                    <h1><?php the_title(); ?></h1>
                    <div class="contactData">
                        <div class="contactMeta">
                            <p class="cmLocation"><?php the_field('address'); ?></p>

                            <p class="cmPhone"><?php the_field('phone_number'); ?></p>

                            <p class="cmMail"><a href="#"><?php the_field('email'); ?></a></p>

                            <p class="cmWorkingHours">
                                <?php the_field('working_days'); ?>
                            </p>
                        </div>
                        <!-- /contactMeta -->
                        <?php
                        $contact_form = get_field('contact_form');
                        if ($contact_form !== FALSE) {
                            $short_code_contact_form = '[contact-form-7 id="' . $contact_form->ID . '" title="' . $contact_form->post_title . '"]';
                            echo do_shortcode($short_code_contact_form);
                        }
                        ?>
                    </div>
                    <!-- /contactData -->
                </div>
                <div class="col-md-6 no-padding-right">
                    <div class="contactMap">
                        <div class="mapHolder">

                            <?=get_field('google_map');?>


                        </div><!-- /mapHolder -->
                    </div><!-- /contactMap -->
                </div>
                <div class="col-md-12">
                    <?php if (have_posts()) : while (have_posts()) : the_post();
                        the_content();
                    endwhile; endif; ?>
                </div>
            </div><!-- /contactBox -->
        </div>
    </div>

<?php get_footer(); ?>