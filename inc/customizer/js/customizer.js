//
// ─── LIVE PREVIEW FOR INSTANTANEOUS EFFECTS ─────────────────────────────────────
//
(function ($) {

	wp.customize('color_background', function (value) {
		value.bind(function (newval) {
			$('.main-body').css('background', newval);
		});
	});

	wp.customize('color_primary', function (value) {
		value.bind(function (newval) {
			$('body a').css('color', newval);
		});
	});
	wp.customize('color_primary', function (value) {
		value.bind(function (newval) {
			$('body button').css('color', newval);
		});
	});

	wp.customize('color_header_text', function (value) {
		value.bind(function (newval) {
			$('header .navbar .navbar-tagline').css('color', newval);
		});
	});

	wp.customize('color_header_background', function (value) {
		value.bind(function (newval) {
			$('header').css('background-color', newval);
		});
	});

	wp.customize('color_header_background', function (value) {
		value.bind(function (newval) {
			$('header .navbar-light .navbar-nav').css('background-color', newval);
		});
	});

	wp.customize('color_logo_text', function (value) {
		value.bind(function (newval) {
			$('header .navbar .navbar-brand').css('color', newval);
		});
	});

	wp.customize('color_menu', function (value) {
		value.bind(function (newval) {
			$('header li a').css('color', newval);
		});
	});

	wp.customize('color_menu_hover', function (value) {
		value.bind(function (newval) {
			$('header li a').mouseover(function () {
				$('header li a').css('color', newval);
			});
		});
	});

	// Footer
	wp.customize('color_footer_background', function (value) {
		value.bind(function (newval) {
			$('section.bottom').css('background-color', newval);
		});
	});

	wp.customize('color_footer_title', function (value) {
		value.bind(function (newval) {
			$('section.bottom h2.widget-title').css('color', newval);
		});
	});

	wp.customize('color_footer_link', function (value) {
		value.bind(function (newval) {
			$('section.bottom a').css('color', newval);
		});
	});

	wp.customize('color_footer_content', function (value) {
		value.bind(function (newval) {
			$('section.bottom').css('color', newval);
		});
	});

	// Copyright Color
	wp.customize('color_copyright', function (value) {
		value.bind(function (newval) {
			$('section.footer').css('color', newval);
		});
	});

	wp.customize('color_copyright_link', function (value) {
		value.bind(function (newval) {
			$('section.footer a').css('color', newval);
		});
	});

	wp.customize('backtotop_color', function (value) {
		value.bind(function (newval) {
			$('a#backtotop i').css('color', newval);
		});
	});
	wp.customize('backtotop_bgcolor', function (value) {
		value.bind(function (newval) {
			$('a#backtotop').css('background', newval);
		});
	});

	wp.customize('color_menu_active', function (value) {
		value.bind(function (newval) {
			$('header .navbar-nav li.current-menu-item a').css('color', newval);
		});
	});

	wp.customize('color_copyright_background', function(value) {
		value.bind(function (newval) {
			$('section.footer').css('background-color', newval);
		});
	});

	wp.customize('preloader_type', function (value) {
		value.bind(function (newval) {
			// Enqueuing HTML of specified preloader
			switch (newval) {
				case 'rotating-plane':
					$('#wp-preloader').html('<div class="sk-rotating-plane"></div>');
					break;
				case 'fading-circle':
					$('#wp-preloader').html('<div class="sk-fading-circle"><div class="sk-circle1 sk-circle"></div><div class="sk-circle2 sk-circle"></div><div class="sk-circle3 sk-circle"></div><div class="sk-circle4 sk-circle"></div><div class="sk-circle5 sk-circle"></div><div class="sk-circle6 sk-circle"></div><div class="sk-circle7 sk-circle"></div><div class="sk-circle8 sk-circle"></div><div class="sk-circle9 sk-circle"></div><div class="sk-circle10 sk-circle"></div><div class="sk-circle11 sk-circle"></div><div class="sk-circle12 sk-circle"></div></div>');
					break;
				case 'folding-cube':
					$('#wp-preloader').html('<div class="sk-folding-cube"><div class="sk-cube1 sk-cube"></div><div class="sk-cube2 sk-cube"></div><div class="sk-cube4 sk-cube"></div><div class="sk-cube3 sk-cube"></div></div>');
					break;
				case 'double-bounce':
					$('#wp-preloader').html('<div class="sk-double-bounce"><div class="sk-child sk-double-bounce1"></div><div class="sk-child sk-double-bounce2"></div></div>');
					break;
				case 'wave':
					$('#wp-preloader').html('<div class="sk-wave"><div class="sk-rect sk-rect1"></div><div class="sk-rect sk-rect2"></div><div class="sk-rect sk-rect3"></div><div class="sk-rect sk-rect4"></div><div class="sk-rect sk-rect5"></div></div>');
					break;
				case 'wandering-cubes':
					$('#wp-preloader').html('<div class="sk-wandering-cubes"><div class="sk-cube sk-cube1"></div><div class="sk-cube sk-cube2"></div></div>');
					break;
				case 'pulse':
					$('#wp-preloader').html('<div class="sk-spinner sk-spinner-pulse"></div>');
					break;
				case 'chasing-dots':
					$('#wp-preloader').html('<div class="sk-chasing-dots"><div class="sk-child sk-dot1"></div><div class="sk-child sk-dot2"></div></div>');
					break;
				case 'three-bounce':
					$('#wp-preloader').html('<div class="sk-three-bounce"><div class="sk-child sk-bounce1"></div><div class="sk-child sk-bounce2"></div><div class="sk-child sk-bounce3"></div></div>');
					break;
				case 'circle':
					$('#wp-preloader').html('<div class="sk-circle"><div class="sk-circle1 sk-child"></div><div class="sk-circle2 sk-child"></div><div class="sk-circle3 sk-child"></div><div class="sk-circle4 sk-child"></div><div class="sk-circle5 sk-child"></div><div class="sk-circle6 sk-child"></div><div class="sk-circle7 sk-child"></div><div class="sk-circle8 sk-child"></div><div class="sk-circle9 sk-child"></div><div class="sk-circle10 sk-child"></div><div class="sk-circle11 sk-child"></div><div class="sk-circle12 sk-child"></div></div>');
					break;
				case 'cube-grid':
					$('#wp-preloader').html('<div class="sk-cube-grid"><div class="sk-cube sk-cube1"></div><div class="sk-cube sk-cube2"></div><div class="sk-cube sk-cube3"></div><div class="sk-cube sk-cube4"></div><div class="sk-cube sk-cube5"></div><div class="sk-cube sk-cube6"></div><div class="sk-cube sk-cube7"></div><div class="sk-cube sk-cube8"></div><div class="sk-cube sk-cube9"></div></div>');
					break;
				case 'bouncing-loader':
					$('#wp-preloader').html('<div class="bouncing-loader"><div></div><div></div><div></div></div>');
					break;
				case 'donut':
					$('#wp-preloader').html('<div class="donut"></div>');
					break;
			}

			$('#wp-preloader').addClass('d-flex');

			setTimeout(
				function () {
					$('#wp-preloader').removeClass('d-flex');
					$('#wp-preloader').addClass('d-none');
				}, 1000
			);
		});
	});

	// Sticky header background color
	wp.customize('color_stickyheader_background', function (value) {
		value.bind(function (newval) {
			$('.sticky-navbar.sticky').css('background-color', newval);
		});
	});

	/* Dropdown colors */
	wp.customize('color_dropdown_background', function (value) {
		value.bind(function (newval) {
			$('.main-navigation ul.sub-menu').css('background-color', newval);
		});
	});
	wp.customize('color_dropdown_link', function (value) {
		value.bind(function (newval) {
			$('.main-navigation ul.sub-menu li a').css('color', newval);
		});
	});
	wp.customize('color_dropdown_activelink', function (value) {
		value.bind(function (newval) {
			$('.main-navigation ul.sub-menu li.current_page_item a').css('color', newval);
		});
	});
	wp.customize('color_dropdown_activebg', function (value) {
		value.bind(function (newval) {
			$('.main-navigation ul.sub-menu li.current-menu-item').css('background-color', newval);
		});
	});

	// Boxed BG Color
	wp.customize('color_boxedbackground', function (value) {
		value.bind(function (newval) {
			$('body.boxed').css('background', newval);
		});
	});

})(jQuery);