//
// ─── CONTEXTUAL CONTROLS ────────────────────────────────────────────────────────
//

/**
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function () {
	wp.customize.bind('ready', function () {
		// Only show the preloader type control when preloader is enabled.
		wp.customize('preloader_status', function (setting) {
			wp.customize.control('preloader_type', function (control) {
				var visibility = function () {
					if ('1' == setting.get()) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};
				visibility();
				setting.bind(visibility);
			});

			wp.customize.control('color_preloader', function (control) {
				var visibility = function () {
					if ('1' == setting.get()) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};
				visibility();
				setting.bind(visibility);
			});
			
			wp.customize.control('preloader_size', function (control) {
				var visibility = function () {
					if ('1' == setting.get()) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};
				visibility();
				setting.bind(visibility);
			});
		});

		// Show Back-to-top icons control, when it's enabled.
		wp.customize('backtotop_status', function (setting) {
			wp.customize.control('backtotop_icon', function (control) {
				var visibility = function () {
					if ('1' == setting.get()) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};
				visibility();
				setting.bind(visibility);
			});
			wp.customize.control('backtotop_fontsize', function (control) {
				var visibility = function () {
					if ('1' == setting.get()) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};
				visibility();
				setting.bind(visibility);
			});
			wp.customize.control('backtotop_color', function (control) {
				var visibility = function () {
					if ('1' == setting.get()) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};
				visibility();
				setting.bind(visibility);
			});
			wp.customize.control('backtotop_bgcolor', function (control) {
				var visibility = function () {
					if ('1' == setting.get()) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};
				visibility();
				setting.bind(visibility);
			});
			wp.customize.control('backtotop_shape', function (control) {
				var visibility = function () {
					if ('1' == setting.get()) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};
				visibility();
				setting.bind(visibility);
			});
			wp.customize.control('backtotop_mobile', function (control) {
				var visibility = function () {
					if ('1' == setting.get()) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};
				visibility();
				setting.bind(visibility);
			});

		});

		// Only show the Footer column control when footer enabled.
		wp.customize('enable_footer', function (setting) {
			wp.customize.control('footer_column', function (control) {
				var visibility = function () {
					if ('1' == setting.get()) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};
				visibility();
				setting.bind(visibility);
			});
		});

		// Only show the Related posts controls when it's enabled.
		wp.customize('related_post_enable', function (setting) {
			wp.customize.control('related_post_by', function (control) {
				var visibility = function () {
					if ('1' == setting.get()) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};
				visibility();
				setting.bind(visibility);
			});

			wp.customize.control('related_post_count', function (control) {
				var visibility = function () {
					if ('1' == setting.get()) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};
				visibility();
				setting.bind(visibility);
			});
		});

		// Only show the Read more text control when it's enabled.
		wp.customize('enable_read_more', function (setting) {
			wp.customize.control('read_more_text', function (control) {
				var visibility = function () {
					if ('1' == setting.get()) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};
				visibility();
				setting.bind(visibility);
			});
		});

		// Only show the Excerpt length control when it's enabled.
		wp.customize( 'home_content', function( setting ) {
			wp.customize.control( 'excerpt_length', function( control ) {

				var visibility = function() {
					if ( 'excerpt' === setting.get() ) {
						control.container.slideDown( 180 );
					} else {
						control.container.slideUp( 180 );
					}
				};
				visibility();
				setting.bind( visibility );
			});
		});

		// Only show when main layout is boxed
		wp.customize('main_layout', function (setting) {
			
			wp.customize.control('color_boxedbackground', function (control) {
				var visibility = function () {
					if ('boxed' == setting.get()) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};
				visibility();
				setting.bind(visibility);
			});

			wp.customize.control('boxed_bgimage', function (control) {
				var visibility = function () {
					if ('boxed' == setting.get()) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};
				visibility();
				setting.bind(visibility);
			});

			wp.customize.control('boxed_bgrepeat', function (control) {
				var visibility = function () {
					if ('boxed' == setting.get()) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};
				visibility();
				setting.bind(visibility);
			});

			wp.customize.control('boxed_bgsize', function (control) {
				var visibility = function () {
					if ('boxed' == setting.get()) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};
				visibility();
				setting.bind(visibility);
			});
			
			wp.customize.control('boxed_bgposition', function (control) {
				var visibility = function () {
					if ('boxed' == setting.get()) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};
				visibility();
				setting.bind(visibility);
			});

			wp.customize.control('boxed_bgattachment', function (control) {
				var visibility = function () {
					if ('boxed' == setting.get()) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};
				visibility();
				setting.bind(visibility);
			});
			
		});

		function validURL(str) {
			var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
			  '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
			  '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
			  '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
			  '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
			  '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
			return !!pattern.test(str);
		}
		
		wp.customize('boxed_bgimage', function (setting) {
			
			wp.customize.control('boxed_bgrepeat', function (control) {
				var visibility = function () {
					if (true == validURL(setting.get())) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};
				visibility();
				setting.bind(visibility);
			});

			wp.customize.control('boxed_bgsize', function (control) {
				var visibility = function () {
					if (true == validURL(setting.get())) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};
				visibility();
				setting.bind(visibility);
			});
			
			wp.customize.control('boxed_bgposition', function (control) {
				var visibility = function () {
					if (true == validURL(setting.get())) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};
				visibility();
				setting.bind(visibility);
			});
			
			wp.customize.control('boxed_bgattachment', function (control) {
				var visibility = function () {
					if (true == validURL(setting.get())) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};
				visibility();
				setting.bind(visibility);
			});

			
		});

	});
})(jQuery);
