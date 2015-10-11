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

        $('#news-flash').slick({
            autoplay: true,
            arrows: true,
            centerMode: true,
            pauseOnHover: false,
            fade: true,
            speed: 300,
            autoplaySpeed: 6000,
            prevArrow: '<a type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></a>',
            nextArrow: '<a type="button" class="slick-next"><i class="fa fa-chevron-right"></i></a>',
            appendArrows: '.news-nav'

        });

        $('.mainMenu ul ul').parent().prepend('<span class="subToggler"></span>');
        $('.menuToggler').click(function () {
            $(this).toggleClass('on');
            $('.mainMenu').toggleClass('active');
        });

        $('.menu-item-has-children > a').click(function (e) {

            var element = $(this).parent('li');

            e.preventDefault();
            //$(this).removeAttr('href');

            if (element.hasClass('open')) {
                element.removeClass('open');
                element.find('li').removeClass('open');
                element.find('ul').slideUp(200);

            }
            else {
                //$(this).prev('.subToggler').addClass('on');
                element.addClass('open');
                element.children('ul').slideDown(200);
                element.siblings('li').children('ul').slideUp(200);
                element.siblings('li').removeClass('open');
                element.siblings('li').find('li').removeClass('open');
                element.siblings('li').find('ul').slideUp(200);
            }

        });

        $('.current-menu-ancestor').addClass('open');

        $('.coaches').parents('ul.sub-menu').hide();
        $('.coaches').parents('.current-menu-ancestor').removeClass('open');


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
            height: 'auto',
             /*width: '20%',*/
            position: 'left',
            color: '#ddd'
        });

        $('table').wrap('<div class="table-content"></div>');


    });


    $(window).resize(function () {
        // Refresh 'Level up' elements on resize
        /*$('.levelUpItem').removeAttr('style');
        setTimeout(function () {
            setHeight();
        }, 500);*/
    });
}(jQuery));