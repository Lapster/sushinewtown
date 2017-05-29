jQuery(document).ready(function($){
	eventOnResize();
	$(window).resize(function(){eventOnResize();});
	/* eventOnScroll();
	$(window).scroll(function(){eventOnScroll();}); */
	
	$(".header-row-1-toggle").click(function(){
		$('.header-row-1').toggleClass('open');
        return false;
    });
	$(".side-page-toggle").click(function(){
		$('#side-page-overlay').fadeIn();
		$('#side-page').animate({left:0},400);
        return false;
    });
	$(".side-page-close").click(function(){
		$('#side-page-overlay').fadeOut();
		$('#side-page').animate({left:-351},400);
        return false;
    });
});

function eventOnScroll(){
	
}
function eventOnResize(){
	var header2_height = jQuery('.header-row-2').innerHeight();
	if(!jQuery('.header-row-2').parent().hasClass('header-row-2-wrapp')){
		jQuery('.header-row-2').wrap('<div class="header-row-2-wrapp"></div>');
	}
	jQuery('.header-row-2-wrapp').css('min-height',header2_height);
	fluidBox();
}

function fluidBox(){
	if(jQuery('[data-fluid]').length>0){
		jQuery('[data-fluid]').each(function(){
			var data = jQuery(this).attr('data-fluid');
			var dataFloat = jQuery(this).attr('data-float');
			var dataFixed = jQuery(this).attr('data-fluid-fixed');
			var _container = jQuery(this);
			var dataSplit = data.split(',');
			if(_container.hasClass('carousel')){
				_container.find('.item').addClass('show');
			}
			for(i=0;i<dataSplit.length;i++){
				if(dataSplit[i]!=''){
					if(jQuery(dataSplit[i],_container).length>0){
						if(dataFixed=='true')
							jQuery(dataSplit[i],_container).css('height','auto');
						else
							jQuery(dataSplit[i],_container).css('min-height','inherit');
						if( dataFloat=='true' && jQuery(dataSplit[i],_container).parent().css('float')!='none' ){
							var newH = 0;
							if(jQuery(dataSplit[i],_container).length>0){
								jQuery(dataSplit[i],_container).each(function(){
									var thisH = jQuery(this).innerHeight();
									if( newH<thisH ) newH = thisH;
								});
								if(dataFixed=='true')
									jQuery(dataSplit[i],_container).css('height',newH);
								else
									jQuery(dataSplit[i],_container).css('min-height',newH);
							}
						}else if(dataFloat!='true'){
							var newH = 0;
							if(jQuery(dataSplit[i],_container).length>0){
								jQuery(dataSplit[i],_container).each(function(){
									var thisH = jQuery(this).innerHeight();
									if( newH<thisH ) newH = thisH;
								});
								if(dataFixed=='true')
									jQuery(dataSplit[i],_container).css('height',newH);
								else
									jQuery(dataSplit[i],_container).css('min-height',newH);
							}
						}
					}
				}
			}
			if(_container.hasClass('carousel')){
				_container.find('.item').removeClass('show');
			}
		});
	}
}