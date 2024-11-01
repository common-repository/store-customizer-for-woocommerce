<?php
if (!defined('ABSPATH'))
  exit;

if (!class_exists('OCSCFW_frontend_shop')) {

  	class OCSCFW_frontend_shop {

	    protected static $OCSCFW_instance;

	    function OCSCFW_woocommerce_extras(){
				if(get_theme_mod('ocscfw-wc-remove-breadcrumbs') == 1){
						remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
				}
				if(get_theme_mod('ocscfw-wc-remove-shop-breadcrumb') == 1){
					if (is_shop()){
						remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
					}
				}
				if(get_theme_mod('ocscfw-wc-remove-product-breadcrumb') == 1){
					if ( is_product() ){
							remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
					}
				}
				if(get_theme_mod('ocscfw-shop-archive-breadcrumbs') == 1){
					if (  is_product_category() ){
							remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
					}
				}
			}

			function OCSCFW_hide_shop_page_title($title) {
				if(get_theme_mod('ocscfw-wc-remove-shop-title') == 1){
				   	if (is_shop()) 	$title = false;
				   		return $title;
				}else{
							return $title;
				}
			}

			function OCSCFW_loop_shop_per_page( $cols ) {
			  	if(!empty(get_theme_mod('ocscfw-product-per-page'))){
			  		$cols = get_theme_mod('ocscfw-product-per-page');
			 	 		return $cols;
			  	}else{
			  		return $cols;
			  	}
			}

			function OCSCFW_loop_columns() {
				if(!empty(get_theme_mod('ocscfw-product-per-row'))){
					return get_theme_mod('ocscfw-product-per-row');
				}else{
					return 3;
				}
			}

			function OCSCFW_change_sale_text() {
				if(!empty(get_theme_mod('ocscfw-product-sale-banner-text'))){
					return '<span class="onsale">'.get_theme_mod('ocscfw-product-sale-banner-text').'</span>';
				}else{
					return '<span class="onsale">Sale!</span>';
				}
			}

		
			function OCSCFW_remove_all_action(){
				if(get_theme_mod('ocscfw-wc-remove-shop-filter-drop') == 1){
						remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
				}
				if(get_theme_mod('ocscfw-shop-sorting-result') == 1){
	   	 			remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
		    		remove_action( 'woocommerce_after_shop_loop' , 'woocommerce_result_count', 20 );
		    }
			}	

			
			function OCSCFW_design_shop_archive(){ ?>
				<style>
						<?php if(get_theme_mod('ocscfw-shop-archive-title-remove') == 1){ ?> 
							body.tax-product_cat header.woocommerce-products-header,
							body.tax-product_tag header.woocommerce-products-header{
								display: none;
							}
						<?php } ?>
					</style>
					<?php 
			}

			function OCSCFW_texts_variable_button(){
			    $product = wc_get_product( get_the_ID() );
			    if ( !isset( $product ) ) {
			        return;
			    }
			    $product_type = $product->get_type();

			    switch ( $product_type ) {
		        	case "variable":
			        	if(!empty(get_theme_mod('ocscfw-shop-page-button-varition-produtct'))){
			        		 return get_theme_mod('ocscfw-shop-page-button-varition-produtct');
			        	}else{
			        		 return 'Select Option';
			        	}
		            break;

		        	case "grouped":
	        			if(!empty(get_theme_mod('ocscfw-shop-page-button-groped-produtct'))){
			        		 return get_theme_mod('ocscfw-shop-page-button-groped-produtct');
			        	}else{
			        		 return 'View products';
			        	}
		            break;

		        	case "external":
		            return esc_html( $product->get_button_text() );
		            break;

		        	default:
	        			if(!empty(get_theme_mod('ocscfw-shop-page-button-simple-produtct'))){
			        		 return get_theme_mod('ocscfw-shop-page-button-simple-produtct');
			        	}else{
			        		 return 'Add To Cart';
			        	} 
			    }
			}	


			function init() {
				add_action('wp', array($this,'OCSCFW_remove_all_action'));
       	add_action('template_redirect',  array($this,'OCSCFW_woocommerce_extras'));
       	add_filter('woocommerce_show_page_title',array($this, 'OCSCFW_hide_shop_page_title'));
       	add_filter('loop_shop_per_page', array($this,'OCSCFW_loop_shop_per_page'), 20 );
       	add_filter('loop_shop_columns',array($this, 'OCSCFW_loop_columns'), 999);
       	add_filter('woocommerce_sale_flash', array($this, 'OCSCFW_change_sale_text'));
       	add_filter('woocommerce_product_add_to_cart_text',array($this, 'OCSCFW_texts_variable_button') );
       	add_action('wp_head', array($this,'OCSCFW_design_shop_archive'));
       	
       	
	    }

	    public static function OCSCFW_instance() {
	      if (!isset(self::$OCSCFW_instance)) {
	        self::$OCSCFW_instance = new self();
	        self::$OCSCFW_instance->init();
	      }
	      return self::$OCSCFW_instance;
	    }

  	}

  OCSCFW_frontend_shop::OCSCFW_instance();
}