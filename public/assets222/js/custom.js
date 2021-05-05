 /*--------------------------------------
		CUSTOM FUNCTION WRITE HERE
--------------------------------------*/
$(function() {
	/*--------------------------------------
			MOBILE MENU
	--------------------------------------*/
	function collapseMenu(){
		jQuery('.at-navigation ul li.menu-item-has-children, .at-navigation ul li.menu-item-has-mega-menu').prepend('<span class="tg-dropdowarrow"><i class="fa fa-angle-down"></i></span>');
		jQuery('.at-navigation ul li.menu-item-has-children span, .at-navigation ul li.menu-item-has-mega-menu span').on('click', function() {
			jQuery(this).parent('li').toggleClass('tg-open');
			jQuery(this).next().next().slideToggle(300);
		});
	}
	collapseMenu();
    /*--------------------------------------
            MENU DROPDOWN TOGGLE
    --------------------------------------*/
    jQuery('.at-hasdropdown').on('click', 'a', function() {
        jQuery(this).siblings('.at-dropdownmenu').slideToggle();
    });
	/*--------------------------------------
			MEGA MENU
	--------------------------------------*/
	jQuery(function ($) {
		function hoverIn() {
			var a = jQuery(this);
			var nav = a.closest('.at-navigation');
			var mega = a.find('.mega-menu');
			var offset = rightSide(nav) - leftSide(a);
			mega.width(Math.min(rightSide(nav), columns(mega)*230));
			mega.css('left', Math.min(0, offset - mega.width()));
		}
		function hoverOut() {}
		function columns(mega) {
			var columns = 0;
			mega.children('.mega-menu-row').each(function () {
				columns = Math.max(columns, jQuery(this).children('.mega-menu-col').length);
			});
			return columns;
		}
		function leftSide(elem) {
			return elem.offset().left;
		}
		function rightSide(elem) {
			return elem.offset().left + elem.width();
		}
		jQuery('.menu-item-has-mega-menu').hover(hoverIn, hoverOut);
	});

	/*--------------------------------------
				OPEN CLOSE SIDEBAR
	--------------------------------------*/
	if(jQuery('.at-btnopensidebar').length > 0){
		jQuery('.at-btnopensidebar').on('click', function(){
			jQuery('#at-wrapper').toggleClass('at-openmenu');
		});
    }

    jQuery('#at-closeplanbtn1').on('click', function () {
        jQuery('#at-wrapper').toggleClass('at-closeplan1')
    });
    jQuery('#at-closeplanbtn2').on('click', function () {
        jQuery('#at-wrapper').toggleClass('at-closeplan2')
    });
	/*--------------------------------------
			THEME VERTICAL SCROLLBAR
	--------------------------------------*/
	if(jQuery('.at-themescrollbar').length > 0){
		var _at_verticalscrollbar = jQuery('.at-themescrollbar');
		_at_verticalscrollbar.mCustomScrollbar({
			axis:"y",
		});
    }

	if(jQuery('.at-horizontalthemescrollbar').length > 0){
		var _at_horizontalthemescrollbar = jQuery('.at-horizontalthemescrollbar');
		_at_horizontalthemescrollbar.mCustomScrollbar({
			axis:"x",
			advanced:{autoExpandHorizontalScroll:true},
		});
    }
    /*--------------------------------------
			Record Voice Jquery
	--------------------------------------*/
    // if (jQuery('#recordButton').length > 0) {
	// 	jQuery('#recordButton').on('click', function () {
	// 		jQuery('.at-wrapper').addClass('at-show-btns');
	// 	})
	// }
    //
	// if (jQuery('.stop-record').length > 0) {
	// 	jQuery('.stop-record').on('click', function () {
	// 		jQuery('.at-wrapper').removeClass('at-show-btns');
	// 	})
	// }

});





























