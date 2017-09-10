<?php
/**
** unhook the woo commerce wrappers
*/

// Or just remove them all in one line

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
//add_filter( 'woocommerce_enqueue_styles', '__return_false');



function woo_custom_cart_button_text() {
	return __( 'Order', 'woocommerce' );

}
add_filter( 'woocommerce_product_add_to_cart_text', 'woo_custom_cart_button_text' );    // < 2.1



// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php).
// Used in conjunction with https://gist.github.com/DanielSantoro/1d0dc206e242239624eb71b2636ab148
// Compatible with 3.0.1+, for lower versions, remove "woocommerce_" from the first mention on Line 4
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	
	ob_start();
	
	?>
	<a class="cart-customlocation" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?>
		<img src="<?php echo get_stylesheet_directory_URI() . '/img/icon-cart.png' ?>" width="20px" height="26px"/>
	</a>
	<?php
	
	$fragments['a.cart-customlocation'] = ob_get_clean();
	
	return $fragments;
	
}


// Change the product thumbnail placeholder image
function product_placeholder_thumbnail() {
  add_filter('woocommerce_placeholder_img_src', 'custom_woocommerce_placeholder_img_src');
   
	function custom_woocommerce_placeholder_img_src( $src ) {
	//$upload_dir = wp_upload_dir();
	//$uploads = untrailingslashit( $upload_dir['baseurl'] );
	//$src = $uploads . '/2012/07/thumb1.jpg';
	 
		$src = get_stylesheet_directory_URI() . '/img/placeholder.jpg'; 
	return $src;
	}
}
add_action( 'init', 'product_placeholder_thumbnail' );



function my_theme_scripts() {
    wp_enqueue_script( 'mCustomScrollbar', get_stylesheet_directory_URI() . '/js/jquery.mCustomScrollbar.min.js', array( 'jquery' ), '1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

?>