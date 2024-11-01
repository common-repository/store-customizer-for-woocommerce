<?php
if (!defined('ABSPATH'))
  exit;

if (!class_exists('OCSCFW_frontend_cart')) {

  	class OCSCFW_frontend_cart {

	    protected static $OCSCFW_instance;

	    function OCSCFW_disable_coupon_field_on_cart( $enabled ) {

	    	if(get_theme_mod('ocscfw-remove-product-coupon') == 1 &&  is_cart()){

					if ( is_cart() ) {

						$enabled = false;

					}

				}

				return $enabled;

			}

			function OCSCFW_disable_cart_item_quantity( $product_quantity, $cart_item_key, $cart_item ){

					if(get_theme_mod('ocscfw-remove-cart-quantity-editable') == 1 &&  is_cart()){

						$product_quantity = sprintf( '%2$s <input type="hidden" name="cart[%1$s][qty]" value="%2$s" />', esc_html( $cart_item_key ), esc_html( $cart_item['quantity'] ) );

					}

			    return $product_quantity;

			}

			function OCSCFW_add_cart_page_categories( $cart_item, $cart_item_key ){

				if(get_theme_mod('ocscfw-product-detail-show-cat') == 1){

						$product_item = $cart_item['data'];
				    // make sure to get parent product if variation
				    if ( $product_item->is_type( 'variation' ) ) {
				        $product_item = wc_get_product( $product_item->get_parent_id() );
				    }
				    $cat_ids = $product_item->get_category_ids();
				    // if product has categories, concatenate cart item name with them
				    echo  ( $cat_ids ? '<div class="ocscfw-cart-cats">' . wc_get_product_category_list( $product_item->get_id(), ', ', '<span class="posted_in">'. _n( 'Category:','Categories:', count( $cat_ids ), 'woocustomizer') . ' ',) : '' );

				}

			}

			function OCSCFW_add_cart_page_stock( $cart_item, $cart_item_key ){

				if(get_theme_mod('ocscfw-product-stock-information') == 1){
			    $product = $cart_item['data'];
			    if ( $product->backorders_require_notification() && $product->is_on_backorder( $cart_item['quantity'] ) ) {
			        return;
			    }
			    echo  ( wc_get_stock_html( $product ) ? '<div class="ocscfw-cart-stock">' . wc_get_stock_html( $product ) . '</div>' : '' ) ;
			  }
			}

			function OCSCFW_edit_empty_cart_btn_text( $translated_text ){
			    switch ( $translated_text ) {
			        case 'Return to shop':
			            $translated_text = esc_html( get_theme_mod('ocscfw-edit-rts-button-text' , 'Return to shop') );
			            break;
			    }
			    return $translated_text;
			}

			function OCSCFW_product_link(){

				if(get_theme_mod('ocscfw-remove-cart-product-link') == 1){
						add_filter( 'woocommerce_cart_item_permalink', '__return_null' );
				}
				if(get_theme_mod('ocscfw-product-selected-variation') == 1){
					 	add_filter( 'woocommerce_product_variation_title_include_attributes', '__return_false' );
       			add_filter( 'woocommerce_is_attribute_in_product_name', '__return_false' );
				}
				if ( is_cart() && get_theme_mod('ocscfw-cart-empty-message-edit') == 1 ) {
	        	add_filter('gettext',array($this, 'OCSCFW_edit_empty_cart_btn_text'), 20,  3 );
    		}
			}

			function OCSCFW_custom_empty_cart_message() {
				if(get_theme_mod('ocscfw-cart-empty-message-edit') == 1){
					$html  = '<div class="col-12 offset-md-1 col-md-10"><p class="cart-empty">';
			    $html .= wp_kses_post( apply_filters( 'wc_empty_cart_message', __( get_theme_mod('ocscfw-heading-cart-empty-message' , 'Your cart is currently empty'), 'woocommerce' ) ) );
			    echo esc_attr($html) . '</p></div>';
				}else{
					$html  = '<div class="col-12 offset-md-1 col-md-10"><p class="cart-empty">';
			    $html .= wp_kses_post( apply_filters( 'wc_empty_cart_message', __( get_theme_mod('ocscfw-heading-cart-empty-message' , 'Your cart is currently empty'), 'woocommerce' ) ) );
			    echo esc_attr($html) . '</p></div>';
				}
			}

			function OCSCFW_cart_page_design_css(){?>
					<style>
						body.woocommerce-cart .woocommerce-cart-form .coupon button.button,
						body.woocommerce-cart .woocommerce-cart-form .actions button.button{
							background-color:<?php echo  esc_attr(get_theme_mod('ocscfw-cart-table-button-color')); ?>;
							color: <?php echo esc_attr(get_theme_mod('ocscfw-cart-table-button-text-color')); ?>
						}
						body.woocommerce-cart .woocommerce-cart-form .coupon button.button:hover,
						body.woocommerce-cart .woocommerce-cart-form .actions button.button:hover{
							background-color:<?php echo esc_attr(get_theme_mod('ocscfw-cart-table-button-color-hvr')); ?>;
							color: <?php echo esc_attr(get_theme_mod('ocscfw-cart-table-button-text-color-hvr')); ?>
						}
						body.woocommerce-cart .wc-proceed-to-checkout a.button.checkout-button{
							background-color:<?php echo esc_attr(get_theme_mod('ocscfw-cart-ptc-chnge-color')); ?>;
							color: <?php echo esc_attr(get_theme_mod('ocscfw-cart-ptc-text-color')); ?>
						}
						body.woocommerce-cart .wc-proceed-to-checkout a.button.checkout-button:hover{
							background-color:<?php echo esc_attr(get_theme_mod('ocscfw-cart-ptc-chnge-color-hvr')); ?>;
							color: <?php echo esc_attr(get_theme_mod('ocscfw-cart-ptc-chnge-text-color-hvr')); ?>;
						}
					</style>
				<?php 
			}
				
	    function init(){
	    		add_action('template_redirect',array($this,'OCSCFW_product_link'),10);
	    		add_filter('woocommerce_coupons_enabled', array($this,'OCSCFW_disable_coupon_field_on_cart') );
	    		add_filter('woocommerce_cart_item_quantity', array($this,'OCSCFW_disable_cart_item_quantity'),10,3);
	    		add_action('woocommerce_after_cart_item_name', array($this,'OCSCFW_add_cart_page_categories'), 99, 3 );
	    		add_action('woocommerce_after_cart_item_name', array($this, 'OCSCFW_add_cart_page_stock'), 99,2 );
	    		remove_action('woocommerce_cart_is_empty', 'wc_empty_cart_message', 10 );
					add_action( 'woocommerce_cart_is_empty', array($this, 'OCSCFW_custom_empty_cart_message'), 10 );
					add_action( 'wp_head',array($this, 'OCSCFW_cart_page_design_css'));
	    }

	    public static function OCSCFW_instance() {
	      	if (!isset(self::$OCSCFW_instance)) {
	        	self::$OCSCFW_instance = new self();
	        	self::$OCSCFW_instance->init();
	      	}
	      return self::$OCSCFW_instance;
	    }
  	}

  OCSCFW_frontend_cart::OCSCFW_instance();
}