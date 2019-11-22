jQuery( function ( $ ) {
	'use strict';

	/**
	 * ---------------------------------------
	 * ------------- Events ------------------
	 * ---------------------------------------
	 */

	/**
	 * No or Single predefined demo import button click.
	 */
	$( '.js-ocdi-import-data' ).on( 'click', function () {

		// Reset response div content.
		$( '.js-ocdi-ajax-response' ).empty();

		// Prepare data for the AJAX call
		var data = new FormData();
		data.append( 'action', 'ocdi_import_demo_data' );
		data.append( 'security', ocdi.ajax_nonce );
		data.append( 'selected', $( '#ocdi__demo-import-files' ).val() );
		if ( $('#ocdi__content-file-upload').length ) {
			data.append( 'content_file', $('#ocdi__content-file-upload')[0].files[0] );
		}
		if ( $('#ocdi__widget-file-upload').length ) {
			data.append( 'widget_file', $('#ocdi__widget-file-upload')[0].files[0] );
		}
		if ( $('#ocdi__customizer-file-upload').length ) {
			data.append( 'customizer_file', $('#ocdi__customizer-file-upload')[0].files[0] );
		}
		if ( $('#ocdi__redux-file-upload').length ) {
			data.append( 'redux_file', $('#ocdi__redux-file-upload')[0].files[0] );
			data.append( 'redux_option_name', $('#ocdi__redux-option-name').val() );
		}

		// AJAX call to import everything (content, widgets, before/after setup)
		ajaxCall( data );

	});


	/**
	 * Grid Layout import button click.
	 */
	$( '.js-ocdi-gl-import-data' ).on( 'click', function () {
		var selectedImportID = $( this ).val();
		var $itemContainer   = $( this ).closest( '.js-ocdi-gl-item' );

		// If the import confirmation is enabled, then do that, else import straight away.
		if ( ocdi.import_popup ) {
			displayConfirmationPopup( selectedImportID, $itemContainer );
		}
		else {
			gridLayoutImport( selectedImportID, $itemContainer );
		}
	});


	/**
	 * Grid Layout categories navigation.
	 */
	(function () {
		// Cache selector to all items
		var $items = $( '.js-ocdi-gl-item-container' ).find( '.js-ocdi-gl-item' ),
			fadeoutClass = 'ocdi-is-fadeout',
			fadeinClass = 'ocdi-is-fadein',
			animationDuration = 200;

		// Hide all items.
		var fadeOut = function () {
			var dfd = jQuery.Deferred();

			$items
				.addClass( fadeoutClass );

			setTimeout( function() {
				$items
					.removeClass( fadeoutClass )
					.hide();

				dfd.resolve();
			}, animationDuration );

			return dfd.promise();
		};

		var fadeIn = function ( category, dfd ) {
			var filter = category ? '[data-categories*="' + category + '"]' : 'div';

			if ( 'all' === category ) {
				filter = 'div';
			}

			$items
				.filter( filter )
				.show()
				.addClass( 'ocdi-is-fadein' );

			setTimeout( function() {
				$items
					.removeClass( fadeinClass );

				dfd.resolve();
			}, animationDuration );
		};

		var animate = function ( category ) {
			var dfd = jQuery.Deferred();

			var promise = fadeOut();

			promise.done( function () {
				fadeIn( category, dfd );
			} );

			return dfd;
		};

		$( '.js-ocdi-nav-link' ).on( 'click', function( event ) {
			event.preventDefault();

			// Remove 'active' class from the previous nav list items.
			$( this ).parent().siblings().removeClass( 'active' );

			// Add the 'active' class to this nav list item.
			$( this ).parent().addClass( 'active' );

			var category = this.hash.slice(1);

			// show/hide the right items, based on category selected
			var $container = $( '.js-ocdi-gl-item-container' );
			$container.css( 'min-width', $container.outerHeight() );

			var promise = animate( category );

			promise.done( function () {
				$container.removeAttr( 'style' );
			} );
		} );
	}());


	/**
	 * Grid Layout search functionality.
	 */
	$( '.js-ocdi-gl-search' ).on( 'keyup', function( event ) {
		if ( 0 < $(this).val().length ) {
			// Hide all items.
			$( '.js-ocdi-gl-item-container' ).find( '.js-ocdi-gl-item' ).hide();

			// Show just the ones that have a match on the import name.
			$( '.js-ocdi-gl-item-container' ).find( '.js-ocdi-gl-item[data-name*="' + $(this).val().toLowerCase() + '"]' ).show();
		}
		else {
			$( '.js-ocdi-gl-item-container' ).find( '.js-ocdi-gl-item' ).show();
		}
	} );

	/**
	 * ---------------------------------------
	 * --------Helper functions --------------
	 * ---------------------------------------
	 */

	/**
	 * Prepare grid layout import data and execute the AJAX call.
	 *
	 * @param int selectedImportID The selected import ID.
	 * @param obj $itemContainer The jQuery selected item container object.
	 */
	function gridLayoutImport( selectedImportID, $itemContainer ) {
		// Reset response div content.
		$( '.js-ocdi-ajax-response' ).empty();

		// Hide all other import items.
		$itemContainer.siblings( '.js-ocdi-gl-item' ).fadeOut( 500 );

		$itemContainer.animate({
			opacity: 0
		}, 500, 'swing', function () {
			$itemContainer.animate({
				opacity: 1
			}, 500 )
		});

		// Hide the header with category navigation and search box.
		$itemContainer.closest( '.js-ocdi-gl' ).find( '.js-ocdi-gl-header' ).fadeOut( 500 );

		// Append a title for the selected demo import.
		$itemContainer.parent().prepend( '<h3>' + ocdi.texts.selected_import_title + '</h3>' );

		// Remove the import button of the selected item.
		$itemContainer.find( '.js-ocdi-gl-import-data' ).remove();

		// Prepare data for the AJAX call
		var data = new FormData();
		data.append( 'action', 'ocdi_import_demo_data' );
		data.append( 'security', ocdi.ajax_nonce );
		data.append( 'selected', selectedImportID );

		// AJAX call to import everything (content, widgets, before/after setup)
		ajaxCall( data );
	}
	/**
	 * Prepare grid layout import data and execute the AJAX call.
	 *
	 * @param int selectedImportID The selected import ID.
	 * @param obj $itemContainer The jQuery selected item container object.
	 */
	function gridLayoutInstallPlugins( selectedImportID, $itemContainer ) {
		if( ocdi.texts.dialog_yes == $('.ui-dialog-buttonpane .kt-install-action-button').html() ) {
			$( '#js-ocdi-modal-content' ).dialog('close');
			gridLayoutImport( selectedImportID, $itemContainer );
		}
		var items_completed = 0;
		var $current_item 	= "";
		
		function find_next() {
			var $li = $( '.ocdi__demo-import-notice li.kt-import-plugin' );
			$li.each( function(){
				$current_item = $(this);
				if ( 'active' == $current_item.data('state') && ! $current_item.data('done') ) {
					$current_item.data( 'done', 1 );
					items_completed++;
	                return true;
	            } else if ( 'active' == $current_item.data('state') ) {
	                return true;
	            }
	            if ( 'notactive' == $current_item.data('state') ) {
	                $current_item.find('.plugin-status').text( 'installing ...' );
	                $current_item.find('.spinner').addClass('is-active');
	               // console.log( $current_item.data('bundled') );
	                if ( $current_item.data('bundled') ) {
	                	install_bundled_current();
	                	return false;
	                } else {
	                	install_current();
	                	return false;
                	}
	            }
	            if ( 'installed' == $current_item.data('state') ) {
	                $current_item.find('.plugin-status').text( 'activating ...' );
	                $current_item.find('.spinner').addClass('is-active');
	                process_current();
	                return false;
	            }
			});
			if ( items_completed >= $li.length ){
				$('.ui-dialog-buttonpane .kt-install-action-button').text( ocdi.texts.dialog_yes );
			}
		}
		function install_bundled_current() {
			if ( $current_item ){
			 	jQuery.post( ocdi.ajax_url, {
                    action: "kadence_importer_install_plugins",
                    security: ocdi.ajax_nonce,
                    slug: $current_item.data( 'slug' ),
                }, ajax_callback).fail( ajax_callback );
			 }
		}
		function ajax_callback(response){
	            if(typeof response === "object" && typeof response.message !== "undefined"){
	                // The plugin is done (installed, updated and activated).
	                if(typeof response.done != "undefined" && response.done){
	                	$current_item.find('.plugin-status').text( 'installed' );
						$current_item.data( 'state', 'installed' );
						find_next();
	                } else if( typeof response.url != "undefined" ){
	                    // we have an ajax url action to perform.
	                    jQuery.post(response.url, response, ajax_callback).fail(ajax_callback);
	                }else{
	                    // error processing this plugin
	                    $('.ui-dialog-buttonpane .kt-install-action-button').text( 'failed' );
						$('.ocdi__demo-import-notice .kt-fail-info').text( 'The plugin install failed. Please try manually installing these plugins through the plugins > add new page.' );
						console.log( xhr.responseText );
	                }
	            } else {
	                // The TGMPA returns a whole page as response, so check, if this plugin is done.
	                $current_item.find('.plugin-status').text( 'installed' );
					$current_item.data( 'state', 'installed' );
					find_next();
	            }
	        }
		function install_current() {
			 if ( $current_item ){
			 	$.ajax({
					url : $current_item.data('install-url'),
					type: 'GET',
					data: {},
					success: function( response ) {
						$current_item.find('.plugin-status').text( 'installed' );
						$current_item.data( 'state', 'installed' );
						find_next();
					},
					error: function (xhr, ajaxOptions, thrownError) {
						 // Activation failed
						$('.ui-dialog-buttonpane .kt-install-action-button').text( 'failed' );
						$('.ocdi__demo-import-notice .kt-fail-info').text( 'The plugin install failed. Please try manually installing these plugins through the plugins > add new page.' );
						console.log( xhr.responseText );
					}
				});
			 }
		}
		function process_current() {
			 if ( $current_item ){
			 	$.ajax({
					url : $current_item.data('activate-url'),
					type: 'GET',
					data: {},
					success: function( response ) {
						$current_item.find('.plugin-status').text( 'active' );
						$current_item.find('.spinner').removeClass('is-active');
						$current_item.data( 'state', 'active' );
						find_next();
					},
					error: function (xhr, ajaxOptions, thrownError) {
						 // Activation failed
						 $('.ui-dialog-buttonpane .kt-install-action-button').text( 'failed' );
						 $('.ocdi__demo-import-notice .kt-fail-info').text( 'The plugin install failed. Please try manually installing these plugins through the plugins > add new page.' );
						console.log( xhr.responseText );
					}
				});
			 }
		}
		find_next();
	}
	/**
	 * Display the confirmation popup.
	 *
	 * @param int selectedImportID The selected import ID.
	 * @param obj $itemContainer The jQuery selected item container object.
	 */
	function displayConfirmationPopup( selectedImportID, $itemContainer ) {
		var $dialogContiner         = $( '#js-ocdi-modal-content' );
		var currentFilePreviewImage = ocdi.import_files[ selectedImportID ]['import_preview_image_url'] || ocdi.theme_screenshot;
		var previewImageContent     = '';
		var importNotice            = ocdi.import_files[ selectedImportID ]['import_notice'] || '';
		var importPlugins           = ocdi.import_files[ selectedImportID ]['plugins'] || '';
		var importNoticeContent     = '';
		var pluginsActive           = true;
		importNoticeContent = '<div class="ocdi__modal-notice  ocdi__demo-import-notice"><h4>Required Plugins</h4><ul>';
		for (var i = importPlugins.length - 1; i >= 0; i--) {
			if ( 'active' !== importPlugins[i]['state'] ){
				pluginsActive = false;
			}
			importNoticeContent += '<li class="kt-import-plugin" data-done="0" data-bundled="'+ importPlugins[i]['bundled'] +'" data-slug="'+ importPlugins[i]['slug'] +'" data-state="'+ importPlugins[i]['state'] +'" data-base="'+importPlugins[i]['base']+'" data-install-url="'+importPlugins[i]['install_url']+'" data-activate-url="'+importPlugins[i]['activate_url']+'">'+importPlugins[i]['title']+' - <span class="plugin-status">'+ ( 'notactive' === importPlugins[i]['state'] ? 'Not Installed' : importPlugins[i]['state'] ) +'</span><span class="spinner"></span></li>';
		}
		if ( importPlugins.length == 0 ) {
			importNoticeContent += '<li class="kt-noplugins-info">None</li>';
		}
		importNoticeContent += '</ul>';
		importNoticeContent += '<div class="kt-fail-info"></div></div>';
		if ( pluginsActive ) {
			var clickFunction = 'kt-no-install'
		} else {
			var clickFunction = 'kt-no-import'
		}
		var dialogOptions           = $.extend(
			{
				'dialogClass': 'wp-dialog',
				'resizable':   false,
				'height':      'auto',
				'modal':       true
			},
			ocdi.dialog_options,
			{
				'buttons':
				[
					{
						text: ocdi.texts.dialog_no,
						click: function() {
							$(this).dialog('close');
						}
					},
					{
						text: ocdi.texts.dialog_yes_plugins,
						class: 'button  button-primary kt-install-action-button ' + clickFunction,
						click: function() {
							gridLayoutInstallPlugins( selectedImportID, $itemContainer );
						}
					},
					{
						text: ocdi.texts.dialog_yes,
						class: 'button  button-primary kt-import-action-button ' + clickFunction,
						click: function() {
							$(this).dialog('close');
							gridLayoutImport( selectedImportID, $itemContainer );
						}
					}
				]
			});

		if ( '' === currentFilePreviewImage ) {
			previewImageContent = '<p>' + ocdi.texts.missing_preview_image + '</p>';
		}
		else {
			previewImageContent = '<div class="ocdi__modal-image-container"><img src="' + currentFilePreviewImage + '" alt="' + ocdi.import_files[ selectedImportID ]['import_file_name'] + '"></div>'
		}

		// Populate the dialog content.
		$dialogContiner.prop( 'title', ocdi.texts.dialog_title );
		$dialogContiner.html(
			'<p class="ocdi__modal-item-title">' + ocdi.import_files[ selectedImportID ]['import_file_name'] + '</p>' +
			previewImageContent +
			importNoticeContent
		);

		// Display the confirmation popup.
		$dialogContiner.dialog( dialogOptions );
	}

	/**
	 * The main AJAX call, which executes the import process.
	 *
	 * @param FormData data The data to be passed to the AJAX call.
	 */
	function ajaxCall( data ) {
		$.ajax({
			method:      'POST',
			url:         ocdi.ajax_url,
			data:        data,
			contentType: false,
			processData: false,
			beforeSend:  function() {
				$( '.js-ocdi-ajax-loader' ).show();
			}
		})
		.done( function( response ) {
			if ( 'undefined' !== typeof response.status && 'newAJAX' === response.status ) {
				ajaxCall( data );
			}
			else if ( 'undefined' !== typeof response.status && 'customizerAJAX' === response.status ) {
				// Fix for data.set and data.delete, which they are not supported in some browsers.
				var newData = new FormData();
				newData.append( 'action', 'ocdi_import_customizer_data' );
				newData.append( 'security', ocdi.ajax_nonce );

				// Set the wp_customize=on only if the plugin filter is set to true.
				if ( true === ocdi.wp_customize_on ) {
					newData.append( 'wp_customize', 'on' );
				}

				ajaxCall( newData );
			}
			else if ( 'undefined' !== typeof response.status && 'afterAllImportAJAX' === response.status ) {
				// Fix for data.set and data.delete, which they are not supported in some browsers.
				var newData = new FormData();
				newData.append( 'action', 'ocdi_after_import_data' );
				newData.append( 'security', ocdi.ajax_nonce );
				ajaxCall( newData );
			}
			else if ( 'undefined' !== typeof response.message ) {
				$( '.js-ocdi-ajax-response' ).append( '<p>' + response.message + '</p>' );
				$( '.js-ocdi-ajax-loader' ).hide();
			}
			else {
				$( '.js-ocdi-ajax-response' ).append( '<div class="notice  notice-error  is-dismissible"><p>' + response + '</p></div>' );
				$( '.js-ocdi-ajax-loader' ).hide();
			}
		})
		.fail( function( error ) {
			$( '.js-ocdi-ajax-response' ).append( '<div class="notice  notice-error  is-dismissible"><p>Error: ' + error.statusText + ' (' + error.status + ')' + '</p></div>' );
			$( '.js-ocdi-ajax-loader' ).hide();
		});
	}
} );
// /**
//  * Ajax activate, deactivate blocks
//  *
//  */
// (function($, window, document, undefined){
// 	"use strict";

