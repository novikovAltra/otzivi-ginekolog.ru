$(function () {
    /*
    show_banners([
        {
            'selector': '.avb_900 .hide_on_992',
            'wrap_class': 'banner_altravita_900',
            'img': 'assets/banners_altravita_new/img/phrases_003_hb.jpg',
            'link': 'https://altravita-ivf.ru/spetsialisty-kliniki/24-vrachi-kliniki-altravita/ginekologi.html',
            'goal': 'banner-altra',
            'alt': 'Баннер Альтравита'
        },
        {
            'selector': '.avb_900 .show_on_992',
            'wrap_class': 'banner_altravita_240',
            'img': 'assets/banners_altravita_new/img/phrases_003_vb.jpg',
            'link': 'https://altravita-ivf.ru/spetsialisty-kliniki/24-vrachi-kliniki-altravita/ginekologi.html',
            'goal': 'banner-altra',
            'alt': 'Баннер Альтравита'
        },
        {
            'selector': '.avb_240',
            'wrap_class': 'banner_altravita_240',
            'img': 'assets/banners_altravita_new/img/phrases_003_vb.jpg',
            'link': 'https://altravita-ivf.ru/spetsialisty-kliniki/24-vrachi-kliniki-altravita/ginekologi.html',
            'goal': 'banner-altra',
            'alt': 'Баннер Альтравита'
        }
    ]);
    */
    
    lazyload();
    //Обработка якорей
    $('a').on('click', function(e){
        let elId = $(this).attr('href').split('#')[$(this).attr('href').split('#').length - 1];
        if($(document).find('[name="'+elId+'"]').length > 0){
            let posTop = $('.header').outerHeight();
            let elScroll = $(document).find('[name="'+elId+'"]');
            e.preventDefault();
            $("body,html").animate({
                scrollTop:elScroll.offset().top - posTop - 20
            }, 800 , function(){
                
                posTop = $('.header').outerHeight();
                $('body,html').animate({
                    scrollTop:elScroll.offset().top - posTop -20
                }, 500)
            });
        }
    })
    
    $('.lazyYT').lazyYT();
    
    $(window).scroll(function(){
    if ($(this).scrollTop() > 100) {
    $('.scrollup').fadeIn();
    } else {
    $('.scrollup').fadeOut();
    }
    });
     
    $('.scrollup').click(function(){
    $("html, body").animate({ scrollTop: 0 }, 600);
    return false;
    });
    
    $('.ticket-comment-text.review-body cut').each(function(idx, el){
        let item = $(el);
        let toggl_down = $('<div>', {'class': "toggler_down"}).append($('<a>', {'href': "#"}).text('Читать весь отзыв'));
            let toggl_up = $('<div>', {'class': "toggler_up"}).append($('<a>', {'href': "#"}).text('Свернуть'));
            item.parents('.review-body').addClass('toggled').append([toggl_down, toggl_up]);
    });
    $(document).on('click', '.toggler_down,.toggler_up', function(e){
        e.preventDefault();
        $(this).parents('.toggled').toggleClass('active_toggle');
    });
    $(".scroll_to").click(function(e) {
        e.preventDefault();
        var to = $($(this).attr('href')).offset().top;
        $('html, body').animate({
            scrollTop: to
        }, 500);
    });
//owlCarousel clients
    $(".carousel-slider").owlCarousel({
        items: 1,
        loop:true,
        lazyLoad:true,
        nav: false,
        navText:  [  ],
        autoplay: true,
        autoplayTimeout: 5000
    });

    //menu-top
    $(".menu-top span").click(function(e) {
        $(".menu-top>ul").toggle();
    });

    //fancybox
    $(".fancybox").fancybox({
        helpers : {
            overlay : {
                locked : false
            }
        }
    });
});
//header scroll
$(window).scroll(function() {
    var header_height = $('.header').outerHeight();
    var header_height_fix = 0;
  $('.header').toggleClass('scroll', $(this).scrollTop() > header_height);
});
function show_banners(banners, counter){
    $.each(banners, function(idx, banner){
        let $parents = $(banner.selector)
        if($parents.length > 0){
            let $banner_wrapp = $('<div>', {'class': banner.wrap_class});
            let $link = $('<a>', {'href': banner.link})
            if(counter){
                $link.on('click', function(){
                    counter.reachGoal(banner.goal);
                    return true;
                });
            }
            let $img = $('<img>', {
                'src': banner.img,
                'alt': $parents.data('alt') ? $parents.data('alt') : banner.alt
            });
            
            $link.append($img);
            $banner_wrapp.append($link);
            $parents.each(function(idx, el){
                let $parent = $(el);
                $parent.append($banner_wrapp.clone(true));
            });
        }
    })
    // var bd = $('<div>', {
    //     'class': 'hide_on_992'
    // });
    // var bd_in = $('<div>', {
    //     'class': 'banner_altravita_900'
    // });
    // var bd_link = $('<a>', {
    //     'href': '[[++banner_altravita_900_two_link]]'
    // }).on('click', function(){
    //     yaCounter34295870.reachGoal('banner-altra');
    //     return true;
    // });
    // var bd_img = $('<img>', {
    //     'class': 'lazyload',
    //     'src': 'assets/banners_altravita_new/img/phrases_003_hb.jpg',
    //     'alt': 'Баннер Альтравита'
    // });
    // bd_link.append(bd_img);
    // bd_in.append(bd_link);
    // bd.append(bd_in);
    
    // var bm = $('<div>', {
    //     'class': 'show_on_992'
    // });
    // var bm_in = $('<div>', {
    //     'class': 'banner_altravita_240'
    // });
    // var bm_link = $('<a>', {
    //     'href': '[[++banner_altravita_240_link]]'
    // }).on('click', function(){
    //     yaCounter34295870.reachGoal('banner-altra');
    //     return true;
    // });
    // var bm_img = $('<img>', {
    //     'class': 'lazyload',
    //     'src': 'assets/banners_altravita_new/img/phrases_003_vb.jpg',
    //     'alt': 'Баннер Альтравита'
    // });
    // bm_link.append(bm_img);
    // bm_in.append(bm_link);
    // bm.append(bm_in);
    
    // $('.avb').append(bd, bm);
}