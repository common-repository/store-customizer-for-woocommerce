<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('OCSCFW_frontend_product')) {

  	class OCSCFW_frontend_product {

	    protected static $OCSCFW_instance;

			function OCSCFW_remove_image_zoom_support() {

				if(is_woocommerce() && (get_theme_mod('ocscfw-wc-remove-product-magnifying') == 1)){
	    			remove_theme_support('wc-product-gallery-zoom');
				}
				if ( is_woocommerce() && (get_theme_mod('ocscfw-wc-remove-product-lightbox') == 1)) {
        		remove_theme_support( 'wc-product-gallery-lightbox' );
   			}
   			if ( is_woocommerce() && (get_theme_mod('ocscfw-wc-remove-product-slider') == 1)) {
        		remove_theme_support( 'wc-product-gallery-slider' );
   			}
   			if ( is_woocommerce() && (get_theme_mod('ocscfw-wc-remove-product-title') == 1) ) {
       		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
  		     	}
  		     	if ( is_woocommerce() && (get_theme_mod('ocscfw-wc-remove-price') == 1) ) {
          		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
  		     	}

			}
			// Remove Product SKU
			function OCSCFW_remove_product_sku( $enabled ){
			   if ( !is_admin() && is_product() ) {
			   	if ( get_theme_mod('ocscfw-remove-product-sku') == 1 ) {
			      	return false;
			      }
			   }
			   return $enabled;
			}

			function OCSCFW_product_header_style(){ ?>
				<style>
					<?php if(get_theme_mod('ocscfw-remove-product-category') == 1){?>
						body.single-product .product_meta .posted_in{
							display: none;
						}
					<?php } ?>
					<?php if(get_theme_mod('ocscfw-remove-product-tag') == 1){?>
						body.single-product .product_meta .tagged_as{
							display: none;
						}
					<?php } ?>
					body.single-product div.product .product_title{
							color: <?php echo esc_attr(get_theme_mod('ocscfw-product-title-color')); ?>;
							font-size: <?php echo esc_attr(get_theme_mod('ocscfw-product-title-font-size')); ?>px;
					}
					body.single-product div.product .price{
							color: <?php echo esc_attr(get_theme_mod('ocscfw-product-price-color')); ?>;
							font-size: <?php echo esc_attr(get_theme_mod('ocscfw-product-price-font-size')); ?>px;
					}
					body.single.single-product .summary form.cart button.single_add_to_cart_button{
							background-color: <?php echo esc_attr(get_theme_mod('ocscfw-product-button-color')); ?>!important;
							color: <?php echo esc_attr(get_theme_mod('ocscfw-product-button-text-color')); ?>!important;
					}
					body.single.single-product .summary form.cart button.single_add_to_cart_button:hover{
							background-color: <?php echo esc_attr(get_theme_mod('ocscfw-product-button-hover-color')); ?>!important;;
							color: <?php echo esc_attr(get_theme_mod('ocscfw-product-button-text-hover-color')); ?>!important;;
					}
				</style>
			<?php }


			function OCSCFW_rename_tab( $tabs ) {

				global $product;

				if(get_theme_mod('ocscfw-wcproduct-desc-tab') == 'ocscfw-wcproduct-desc-tab-edit'){
						$tabs['description']['title'] = get_theme_mod('ocscfw-change-description-title' , 'Description');
				}
				if (get_theme_mod('ocscfw-product-addinfo-tab') == 'ocscfw-product-addinfo-tab-edit'){
						$tabs['additional_information']['title'] = get_theme_mod('ocscfw-change-addinfo-title' , 'Additional Information');
				}
				if (get_theme_mod('ocscfw-product-review-tab') == 'ocscfw-product-review-tab-edit'){
						$tabs['reviews']['title'] =get_theme_mod('ocscfw-change-review-title' , 'Reviews').'(' . $product->get_review_count() . ') ';
				}
				return $tabs;
			}


			function OCSCFW_remove_product_tabs( $tabs ) {

				if(get_theme_mod('ocscfw-wcproduct-desc-tab') == 'ocscfw-wcproduct-desc-tab-remove'){

					unset( $tabs['description'] );  

					return $tabs;      
				}

				if(get_theme_mod('ocscfw-product-addinfo-tab') == 'ocscfw-product-addinfo-tab-remove'){

					unset( $tabs['additional_information'] );

					return $tabs; 

				}
				if(get_theme_mod('ocscfw-product-review-tab') == 'ocscfw-product-review-tab-remove'){

					unset( $tabs['reviews'] );  

					return $tabs; 

				}

					return $tabs;

			}


			function OCSCFW_description_heading( $heading ){

				if(get_theme_mod('ocscfw-wcproduct-desc-tab') == 'ocscfw-wcproduct-desc-tab-edit'){

						return get_theme_mod('ocscfw-change-description-heading','Description');

				}else{

						return $heading;

				}

			}

			function OCSCFW_additional_info_heading( $heading ){

				if(get_theme_mod('ocscfw-product-addinfo-tab') == 'ocscfw-product-addinfo-tab-edit'){

						return get_theme_mod('ocscfw-change-addinfo-heading','Additional Information');

				}else{

						return $heading;

				}

			}


    	function init() {
    		add_action( 'wp', array($this,'OCSCFW_remove_image_zoom_support'), 100 );
    		add_filter( 'wc_product_sku_enabled',array($this, 'OCSCFW_remove_product_sku' ));
    		add_filter( 'wp_head',array($this, 'OCSCFW_product_header_style' ));
    		add_filter( 'woocommerce_product_tabs', array($this,'OCSCFW_rename_tab') );
    		add_filter( 'woocommerce_product_tabs', array($this,'OCSCFW_remove_product_tabs'), 98 );
    		add_filter( 'woocommerce_product_description_heading',array($this, 'OCSCFW_description_heading' ));
    		add_filter( 'woocommerce_product_additional_information_heading',array($this, 'OCSCFW_additional_info_heading') );
    	
    	}

	   	public static function OCSCFW_instance() {
		      	if (!isset(self::$OCSCFW_instance)) {
		        		self::$OCSCFW_instance = new self();
		        		self::$OCSCFW_instance->init();
		      	}
		      return self::$OCSCFW_instance;
		   	}
	  	}

  	OCSCFW_frontend_product::OCSCFW_instance();
}