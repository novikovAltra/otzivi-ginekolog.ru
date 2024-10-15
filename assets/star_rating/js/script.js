$('.star a').on('click', function(e){
        e.preventDefault();
        var self = $(this);
        var href = self.attr('href').split('?');
        $.get(href[0], href[1], function(data){
            self.parents('.star_wrapper').html(data);
        });
});