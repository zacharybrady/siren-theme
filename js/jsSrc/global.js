/**
* This file contains the Global calls and custom functions of the project
* @module Global
*/

/**
Related to navigation.
@class navigationUI
@static
*/

/**
Test if a css selector can be used
@method mobileNav
@param triggerID {string} 
@param widthLimit {int} 
*/

$('.navPrimary_button').click(function(){

	if($(this).hasClass('active')){

		$(this).removeClass('active');
		$('.navPrimary').removeClass('active');

	}
	else {

		$(this).addClass('active');
		$('.navPrimary').addClass('active');

	}
});
