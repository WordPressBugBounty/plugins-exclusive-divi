<?php

class EDM_ScrollingText extends ET_Builder_Module {

	public $slug       = 'edm_scrolling_text';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'http://www.exclusivedivi.com/',
		'author'     => 'Exclusive Divi',
		'author_uri' => 'http://www.exclusivedivi.com/',
	);

	public function init() {
		$this->name = esc_html__( 'ED Scrolling Text', 'edm-exclusive-divi-modules' );
		$this->icon_path = EDM_PLUGIN_PATH . 'admin/icons/edm_scrolling_text.svg';
	}

	public function get_settings_modal_toggles() {

		return array(

			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title'    => esc_html__( 'Scrolling Content', 'edm-exclusive-divi-modules' ),
						'priority' => 1,
					),

					'scrolling_settings' 	   => esc_html__( 'Scrolling Text Settings', 'edm-exclusive-divi-modules' )
				),
			),
		

		);

	}

	public function get_advanced_fields_config() {

		return array(
		
			'fonts'      => array(
				'header' => array(
					'label'          => esc_html__( 'Scrolling', 'edm-exclusive-divi-modules' ),
					'css'            => array(
						'main' => '%%order_class%% h1.edm_scrolling_text_content, %%order_class%% h2.edm_scrolling_text_content, %%order_class%% h3.edm_scrolling_text_content, %%order_class%% h4.edm_scrolling_text_content, %%order_class%% h5.edm_scrolling_text_content, %%order_class%% h6.edm_scrolling_text_content',
					),
					'font_size'      => array(
						'default' => '35px',
					),
					'line_height'    => array(
						'default' => '3em',
					),
					'letter_spacing' => array(
						'default' => '0px',
					),
					'header_level'   => array(
						'default' => 'h2',
					),
				),
			),

			'text'       => false ,
				
		
			'background' => array(
				'css'     => array(
					'main' => '%%order_class%% .edm_scrolling_text_content',
				)
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
				'scrolling_text' => array(
					'label'            => esc_html__( 'Scrolling Text', 'edm-exclusive-divi-modules' ),
					'type'             => 'text',
					'option_category'  => 'basic_option',
					'toggle_slug'      => 'main_content',
					'default_on_front' => 'Exclusive Scrolling Text Module',
				),
			


			'scrolling_direction'                   => array(
				'label'            => esc_html__( 'Scrolling Direction', 'edm-exclusive-divi-modules' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'left' => esc_html__( 'Left', 'edm-exclusive-divi-modules' ),
					'right'   => esc_html__( 'Right', 'edm-exclusive-divi-modules' ),
				),
				'default_on_front' => 'left',
				'toggle_slug'      => 'scrolling_settings',
				'description'     => esc_html__( 'Choose Scrolling Text Direction', 'edm-exclusive-divi-modules' ),
		
			),

			'show_outline'                => array(
				'label'           => esc_html__( 'Enable Scrolling Text Outline', 'edm-exclusive-divi-modules' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'edm-exclusive-divi-modules' ),
					'on'  => esc_html__( 'Yes', 'edm-exclusive-divi-modules' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'scrolling_settings',
				'description'     => esc_html__( 'Enable Scrolling Text Outline for better look.', 'edm-exclusive-divi-modules' ),
			),
			
			'hover_pause'                => array(
				'label'           => esc_html__( 'Pause on Hover', 'edm-exclusive-divi-modules' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'edm-exclusive-divi-modules' ),
					'on'  => esc_html__( 'Yes', 'edm-exclusive-divi-modules' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'scrolling_settings',
				'description'     => esc_html__( 'You can pause Scrolling on Hover by enabling this option.', 'edm-exclusive-divi-modules' ),
			),
			

			'repeat_text'                => array(
				'label'           => esc_html__( 'Repeat Scrolling Text', 'edm-exclusive-divi-modules' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'edm-exclusive-divi-modules' ),
					'on'  => esc_html__( 'Yes', 'edm-exclusive-divi-modules' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'scrolling_settings',
				'description'     => esc_html__( 'You will need more repeats to create the infinite scrolling effect.', 'edm-exclusive-divi-modules' ),
			),
			

			'scrolling_speed'                   => array(
				'label'           => esc_html__( 'Scrolling Text Speed', 'edm-exclusive-divi-modules' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'validate_unit'         => true,
				'range_settings'        => array(
					'min'   => '100',
					'max'   => '10000',
					'step'  => '100',
				),
				'default'               => '7500',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'scrolling_settings',
				'description'     => esc_html__( 'Choose the speed for your scrolling text in milliseconds.', 'edm-exclusive-divi-modules' ),
			),

			

		);
	}

	public function render( $attrs, $content = null, $render_slug ) {

		$scrolling_text = $this->props['scrolling_text'];
		$header_level  = $this->props['header_level'];
		$scrolling_direction  = $this->props['scrolling_direction'];
		$show_outline  = $this->props['show_outline'];
		$scrolling_speed  = $this->props['scrolling_speed'];
		$repeat_text  = $this->props['repeat_text'];
		$hover_pause  = $this->props['hover_pause'];
		
		
		if('on' == $show_outline) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .edm_scrolling_text_content',
					'declaration' => '-webkit-text-stroke-width: 1px;webkit-text-stroke-color: inherit; -webkit-text-fill-color: transparent;',
				)
			);

		}

		
		wp_enqueue_script( 'edm-scrolling');
	



		if ( '' !== $scrolling_text ) {
			$scrolling_text = sprintf(
				'<%1$s class="edm_scrolling_text_content" data-scroll-direction="%3$s" data-scroll-speed="%4$s" data-repeat-text ="%5$s" data-scroll-pause="%6$s">%2$s</%1$s>',
				et_pb_process_header_level( $header_level, 'h2' ),
				$scrolling_text,
				$scrolling_direction,
				$scrolling_speed,
				$repeat_text,
				$hover_pause

			);
		}

		$output = sprintf(
			'%1$s',
			$scrolling_text
		);

		return $output;
	
	}
}

new  EDM_ScrollingText;
