jQuery(document).on( 'click', '.wow-plugin-notice .notice-dismiss', function() {
  alert('ddd');
		jQuery.ajax({
        url: ajaxurl,
        data: {
            action: 'bubble_menu_notice_action'
        }
    })
})