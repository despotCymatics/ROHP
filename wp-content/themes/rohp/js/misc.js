(function($) {
    $(document).ready(function () {

        // User Agent on HTML tag
        var doc = document.documentElement;
        doc.setAttribute('data-useragent', navigator.userAgent);

        // Level up heights of divs in row
        var currentTallest = 0,
            currentRowStart = 0,
            rowDivs = new Array(),
            $el,
            topPosition = 0;

       /* setHeight = function () {
            $('.levelUp .levelUpItem').each(function () {

                $el = $(this);
                topPostion = $el.position().top;

                if (currentRowStart != topPostion) {

                    // we just came to a new row.  Set all the heights on the completed row
                    for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                        rowDivs[currentDiv].height(currentTallest);
                    }

                    // set the variables for the new row
                    rowDivs.length = 0; // empty the array
                    currentRowStart = topPostion;
                    currentTallest = $el.height();
                    rowDivs.push($el);

                } else {

                    // another div on the current row.  Add it to the list and check if it's taller
                    rowDivs.push($el);
                    currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);

                }

                // do the last row
                for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                    rowDivs[currentDiv].height(currentTallest);
                }

            });
        }
        setHeight();*/

        // /Level up heights of divs in row

        // FontSize Tool
        $('.increase').click(function () {
            $('html').removeClass('fontSmall');
            $('.decrease').removeClass('on');
            if ($('html').hasClass('fontLarge')) {
                $(this).removeClass('on');
                $('html').removeClass('fontLarge');
            }
            else {
                $(this).addClass('on');
                $('html').addClass('fontLarge');
            }
            $('.levelUpItem').removeAttr('style');
            setTimeout(function () {
                setHeight();
            }, 800);
        });
        $('.decrease').click(function () {
            $('html').removeClass('fontLarge');
            $('.increase').removeClass('on');
            if ($('html').hasClass('fontSmall')) {
                $(this).removeClass('on');
                $('html').removeClass('fontSmall');
            }
            else {
                $(this).addClass('on');
                $('html').addClass('fontSmall');
            }
            $('.levelUpItem').removeAttr('style');
            setTimeout(function () {
                setHeight();
            }, 800);
        });

        $('.slick-slideshow').slick({
            autoplay: true,
            arrows: false,
            pauseOnHover: false,
            fade: true,
            speed: 4000,
            autoplaySpeed: 6000

        });

        $('.mainMenu ul ul').parent().prepend('<span class="subToggler"></span>');
        $('.menuToggler').click(function () {
            $(this).toggleClass('on');
            $('.mainMenu').toggleClass('active');
        });

        $('.subToggler').click(function () {
            $(this).toggleClass('on').next().next().slideToggle(250);
        });

        $('.questionNtoggler').click(function () {
            if ($(this).hasClass('on')) {
                $(this).removeClass('on').next().slideUp(250);
            }
            else {
                $('.questionNtoggler').removeClass('on').next().slideUp(250);
                $(this).addClass('on').next().slideDown(250);
            }
        });

        $('.scrollable').slimScroll({
            height: '500px',
            /*width: '20%',*/
            position: 'left',
            color: '#ddd'
        });


    });


    $(window).resize(function () {
        // Refresh 'Level up' elements on resize
        /*$('.levelUpItem').removeAttr('style');
        setTimeout(function () {
            setHeight();
        }, 500);*/
    });
}(jQuery));