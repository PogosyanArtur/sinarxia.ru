/* 
	=============================================================
	Import Bootstrap js Modulus
	==========================================================
*/

import "../bower_components/bootstrap4/js/dist/util";

// import "../bower_components/bootstrap4/js/dist/alert";
// import "../bower_components/bootstrap4/js/dist/button";
// import "../bower_components/bootstrap4/js/dist/carousel";
import "../bower_components/bootstrap4/js/dist/collapse";
import "../bower_components/bootstrap4/js/dist/dropdown";
// import "../bower_components/bootstrap4/js/dist/modal";
// import "../bower_components/bootstrap4/js/dist/popover";
// import "../bower_components/bootstrap4/js/dist/scrollspy";
import "../bower_components/bootstrap4/js/dist/tab";
// import "../bower_components/bootstrap4/js/dist/toast";
// import "../bower_components/bootstrap4/js/dist/tooltip";

/* 
	=============================================================
	Import Jquery ui modulus
	==========================================================
*/

import "../bower_components/jquery-ui/ui/core";
import "../bower_components/jquery-ui/ui/widget";
import "../bower_components/jquery-ui/ui/widgets/menu";




jQuery.noConflict();
  (function( $ ) {
	$('#products_preview_tabs a:first').tab('show')
	$('#service_preview_tabs a:first').tab('show')
	$('#rent_preview_tabs a:first').tab('show')
	$('#singlePageTab a:first').tab('show')
})(jQuery);

