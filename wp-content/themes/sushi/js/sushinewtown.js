// Document ready (page loaded)
jQuery(document).ready(function( $ ) {
	page_autoreload();
});

/*
* page_autoreload()
* Reloads the page every 30 seconds (30000 milliseconds)
*/
function page_autoreload(){
	setTimeout(function(){
		location.reload();
	}, 5000);
}