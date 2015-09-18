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

                            <?php $map = get_field('google_map'); ?>
                            <span class="mapAspect" role="presentation" aria-hidden="true"></span>
                            <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                            <div id="gmap_canvas" style="height:900px;width:100%;"></div>

                            <script type="text/javascript">
                                function init_map() {
                                    var myOptions = {
                                        zoom: 14,
                                        center: new google.maps.LatLng(<?=$map['lat']?>, <?=$map['lng']?>),
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    };
                                    map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
                                    marker = new google.maps.Marker({
                                        map: map,
                                        position: new google.maps.LatLng(<?=$map['lat']?>, <?=$map['lng']?>)
                                    });
                                    infowindow = new google.maps.InfoWindow({content: "<?=$map['address']?>"});
                                    google.maps.event.addListener(marker, "click", function () {
                                        infowindow.open(map, marker);
                                    });
                                }
                                google.maps.event.addDomListener(window, 'load', init_map);
                            </script>

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
</div><!-- /gutter -->

<?php get_footer(); ?>