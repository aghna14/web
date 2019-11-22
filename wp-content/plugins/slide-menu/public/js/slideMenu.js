jQuery(document).ready(function($) {
	$("#wsm-button").click(function(){
		$( this ).toggleClass( "wsm-active" );
		$( this ).parent().toggleClass('wsm-spmenu-open');
		
	});
	
});