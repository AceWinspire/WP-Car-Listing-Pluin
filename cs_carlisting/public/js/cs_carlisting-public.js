(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */



	
		
	
		$(document).ready( function() {
			$("#searchCars").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$(".car-card").filter(function() {
				  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			  });


		
		
		
		
	
			  $('.carfilters').delegate('input:checkbox', 'change', function()
{
     var $lis = $('.car-card').hide();
     //For each one checked
     $('input:checked').each(function()
     {
          $lis.filter('.' + $(this).attr('rel')).show();
     });      
}).find('input:checkbox').change();
		});
})( jQuery );

