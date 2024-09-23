<?php

class EDM_GradientText extends ET_Builder_Module {

	public $slug       = 'edm_gradient_text';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'http://www.exclusivedivi.com/',
		'author'     => 'Exclusive Divi',
		'author_uri' => 'http://www.exclusivedivi.com/',
	);

	public function init() {
		$this->name = esc_html__( 'ED Gradient Text', 'edm-exclusive-divi-modules' );
		$this->icon_path = EDM_PLUGIN_PATH . 'admin/icons/edm_gradient_text.svg';
	}

	public function get_settings_modal_toggles() {

		return array(

			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title'    => esc_html__( 'Gradient Content', 'edm-exclusive-divi-modules' ),
						'priority' => 1,
					),
				),
			),
		

		);

	}

	public function get_advanced_fields_config() {

		return array(
		
			'fonts'      => array(
				'header' => array(
					'label'          => esc_html__( 'Gradient', 'edm-exclusive-divi-modules' ),
					'css'            => array(
						'main' => '%%order_class%% h1.edm_gradient_text_content, %%order_class%% h2.edm_gradient_text_content, %%order_class%% h3.edm_gradient_text_content, %%order_class%% h4.edm_gradient_text_content, %%order_class%% h5.edm_gradient_text_content, %%order_class%% h6.edm_gradient_text_content',
					),
					'font_size'      => array(
						'default' => '35px',
					),
					'line_height'    => array(
						'default' => '1em',
					),
					'letter_spacing' => array(
						'default' => '0px',
					),
					'header_level'   => array(
						'default' => 'h2',
					),
				),
			),
			'text'       => false,
			'background' => array(
				'css'     => array(
					'main' => '%%order_class%% .edm_gradient_text_content',
				),
				'options' => array(
					'use_background_color'            => array(
						'default' => 'off',
					),
					'use_background_video'            => array(
						'default' => 'off',
					),
					'use_background_color_gradient'   => array(
						'default' => 'on',
					),
					'background_color_gradient_start' => array(
						'default' => '#ffcf6d',
					),
					'background_color_gradient_end'   => array(
						'default' => '#ff3939',
					),
					'parallax_method'                 => array(
						'default' => 'off',
					),
				),
			),
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
				'gradient_text' => array(
					'label'            => esc_html__( 'Gradient Text', 'edm-exclusive-divi-modules' ),
					'type'             => 'text',
					'option_category'  => 'basic_option',
					'toggle_slug'      => 'main_content',
					'default_on_front' => 'Exclusive Gradient Text Module',
				),
			);

	}

	public function render( $attrs, $content = null, $render_slug ) {

		$gradient_text = $this->props['gradient_text'];
		$header_level  = $this->props['header_level'];

		

		if ( '' !== $gradient_text ) {
			$gradient_text = sprintf(
				'<%1$s class="edm_gradient_text_content">%2$s</%1$s>',
				et_pb_process_header_level( $header_level, 'h2' ),
				$gradient_text
			);
		}

		$output = sprintf(
			'%1$s',
			$gradient_text
		);

		return $output;
	
	}
}

new  EDM_GradientText;
