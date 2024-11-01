<?php
/**
*Plugin Name: Store Customizer For Woocommerce
*Description: This plugin woocommerce customize.
* Version: 1.0
* Author: Ocean Infotech
* Author URI: https://www.xeeshop.com
* Copyright: 2019
*/

if (!defined('ABSPATH')) {
  die('-1');
}
if (!defined('OCSCFW_PLUGIN_NAME')) {
  define('OCSCFW_PLUGIN_NAME', 'Woocommerce Gift Product');
}
if (!defined('OCSCFW_PLUGIN_VERSION')) {
  define('OCSCFW_PLUGIN_VERSION', '1.0.0');
}
if (!defined('OCSCFW_PLUGIN_FILE')) {
  define('OCSCFW_PLUGIN_FILE', __FILE__);
}
if (!defined('OCSCFW_PLUGIN_DIR')) {
  define('OCSCFW_PLUGIN_DIR',plugins_url('', __FILE__));
}
if (!defined('OCSCFW_DOMAIN')) {
  define('OCSCFW_DOMAIN', 'ocscfw');
}
if (!defined('OCSCFW_BASE_NAME')) {
    define('OCSCFW_BASE_NAME', plugin_basename(OCSCFW_PLUGIN_FILE));
}

if (!class_exists('OCSCFW')) {

  	class OCSCFW {

	    protected static $OCSCFW_instance;
	    /**
	   	* Constructor.
	   	*
	   	* @version 3.2.3
	   	*/
	    function __construct() {
	        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	        //check plugin activted or not
	        add_action('admin_init', array($this, 'OCSCFW_check_plugin_state'));
	    }

	    function OCSCFW_check_plugin_state() {
	      	if ( ! ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) ) {
	        	set_transient( get_current_user_id() . 'ocscfwerror', 'message' );
	      	}
	    }

	    function init() {
	    	add_action( 'customize_controls_enqueue_scripts', array( $this, 'OCSCFW_customizer_enqueue_styles' ), 10 );
	      add_filter( 'plugin_row_meta', array( $this, 'OCSCFW_plugin_row_meta' ), 10, 2 );
	      add_action( 'admin_notices', array($this, 'OCSCFW_show_notice'));
	      add_action( 'admin_enqueue_scripts', array($this, 'OCSCFW_load_admin'));
	    }


	    public function OCSCFW_customizer_enqueue_styles( $hook = '' ) {
	    	$shop_url = get_permalink( wc_get_page_id( 'shop' ) );
        $cart_url = get_permalink( wc_get_page_id( 'cart' ) );
        $checkout_url = get_permalink( wc_get_page_id( 'checkout' ) );
        $account_url = get_permalink( wc_get_page_id( 'myaccount' ) );
	    		wp_enqueue_style( 'OCSCFW_admin_style', OCSCFW_PLUGIN_DIR . '/includes/css/customizer.css', false, '1.0.0' );
	    		wp_enqueue_script( 'OCSCFW_front_script', OCSCFW_PLUGIN_DIR . '/includes/js/custom-customizer.js',array("jquery"));
	    		wp_localize_script( 'OCSCFW_front_script', 'OCWGWdata', 
							array(
								'shop'     => esc_url( $shop_url ),
		            'checkout' => esc_url( $checkout_url ),
		            'cart'     => esc_url( $cart_url ),
		            'account'  => esc_url( $account_url ),
		            'product'  => esc_url( $product_url ),
									
							)
         	);
    	}

    	function OCSCFW_load_admin() {
    			wp_enqueue_style( 'OCSCFW_admin_backstyle', OCSCFW_PLUGIN_DIR . '/includes/css/backend.css', false, '1.0.0' );
    	}



    	function OCSCFW_plugin_row_meta( $links, $file ) {
          if ( OCSCFW_BASE_NAME === $file ) {
              $row_meta = array(
                  'rating'    =>  '<a href="https://www.xeeshop.com/support-us/?utm_source=aj_plugin&utm_medium=plugin_support&utm_campaign=aj_support&utm_content=aj_wordpress" target="_blank">Support</a> |<a href="#" target="_blank"><img src="'.OCSCFW_PLUGIN_DIR.'/includes/images/star.png" class="ocscfw_rating_div"></a>',
              );

              return array_merge( $links, $row_meta );
          }
          return (array) $links;
    	}

	    function OCSCFW_show_notice() {
	        if ( get_transient( get_current_user_id() . 'ocscfwerror' ) ) {

	          	deactivate_plugins( plugin_basename( __FILE__ ) );

	          	delete_transient( get_current_user_id() . 'ocscfwerror' );

	          	echo '<div class="error"><p> This plugin is deactivated because it require <a href="plugin-install.php?tab=search&s=woocommerce">WooCommerce</a> plugin installed and activated.</p></div>';
	        }
	    }

	    //Load all includes files
	    function includes() {
		    include_once('admin/ocscfw-backend.php');
		    include_once('store-customizer/store-customizer-function.php');
		    include_once('store-customizer/class-store-customizer.php');
		    include_once('store-customizer/main-setting-page.php');
		    include_once('front/ocscfw-frontend-shop-page.php');
		    //include_once('front/ocscfw-front-account-page.php');
		    include_once('front/ocscfw-front-product-page.php');
		    include_once('front/ocscfw-front-cart-page.php');
		    include_once('front/ocscfw-front-checkout-page.php');		
		    include_once('front/ocscfw-front-thkyou-page.php');
		  }

	    public static function OCSCFW_instance() {
	      	if (!isset(self::$OCSCFW_instance)) {
	        	self::$OCSCFW_instance = new self();
	        	self::$OCSCFW_instance->init();
	        	self::$OCSCFW_instance->includes();
	      	}
	      	return self::$OCSCFW_instance;
	    }
  	}
  	add_action('plugins_loaded', array('OCSCFW', 'OCSCFW_instance'));
  	
}