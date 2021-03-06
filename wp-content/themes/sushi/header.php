<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html id="top" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<title><?php wp_title(); ?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_URI() . '/css/reset.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_URI() . '/css/bootstrap.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_URI() . '/css/font-awesome.min.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_URI() . '/css/jquery.mCustomScrollbar.min.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_URI() . '/style.css' ?>">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
	 <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="text-center">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<img class="logo" src="<?php echo get_stylesheet_directory_URI() . '/img/logo.png' ?>" width="240px" height="220px" />
	</a>
</div>
<div class="container">
	<div class="header">

		<div class="menu">
			<ul>
				<li>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo get_stylesheet_directory_URI() . '/img/icon-home.png' ?>"/>
					</a>
				</li>
				<li>
					<a href="#footer-information">
						<img src="<?php echo get_stylesheet_directory_URI() . '/img/icon-contact.png' ?>" width="29px" height="20px"/>
					</a>
				</li>
				<li>
					<a href="https://www.instagram.com/sushinewtown/" target="_blank">
						<img src="<?php echo get_stylesheet_directory_URI() . '/img/icon-social-instagram.png' ?>" width="20px" height="20px"/>
					</a>
				</li>
				<li>
					<a href="https://www.facebook.com/SushiNewtown/" target="_blank">
						<img src="<?php echo get_stylesheet_directory_URI() . '/img/icon-social-facebook.png' ?>" width="10px" height="20px"/>
					</a>
				</li>
			</ul>
		</div>

		<div class="nav">
			<ul>
				<li>
				<?php 
					if( is_user_logged_in() )
					{
				?>

					<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="My Account?>">My Account</a>

				<?php 

					} else {

				?>
					<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="Login?>">Login</a>

				<?php 
					} 
				?>
				
				</li>
				<li>
					<a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?>
					</a>
					<img src="<?php echo get_stylesheet_directory_URI() . '/img/icon-cart.png' ?>" width="20" height="17"/>
				</li>
			</ul>
		</div>
	</div>