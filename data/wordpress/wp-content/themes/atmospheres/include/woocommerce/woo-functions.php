<?php // Do not allow direct access to the file.
	if( ! defined( 'ABSPATH' ) ) {
		exit;
	}
	/**
		* WooCommerce Functions
	*/
	/**
		* WooCommerce myaccount page
	*/
	function atmospheres__woo_account () {
		if ( class_exists( 'WooCommerce' ) and !get_theme_mod('atmospheres__header_my_account') ) {
			if ( is_user_logged_in() ) { ?>
			<a class="woo_log" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php echo esc_html('My Account','atmospheres'); ?>"><span class="woo-log-s"><span class="dashicons dashicons-admin-users"></span></span></a>
			<?php } 
			else { ?>
			<a class="woo_log" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php echo esc_html('Login / Register','atmospheres'); ?>"><span class="woo-log-s"><span class="dashicons dashicons-admin-users"></span></span></a>
			<?php } 	
		}
	}
	add_action( 'atmospheres__header_woo_cart', 'atmospheres__woo_account' );
	
		/* WooCommerce Pagination */
	function woocommerce_pagination() { ?>
	<div class="nextpage">
		<div class="pagination">
			<?php echo esc_url(paginate_links()); ?>
		</div> 
	</div>   
	<?php  }
	
	/* View Product Button */
	add_action('woocommerce_after_shop_loop_item','atmospheres_replace_add_to_cart');
	
	function atmospheres_replace_add_to_cart() {
		
		global $product;
		$link = $product->get_permalink();
		echo do_shortcode('<a href="'.$link.'" class="button viewbutton">'. __( "View Product", 'atmospheres' ) .'</a>');
		
	} 	
	
	
	
	

