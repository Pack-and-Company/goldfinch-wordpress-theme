/*
JavaScript for the demo: Recreating the Nikebetterworld.com Parallax Demo
Demo: Recreating the Nikebetterworld.com Parallax Demo
Author: Ian Lunn
Author URL: http://www.ianlunn.co.uk/
Demo URL: http://www.ianlunn.co.uk/demos/recreate-nikebetterworld-parallax/
Tutorial URL: http://www.ianlunn.co.uk/blog/code-tutorials/recreate-nikebetterworld-parallax/
License: http://creativecommons.org/licenses/by-sa/3.0/ (Attribution Share Alike). Please attribute work to Ian Lunn simply by leaving these comments in the source code or if you'd prefer, place a link on your website to http://www.ianlunn.co.uk/.

Dual licensed under the MIT and GPL licenses:
http://www.opensource.org/licenses/mit-license.php
http://www.gnu.org/licenses/gpl.html
*/

$(document).ready(function() { //when the document is ready...
	$('#nav').localScroll();

	$('.gallery a').attr('rel', 'prettyPhoto[mixed]');
	
	$("area[rel^='prettyPhoto']").prettyPhoto();
	$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({
		animation_speed:'normal',
		slideshow:8000,
		social_tools:false,
		autoplay_slideshow: false,
		overlay_gallery:false,
		show_title: true,
		allow_resize: true,
		default_width: 320,
		wmode: 'opaque'
	});
	
	//save selectors as variables to increase performance
	var $window = $(window);
	var $firstBG = $('#intro');
	var $secondBG = $('#second');
	var $thirdBG = $('#third');
	var $fourthBG = $('#fourth');
	var $fifthBG = $('#fifth');
	var floaters = $("#fifth .ct");
	
	var windowHeight = $window.height(); //get the height of the window
	
	//$('#intro, #fifth').css('min-height',windowHeight);
	//apply the class "inview" to a section that is in the viewport
	$('#intro, #second, #third, #fourth, #fifth').css('min-height',windowHeight).bind('inview', function (event, visible) {
			if (visible === true) {
			$(this).addClass("inview");
			} else {
			$(this).removeClass("inview");
			}
		});
	
	//function that places the navigation in the center of the window
	function RepositionNav() {
		var windowHeight = $window.height(); //get the height of the window
		//var navHeight = $('#nav').height() / 2;
		//var windowCenter = (windowHeight / 2); 
		//var newtop = windowCenter - navHeight;
		var windowWidth = $window.width();
		var newPos = (windowWidth/2) -($('#nav').width())/2;
		
		//$('#nav').css({"top": newtop}); //set the new top position of the navigation list
		$('#nav').css({"top": "20px", "left":newPos});
	}
	//function that is called for every pixel the user scrolls. Determines the position of the background
	/*arguments: 
		x = horizontal position of background
		windowHeight = height of the viewport
		pos = position of the scrollbar
		adjuster = adjust the position of the background
		inertia = how fast the background moves in relation to scrolling
	*/
	/*
	function repos_intro(){
		var storyHeight = $('#intro .mainsection').height();
		var newPadding = (windowHeight - storyHeight)/2;
		$('#intro .mainsection').css({"padding-top": newPadding}); 
	}
	*/
	function repos_contact() {
		var storyHeight = $('#second .mainsection').height();
		var newPadding = (windowHeight - storyHeight)/2;
		$('#second .mainsection').css({"padding-top": newPadding});
	}

	function newPos(x, windowHeight, pos, adjuster, inertia){
		var topPosition = -( (windowHeight + pos) - adjuster ) * inertia;
		if (topPosition > 0)topPosition = 0;
		return x + "% " + topPosition + "px";
	}
	
	//function to be called whenever the window is scrolled or resized
	function Move() {
		var pos = $window.scrollTop(); //position of the scrollbar
		var windowHeight = $window.height(); //get the height of the window
		//if the first section is in view...
		if($firstBG.hasClass("inview")){
			//call the newPos function and change the background position
			$firstBG.css({'backgroundPosition': newPos(50, windowHeight, pos, 620, 0.3)});
			var storyHeight = $('#intro .mainsection').height();
			var newPadding = (windowHeight - storyHeight)/2;
			$('#intro .mainsection').css({"padding-top": newPadding});	
		}
		
		if($secondBG.hasClass("inview")) {
			var storyHeight = $('#second .mainsection').height();
			var newPadding = (windowHeight - storyHeight)/2;
			$('#second .mainsection').css({"padding-top": newPadding});
		}

		//if the fourth section is in view...
		if($fourthBG.hasClass("inview")) {
			//call the newPos function and change the background position
			$fourthBG.css({'backgroundPosition': newPos(50, windowHeight, pos, 1250, 0.3)});
			$('iframe').css('height',610);
			//call the newPos function and change the secnond background position
		}
		
		//if the fifth section is in view...
		if($fifthBG.hasClass("inview")) {
			//call the newPos function and change the background position
			$fifthBG.css({'backgroundPosition': newPos(50, windowHeight, pos, 2850, 0.3)});
			var newTop = (windowHeight + pos)*0.4 - windowHeight;
			floaters.css('top', newTop);
		}
	}
		
	RepositionNav(); //Reposition the Navigation to center it in the window when the script loads
	////repos_intro();
	$window.resize(function() { //if the user resizes the window...
		Move(); //move the background images in relation to the movement of the scrollbar
		RepositionNav(); //reposition the navigation list so it remains vertically central
	});
	
	$window.bind('scroll', function() { //when the user is scrolling...
		Move(); //move the background images in relation to the movement of the scrollbar
	});
	
});