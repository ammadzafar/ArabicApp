/*--------------------------------------
		CUSTOM FUNCTION WRITE HERE
--------------------------------------*/
"use strict";
jQuery(document).on('ready', function() {
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
			add classes
	--------------------------------------*/

	$('.at-btnmenu').click(function(){
		$("#at-wrapper").toggleClass("at-closemenu")
	});

	$('.at-btnmenuvtwo').click(function(){
		$("#at-wrapper").toggleClass("at-closemenu")
	});

	$('.at-btntoggle').click(function(){
		$(".at-btntoggle").toggleClass("at-hideshow")
	});
	/*--------------------------------------
			owl carousel
	--------------------------------------*/

	$('#at-recordingslider').owlCarousel({
		items: 1,
		dots: false,
		nav: true,
		smartSpeed: 200,
		slideSpeed : 500,

		navClass: [
			'at-sliderbtnprev',
			'at-sliderbtnnext'
		],
	});
	$('#at-alhphbatslider').owlCarousel({
		items: 1,
		dots: false,
		nav: true,
		smartSpeed: 200,
		slideSpeed : 500,

		navClass: [
			'at-sliderbtnprev',
			'at-sliderbtnnext'
		],
	});
	//<![CDATA[
	$(document).ready(function(){

		$("#jquery_jplayer_1").jPlayer({
			ready: function (event) {
				$(this).jPlayer("setMedia", {
					// title: "Bubble",
					// m4a: "http://jplayer.org/audio/m4a/Miaow-07-Bubble.m4a",
					m4a: "../assets/images/audio/1.mp3",
					oga: "http://jplayer.org/audio/ogg/Miaow-07-Bubble.ogg"
				});
			},
			swfPath: "../../dist/jplayer",
			supplied: "m4a, oga",
			wmode: "window",
			useStateClassSkin: true,
			autoBlur: false,
			smoothPlayBar: true,
			keyEnabled: true,
			remainingDuration: true,
			toggleDuration: true

		});
	});
	// $(document).ready(function() {
		$('.js-example-basic-multiple').select2({
			closeOnSelect : false,
			placeholder : "Select Rules",
			// allowHtml: true,
			allowClear: true,
			tags: true // создает новые опции на лету
		});
		/*--------------------------------------

        --------------------------------------*/
});
/*--------------------------------------
			filter dropdown
--------------------------------------*/
