<?php

class EDM_TypingText extends ET_Builder_Module {

	public $slug       = 'edm_typing_text';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'http://www.exclusivedivi.com/',
		'author'     => 'Exclusive Divi',
		'author_uri' => 'http://www.exclusivedivi.com/',
	);

	public function init() {
		$this->name = esc_html__( 'ED Typing Text', 'edm-exclusive-divi-modules' );
		$this->icon_path = EDM_PLUGIN_PATH . 'admin/icons/edm_typing_text.svg';
	}

	public function get_settings_modal_toggles() {

		return array(

			'general'  => array(
				'toggles' => array(
					'main_content'  => esc_html__( 'Typing Text', 'edm-exclusive-divi-modules' ),
				),

			),

			'advanced' => array(
				'toggles' => array(
					'typing_styles' => array(
						'title'    => esc_html__( 'Typing Pointer Styles', 'edm-exclusive-divi-modules' )
					),
					'typing_animation' => array(
						'title'    => esc_html__( 'Typing Animation', 'edm-exclusive-divi-modules' )
					),
				),
			),
		);

	}

	public function get_advanced_fields_config() {

		return array(
		
			'fonts'                 => array(

				'header' => array(
					'label'          => esc_html__( 'Typing', 'edm-exclusive-divi-modules' ),
					'css'      => array(
						'main' => '%%order_class%% .edm_typing_container h1,
									%%order_class%% .edm_typing_container h2,
									%%order_class%% .edm_typing_container h3,
									%%order_class%% .edm_typing_container h4,
									%%order_class%% .edm_typing_container h5,
									%%order_class%% .edm_typing_container h6',
					),
					'font_size'      => array(
						'default' => '22px',
					),
					'line_height'    => array(
						'default' => '1em',
					),
					'letter_spacing' => array(
						'default' => '0px',
					),
					'header_level'   => array(
						'default' => 'h4',
					),
				),

			),
			'text'                  => false,
		);

	}

	public function get_fields() {
		
		return array(
			'typing_text'       => array(
				'label'            => esc_html__( 'Typing Text', 'edm-exclusive-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'description'      => esc_html__( 'Add your text for Typing effect. Use "|" as a separator.', 'edm-exclusive-divi' ),
				'default_on_front' => 'We love Divi Builder | Exclusive Divi',
				'toggle_slug'      => 'main_content',
			),

			// Animation Control For Typing Text
			'typing_loop'         => array(
				'label'            => esc_html__( 'Use Loop', 'edm-exclusive-divi-modules' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'default'          => 'on',
				'default_on_front' => 'on',
				'options'          => array(
					'off' => esc_html__( 'No', 'edm-exclusive-divi-modules' ),
					'on'  => esc_html__( 'Yes', 'edm-exclusive-divi-modules' ),
				),
				'description'      => esc_html__( 'If enabled, typing effect will loop infinite.', 'edm-exclusive-divi-modules' ),
				'toggle_slug'      => 'typing_animation',
				'tab_slug'     => 'advanced',
			),
			'typing_speed'        => array(
				'label'            => esc_html__( 'Typing Speed (in ms)', 'edm-exclusive-divi-modules' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '100ms',
				'default_on_front' => '100ms',
				'default_unit'     => 'ms',
				'range_settings'   => array(
					'min'  => '10',
					'max'  => '3000',
					'step' => '1',
				),
				'toggle_slug'      => 'typing_animation',
				'tab_slug'     => 'advanced',
			),
			'typing_backspeed'    => array(
				'label'            => esc_html__( 'Typing Backspeed (in ms)', 'edm-exclusive-divi-modules' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '50ms',
				'default_on_front' => '50ms',
				'default_unit'     => 'ms',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '300',
					'step' => '1',
				),
				'toggle_slug'      => 'typing_animation',
				'tab_slug'     => 'advanced',
			),
			'typing_backdelay'    => array(
				'label'            => esc_html__( 'Back delay (in ms)', 'edm-exclusive-divi-modules' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '700ms',
				'default_on_front' => '700ms',
				'range_settings'   => array(
					'min'  => '200',
					'max'  => '2000',
					'step' => '100',
				),
				'description'      => esc_html__( 'Time before backspacing', 'edm-exclusive-divi-modules' ),
				'toggle_slug'      => 'typing_animation',
				'tab_slug'     => 'advanced',
			),

			'typing_cursor_color' => array(
				'label'        => esc_html__( 'Cursor Color', 'edm-exclusive-divi-modules' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'typing_styles',
			),


		);
	}

	public function render( $attrs, $content = null, $render_slug ) {

		$typing_text = $this->props['typing_text'];
		$typing_loop = $this->props['typing_loop'];
		$typing_speed = $this->props['typing_speed'];
		$typing_backspeed = $this->props['typing_backspeed'];
		$typing_backdelay = $this->props['typing_backdelay'];
		$typing_heading = $this->props['header_level'];
		$typing_cursor_color = $this->props['typing_cursor_color'];

		wp_enqueue_script('edm-typed');

		if ( '' !== $typing_cursor_color  ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .typed-cursor',
					'declaration' => sprintf( 'color: %1$s;', esc_attr($typing_cursor_color  ) ),
				)
			);
		}


		return sprintf( '<div class="edm_typing_container"><%6$s><span class="edm_typing_text_ref" data-edm-typetext="%1$s" data-edm-loop="%2$s" data-edm-speed="%3$s" data-edm-backspeed="%4$s" data-edm-backdelay="%5$s" ></span></%6$s></div>', $typing_text, $typing_loop, $typing_speed, $typing_backspeed, $typing_backdelay, $typing_heading  );
	}
}

new EDM_TypingText;
