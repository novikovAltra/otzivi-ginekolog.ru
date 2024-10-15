$(function(){
    $('.video_list .parent .doctors_photo').owlCarousel({
		items:2,
		navClass:['fa fa-angle-left owl-left','fa fa-angle-right owl-right'],
		margin: 20,
		nav: true,
		navText: [],
		dots: false,
		loop: true,
		responsive : {
            480 : {
                items:4
            },
            768: {
                items:6
            }
        }
	});
	
	setTimeout(function(){
	    $('.doctors_photo .item').animate({'opacity': 1}, 500);
	}, 700);
})