
<div class="bottomBar">
    <a href="/blog/photo-gallery/" title="Video/Photo Gallery" class="link"><i class="fa fa-camera-retro"></i></a>
    <!--a href="#" class="link"><i class="fa fa-file-video-o"></i></a-->
    <div class="tw-feed" id="twitter-feed">
        <!--p class="tw-user">@RafaelH117 - <span>8m</span></p>
        <p class="tw-text">Going to Richmond Oval? Here's a reading guide for visitors to #SRichmonOval, by <a href="#">@kerrawa http://bit.ly/1vMfPKM</a></p-->
    </div>
    <a href="http://blog.richmondoval.ca/" title="Blog" target="_blank" class="link"><i class="fa fa-pencil-square-o"></i></a>
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