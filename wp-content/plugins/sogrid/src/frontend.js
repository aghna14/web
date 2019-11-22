(function( $ ){

    /**
     * Ajax wrapper
     * @param {string} action 
     * @param {object} data 
     */
    function ajax( action, data ){

        data.action = action;

        return $.ajax({
            type: "POST",
            url: SOGRID_PARAMS.ajaxurl,
            data: data,
        });
    }

    /**
     * Pagination item click
     */
    $('.sogrid__pagination span').on('click', function(){

        var self_el = $(this);
        var block_el = self_el.closest('.sogrid');
        var pagination_el = self_el.parent();
        var pages_els = block_el.find('.sogrid__posts');
        var selected_page_el = pages_els.filter('[data-page="'+self_el.data('num')+'"]');

        if( self_el.hasClass('__active') ) return false;

        // change pagination number
        pagination_el.find('span').removeClass('__active');
        self_el.addClass('__active');

        // page exists
        if( selected_page_el.length ){

            pages_els.css('display', 'none');
            selected_page_el.css('display', '');
            return false;
        }

        // page doesnt exist, lets fetch by ajax        
        ajax( pagination_el.data('blockname').replace(/\/|-/gi, '_'), {
            'page': self_el.data('num'),
            'nonce': pagination_el.data('nonce'),
            'post_id': pagination_el.data('postid'),
            'block_id': pagination_el.data('blockid'),
            'block_name': pagination_el.data('blockname'),
        }).done(function(response){            
            if( ! response.success ) return false;

            pages_els.css('display', 'none');
            pages_els.filter(':last').after( '<div class="sogrid__posts" data-page="'+self_el.data('num')+'">'+response.data+'</div>' );
        });

    });

})( jQuery );