// 	$(function(){

// 		/**
// 		 * close preview
// 		 */
// 		$( '.close-full-overlay' ).on( 'click', function () {

// 			$('.kadence-site-preview').css('display', 'none');

// 		});
// 		$('.import-preview').on( 'click', function( event ) {
// 			var $button = $( event.target );
// 			event.preventDefault();
// 			var divToUpdate = $('.kadence-site-preview');

// 			function ajax_callback(response){
// 				console.log(response);
// 				//divToUpdate.innerHTML = response;
// 				$('.kadence-site-preview .theme-name').html(response['import_file_name']);
// 				$('.kadence-site-preview .theme-screenshot').attr('src', response['import_preview_image_url']);
// 				$('.kadence-site-preview .wp-full-overlay-main').html('<iframe src="' + response['preview_url'] + '" title="Preview"></iframe>');
// 				divToUpdate.css('display', 'block');

// 				if ( typeof response.success != "undefined" && ! response.success ) {
// 					console.log('error');
// 				} else{
// 					// error processing this block
// 					console.log('not error');
// 				}
// 	        }
// 			/**
// 			 * Toggle Block
// 			 *
// 			 * @return void
// 			 */
// 			function runbtn(){
// 				jQuery.post( ocdi.ajax_url, {
//                     action: "kadence_import_preview",
//                     demo: $button.data('demo-slug'),
//                 }, ajax_callback );
// 			}

			

// 			runbtn();
// 		});
// 	});
// })(jQuery, window, document);
