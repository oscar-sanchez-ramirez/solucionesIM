(function($) {

	"use strict";
	
	$('#car').css('display', 'none'); 
	

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();
	 
	$('#sidebarCollapse').on('click', function () {
	  $('#sidebar').toggleClass('active');
	 if($('#car').css('display') == 'block' ){
        $('#car').css('display', 'none'); 
	 }else{
        $('#car').css('display', 'block'); 
	 }
	

  });

})(jQuery);
