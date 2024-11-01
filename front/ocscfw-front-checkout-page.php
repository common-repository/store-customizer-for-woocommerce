<?php
if (!defined('ABSPATH'))
  exit;

if (!class_exists('OCSCFW_frontend_checkout')) {

  	class OCSCFW_frontend_checkout {

	    protected static $OCSCFW_instance;


	   
		  function wcz_coupon_message(){
	    		return esc_html( get_theme_mod('ocscfw-checkout-coupon-code-text' , 'Have a coupon?') ) . ' <a href="#" class="showcoupon">' . esc_html( get_theme_mod('ocscfw-checkout-coupon-code-link' , 'Click here to enter your code.')  ) . '</a>';
			}

			function wcz_edit_checkout_ordernotes_txt( $fields ){
				if(get_theme_mod('ocscfw-checkout-edit-order-notes-text') == 1 ){
			    	$fields['order']['order_comments']['label'] = get_theme_mod( 'ocscfw-checkout-edit-order-label-text' , 'Order notes' );
			    	$fields['order']['order_comments']['placeholder'] = get_theme_mod( 'ocscfw-checkout-edit-order-label-placeholder', 'Notes about your order, e.g. special notes for delivery.' );
			  }
			    return $fields;
			}

			function OCSCFW_frontend_checkout_template(){
			 	if(get_theme_mod('ocscfw-checkout-coupon-section-text') == 1 ){
			 		add_filter( 'woocommerce_checkout_coupon_message',array($this, 'wcz_coupon_message') );
			 	}
			}


			function OCSCFW_edit_checkout_placeorder_btn_txt( $button_text ){
				if(get_theme_mod('ocscfw-checkout-customize-place-order') == 1){
					 	return esc_html( get_theme_mod('ocscfw-checkout-customize-place-order-text' , 'Place Order') );
				}else{
						return $button_text;
				}
				
			}

			function OCSCFW_woocommerce_edit_checkout_coupon_instruction_text( $translated ){
				 	if(get_theme_mod('ocscfw-checkout-coupon-section-text') == 1 ){
			    $translated = str_ireplace( 'If you have a coupon code, please apply it below.', get_theme_mod('ocscfw-checkout-coupon-text' , 'If you have a coupon code, please apply it below.'), $translated );
			    }
			    return $translated;
			}

			// Change the 'Billing details' checkout label to 'Contact Information'
			function OCSCFW_edit_checkout_page_headings($translated_text, $text, $domain ){
				if(get_theme_mod('ocscfw-customize-checkout-heading')){
				    switch ( $translated_text ) {
			        case 'Billing details':
		            $translated_text = get_theme_mod('ocscfw-checkout-billing-detail-heading');
		            break;
			        case 'Additional information':
		            $translated_text = get_theme_mod('ocscfw-checkout-additional-detail-heading');
		            break;
			        case 'Ship to a different address?':
		            $translated_text = get_theme_mod('ocscfw-checkout-shipping-heading');
		            break;
			        case 'Your order':
		            $translated_text = get_theme_mod('ocscfw-checkout-yr-order-heading');
		            break;
				    }
			    }
			  return $translated_text;
			}
			

			function OCSCFW_edit_checkout_ordernotes_txt( $fields ){
			
				if(get_theme_mod('ocscfw-checkout-remove-firstname') == 1){
					 unset( $fields['billing']['billing_first_name'] );
					 unset( $fields['billing']['billing_first_name']['validate'] );
				}
				if(get_theme_mod('ocscfw-checkout-remove-ship-firstname') == 1){
					 unset( $fields['shipping']['shipping_first_name'] );
					 unset( $fields['shipping']['shipping_first_name']['validate'] );
				}
				if(get_theme_mod('ocscfw-checkout-remove-lastname') == 1){
					unset( $fields['billing']['billing_last_name'] );
				 	unset( $fields['billing']['billing_last_name']['validate'] );
				}
				if(get_theme_mod('ocscfw-checkout-remove-ship-lastname') == 1){
					unset( $fields['shipping']['shipping_last_name'] );
				 	unset( $fields['shipping']['shipping_last_name']['validate'] );
				}
				if(get_theme_mod('ocscfw-checkout-remove-companyname')== 1){
					unset( $fields['billing']['billing_company'] );
        	unset( $fields['billing']['billing_company']['validate'] );
				}
				if(get_theme_mod('ocscfw-checkout-remove-ship-companyname')== 1){
					unset( $fields['shipping']['shipping_company'] );
        	unset( $fields['shipping']['shipping_company']['validate'] );
				}
				if(get_theme_mod('ocscfw-checkout-remove-billing-country')== 1){
					unset( $fields['billing']['billing_country'] );
        	unset( $fields['billing']['billing_country']['validate'] );
				}
				if(get_theme_mod('ocscfw-checkout-remove-shipping-country')== 1){
					unset( $fields['shipping']['shipping_country'] );
        	unset( $fields['shipping']['shipping_country']['validate'] );
				}
				if(get_theme_mod('ocscfw-checkout-remove-billing-address-1')== 1){
					unset( $fields['billing']['billing_address_1'] );
        	unset( $fields['billing']['billing_address_1']['validate'] );
				}
				if(get_theme_mod('ocscfw-checkout-remove-shipping-address-1')== 1){
					unset( $fields['shipping']['shipping_address_1'] );
        	unset( $fields['shipping']['shipping_address_1']['validate'] );
				}
				if(get_theme_mod('ocscfw-checkout-remove-billing-address-2')== 1){
					unset( $fields['billing']['billing_address_2'] );
        	unset( $fields['billing']['billing_address_2']['validate'] );
				}
				if(get_theme_mod('ocscfw-checkout-remove-shipping-address-2')== 1){
					unset( $fields['shipping']['shipping_address_2'] );
        	unset( $fields['shipping']['shipping_address_2']['validate'] );
				}
				if(get_theme_mod('ocscfw-checkout-remove-billing-city')== 1){
					unset( $fields['billing']['billing_city'] );
        	unset( $fields['billing']['billing_city']['validate'] );
				}
				if(get_theme_mod('ocscfw-checkout-remove-shipping-city')== 1){
					unset( $fields['shipping']['shipping_city'] );
        	unset( $fields['shipping']['shipping_city']['validate'] );
				}
				if(get_theme_mod('ocscfw-checkout-remove-billing-state')== 1){
					unset( $fields['billing']['billing_state'] );
        	unset( $fields['billing']['billing_state']['validate'] );
				}
				if(get_theme_mod('ocscfw-checkout-remove-shipping-state')== 1){
					unset( $fields['shipping']['shipping_state'] );
        	unset( $fields['shipping']['shipping_state']['validate'] );
				}
				if(get_theme_mod('ocscfw-checkout-remove-billing-postcode')== 1){
					unset( $fields['billing']['billing_postcode'] );
        	unset( $fields['billing']['billing_postcode']['validate'] );
				}
				if(get_theme_mod('ocscfw-checkout-remove-shipping-postcode')== 1){
					unset( $fields['shipping']['shipping_postcode'] );
        	unset( $fields['shipping']['shipping_postcode']['validate'] );
				}
				if(get_theme_mod('ocscfw-checkout-remove-billing-phone')== 1){
					unset( $fields['billing']['billing_phone'] );
        	unset( $fields['billing']['billing_phone']['validate'] );
				}
				if(get_theme_mod('ocscfw-checkout-remove-shipping-phone')== 1){
					unset( $fields['shipping']['shipping_phone'] );
        	unset( $fields['shipping']['shipping_phone']['validate'] );
				}
				if(get_theme_mod('ocscfw-checkout-remove-billing-email')== 1){
					unset( $fields['billing']['billing_email'] );
        	unset( $fields['billing']['billing_email']['validate'] );
				}
				if(get_theme_mod('ocscfw-checkout-remove-shipping-email')== 1){
					unset( $fields['shipping']['shipping_email'] );
        	unset( $fields['shipping']['shipping_email']['validate'] );
				}

				return $fields;
			}

			function OCSCFW_checkout_page_design_css(){?>
				<style>
						body.woocommerce-checkout #payment button#place_order{
							background-color:<?php echo  esc_attr(get_theme_mod('ocscfw-checkout-place-order-background-color')); ?>;
							color: <?php echo esc_attr(get_theme_mod('ocscfw-checkout-place-order-text-color')); ?>;
						}
						body.woocommerce-checkout #payment button#place_order:hover{
							background-color:<?php echo esc_attr(get_theme_mod('ocscfw-checkout-place-order-background-hvr-color')); ?>;
							color: <?php echo esc_attr(get_theme_mod('ocscfw-checkout-place-order-text-hvr-color')); ?>;
						}
				</style>
			<?php 
			}
	    function init(){
	    	add_filter( 'template_redirect', array($this,'OCSCFW_frontend_checkout_template'));
	    	add_filter( 'gettext', array($this, 'OCSCFW_woocommerce_edit_checkout_coupon_instruction_text' ));
	    	add_filter( 'woocommerce_checkout_fields', array($this,'OCSCFW_edit_checkout_ordernotes_txt' ));
	    	add_filter( 'woocommerce_order_button_text', array($this,'OCSCFW_edit_checkout_placeorder_btn_txt' ));
	    	add_filter( 'wp_head',array($this, 'OCSCFW_checkout_page_design_css'));
	    	add_filter( 'gettext', array($this, 'OCSCFW_edit_checkout_page_headings' ),20,3);
	    }
	    public static function OCSCFW_instance() {
	      	if (!isset(self::$OCSCFW_instance)) {
	        	self::$OCSCFW_instance = new self();
	        	self::$OCSCFW_instance->init();
	      	}
	      return self::$OCSCFW_instance;
	    }
  	}

  OCSCFW_frontend_checkout::OCSCFW_instance();
}