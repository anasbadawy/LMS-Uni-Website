
//MENU TOGGLE
jQuery(document).ready(function($){
	"use strict";
	jQuery("#menu-toggle").click(function(e) {
		e.preventDefault();
		jQuery("#outer-wrapper").toggleClass("toggled");
	});
});
