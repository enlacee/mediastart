$(window).load(function(){

	/**
	 * Functions for left and right columns
	 * High dynamic change 
	 * All section of two columns
	 */

	//Get width browser
	var window_width 	= $( window ).width();
	//Get height col_1 ( #ctnBody > .row .col_1 )
	var col_1 = $( "#ctnBody > .row .col_1" ).height();
	//Get height col_2  ( #ctnBody > .row .col_2 )
	var col_2 = $( "#ctnBody > .row .col_2" ).height();

	//Check if dimention browser width is >= 972px
	if( window_width >= 972 ) {
		//Check if height col_1 is >= to col_2)
		if( col_1 >= col_2 ) {
			//Add hight col_1 to col_2
			$( "#ctnBody > .row .col_2" ).css('height', col_1);
		}
		//Check if height col_2 is >= to col_1)
		else {
			//Add hight col_2 to col_1
			$( "#ctnBody > .row .col_1" ).css('height', col_2);
		}
	}
	
	//Note: For mobile phones do not need to do this. 


	/**
	 * Functions for fixed bar
	 * Section Porfolio details
	 */
	
	//Check if the section where the user is detail structure portfolio
	var section_video_details = (function (){
		//Get pathname URL
		var url_current = window.location.pathname;
		//Matches conditions
		var matches1 = url_current.indexOf("portfolio");
		var matches2 = url_current.indexOf("video");
		//It runs if the section is detailed portfolio
		if( matches1 >= 1 && matches2 >= 1  ) {

			//Code for the horizontal bar
			function sticky_relocate() {
		  	var window_top = $(window).scrollTop();
			  var div_top = $('#sticky-anchor').offset().top;
			  if (window_top > div_top) {
			    $('.st_stick').addClass('stick');
			  } 
			  else {
		    	$('.st_stick').removeClass('stick');
			  }
			}

			$(function() {
			  $(window).scroll(sticky_relocate);
			  sticky_relocate();
			});
		}

	}());
	
			
});


/**
 * [sticky_relocate Fixed bar scroll location]
 * @return {[css]} 
 * @class [sm_stick]
 * @function [sticky_relocate]
 */
$(function(){

	function fixDiv() {
		//Get height [#menuOpenHover]
		var hight_main = $('#menuOpenHover').height();
		//Check if window [scrollTop] is > [hight_main]
		if ($(window).scrollTop() > hight_main) {
			//Add class [#main_header-sm_stick]
      $('#main_header').addClass('sm_stick');
      //Add margin-top
      $('#esliderWeb').css('margin-top', '115px');
    }
    else {
    	//Remove class [sm_stick]
      $('#main_header').removeClass('sm_stick');
      //Reset [esliderWeb]
      $('#esliderWeb').css('margin-top', '0px');
    }
	}
	// set original position on load
	$("#menuOpenHover").data("top", $("#menuOpenHover").offset().top); 
	$(window).scroll(fixDiv);

});
