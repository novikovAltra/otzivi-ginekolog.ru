$(function(){
    
     $('.auth-fancybox').on('click', showLoginModal);
    
    // on click toogle user cabinet
    $('.js-username').on('click', function(e){
        e.preventDefault();
        $('.js-user-cabinet').slideToggle(300);
    });
    
    $('.close-cabinet').on('click', function(e){
        e.preventDefault();
        $('.js-user-cabinet').slideToggle(300);
    });
});


function showLoginModal(e){
   e.preventDefault();
   
   var tab = $(this).data('tab');
   var $targetTab = $('.tabs li[data-tab="' + tab + '"]')
   console.log(tab);
   $('.tabs li').removeClass('current');
   $targetTab.addClass('current');
   
   $.fancybox.open($('#popup_reg'));
}

// tabs switcher

var tabsConfig = {
    useCookie: false, // запоминать ли состояние табов
    useHashLink: true // включить ли возможность переключения табов с помощью ссылок вне блока с табами и переключения табов в зависимости от хеш-данных в url (если на странице выводится несколько блоков с табами, отключите эту опцию)
};


(function($) {
$(function() {
    
    $('.schedule-month.box').each(function(idx, box){
        lnk_wrapp = $('<li>');
        // if(idx == 0)
        //     lnk_wrapp.addClass('current');
            
        link = $('<a>', {'href': window.location.href}).text($(box).data('month'));
        lnk_wrapp.append(link);
        $('.tabs.navigation.shedule_nav').append(lnk_wrapp);
    });

	function createCookie(name,value,days) {
		if (days) {
			var date = new Date();
			date.setTime(date.getTime()+(days*24*60*60*1000));
			var expires = "; expires="+date.toGMTString();
		}
		else var expires = "";
		document.cookie = name+"="+value+expires+"; path=/";
	}
	function readCookie(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for(var i=0;i < ca.length;i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1,c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		}
		return null;
	}
	function eraseCookie(name) {
		createCookie(name,"",-1);
	}

        if(tabsConfig.useCookie){
            $('ul.tabs').each(function(i) {
                    var cookie = readCookie('tabCookie'+i);
                    if (cookie) $(this).find('li').eq(cookie).addClass('current').siblings().removeClass('current')
                            .parents('div.section').find('div.box').hide().eq(cookie).show();
            })
        }

	$('ul.tabs').delegate('li:not(.current)', 'click', function() {
		$(this).addClass('current').siblings().removeClass('current')
			.parents('div.section').find('div.box').eq($(this).index()).fadeIn(150).siblings('div.box').hide();
		var ulIndex = $('ul.tabs').index($(this).parents('ul.tabs'));
		if(tabsConfig.useCookie){
            eraseCookie('tabCookie'+ulIndex);
            createCookie('tabCookie'+ulIndex, $(this).index(), 365);
        }
        $(document).trigger('da_tabs_tab_change');
	})
    
    $('ul.tabs').each(function(idx, list){
        if(!$(list).find('.curent').length)
            $(list).find('li:first').trigger('click');
    });
    
	if(tabsConfig.useHashLink){
            var tabIndex = window.location.hash.replace('#tab','')-1;
            if (tabIndex != -1) $('ul.tabs li').eq(tabIndex).click();
            $('a[href^=#tab]').click(function() {
		var tabIndex = $(this).attr('href').replace('#tab','')-1;
		$('ul.tabs li').eq(tabIndex).click();
            });
        }

})
})(jQuery)