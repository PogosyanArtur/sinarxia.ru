/* Import Bootstrap js Modulus*/

import "bootstrap/js/dist/util";

// import "../../node_modules/bootstrap/js/dist/alert";
// import "../../node_modules/bootstrap/js/dist/button";
// import "../../node_modules/bootstrap/js/dist/carousel";
import "bootstrap/js/dist/collapse";
import "bootstrap/js/dist/dropdown";
// import "../../node_modules/bootstrap/js/dist/modal";
// import "../../node_modules/bootstrap/js/dist/popover";
// import "../../node_modules/bootstrap/js/dist/scrollspy";
import "bootstrap/js/dist/tab";
// import "../../node_modules/bootstrap/js/dist/toast";
// import "../../node_modules/bootstrap/js/dist/tooltip";


jQuery.noConflict();
  (function( $ ) {

	$('#goods_categoryTub a:first').tab('show')
	$('#service_categoryTub a:first').tab('show')
	$('#singlePageTab a:first').tab('show')



})(jQuery);

