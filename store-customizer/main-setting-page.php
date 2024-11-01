<?php
if (!defined('ABSPATH'))
  exit;

if (!class_exists('OCSCFW_MAIN_PAGE_SETTING')) {

  	class OCSCFW_MAIN_PAGE_SETTING {

	    protected static $OCSCFW_instance;

	   
		    function ocscfw_notice_banner(){
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
			    $ocscfw_notice_title = get_theme_mod('ocscfw-product-note-text-title');
			    $ocscfw_notice_text = get_theme_mod('ocscfw-product-note-text-dis' , 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industrys standard dummy text ever since the 1500s');
			    ?>
			    <div class="ocscfw_notice_section">
			        <h4><?php  esc_html_e( $ocscfw_notice_title );?></h4>
			        <p><?php echo wp_kses( $ocscfw_notice_text, $allowed_tags);?></p>
			    </div>
			    <?php 
			}


			function OCSCFW_notice_text_action(){

					if(is_shop()){
							add_action( get_theme_mod('ocscfw-notice-banner-shop') ,array($this ,'ocscfw_notice_banner' ));
					}
				 		
				 	if(is_product()){
				 			add_action( get_theme_mod('ocscfw-notice-single-pro') ,array($this ,'ocscfw_notice_banner' ));
				 	}

				 	if ( is_checkout() ) {
				 			add_action( get_theme_mod('ocscfw-notice-banner-checkout') ,array($this ,'ocscfw_notice_banner' ));
				 	}

				 	if ( is_cart() ) {
				 			add_action( get_theme_mod('ocscfw-notice-banner-cart') ,array($this ,'ocscfw_notice_banner' ));
				 	}

			}


			function OCSCFW_main_page_design_css(){ ?>

					<style type="text/css">

						.ocscfw_notice_section{
								width:  <?php echo esc_attr(get_theme_mod('ocscfw-width-in-notice-board')); ?>%;
								margin: <?php echo esc_attr(get_theme_mod('ocscfw-margin-in-notice-board'));?>px;
								padding : <?php echo esc_attr(get_theme_mod('ocscfw-padding-in-notice-board'));?>px;
								background-color: <?php echo esc_attr(get_theme_mod('ocscfw-notice-back-color')); ?>;
								border :<?php echo esc_attr(get_theme_mod('ocscfw-note-border-size')); ?>px  solid <?php echo esc_attr(get_theme_mod('ocscfw-note-border-color')); ?>;
								<?php if(get_theme_mod('ocscfw-notice-text-center')){ ?>
										text-align: center;
										margin: auto;
								<?php } ?>
						}

						.ocscfw_notice_section h4{
	    				font-size: <?php echo get_theme_mod('ocscfw-notice-heading-text-font-size'); ?>px;
	    				color: <?php echo get_theme_mod('ocscfw-notice-heading-text-color'); ?>;
	    				margin: 0px;
						}

						.ocscfw_notice_section p{
	    				font-size: <?php echo get_theme_mod('ocscfw-notice-text-font-size'); ?>px;
	    				color: <?php echo get_theme_mod('ocscfw-notice-text-color'); ?>;
    					margin: 0px;
						}

					</style>

			<?php 
			} 

	    function init(){
	    	add_filter( 'template_redirect',array($this ,'OCSCFW_notice_text_action') );
	    	add_action( 'wp_head',array($this, 'OCSCFW_main_page_design_css'));
	    }
	    public static function OCSCFW_instance() {
		      	if (!isset(self::$OCSCFW_instance)) {
		        	self::$OCSCFW_instance = new self();
		        	self::$OCSCFW_instance->init();
		      	}
		      return self::$OCSCFW_instance;
		    }
	  	}

  OCSCFW_MAIN_PAGE_SETTING::OCSCFW_instance();
}