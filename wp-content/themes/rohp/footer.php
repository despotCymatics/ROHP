<div class="bottomBar">
    <a href="/blog/photo-gallery/" title="Video/Photo Gallery" class="link"><i class="fa fa-camera-retro"></i></a>
    <!--a href="#" class="link"><i class="fa fa-file-video-o"></i></a-->
    <div class="tw-feed" id="twitter-feed">

    </div>
    <a href="http://www.ovalhp.ca/blog" title="Blog" target="_blank" class="link"><i class="fa fa-pencil-square-o"></i></a>
    <a href="https://instagram.com/ovalhp/" title="Instagram" target="_blank" class="link"><i class="fa fa-instagram"></i></a>
</div>

</div><!-- /gutter -->

</div><!-- /pageWrap -->

<?php wp_footer(); ?>

<script>
    // Mobile Menu
    $( window ).load(function() {
        Modernizr.load([
            //first test need for polyfill
            {
                test: window.matchMedia,
                nope: "<?php echo get_template_directory_uri(); ?>/js/media.match.min.js"
            },

            //and then load enquire
            "<?php echo get_template_directory_uri(); ?>/js/enquire.min.js",
            "<?php echo get_template_directory_uri(); ?>/js/enquire.mics.js"
        ]);
        setTimeout(function() {
            $('.loader').fadeOut(600);
        }, 300);

    });

</script>
</body>
</html>