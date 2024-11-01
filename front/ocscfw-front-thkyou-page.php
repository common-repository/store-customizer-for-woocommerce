<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('OCSCFW_frontend_thkyou')) {

  	class OCSCFW_frontend_thkyou{

	    protected static $OCSCFW_instance;


 
			function OCSCFW_thank_you_title( $old_title ){

				if(get_theme_mod('ocscfw-thku-main-title-tab') == 'ocscfw-thku-main-title-edit'){

					$old_title = get_theme_mod('ocscfw-thku-main-title' , 'Order received');

				}
				return $old_title;
			}


			function OCSCFW_add_content_thankyou() {
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
	            ) ),
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

			 		$ocscfw_thku_custom_textarea = get_theme_mod('ocscfw-thku-custom-textarea');
			 	
					if(get_theme_mod('ocscfw-thank-you-page-custom-content-add') != 'none'){
						?>
						<div class="custom_oc_content">
							<?php 
							 	echo wp_kses( $ocscfw_thku_custom_textarea, $allowed_tags);
							?>
						</div>
						 <?php 
					}
			}


			function OCSCFW_thankyou_page_css(){ ?>
				<style type="text/css">
					.woocommerce-order-received .entry-title{	
						<?php if(get_theme_mod('ocscfw-thku-main-title-tab') == "ocscfw-thku-main-title-remove"){?> 
							display: none;
						<?php } ?>
							color : <?php echo esc_attr(get_theme_mod('ocscfw-order-receive-color')); ?>;
					}
					.custom_oc_content{
						color: <?php echo esc_attr(get_theme_mod('ocscfw-thnku-cust-content-text-color')); ?>;
					}
				</style>
			<?php 
			}

			function OCSCFW_custcontent_priority(){
				if(get_theme_mod('ocscfw-thank-you-page-custom-content-add') ==  5){
					add_action( 'woocommerce_thankyou', array($this,'OCSCFW_add_content_thankyou') , 5);
				}else{
					add_action( 'woocommerce_thankyou', array($this,'OCSCFW_add_content_thankyou') );
				}
			}

	    function init(){
	    	add_filter( 'woocommerce_endpoint_order-received_title',array($this, 'OCSCFW_thank_you_title' ));
	    	add_action('init',array($this , 'OCSCFW_custcontent_priority'));
	    	add_action('wp_head',array($this , 'OCSCFW_thankyou_page_css'));
	    }


	    public static function OCSCFW_instance() {
		    if (!isset(self::$OCSCFW_instance)) {
		        self::$OCSCFW_instance = new self();
		        self::$OCSCFW_instance->init();
		    }
		      return self::$OCSCFW_instance;
	    }

  	}

  OCSCFW_frontend_thkyou::OCSCFW_instance();

}

