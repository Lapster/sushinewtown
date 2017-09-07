<?php get_header();

$cats = get_terms('product_cat');

foreach ( $cats as $cat ) :
	$products = get_posts( array(
		'post_type'   => 'product',
		'product_cat'   => $cat->name,
		'posts_per_page' => -1,
	) );
 ?>
	
	<div class="category">
		<h2><?php echo $cat->name; ?></h2>
		<div class="product-slider-container">
		
			<div id="wrapper">
				<span id="controlL" class="left-controls" role="button" aria-label="See Previous Modules">
					<b class="fa fa-chevron-left fa-chevron-left-extra" aria-hidden="true"></b>
				</span>
					
				<div class="product-section">
					<ul id="content">

						<?php foreach ( $products as $post ) : setup_postdata($post);
					 
					 		wc_get_template_part( 'content', 'product' );
					  
						endforeach; wp_reset_postdata(); ?>
					</ul>
				</div><!--end of product-section-->

				<span id="controlR" class="right-controls" role="button" aria-label="See Previous Modules">
					<b class="fa fa-chevron-right fa-chevron-right-extra" aria-hidden="true"></b>
				</span>
			</div><!-- wrapper -->			
		</div><!-- product-slider-container -->
	</div><!-- category -->

<?php endforeach; ?>
<script type="text/javascript">
	// A $( document ).ready() block.
	$=jQuery;
	$( document ).ready(function() {
	    console.log( "ready!" );
	    productContainerResize();

	});	

	//Resize the product container based on the number of products
	function productContainerResize(){
		$('.product-section').each(function(){
			productContainerSize = 0;
			$(this).find('#content .product').each(function(){
				console.log('#content .product');
				safety = 5;
				productMarginLeft = parseInt( $(this).css('margin-left') );
				productPaddingLeft = parseInt( $(this).css('padding-left') );
				productWidth = parseInt( $(this).css('width') );
				productPaddingRight = parseInt( $(this).css('padding-right') );
				productMarginRight = parseInt( $(this).css('margin-right') );

				productTrueWidth = productMarginLeft + productPaddingLeft + productWidth + productPaddingRight + productMarginRight + safety;

				productContainerSize += productTrueWidth;
			});
			$(this).css('width', productContainerSize);
			console.log('productContainerSize='+productContainerSize);
		});
	}

	//Scroll right on products
	$('.right-controls').click(function(){
		console.log('')
		productMarginLeft = Math.abs(parseInt( $(this).closest('#wrapper').find('#content').css('margin-left') ));
		contentWidth = $(this).closest('#wrapper').find('.product-section').width();
		wrapperWidth =  $(this).closest('#wrapper').width();

		targetHTML = $(this).closest('#wrapper').find('#content');

		if(contentWidth > wrapperWidth){
		//Prevent going too far right
			if(productMarginLeft <= (wrapperWidth - productMarginLeft)){
				marginLeftFarthestRight = contentWidth - wrapperWidth;
				marginLeftFarthestRight = '-' + marginLeftFarthestRight + 'px'
				console.log('marginLeftFarthestRight='+marginLeftFarthestRight)
				targetHTML.animate({
					marginLeft: "-=400px"
				}, "fast");
			}else{

				targetHTML.animate({ marginLeft: marginLeftFarthestRight }, "fast");
			}
		}
	});

	//Scroll left on products
	$('.left-controls').click(function() {
		productMarginLeft = parseInt( $(this).closest('#wrapper').find('#content').css('margin-left') );
		targetHTML = $(this).closest('#wrapper').find('#content');

		if(contentWidth > wrapperWidth){
			//Prevent going too far left
			if(productMarginLeft >= 0){
				console.log('left resset')
				targetHTML.animate({
					marginLeft: "0px"
				}, "fast");
			}else{
				targetHTML.animate({
					marginLeft: "+=400px"
				}, "fast");
			}
		}
	 });
</script>
<?php get_footer();