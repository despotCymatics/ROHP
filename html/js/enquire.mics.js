

	// Enquire

    enquire.register("screen and (min-width: 0px) and (max-width: 1024px)", {

        match: function () {

            // Set
            $('.tw-feed').hide().addClass('desktop');
            var twfeed = $('.tw-feed').html();
            $('.bottomBar').prepend('<div class="tw-feed mobile">'+twfeed+'</div>');

        },
        unmatch: function () {

            // Unset
            $('.tw-feed.desktop').show();
            $('.mobile').remove();
        }

    })

