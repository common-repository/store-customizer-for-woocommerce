<?php
if (!defined('ABSPATH'))
  exit;

if (!class_exists('OCSCFW_frontend_account')) {

  	class OCSCFW_frontend_account {

	    protected static $OCSCFW_instance;


		function OCSCFW_rename_menu_items( $items ) {
			
				if(get_theme_mod('ocscfw-account-dashboard-tab') == 'ocscfw-account-dashboard-tab-edit'){
		    		$items['dashboard']    = get_theme_mod('ocscfw-change-dashboard_tab-title' , 'Dashboard');
		    }
		    if(get_theme_mod('ocscfw-account-order-tab') == "ocscfw-account-order-tab-edit"){
						$items['orders']       = get_theme_mod('ocscfw-change-order-tab-title' , 'Orders');
		    }
		    if(get_theme_mod('ocscfw-account-address-tab') == "ocscfw-account-address-tab-edit"){
						$items['edit-address']    = get_theme_mod('ocscfw-change-address-tab-title' , 'Addresses');
		    }
		    if(get_theme_mod('ocscfw-account-downloads-tab') == "ocscfw-account-downloads-tab-edit"){
						$items['downloads']    = get_theme_mod('ocscfw-change-downloads-tab-title' , 'Downloads');
		    }
		    if(get_theme_mod('ocscfw-account-details-tab') == "ocscfw-account-details-tab-edit"){
						$items['edit-account']    = get_theme_mod('ocscfw-change-details-tab-title' , 'Account Details');
		    }
		    if(get_theme_mod('ocscfw-account-logout-tab') == "ocscfw-account-logout-tab-edit"){
						$items['customer-logout']    = get_theme_mod('ocscfw-change-logout-tab-title' , 'Logout');
		    }
		    return $items;
		
		}


	
		function OCSCFW_remove_my_account_links( $menu_links ){
			
				if(get_theme_mod('ocscfw-account-dashboard-tab') == "ocscfw-account-dashboard-tab-remove"){
					unset( $menu_links['dashboard'] ); // Remove Dashboard
		    }
		    if(get_theme_mod('ocscfw-account-order-tab') == "ocscfw-account-order-tab-remove"){
					unset( $menu_links['orders'] ); // Remove orders
		    }
		    if(get_theme_mod('ocscfw-account-downloads-tab') == "ocscfw-account-downloads-tab-remove"){
		    	unset( $menu_links['downloads'] ); // Disable Downloads
		    }
		    if(get_theme_mod('ocscfw-account-address-tab') == "ocscfw-account-address-tab-remove"){
		    	unset( $menu_links['edit-address'] ); // Disable edit-address
		    }
		    if(get_theme_mod('ocscfw-account-details-tab') == "ocscfw-account-details-tab-remove"){
						unset( $menu_links['edit-account'] ); // Disable edit-account
		    }
		    if(get_theme_mod('ocscfw-account-logout-tab') == "ocscfw-account-logout-tab-remove"){
						unset( $menu_links['customer-logout'] ); // Remove Logout link
		    }
				return $menu_links;
			
		}

		function init(){
			add_filter( 'woocommerce_account_menu_items',array($this,'OCSCFW_rename_menu_items') );
			add_filter ('woocommerce_account_menu_items',array($this, 'OCSCFW_remove_my_account_links' ));
		}
	    public static function OCSCFW_instance() {
	      	if (!isset(self::$OCSCFW_instance)) {
	        	self::$OCSCFW_instance = new self();
	        	self::$OCSCFW_instance->init();
	      	}
	      return self::$OCSCFW_instance;
	    }
  	}

  OCSCFW_frontend_account::OCSCFW_instance();
}