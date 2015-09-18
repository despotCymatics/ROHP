
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