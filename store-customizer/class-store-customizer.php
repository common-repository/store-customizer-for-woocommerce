<?php
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'goldly_GeneratePress_Upsell_Section' ) ) {

	class OCSCFW_Upsell_Section extends WP_Customize_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'ocscfw-heading';
		
		/**
         * Set ID.
         *
         * @var public $id
         */
        public $id = '';

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 */

		public function to_json() {
			parent::to_json();		

			$this->json['label'] = esc_html( $this->label );

			$json['id'] = $this->id;

	        return $json;
		}

		/**
		 * Render the control's content.
		 *
		 * @see WP_Customize_Control::render_content()
		 */
		
		protected function render_content() {
			?>
			<h3 class="ocscfw_section-heading">
	            <?php echo esc_html( $this->label ); ?>      
	        </h3>
			<?php
		}
	}

}