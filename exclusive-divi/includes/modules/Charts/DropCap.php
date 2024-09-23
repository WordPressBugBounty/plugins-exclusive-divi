<?php

class EDM_DropCap extends ET_Builder_Module {

	public $slug       = 'edm_drop_cap';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'http://www.exclusivedivi.com/',
		'author'     => 'Exclusive Divi',
		'author_uri' => 'http://www.exclusivedivi.com/',
	);

	public function init() {
		$this->name = esc_html__( 'ED Drop Cap', 'edm-exclusive-divi-modules' );
		$this->icon_path = EDM_PLUGIN_PATH . 'admin/icons/edm_expanding_cta.svg';
	}

	public function get_settings_modal_toggles() {

		return array(

			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title'    => esc_html__( 'Content', 'edm-exclusive-divi-modules' ),
						'priority' => 1,
					)
				),
			),
		

		);

	}

	public function get_advanced_fields_config() {

		return array(
		
			'fonts'      => array(
				'header' => array(
					'label'          => esc_html__( 'Drop Cap', 'edm-exclusive-divi-modules' ),
					'css'            => array(
						'main' => '%%order_class%% .edm_drop_cap_letter',
					),
					'font_size'      => array(
						'default' => '35px',
					),
					'line_height'    => array(
						'default' => '1em',
					),
					'letter_spacing' => array(
						'default' => '0px',
					)
				),

			),
			'text'       => true ,


			'borders'    => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => '%%order_class%%',
							'border_styles' => '%%order_class%%',
						),
					),
				),
			),
			'box_shadow' => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
			),
		);

	}

	public function get_fields() {
		
			return array(

				'drop_cap_letter' => array(
					'label'            => esc_html__( 'Drop cap letter', 'edm-exclusive-divi-modules' ),
					'type'             => 'text',
					'option_category'  => 'basic_option',
					'toggle_slug'      => 'main_content',
					'default' => esc_html__('Your Title Goes Here', 'edm-exclusive-divi-modules'),
					'default_on_front' => esc_html__('Your Title Goes Here', 'edm-exclusive-divi-modules'),
				),

				'body_content'        => array(
					'label'           => et_builder_i18n( 'Body' ),
					'type'            => 'tiny_mce',
					'option_category' => 'basic_option',
					'default' => esc_html__('Your content goes here. Edit or remove this text inline or in the module Content settings. You can also style every aspect of this content in the module Design settings and even apply custom CSS to this text in the module Advanced settings.','edm-exclusive-divi-modules'),
					'description'     => esc_html__( 'Input the main text content for your module here.', 'edm-exclusive-divi-modules' ),
					'toggle_slug'     => 'main_content',
					'dynamic_content' => 'text',
					'hover'           => 'tabs',
				),



			);
				}

	public function render( $attrs, $content = null, $render_slug ) {

		$highlighted_text = $this->props['body_content'];
		$drop_cap_letter  = $this->props['drop_cap_letter'];
		$output = sprintf(
			'<div class="edm_dropcap_text_content" data-letter="%1$s"  >%2$s</div>',
				$drop_cap_letter ,
				$highlighted_text
		);



		return $output;
	
	}
}

new  EDM_DropCap;
