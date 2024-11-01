<?php 
	/**
	 * panel add  for the theme customizer
	 *
	 * @since  1.0.0.
	 *
	 * @param  object $panels and $wp_customize The global customizer object.
	 *
	 * @return void
	 */ 

	function OCSCFW_library_add_panels( $panels, $wp_customize ) {

		foreach ( $panels as $panel ) {

			if ( ! isset( $panel['description'] ) ) {
				$panel['description'] = FALSE;
			}

			$wp_customize->add_panel( $panel['id'], $panel );
		}
	}

	function OCSCFW_library_add_setting( $option, $wp_customize ) {

		// Delete option if it's a checkbox and set to 0
		if ( '0' == get_option( $option['id'] ) ) {
			delete_option( $option['id'] );
		}

		 $settings_default = array(
	 		'default'              => NULL,
		 	'capability'           => 'edit_theme_options',
		 	'theme_supports'       => NULL,
		 	'transport'            => NULL,
		 	'sanitize_callback'    => 'wp_kses_post',
		 	'sanitize_js_callback' => NULL
		 );

		// Settings defaults
		$settings = array_merge( $settings_default, $option );
		// Arguments for $wp_customize->add_setting
		$wp_customize->add_setting( $option['id'], array(
				'default'              => $settings['default'],
				'capability'           => $settings['capability'],
				'theme_supports'       => $settings['theme_supports'],
				'transport'            => $settings['transport'],
				'sanitize_callback'    => $settings['sanitize_callback'],
				'sanitize_js_callback' => $settings['sanitize_js_callback']
			)
		);
	}

	function OCSCFW_library_add_sections( $sections, $wp_customize ) {
		foreach ( $sections as $section ) {
			if ( ! isset( $section['description'] ) ) {
				$section['description'] = FALSE;
			}
			$wp_customize->add_section( $section['id'], $section );
		}
	}


	function OCSCFW_library_get_sanitization( $type ) {

		if ( 'select' == $type || 'radio' == $type ) {
			return 'OCSCFW_library_sanitize_select';
		}

		if ( 'checkbox' == $type ) {
			return 'OCSCFW_library_sanitize_checkbox';
		}

		if ( 'color' == $type ) {
			return 'sanitize_hex_color';
		}

		if ( 'upload' == $type || 'image' == $type ) {
			return 'esc_url_raw';
		}

		if ( 'text' == $type  ) {
			return 'sanitize_text_field';
		}

		if('textarea' == $type){
			return 'OCSCFW_sanitize_text';
		}

		if ( 'ocscfw-heading' == $type ) {
			return 'esc_url';
		}

		if ( 'range' == $type ) {
			return 'OCSCFW_library_sanitize_range';
		}

		if ( 'dropdown-pages' == $type ) {
			return 'absint';
		}

		// If a custom option is being used, return false
		return FALSE;
	}

	function OCSCFW_library_sanitize_range( $value ) {

		if ( is_numeric( $value ) ) {
			return $value;
		}

		return 0;
	}

	function OCSCFW_library_sanitize_checkbox( $value ) {
		if ( $value == 1 ) {
			return 1;
	    } else {
			return 0;
	    }
	}

	function OCSCFW_sanitize_text( $string ) {
		static $default_attribs = array(
		            'id' => array(),
		            'class' => array(),
		            'title' => array(),
		            'style' => array(),
		            'data' => array(),
		            'data-mce-id' => array(),
		            'data-mce-style' => array(),
		            'data-mce-bogus' => array(),
		        );
				$allowed_tags = array(
		            'div'           => $default_attribs,
		            'span'          => $default_attribs,
		            'p'             => $default_attribs,
		            'a'             => array_merge( $default_attribs, array(
		                'href' => array(),
		                'target' => array('_blank', '_top'),
		            )),
		            'u'             => $default_attribs,
		            'i'             => $default_attribs,
		            'q'             => $default_attribs,
		            'b'             => $default_attribs,
		            'ul'            => $default_attribs,
		            'ol'            => $default_attribs,
		            'li'            => $default_attribs,
		            'br'            => $default_attribs,
		            'hr'            => $default_attribs,
		            'strong'        => $default_attribs,
		            'blockquote'    => $default_attribs,
		            'del'           => $default_attribs,
		            'strike'        => $default_attribs,
		            'em'            => $default_attribs,
		            'code'          => $default_attribs,
        		);

		return wp_kses( $string , $allowed_tags );
	}
	function OCSCFW_library_sanitize_select( $input, $setting ) {

	        // Ensure input is a slug.
	        $input = sanitize_text_field( $input );
	        // Get list of choices from the control associated with the setting.
	        $choices = $setting->manager->get_control( $setting->id )->choices;
	        // If the input is a valid key, return it; otherwise, return the default.
	        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}


	function ocscfw_description_section_callback(){
		$desc_section_tab = get_theme_mod( 'ocscfw-wcproduct-desc-tab','ocscfw-wcproduct-desc-tab-edit');
		if ( 'ocscfw-wcproduct-desc-tab-edit' === $desc_section_tab ) {
			return true;
		}
		return false;
	}


	function ocscfw_addinfo_section_callback(){
		$addinfo_section_tab = get_theme_mod( 'ocscfw-product-addinfo-tab','ocscfw-product-addinfo-tab-edit');
		if ( 'ocscfw-product-addinfo-tab-edit' === $addinfo_section_tab ) {
			return true;
		}
		return false;
	}
	function ocscfw_review_section_callback(){
		$review_section_tab = get_theme_mod( 'ocscfw-product-review-tab','ocscfw-product-review-tab-edit');
		if ( 'ocscfw-product-review-tab-edit' === $review_section_tab ) {
			return true;
		}
		return false;
	}
	function ocscfw_dashboard_tab_callback(){
		$dashboard_section_tab = get_theme_mod( 'ocscfw-account-dashboard-tab','ocscfw-account-dashboard-tab-edit');
		if ( 'ocscfw-account-dashboard-tab-edit' === $dashboard_section_tab ) {
			return true;
		}
		return false;
	}
	function ocscfw_order_tab_callback(){
		$order_section_tab = get_theme_mod( 'ocscfw-account-order-tab','ocscfw-account-order-tab-edit');
		if ( 'ocscfw-account-order-tab-edit' === $order_section_tab ) {
			return true;
		}
		return false;
	}
	function ocscfw_address_tab_callback(){
		$adress_section_tab = get_theme_mod( 'ocscfw-account-address-tab','ocscfw-account-address-tab-edit');
		if ( 'ocscfw-account-address-tab-edit' === $adress_section_tab ) {
			return true;
		}
		return false;
	}
	function ocscfw_downloads_tab_callback(){
		$downloads_section_tab = get_theme_mod( 'ocscfw-account-downloads-tab','ocscfw-account-downloads-tab-edit');
		if ( 'ocscfw-account-downloads-tab-edit' === $downloads_section_tab ) {
			return true;
		}
		return false;
	}
	function ocscfw_details_tab_callback(){
		$details_section_tab = get_theme_mod( 'ocscfw-account-details-tab','ocscfw-account-details-tab-edit');
		if ( 'ocscfw-account-details-tab-edit' === $details_section_tab ) {
			return true;
		}
		return false;
	}
	
	function ocscfw_logout_tab_callback(){
		$logout_section_tab = get_theme_mod( 'ocscfw-account-logout-tab','ocscfw-account-logout-tab-edit');
		if ( 'ocscfw-account-logout-tab-edit' === $logout_section_tab ) {
			return true;
		}
		return false;
	}

	
?>