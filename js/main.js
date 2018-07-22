;(function($) {
	var App = {
		stickyMenu: function() {
			$(window).scroll(function() {
				if($(window).scrollTop() > 100 ) {
					$('#header').addClass('stuck');
				}else {
					$('#header').removeClass('stuck');
				}
			});
		},

		dropdownMenu: function() {
			$('#nav li').hover(function(){
				$(this).children('ul').stop().slideToggle(250);
			});
		},

		mobileMenu: function() {
			$( '#nav>ul' ).clone().appendTo( $( '#sidr' ) );

			$('#mobile-menu a').sidr({
				name: 'sidr',
				side: 'right',
				onOpen: function() {
					$('#mobile-menu i').removeClass('fa-bars').addClass('fa-times');
				},

				onClose: function() {
					$('#mobile-menu i').removeClass('glyphicon-remove').addClass('fa-bars');
				}
			});

			$(document).click( function( event ) {

				if( !$(event.target).closest('#sidr').length ) {
					$.sidr('close', 'sidr');
				}
			});

		},

		placeholder: function() {
			$('input[type="text"],input[type="email"],input[type="tel"],textarea').each(function() {
				var placeholder = $(this).attr('placeholder');

				$(this).focus(function() {
					$(this).attr('placeholder','');
				});

				$(this).blur(function() {
					$(this).attr('placeholder',placeholder);
				});
			});
		},

		clickToScroll: function() {
			$('#colud-solutions .solutions-nav ul li a, #home-slider .scroll-button').on('click', function(e) {
				e.preventDefault();
				
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top - 100
				})
			});
		}
	}

	App.init = function() {
		this.dropdownMenu();
		this.stickyMenu();
		this.mobileMenu();
		this.placeholder();
		this.clickToScroll();
	}

	$(function() {
		App.init();
	});
}(jQuery));

