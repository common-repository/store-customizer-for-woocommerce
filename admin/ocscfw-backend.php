<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('OCSCFW_custmizer_option')) {

  	class OCSCFW_custmizer_option {

	    protected static $OCSCFW_instance;


	  function OCSCFW_create_menu() {

				add_menu_page('Woo Store Customizer', 'Woo Store Customizer', 'manage_options', 'store_customizer', array($this, 'OCSCFW_store_customizer'));

		}

		function OCSCFW_store_customizer(){?>
			<div class="woo_stor_cust">
				<h3>Woocommerce Store Customizer</h3>
				<p><span>Note:</span>All settings for WoocommerceStoreCustomizer are built into the WordPress Customizer.
					Please go to <span>Appearance -> Customize -> Store Customizer WooCommerce</span></p>
			</div>


		<?php 
		}

		function OCSCFW_customizer_library_options( $wp_customize ){
			// Stores all the controls that will be added
		   $options = array();
		    // Stores all the sections to be added
		   $sections = array();
		    // Stores all the panels to be added
		   $panels = array();
		    // Adds the sections to the $options array
		   $options['sections'] = $sections;

		   	$panel = 'ocscfw-panel-settings';
	     	$panels[] = array(
		        'id'       => $panel,
		        'title'    => __( 'Store Customizer WooCommerce', 'ocscfw' ),
		        'priority' => '10',
	     	);
	     	$section = 'ocscfw-panel-woocustomizer';
	  		$sections[] = array(
	         	'id'       => $section,
	         	'title'    => __('Store Customizer WooCommerce', 'ocscfw' ),
	         	'priority' => '10',
	         	'panel'    => $panel,
	     	);
	     	$options['ocscfw-wc-remove-breadcrumbs'] = array(
	         	'id'      => 'ocscfw-wc-remove-breadcrumbs',
	         	'label'   => __('Remove All WooCommerce Breadcrumbs', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-woo-pages-notice'] = array(
	            'id'      => 'ocscfw-woo-pages-notice',
	            'label'   => __( 'WooCommerce Pages Notice', 'ocscfw' ),
	            'section' => $section,
	            'type'    => 'ocscfw-heading',
	      );
        $options['ocscfw-product-note-text-title'] = array(
	         	'id'      => 'ocscfw-product-note-text-title',
	         	'label'   => __( 'Note Title', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'text',
	   				'default'     => __('Note:','ocscfw'),
	     	);
	     	$options['ocscfw-product-note-text-dis'] = array(
	         	'id'      => 'ocscfw-product-note-text-dis',
	         	'label'   => __( 'Note Text', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'textarea',
	   				'default' =>__('Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industrys standard dummy text ever since the 1500s', 'ocscfw'),
	     	);
	     	$choices = array(
          'none'                            => 'Disable',
          'woocommerce_before_main_content' => 'Top of Page',
          'woocommerce_before_shop_loop'    => 'Before Products',
          'woocommerce_after_shop_loop'     => 'After Products',
        );

      	$options['ocscfw-notice-banner-shop'] = array(
          'id'      => 'ocscfw-notice-banner-shop',
          'label'   => __( 'Add to Shop & Archive pages', 'ocscfw' ),
          'section' => $section,
          'type'    => 'select',
          'choices' => $choices,
          'default' => 'none',
      	);
      	$choices = array(
          'none'                                     => 'Disable',
          'woocommerce_before_single_product'        => 'Top of Page',
          'woocommerce_single_product_summary'       => 'Above Product Summary',
          'woocommerce_before_add_to_cart_form'      => 'Before Add to Cart',
          'woocommerce_after_add_to_cart_form'       => 'After Add to Cart',
          'woocommerce_product_meta_end'             => 'After Product Meta',
          'woocommerce_after_single_product_summary' => 'After Single Product Summary',
          'woocommerce_after_single_product'         => 'Bottom of Page',
      	);
      	$options['ocscfw-notice-single-pro'] = array(
          'id'      => 'ocscfw-notice-single-pro',
          'label'   => __( 'Add to Single Product Page', 'ocscfw' ),
          'section' => $section,
          'type'    => 'select',
          'choices' => $choices,
          'default' => 'none',
      	);
      	$choices = array(
          'none'                                         => 'Off',
          'woocommerce_before_checkout_form'             => 'Top of Page',
          'woocommerce_checkout_before_customer_details' => 'Before Customer Details',
          'woocommerce_after_order_notes'                => 'After Order Notes',
          'woocommerce_checkout_after_customer_details'  => 'After Customer Details',
          'woocommerce_review_order_before_payment'      => 'Before Payment Options',
          'woocommerce_after_checkout_form'              => 'Bottom of Page',
      	);
      	$options['ocscfw-notice-banner-checkout'] = array(
          'id'      => 'ocscfw-notice-banner-checkout',
          'label'   => __( 'Add to Checkout page', 'ocscfw' ),
          'section' => $section,
          'type'    => 'select',
          'choices' => $choices,
          'default' => 'none',
      	);
      	$choices = array(
          'none'                            => 'Off',
          'woocommerce_before_cart'         => 'Above Cart',
          'woocommerce_after_cart_table'    => 'Below Cart',
          'woocommerce_proceed_to_checkout' => 'Before Proceed to Checkout button',
          'woocommerce_after_cart_totals'   => 'After Proceed to Checkout button',
          'woocommerce_after_cart'          => 'After Cart',
      	);
      	$options['ocscfw-notice-banner-cart'] = array(
          'id'      => 'ocscfw-notice-banner-cart',
          'label'   => __( 'Add to Cart page', 'ocscfw' ),
          'section' => $section,
          'type'    => 'select',
          'choices' => $choices,
          'default' => 'none',
      	);
      	$options['ocscfw-notice-design-setting'] = array(
            'id'      => 'ocscfw-notice-design-setting',
            'label'   => __( 'Woocommerce Note Design Setting', 'ocscfw' ),
            'section' => $section,
            'type'    => 'ocscfw-heading',
	      );
	      $options['ocscfw-notice-heading-text-font-size'] = array(
	            'id'      => 'ocscfw-notice-heading-text-font-size',
	            'label'   => __( 'Note Heading font size', 'ocscfw' ),
	            'section' => $section,
	            'type'    => 'number',
	            'default' => '',
	      );
	      $options['ocscfw-notice-text-font-size'] = array(
	            'id'      => 'ocscfw-notice-text-font-size',
	            'label'   => __( 'Notice Text font size', 'ocscfw' ),
	            'section' => $section,
	            'type'    => 'number',
	            'default' => '',
	      );
	      $options['ocscfw-notice-text-center'] = array(
	         	'id'      => 'ocscfw-notice-text-center',
	         	'label'   => __( 'Text Align center', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	      $options['ocscfw-notice-heading-text-color'] = array(
	            'id'      => 'ocscfw-notice-heading-text-color',
	            'label'   => __( 'Woocommerce Note Heading color', 'ocscfw' ),
	            'section' => $section,
	            'type'    => 'color',
	            'default' => '',
	      );
	      $options['ocscfw-notice-back-color'] = array(
	            'id'      => 'ocscfw-notice-back-color',
	            'label'   => __( 'Woocommerce background color', 'ocscfw' ),
	            'section' => $section,
	            'type'    => 'color',
	            'default' => '',
	      );
	      $options['ocscfw-notice-text-color'] = array(
	            'id'      => 'ocscfw-notice-text-color',
	            'label'   => __( 'Woocommerce Note Text color', 'ocscfw' ),
	            'section' => $section,
	            'type'    => 'color',
	            'default' => '',
	      );
	      $options['ocscfw-note-border-size'] = array(
	            'id'      => 'ocscfw-note-border-size',
	            'label'   => __( 'Woocommerce Note Border size', 'ocscfw' ),
	            'section' => $section,
	            'type'    => 'text',
	            'default' => '',
	             'description' => 'give in px value',
	      );
	      $options['ocscfw-note-border-color'] = array(
	            'id'      => 'ocscfw-note-border-color',
	            'label'   => __( 'Woocommerce Note Border color', 'ocscfw' ),
	            'section' => $section,
	            'type'    => 'color',
	            'default' => '',
	      );
	      $options['ocscfw-width-in-notice-board'] = array(
	            'id'      => 'ocscfw-width-in-notice-board',
	            'label'   => __( 'Woocommerce Note banner Width', 'ocscfw' ),
	            'section' => $section,
	            'type'    => 'number',
	            'default' => '',
	            'description' => 'give in % value',
	      );
	      $options['ocscfw-margin-in-notice-board'] = array(
	            'id'      => 'ocscfw-margin-in-notice-board',
	            'label'   => __( 'Woocommerce Note margin', 'ocscfw' ),
	            'section' => $section,
	            'type'    => 'number',
	            'default' => '',
	            'description' => 'give in px value',
	      );
	      $options['ocscfw-padding-in-notice-board'] = array(
	            'id'      => 'ocscfw-padding-in-notice-board',
	            'label'   => __( 'Woocommerce Note Padding', 'ocscfw' ),
	            'section' => $section,
	            'type'    => 'number',
	            'default' => '',
	            'description' => 'give in px value',
	      );
	     	$section = 'ocscfw-panel-woocustomizer-shop';
	     	$sections[] = array(
	         	'id'       => $section,
	         	'title'    => __( 'WooCommerce Shop Customizer', 'ocscfw' ),
	         	'priority' => '11',
	         	'panel'    => $panel,
	     	);
	     	$options['ocscfw-wc-remove-shop-breadcrumb'] = array(
	         	'id'      => 'ocscfw-wc-remove-shop-breadcrumb',
	         	'label'   => __( 'Remove Shop Page Breadcrumbs', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-wc-remove-shop-title'] = array(
	         	'id'      => 'ocscfw-wc-remove-shop-title',
	         	'label'   => __( 'Remove Shop Page Title', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-wc-remove-shop-filter-drop'] = array(
	         	'id'      => 'ocscfw-wc-remove-shop-filter-drop',
	         	'label'   => __( 'Remove Filter Dropdown', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-shop-sorting-result'] = array(
	         	'id'      => 'ocscfw-shop-sorting-result',
	         	'label'   => __( 'Product Shop Sorting result', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-product-per-page'] = array(
	         	'id'      => 'ocscfw-product-per-page',
	         	'label'   => __( 'Product per Shop page', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'number',
	   			'default'     => 18,
	     	);
	     	$options['ocscfw-product-per-row'] = array(
	         	'id'      => 'ocscfw-product-per-row',
	         	'label'   => __( 'Product per Row Shop page', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'number',
	   			'default'     => 3,
	     	);
	     	$options['ocscfw-product-sale-banner-text'] = array(
	         	'id'      => 'ocscfw-product-sale-banner-text',
	         	'label'   => __( 'Product Sale Banner Text', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'text',
	   			'default'     => 'sale!',
	     	);
	     	$options['ocscfw-shop-page-button-simple-produtct'] = array(
         		'id'      => 'ocscfw-shop-page-button-simple-produtct',
         		'label'   => __( 'Simple Product Button Texts', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'text',
	         	'default' => 'Add To Cart',
	     	);
	     	$options['ocscfw-shop-page-button-varition-produtct'] = array(
	         	'id'      => 'ocscfw-shop-page-button-varition-produtct',
	         	'label'   => __( 'Variable Product Button Texts', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'text',
	         	'default' => 'Select Options',
	     	);
	     	$options['ocscfw-shop-page-button-groped-produtct'] = array(
	         	'id'      => 'ocscfw-shop-page-button-groped-produtct',
	         	'label'   => __( 'Grouped Product Button Texts', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'text',
	         	'default' => 'View products',
	     	);
	     	$options['ocscfw-archive-category-setting'] = array(
	            'id'      => 'ocscfw-archive-category-setting',
	            'label'   => __( 'Archive Page And category page', 'ocscfw' ),
	            'section' => $section,
	            'type'    => 'ocscfw-heading',
      	);
      	$options['ocscfw-shop-archive-breadcrumbs'] = array(
	         	'id'      => 'ocscfw-shop-archive-breadcrumbs',
	         	'label'   => __( 'Remove  Archive Page Breadcrumbs', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	    	$options['ocscfw-shop-archive-title-remove'] = array(
	         	'id'      => 'ocscfw-shop-archive-title-remove',
	         	'label'   => __( 'Remove Archive Page Title', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$section = 'ocscfw-panel-woocustomizer-product';
	     	$sections[] = array(
	         	'id'       => $section,
	         	'title'    => __( 'WooCommerce Product Customizer', 'ocscfw' ),
	         	'priority' => '11',
	         	'panel'    => $panel,
	     	);
	     	$options['wcz-heading-product-heading'] = array(
	            'id'      => 'wcz-heading-product-heading',
	            'label'   => __( 'Product Page Setting', 'ocscfw' ),
	            'section' => $section,
	            'type'    => 'ocscfw-heading',
        	);
	     	$options['ocscfw-wc-remove-product-breadcrumb'] = array(
	         	'id'      => 'ocscfw-wc-remove-product-breadcrumb',
	         	'label'   => __( 'Remove Product Page Breadcrumbs', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-wc-remove-product-magnifying'] = array(
	         	'id'      => 'ocscfw-wc-remove-product-magnifying',
	         	'label'   => __( 'Remove Product magnifying glass', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-wc-remove-product-lightbox'] = array(
	         	'id'      => 'ocscfw-wc-remove-product-lightbox',
	         	'label'   => __( 'Remove Product lightbox', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-wc-remove-product-slider'] = array(
	         	'id'      => 'ocscfw-wc-remove-product-slider',
	         	'label'   => __( 'Remove Product slider', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-wc-remove-product-title'] = array(
	         	'id'      => 'ocscfw-wc-remove-product-title',
	         	'label'   => __( 'Remove Product title', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-wc-remove-price'] = array(
	         	'id'      => 'ocscfw-wc-remove-price',
	         	'label'   => __( 'Remove Product Price', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-remove-product-sku'] = array(
	        	'id'      => 'ocscfw-remove-product-sku',
	         	'label'   => __( 'Remove Product Sku', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-remove-product-category'] = array(
	         	'id'      => 'ocscfw-remove-product-category',
	         	'label'   => __( 'Remove Product Categories', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	); 
	     	$options['ocscfw-remove-product-tag'] = array(
	         	'id'      => 'ocscfw-remove-product-tag',
	         	'label'   => __( 'Remove Product Tags', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'checkbox',
		        'default' => 0,
	     	);
	     	$options['ocscfw-heading-product-tabs'] = array(
            	'id'      => 'ocscfw-heading-product-tabs',
            	'label'   => __( 'Product Page Tabs', 'woocustomizer' ),
            	'section' => $section,
            	'type'    => 'ocscfw-heading',
        	);
      	//tab setting in product page
        	$choices = array(
            	'ocscfw-wcproduct-desc-tab-edit'   => 'Edit Tab Text',
            	'ocscfw-wcproduct-desc-tab-remove' => 'Remove Tab',
        	);
        	$options['ocscfw-wcproduct-desc-tab'] = array(
            	'id'      => 'ocscfw-wcproduct-desc-tab',
            	'label'   => __( 'Description Tab Setting', 'ocscfw' ),
            	'section' => $section,
            	'type'    => 'radio',
            	'choices' => $choices,
            	'default' => '',
        	);
       	$options['ocscfw-change-description-title'] = array(
	         	'id'      => 'ocscfw-change-description-title',
	         	'label'   => __( 'Change Description Tab Title', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'text',
	         	'default' => 'Description',
	         	'active_callback' => 'ocscfw_description_section_callback',	
		   );
		   $options['ocscfw-change-description-heading'] = array(
		        'id'      => 'ocscfw-change-description-heading',
		        'label'   => __( 'Change Description heading', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'text',
		        'default' => 'Description',
		        'active_callback' => 'ocscfw_description_section_callback',	
		   );
		   $choices = array(
            	'ocscfw-product-addinfo-tab-edit'   => 'Edit Tab Text',
            	'ocscfw-product-addinfo-tab-remove' => 'Remove Tab',
	      );
	      $options['ocscfw-product-addinfo-tab'] = array(
            	'id'      => 'ocscfw-product-addinfo-tab',
            	'label'   => __( 'Additional information Tab Setting', 'ocscfw' ),
            	'section' => $section,
            	'type'    => 'radio',
            	'choices' => $choices,
            	'default' => '',
	      );
	      $options['ocscfw-change-addinfo-title'] = array(
		        'id'      => 'ocscfw-change-addinfo-title',
		        'label'   => __( 'Change Additional information Tab Title', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'text',
		        'default' => 'Additional Information',
		        'active_callback' => 'ocscfw_addinfo_section_callback',	
		   );
		   $options['ocscfw-change-addinfo-heading'] = array(
		        'id'      => 'ocscfw-change-addinfo-heading',
		        'label'   => __( 'Change Additional information heading', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'text',
		        'default' => 'Additional Information',
		        'active_callback' => 'ocscfw_addinfo_section_callback',		
		   );
		   $choices = array(
            	'ocscfw-product-review-tab-edit'   => 'Edit Tab Text',
            	'ocscfw-product-review-tab-remove' => 'Remove Tab',
	      );
	      $options['ocscfw-product-review-tab'] = array(
	            'id'      => 'ocscfw-product-review-tab',
	            'label'   => __( 'Reviews Tab Setting', 'ocscfw' ),
	            'section' => $section,
	            'type'    => 'radio',
	            'choices' => $choices,
	            'default' => '',
	      );
	      $options['ocscfw-change-review-title'] = array(
		        'id'      => 'ocscfw-change-review-title',
		        'label'   => __( 'Change Reviews Tab Title', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'text',
		        'default' => 'Reviews',
		        'active_callback' => 'ocscfw_review_section_callback',	
	    	);
	    	$options['ocscfw-heading-product-heading'] = array(
	            'id'      => 'ocscfw-heading-product-heading',
	            'label'   => __( 'Product Page Design Elements', 'ocscfw' ),
	            'section' => $section,
	            'type'    => 'ocscfw-heading',
      	);
      	$options['ocscfw-product-title-color'] = array(
		        'id'      => 'ocscfw-product-title-color',
		        'label'   => __( 'Change Product Title Color', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'color',
		        'default' => '',
	    	);
	    	$options['ocscfw-product-title-font-size'] = array(
		        'id'      => 'ocscfw-product-title-font-size',
		        'label'   => __( 'Change Product Title Font Size(Give in Px)', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'number',
		        'default' => '',
		        'input_attrs' => array(
								    'min' => 1,
								    'max' => 100,
								),	
	    	);
			   $options['ocscfw-product-price-color'] = array(
			        'id'      => 'ocscfw-product-price-color',
			        'label'   => __('Change Product Price Color', 'ocscfw' ),
			        'section' => $section,
			        'type'    => 'color',
			        'default' => '',
			   );
		   $options['ocscfw-product-price-font-size'] = array(
		        'id'      => 'ocscfw-product-price-font-size',
		        'label'   => __( 'Change Product Price Font Size(Give in Px)', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'number',
		        'default' => '',
		        'input_attrs' => array(
								    'min' => 1,
								    'max' => 100,
								),	
		   );
		   $options['ocscfw-product-button-color'] = array(
		        'id'      => 'ocscfw-product-button-color',
		        'label'   => __('Change Product Button Color', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'color',
		        'default' => '',
		   );
		   $options['ocscfw-product-button-hover-color'] = array(
		        'id'      => 'ocscfw-product-button-hover-color',
		        'label'   => __('Change Product Button Hover Color', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'color',
		        'default' => '',
		   );
		   $options['ocscfw-product-button-text-color'] = array(
		        'id'      => 'ocscfw-product-button-text-color',
		        'label'   => __('Change Product Button Text Color', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'color',
		        'default' => '',
		   );
		   $options['ocscfw-product-button-text-hover-color'] = array(
		        'id'      => 'ocscfw-product-button-text-hover-color',
		        'label'   => __('Change Product Button Text Hover Color', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'color',
		        'default' => '',
		   );
		   //account-page-option
		   $section = 'ocscfw-panel-woocustomizer-account';
	     	$sections[] = array(
	         	'id'       => $section,
	         	'title'    => __( 'WooCommerce Account Customizer', 'ocscfw' ),
	         	'priority' => '11',
	         	'panel'    => $panel,
	     	);
	     	$choices = array(
            	'ocscfw-account-dashboard-tab-edit'   => 'Edit Tab Text',
            	'ocscfw-account-dashboard-tab-remove' => 'Remove Tab',
	      	);
	     	$options['ocscfw-account-dashboard-tab'] = array(
		        'id'      => 'ocscfw-account-dashboard-tab',
	            'label'   => __( 'Account Dashboard Tab', 'ocscfw' ),
	            'section' => $section,
	            'type'    => 'radio',
	            'choices' => $choices,
	            'default' => '',
		   );
		   $options['ocscfw-change-dashboard_tab-title'] = array(
		        'id'      => 'ocscfw-change-dashboard_tab-title',
		        'label'   => __( 'Change Dashboard Tab Title', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'text',
		        'default' => 'Dashboard',
		        'active_callback' => 'ocscfw_dashboard_tab_callback',	
	    	);
	    	$choices = array(
            	'ocscfw-account-order-tab-edit'   => 'Edit Tab Text',
            	'ocscfw-account-order-tab-remove' => 'Remove Tab',
	      	);
	     	$options['ocscfw-account-order-tab'] = array(
		        'id'      => 'ocscfw-account-order-tab',
	            'label'   => __( 'Account Orders Tab', 'ocscfw' ),
	            'section' => $section,
	            'type'    => 'radio',
	            'choices' => $choices,
	            'default' => '',
		   );
		   $options['ocscfw-change-order-tab-title'] = array(
	        'id'      => 'ocscfw-change-order-tab-title',
	        'label'   => __( 'Change Orders Tab Title', 'ocscfw' ),
	        'section' => $section,
	        'type'    => 'text',
	        'default' => 'Orders',
	        'active_callback' => 'ocscfw_order_tab_callback',	
	    	);

	    	$choices = array(
            	'ocscfw-account-address-tab-edit'   => 'Edit Tab Text',
            	'ocscfw-account-address-tab-remove' => 'Remove Tab',
	      	);
	     	$options['ocscfw-account-address-tab'] = array(
		        'id'      => 'ocscfw-account-address-tab',
            	'label'   => __( 'Account Address Tab', 'ocscfw' ),
            	'section' => $section,
            	'type'    => 'radio',
            	'choices' => $choices,
            	'default' => '',
		    );
		    $options['ocscfw-change-address-tab-title'] = array(
		        'id'      => 'ocscfw-change-address-tab-title',
		        'label'   => __( 'Change Address Tab Title', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'text',
		        'default' => 'Addresses',
		        'active_callback' => 'ocscfw_address_tab_callback',	
	    	);

	    	$choices = array(
            	'ocscfw-account-downloads-tab-edit'   => 'Edit Tab Text',
            	'ocscfw-account-downloads-tab-remove' => 'Remove Tab',
	      	);
	     	$options['ocscfw-account-downloads-tab'] = array(
		        'id'      => 'ocscfw-account-downloads-tab',
            	'label'   => __( 'Account Downloads Tab', 'ocscfw' ),
            	'section' => $section,
            	'type'    => 'radio',
            	'choices' => $choices,
            	'default' => '',
		   );
		   $options['ocscfw-change-downloads-tab-title'] = array(
		        'id'      => 'ocscfw-change-downloads-tab-title',
		        'label'   => __( 'Change Downloads Tab Title', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'text',
		        'default' => 'Downloads',
		        'active_callback' => 'ocscfw_downloads_tab_callback',	
	    	);
	    	$choices = array(
            	'ocscfw-account-details-tab-edit'   => 'Edit Tab Text',
            	'ocscfw-account-details-tab-remove' => 'Remove Tab',
	      	);
	     	$options['ocscfw-account-details-tab'] = array(
		        'id'      => 'ocscfw-account-details-tab',
            	'label'   => __( 'Account Details Tab', 'ocscfw' ),
            	'section' => $section,
            	'type'    => 'radio',
            	'choices' => $choices,
            	'default' => '',
		   );
		   $options['ocscfw-change-details-tab-title'] = array(
		        'id'      => 'ocscfw-change-details-tab-title',
		        'label'   => __( 'Change Account Details Tab Title', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'text',
		        'default' => 'Account Details',
		        'active_callback' => 'ocscfw_details_tab_callback',	
	    	);
	    	$choices = array(
            	'ocscfw-account-logout-tab-edit'   => 'Edit Tab Text',
            	'ocscfw-account-logout-tab-remove' => 'Remove Tab',
	      );
	     	$options['ocscfw-account-logout-tab'] = array(
		        'id'      => 'ocscfw-account-logout-tab',
            	'label'   => __( 'Account Logout Tab', 'ocscfw' ),
            	'section' => $section,
            	'type'    => 'radio',
            	'choices' => $choices,
            	'default' => '',
		   );
		   $options['ocscfw-change-logout-tab-title'] = array(
		        'id'      => 'ocscfw-change-logout-tab-title',
		        'label'   => __( 'Change Logout Tab Title', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'text',
		        'default' => 'Logout',
		        'active_callback' => 'ocscfw_logout_tab_callback',	
	    	);
	    	$section = 'ocscfw-panel-woocustomizer-cart';
	     	$sections[] = array(
	         	'id'       => $section,
	         	'title'    => __( 'WooCommerce Cart Page Customizer', 'ocscfw' ),
	         	'priority' => '11',
	         	'panel'    => $panel,
	     	);
	     	$options['ocscfw-remove-product-coupon'] = array(
	         	'id'      => 'ocscfw-remove-product-coupon',
	         	'label'   => __( 'Remove Product Coupon Form', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-remove-cart-quantity-editable'] = array(
	         	'id'      => 'ocscfw-remove-cart-quantity-editable',
	         	'label'   => __( 'Disable users adjusting the quantity', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-remove-cart-product-link'] = array(
	         	'id'      => 'ocscfw-remove-cart-product-link',
	         	'label'   => __( 'Disable Product Link', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-heading-product-detail'] = array(
            'id'      => 'ocscfw-heading-product-detail',
            'label'   => __( 'Product Detail Show', 'ocscfw' ),
            'section' => $section,
            'type'    => 'ocscfw-heading',
        	);
        $options['ocscfw-product-detail-show-cat'] = array(
	         	'id'      => 'ocscfw-product-detail-show-cat',
	         	'label'   => __( 'Show Category Name', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-product-selected-variation'] = array(
	         	'id'      => 'ocscfw-product-selected-variation',
	         	'label'   => __( 'Show selected variations', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-product-stock-information'] = array(
	         	'id'      => 'ocscfw-product-stock-information',
	         	'label'   => __( 'Show Stock info Product', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-heading-cart-empty'] = array(
            'id'      => 'ocscfw-heading-cart-empty',
            'label'   => __( 'Empty Cart Customizer', 'ocscfw' ),
            'section' => $section,
            'type'    => 'ocscfw-heading',
        );
        $options['ocscfw-cart-empty-message-edit'] = array(
	         	'id'      => 'ocscfw-cart-empty-message-edit',
	         	'label'   => __( 'Empty Cart page Edit', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
        $options['ocscfw-heading-cart-empty-message'] = array(
	         	'id'      => 'ocscfw-heading-cart-empty-message',
	         	'label'   => __( 'Empty Cart Message', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'textarea',
	         	'default' => 'Your cart is currently empty',
	     	);
	     	$options['ocscfw-edit-rts-button-text'] = array(
	         	'id'      => 'ocscfw-edit-rts-button-text',
	         	'label'   => __( 'Return to shop button Text', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'text',
	         	'default' => 'Return to shop',
	     	);
	     	$options['ocscfw-cart-page-design'] = array(
            'id'      => 'ocscfw-cart-page-design',
            'label'   => __( 'Cart Page Design', 'ocscfw' ),
            'section' => $section,
            'type'    => 'ocscfw-heading',
        );
        $options['rocscfw-cart-table-button-color'] = array(
		        'id'      => 'ocscfw-cart-table-button-color',
		        'label'   => __('Change Cart Button Color', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'color',
		        'default' => '',
	    	);
	    	$options['ocscfw-cart-table-button-text-color'] = array(
		        'id'      => 'ocscfw-cart-table-button-text-color',
		        'label'   => __('Change Cart Button Text Color', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'color',
		        'default' => '',
	    	);
	    	$options['ocscfw-cart-table-button-color-hvr'] = array(
		        'id'      => 'ocscfw-cart-table-button-color-hvr',
		        'label'   => __( 'Change Cart Button Color Hover', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'color',
		        'default' => '',
	    	);
	    	$options['ocscfw-cart-table-button-text-color-hvr'] = array(
		        'id'      => 'ocscfw-cart-table-button-text-color-hvr',
		        'label'   => __( 'Change Cart Button Text Color Hover', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'color',
		        'default' => '',
	    	);
	    	$options['ocscfw-cart-ptc-chnge-color'] = array(
		        'id'      => 'ocscfw-cart-ptc-chnge-color',
		        'label'   => __( 'Change Proceed to checkout back Color', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'color',
		        'default' => '',
	    	);
	    	$options['ocscfw-cart-ptc-chnge-text-color'] = array(
		        'id'      => 'ocscfw-cart-ptc-text-color',
		        'label'   => __( 'Change Proceed to checkout text Color', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'color',
		        'default' => '',
	    	);
	    	$options['ocscfw-cart-ptc-chnge-color-hvr'] = array(
		        'id'      => 'ocscfw-cart-ptc-chnge-color-hvr',
		        'label'   => __( 'Change Proceed to checkout back Color', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'color',
		        'default' => '',
	    	);
	    	$options['ocscfw-cart-ptc-chnge-text-color-hvr'] = array(
		        'id'      => 'ocscfw-cart-ptc-chnge-text-color-hvr',
		        'label'   => __( 'Change Proceed to checkout text Color', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'color',
		        'default' => '',
	    	);
	    	$section = 'ocscfw-panel-woocustomizer-checkout';
	     	$sections[] = array(
	         	'id'       => $section,
	         	'title'    => __( 'Checkout Page Customizer', 'ocscfw' ),
	         	'priority' => '11',
	         	'panel'    => $panel,
	     	);
	     	$options['ocscfw-heading-checkout-page'] = array(
            'id'      => 'ocscfw-heading-checkout-page',
            'label'   => __( 'Checkout Page', 'ocscfw' ),
            'section' => $section,
            'type'    => 'ocscfw-heading',
        );
        $options['ocscfw-checkout-coupon-section-text'] = array(
	         	'id'      => 'ocscfw-checkout-coupon-section-text',
	         	'label'   => __( 'Edit Coupon Section Text', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-coupon-code-text'] = array(
	         	'id'      => 'ocscfw-checkout-coupon-code-text',
	         	'label'   => __( 'Edit Coupon Code', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'text',
	         	'default' => 'Have a coupon?',
	     	);
	     	$options['ocscfw-checkout-coupon-code-link'] = array(
	         	'id'      => 'ocscfw-checkout-coupon-code-link',
	         	'label'   => __( 'Coupon Code Link Text', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'text',
	         	'default' => 'Click here to enter your code',
	     	);
	     	$options['ocscfw-checkout-coupon-text'] = array(
	         	'id'      => 'ocscfw-checkout-coupon-text',
	         	'label'   => __( 'Coupon Text', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'text',
	         	'default' => 'If you have a coupon code, please apply it below.',
	     	);
	     	$options['ocscfw-checkout-edit-order-notes-text'] = array(
	         	'id'      => 'ocscfw-checkout-edit-order-notes-text',
	         	'label'   => __( 'Edit Order Notes Text', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-edit-order-label-text'] = array(
	         	'id'      => 'ocscfw-checkout-edit-order-label-text',
	         	'label'   => __( 'Order note label text', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'text',
	         	'default' =>  'Order notes',
	     	);
	     	$options['ocscfw-checkout-edit-order-label-placeholder'] = array(
	         	'id'      => 'ocscfw-checkout-edit-order-label-placeholder',
	         	'label'   => __( 'Order note placeholder text', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'text',
	         	'default' => 'Notes about your order, e.g. special notes for delivery.',
	     	);
	     	$options['ocscfw-heading-remove-checkout-fields'] = array(
            'id'      => 'ocscfw-heading-remove-checkout-fields',
            'label'   => __( 'Remove Checkout Billing Fields', 'ocscfw' ),
            'section' => $section,
            'type'    => 'ocscfw-heading',
        );
        $options['ocscfw-checkout-remove-firstname'] = array(
	         	'id'      => 'ocscfw-checkout-remove-firstname',
	         	'label'   => __( 'Remove Billing First Name', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-remove-lastname'] = array(
	         	'id'      => 'ocscfw-checkout-remove-lastname',
	         	'label'   => __( 'Remove Billing Last Name', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-remove-companyname'] = array(
	         	'id'      => 'ocscfw-checkout-remove-companyname',
	         	'label'   => __( 'Remove Billing Company Name', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-remove-billing-country'] = array(
	         	'id'      => 'ocscfw-checkout-remove-billing-country',
	         	'label'   => __( 'Remove Billing Country', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-remove-billing-address-1'] = array(
	         	'id'      => 'ocscfw-checkout-remove-billing-address-1',
	         	'label'   => __( 'Remove Billing Address 1', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-remove-billing-address-2'] = array(
	         	'id'      => 'ocscfw-checkout-remove-billing-address-2',
	         	'label'   => __( 'Remove Billing Address 2', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-remove-billing-city'] = array(
	         	'id'      => 'ocscfw-checkout-remove-billing-city',
	         	'label'   => __( 'Remove Billing city', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-remove-billing-state'] = array(
	         	'id'      => 'ocscfw-checkout-remove-billing-state',
	         	'label'   => __( 'Remove Billing State', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-remove-billing-postcode'] = array(
	         	'id'      => 'ocscfw-checkout-remove-billing-postcode',
	         	'label'   => __( 'Remove Billing PostCode', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-remove-billing-phone'] = array(
	         	'id'      => 'ocscfw-checkout-remove-billing-phone',
	         	'label'   => __( 'Remove Billing Phone', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-remove-billing-email'] = array(
	         	'id'      => 'ocscfw-checkout-remove-billing-email',
	         	'label'   => __( 'Remove Billing Email', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-heading-remove-checkout-fields-shipping'] = array(
            'id'      => 'ocscfw-heading-remove-checkout-fields-shipping',
            'label'   => __( 'Remove Checkout Shipping Fields', 'ocscfw' ),
            'section' => $section,
            'type'    => 'ocscfw-heading',
        );
        $options['ocscfw-checkout-remove-ship-firstname'] = array(
	         	'id'      => 'ocscfw-checkout-remove-ship-firstname',
	         	'label'   => __( 'Remove Shipping First Name', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-remove-ship-lastname'] = array(
	         	'id'      => 'ocscfw-checkout-remove-ship-lastname',
	         	'label'   => __( 'Remove Shipping Last Name', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-remove-ship-companyname'] = array(
	         	'id'      => 'ocscfw-checkout-remove-ship-companyname',
	         	'label'   => __( 'Remove Shipping Company Name', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-remove-shipping-country'] = array(
	         	'id'      => 'ocscfw-checkout-remove-shipping-country',
	         	'label'   => __( 'Remove Shipping Country', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-remove-shipping-address-1'] = array(
	         	'id'      => 'ocscfw-checkout-remove-shipping-address-1',
	         	'label'   => __( 'Remove Shipping Address 1', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-remove-shipping-address-2'] = array(
	         	'id'      => 'ocscfw-checkout-remove-shipping-address-2',
	         	'label'   => __( 'Remove Shipping Address 2', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-remove-shipping-city'] = array(
	         	'id'      => 'ocscfw-checkout-remove-shipping-city',
	         	'label'   => __( 'Remove Shipping city', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-remove-shipping-state'] = array(
	         	'id'      => 'ocscfw-checkout-remove-shipping-state',
	         	'label'   => __( 'Remove Shipping State', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-remove-shipping-postcode'] = array(
	         	'id'      => 'ocscfw-checkout-remove-shipping-postcode',
	         	'label'   => __( 'Remove Shipping PostCode', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-remove-shipping-phone'] = array(
	         	'id'      => 'ocscfw-checkout-remove-shipping-phone',
	         	'label'   => __( 'Remove Shipping Phone', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-remove-shipping-email'] = array(
	         	'id'      => 'ocscfw-checkout-remove-shipping-email',
	         	'label'   => __( 'Remove Shipping Email', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-heading-remove-checkout-design-element'] = array(
            'id'      => 'ocscfw-heading-remove-checkout-design-element',
            'label'   => __( 'CheckOut Page Design Element', 'ocscfw' ),
            'section' => $section,
            'type'    => 'ocscfw-heading',
        );
        $options['ocscfw-checkout-customize-place-order'] = array(
	         	'id'      => 'ocscfw-checkout-customize-place-order',
	         	'label'   => __( 'Customize Checkout Place Order Button', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-customize-place-order-text'] = array(
	         	'id'      => 'ocscfw-checkout-customize-place-order-text',
	         	'label'   => __( 'Place Order Text', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'text',
	         	'default' => 'Place Order',
	     	);
	     	$options['ocscfw-checkout-customize-place-order-font-size'] = array(
	         	'id'      => 'ocscfw-checkout-customize-place-order-font-size',
	         	'label'   => __( 'Place Order Font Size', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'number',
	         	'default' => '',
	     	);
	     	$options['ocscfw-checkout-place-order-background-color'] = array(
		        'id'      => 'ocscfw-checkout-place-order-background-color',
		        'label'   => __( 'Place Order Background Color', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'color',
		        'default' => '',
	    	);
	     	$options['ocscfw-checkout-place-order-text-color'] = array(
		        'id'      => 'ocscfw-checkout-place-order-text-color',
		        'label'   => __( 'Place Order Text Color', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'color',
		        'default' => '',
	    	);
	    	$options['ocscfw-checkout-place-order-background-hvr-color'] = array(
		        'id'      => 'ocscfw-checkout-place-order-background-hvr-color',
		        'label'   => __( 'Place Order Background Hover Color', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'color',
		        'default' => '',
	    	);
	     	$options['ocscfw-checkout-place-order-text-hvr-color'] = array(
		        'id'      => 'ocscfw-checkout-place-order-text-hvr-color',
		        'label'   => __( 'Place Order Text Hover Color', 'ocscfw' ),
		        'section' => $section,
		        'type'    => 'color',
		        'default' => '',
	    	);
	    	$options['ocscfw-customize-checkout-heading'] = array(
	         	'id'      => 'ocscfw-customize-checkout-heading',
	         	'label'   => __( 'Customize Checkout Heading', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'checkbox',
	         	'default' => 0,
	     	);
	     	$options['ocscfw-checkout-billing-detail-heading'] = array(
	         	'id'      => 'ocscfw-checkout-billing-detail-heading',
	         	'label'   => __( 'Billing heading', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'text',
	         	'default' => 'Billing details',
	     	);
	     	$options['ocscfw-checkout-additional-detail-heading'] = array(
	         	'id'      => 'ocscfw-checkout-additional-detail-heading',
	         	'label'   => __( 'Additional information', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'text',
	         	'default' => 'Additional information',
	     	);
	     	$options['ocscfw-checkout-shipping-heading'] = array(
	         	'id'      => 'ocscfw-checkout-shipping-heading',
	         	'label'   => __( 'Shipping Heading', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'text',
	         	'default' => 'Ship to a different address?',
	     	);
	     	$options['ocscfw-checkout-yr-order-heading'] = array(
	         	'id'      => 'ocscfw-checkout-yr-order-heading',
	         	'label'   => __( 'Your Order heading', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'text',
	         	'default' => 'Your Order',
	     	);
	     	$section = 'ocscfw-thankyou-page';
	     	$sections[] = array(
	         	'id'       => $section,
	         	'title'    => __( 'Thank you Customizer', 'ocscfw' ),
	         	'priority' => '11',
	         	'panel'    => $panel,
	     	);
	     	$options['ocscfw-heading-order-receive-title'] = array(
            'id'      => 'ocscfw-heading-order-receive-title',
            'label'   => __( 'Thank You page Title Customize', 'ocscfw' ),
            'section' => $section,
            'type'    => 'ocscfw-heading',
        );
	     	$choices = array(
          	'ocscfw-thku-main-title-edit'   => 'Edit Tab Text',
          	'ocscfw-thku-main-title-remove' => 'Remove Tab',
      	);
      	$options['ocscfw-thku-main-title-tab'] = array(
          	'id'      => 'ocscfw-thku-main-title-tab',
          	'label'   => __( 'Edit order Received Title', 'ocscfw' ),
          	'section' => $section,
          	'type'    => 'radio',
          	'choices' => $choices,
          	'default' => '',
      	);
	     	$options['ocscfw-thku-main-title'] = array(
		         	'id'      => 'ocscfw-thku-main-title',
		         	'label'   => __( 'Change order Received Title', 'ocscfw' ),
		         	'section' => $section,
		         	'type'    => 'text',
		         	'default' => 'Order received',
		         	'active_callback' => '',	
			  );
	     	$options['ocscfw-order-receive-color'] = array(
	         	'id'      => 'ocscfw-order-receive-color',
	         	'label'   => __( 'Order Received Title color', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'color',
	         	'default' => ''	
		  	);
      	$choices = array(
         	'none' => 'Disable',
         	'5'    => 'Before order details',
         	'10'   => 'After order details',
      	);
      	$options['ocscfw-thank-you-page-custom-content-add'] = array(
          'id'      => 'ocscfw-thank-you-page-custom-content-add',
          'label'   => __( 'Custom contect add Thank you page', 'ocscfw' ),
          'section' => $section,
          'type'    => 'select',
          'choices' => $choices,
          'default' => 'none',
      	);
      	$options['ocscfw-thku-custom-textarea'] = array(
	         	'id'      => 'ocscfw-thku-custom-textarea',
	         	'label'   => __( 'Custom content add Thank you page', 'ocscfw' ),
	         	'section' => $section,
	         	'type'    => 'textarea',
	         	'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec consequat erat, finibus ultricies lorem. Proin condimentum mauris sed augue tristique suscipit. Nulla congue pretium velit quis luctus. Aliquam a sapien vel ipsum pharetra commode.',
	         	'active_callback' => '',	
		  	);
		  	$options['ocscfw-thnku-cust-content-text-color'] = array(
            'id'      => 'ocscfw-thnku-cust-content-text-color',
            'label'   => __( 'Custom Content Text Color', 'ocscfw' ),
            'section' => $section,
            'type'    => 'color',
            'default' => '',
	      );

			  $options['sections'] = $sections;
			  // Adds the panels to the $options array
			  $options['panels'] = $panels;

				if ( empty( $options ) ) {
					return;
				}

				// Add the sections
				if ( isset( $options['sections'] ) ) {
					OCSCFW_library_add_sections($options['sections'],$wp_customize );
				}

				// Add the sections
				if ( isset( $options['panels'] ) ) {
					OCSCFW_library_add_panels( $options['panels'], $wp_customize );
				}

    		$loop = 0;

    		foreach ( $options as $option ) {
					// Set blank description if one isn't set
					if ( ! isset( $option['description'] ) ) {
						$option['description'] = '';
					}

					if ( isset( $option['type'] ) ) {

						$loop ++;

						// Apply a default sanitization if one isn't set
						if ( ! isset( $option['sanitize_callback'] ) ) {
							$option['sanitize_callback'] = OCSCFW_library_get_sanitization( $option['type'] );
						}

						// Set blank active_callback if one isn't set
						if ( ! isset( $option['active_callback'] ) ) {
							$option['active_callback'] = '';
						}

						// Add the setting
						OCSCFW_library_add_setting( $option, $wp_customize);

						// Priority for control
						if ( ! isset( $option['priority'] ) ) {
							$option['priority'] = $loop;
						}
				
						// Adds control based on control type
						switch ( $option['type'] ) {

							case 'text':
							case 'textarea':
							case 'number':
							case 'select':
							case 'radio':
							case 'checkbox':
							case 'range':
							case 'dropdown-pages':

								$wp_customize->add_control(
									$option['id'], $option
								);
								break;

							case 'checkbox':
								
								$wp_customize->add_control(
									$option['id'], $option
								);
							
							break;

							case 'ocscfw-heading':							
								$wp_customize->add_control(
									new OCSCFW_Upsell_Section(
										$wp_customize, $option['id'], $option
									)
								);
							
							break;

							case 'color':

								$wp_customize->add_control(
									new WP_Customize_Color_Control(
										$wp_customize, $option['id'], $option
									)
								);

								break;

							case 'image':

								$wp_customize->add_control(
									new WP_Customize_Image_Control(
										$wp_customize,
										$option['id'], array(
											'label'             => $option['label'],
											'section'           => $option['section'],
											'sanitize_callback' => $option['sanitize_callback'],
											'priority'          => $option['priority'],
											'active_callback'   => $option['active_callback'],
											'description'      	=> $option['description']
										)
									)
								);

								break;

							case 'upload':

							$wp_customize->add_control(
								new WP_Customize_Upload_Control(
									$wp_customize,
									$option['id'], array(
										'label'             => $option['label'],
										'section'           => $option['section'],
										'sanitize_callback' => $option['sanitize_callback'],
										'priority'          => $option['priority'],
										'active_callback'   => $option['active_callback'],
										'description'      	=> $option['description']
									)
								)
							);
							break;

						}
					}
				}


		}


		function OCSCFW_support_and_rating_notice() {
         $screen = get_current_screen();
         //print_r($screen);

         if( 'store_customizer' == $screen->parent_base) {
             ?>
             <div class="ocscfw_ratess_open">
                 <div class="ocscfw_rateus_notice">
                     <div class="ocscfw_rtusnoti_left">
                         <h3>Rate Us</h3>
                         <label>If you like our plugin, </label>
                         <a target="_blank" href="#">
                             <label>Please vote us</label>
                         </a>
                         <label>,so we can contribute more features for you.</label>
                     </div>
                     <div class="ocscfw_rtusnoti_right">
                         <img src="<?php echo OCSCFW_PLUGIN_DIR;?>/includes/images/review.png" class="ocscfw_review_icon">
                     </div>
                 </div>
                 <div class="ocscfw_support_notice">
                     <div class="ocscfw_tusnoti_left">
                         <h3>Having Issues?</h3>
                         <label>You can contact us at</label>
                         <a target="_blank" href="https://www.xeeshop.com/support-us/?utm_source=aj_plugin&utm_medium=plugin_support&utm_campaign=aj_support&utm_content=aj_wordpress">
                             <label>Our Support Forum</label>
                         </a>
                     </div>
                     <div class="ocscfw_rtusnoti_right">
                         <img src="<?php echo OCSCFW_PLUGIN_DIR;?>/includes/images/support.png" class="ocscfw_review_icon">
                     </div>
                 </div>
             </div>
             <div class="ocscfw_donate_main">
                <img src="<?php echo OCSCFW_PLUGIN_DIR;?>/includes/images/coffee.svg">
                <h3>Buy me a Coffee !</h3>
                <p>If you like this plugin, buy me a coffee and help support this plugin !</p>
                <div class="ocscfw_donate_form">
                     <a class="button button-primary ocwg_donate_btn" href="https://www.paypal.com/paypalme/shayona163/" data-link="https://www.paypal.com/paypalme/shayona163/" target="_blank">Buy me a coffee !</a>
                </div>
             </div>
             <?php
         }
     }
		function init() {
	       add_action( 'customize_register',array($this, 'OCSCFW_customizer_library_options'), 100 );
	       add_action('admin_menu', array($this, 'OCSCFW_create_menu'));
	       add_action( 'admin_notices', array($this, 'OCSCFW_support_and_rating_notice' ));
	    }

	    public static function OCSCFW_instance() {
	      if (!isset(self::$OCSCFW_instance)) {
	        self::$OCSCFW_instance = new self();
	        self::$OCSCFW_instance->init();
	      }
	      return self::$OCSCFW_instance;
	    }

  	}

  OCSCFW_custmizer_option::OCSCFW_instance();

}