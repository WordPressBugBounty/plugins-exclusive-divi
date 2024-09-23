<?php

class EDM_FacnyText extends ET_Builder_Module {

	public $slug       = 'edm_fancy_text';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'http://www.exclusivedivi.com/',
		'author'     => 'Exclusive Divi',
		'author_uri' => 'http://www.exclusivedivi.com/',
	);

	public function init() {
		$this->name = esc_html__( 'ED Fancy Text', 'edm-exclusive-divi-modules' );
		$this->icon_path = EDM_PLUGIN_PATH . 'admin/icons/edm_fancy_text.svg';
	}

	public function get_settings_modal_toggles() {

		return array(

			'general'  => array(
				'toggles' => array(
					'main_content'  => esc_html__( 'Fancy Text', 'edm-exclusive-divi-modules' ),
					'fancy_animation' => array(
						'title'    => esc_html__( 'Animation Settings', 'edm-exclusive-divi-modules' )
					),
				),

			),

			'advanced' => array(
				'toggles' => array(
					'fancy_text_settings' => array(
						'title'    => esc_html__( 'Fancy Text Spacing', 'edm-exclusive-divi-modules' )
					)
				),
			),


		);

	}

	public function get_advanced_fields_config() {

		return array(
		
			'fonts'                 => array(

				'global_heading_settings' => array(
					'label'               => esc_html__( 'Fancy Alignment', 'edm-exclusive-divi-modules' ),
					'css'                 => array(
						'main' => '%%order_class%% .edm_fancy_container'
					),
					'hide_font'           => true,
					'hide_font_size'      => true,
					'hide_font_weight'    => true,
					'hide_font_style'     => true,
					'hide_letter_spacing' => true,
					'hide_line_height'    => true,
					'hide_text_color'     => true,
					'hide_text_shadow'    => true,
					'important'           => 'all',
				),


				'before' => array(
					'label'          => esc_html__( 'Before Fancy', 'edm-exclusive-divi-modules' ),
					'css'      => array(
						'main' => '%%order_class%% .edm_fancy_before'
					),
					'font_size'      => array(
						'default' => '22px',
					),
					'line_height'    => array(
						'default' => '1em',
					),
					'letter_spacing' => array(
						'default' => '0px',
					)
				),

				'fancy_text' => array(
					'label'          => esc_html__( 'Fancy', 'edm-exclusive-divi-modules' ),
					'css'      => array(
						'main' => '%%order_class%% .edm_fancy_text'
					),
					'font_size'      => array(
						'default' => '22px',
					),
					'line_height'    => array(
						'default' => '1em',
					),
					'letter_spacing' => array(
						'default' => '0px',
					)
				),


				'after' => array(
					'label'          => esc_html__( 'After Fancy', 'edm-exclusive-divi-modules' ),
					'css'      => array(
						'main' => '%%order_class%% .edm_fancy_after'
					),
					'font_size'      => array(
						'default' => '22px',
					),
					'line_height'    => array(
						'default' => '1em',
					),
					'letter_spacing' => array(
						'default' => '0px',
					)
				),



			),
			'text'                  => false,
		);

	}

	public function get_fields() {
		
		return array(

			'before_text'       => array(
				'label'            => esc_html__( 'Before Text', 'edm-exclusive-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'description'      => esc_html__( 'Text appear before the fancy text.', 'edm-exclusive-divi' ),
				'default_on_front' => 'We love',
				'toggle_slug'      => 'main_content',
			),

			'fancy_text'       => array(
				'label'            => esc_html__( 'Fancy Text', 'edm-exclusive-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'description'      => esc_html__( 'Add your text for Typing effect. Use "|" as a separator.', 'edm-exclusive-divi' ),
				'default_on_front' => 'We love Divi Builder | Exclusive Divi',
				'toggle_slug'      => 'main_content',
			),

			'after_text'       => array(
				'label'            => esc_html__( 'After Text', 'edm-exclusive-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'description'      => esc_html__( 'Text appear after the fancy text.', 'edm-exclusive-divi' ),
				'default_on_front' => 'Builder',
				'toggle_slug'      => 'main_content',
			),


			// Animation Control For Typing Text
			'animation_type'         => array(
				'label'            => esc_html__( 'Animation', 'edm-exclusive-divi-modules' ),
				'type'             => 'select',
				'default'          => 'flash',
				'default_on_front' => 'flash',
				'options'          => array(
	 				'bounce' => esc_html__('bounce', 'edm-exclusive-divi-modules'),
	                'flash' => esc_html__('flash', 'edm-exclusive-divi-modules'),
	                'pulse' => esc_html__('pulse', 'edm-exclusive-divi-modules'),
	                'rubberBand' => esc_html__('rubberBand', 'edm-exclusive-divi-modules'),
	                'shake' => esc_html__('shake', 'edm-exclusive-divi-modules'),
	                'swing' => esc_html__('swing', 'edm-exclusive-divi-modules'),
	                'tada' => esc_html__('tada', 'edm-exclusive-divi-modules'),
	                'wobble' => esc_html__('wobble', 'edm-exclusive-divi-modules'),
	                'bounceIn' => esc_html__('bounceIn', 'edm-exclusive-divi-modules'),
	                'bounceInDown' => esc_html__('bounceInDown', 'edm-exclusive-divi-modules'),
	                'bounceInLeft' => esc_html__('bounceInLeft', 'edm-exclusive-divi-modules'),
	                'bounceInRight' => esc_html__('bounceInRight', 'edm-exclusive-divi-modules'),
	                'bounceInUp' => esc_html__('bounceInUp', 'edm-exclusive-divi-modules'),
	                'fadeIn' => esc_html__('fadeIn', 'edm-exclusive-divi-modules'),
	                'fadeInDown' => esc_html__('fadeInDown', 'edm-exclusive-divi-modules'),
	                'fadeInDownBig' => esc_html__('fadeInDownBig', 'edm-exclusive-divi-modules'),
	                'fadeInLeft' => esc_html__('fadeInLeft', 'edm-exclusive-divi-modules'),
	                'fadeInLeftBig' => esc_html__('fadeInLeftBig', 'edm-exclusive-divi-modules'),
	                'fadeInRight' => esc_html__('fadeInRight', 'edm-exclusive-divi-modules'),
	                'fadeInRightBig' => esc_html__('fadeInRightBig', 'edm-exclusive-divi-modules'),
	                'fadeInUp' => esc_html__('fadeInUp', 'edm-exclusive-divi-modules'),
	                'fadeInUpBig' => esc_html__('fadeInUpBig', 'edm-exclusive-divi-modules'),
	                'flip' => esc_html__('flip', 'edm-exclusive-divi-modules'),
	                'flipInX' => esc_html__('flipInX', 'edm-exclusive-divi-modules'),
	                'flipInY' => esc_html__('flipInY', 'edm-exclusive-divi-modules'),
	                'rotateIn' => esc_html__('rotateIn', 'edm-exclusive-divi-modules'),
	                'rotateInDownLeft' => esc_html__('rotateInDownLeft', 'edm-exclusive-divi-modules'),
	                'rotateInDownRight' => esc_html__('rotateInDownRight', 'edm-exclusive-divi-modules'),
	                'rotateInUpLeft' => esc_html__('rotateInUpLeft', 'edm-exclusive-divi-modules'),
	                'rotateInUpRight' => esc_html__('rotateInUpRight', 'edm-exclusive-divi-modules'),
	                'zoomIn' => esc_html__('zoomIn', 'edm-exclusive-divi-modules'),
	                'zoomInDown' => esc_html__('zoomInDown', 'edm-exclusive-divi-modules'),
	                'zoomInLeft' => esc_html__('zoomInLeft', 'edm-exclusive-divi-modules'),
	                'zoomInRight' => esc_html__('zoomInRight', 'edm-exclusive-divi-modules'),
	                'zoomInUp' => esc_html__('zoomInUp', 'edm-exclusive-divi-modules'),
	                'lightSpeedIn' => esc_html__('lightSpeedIn', 'edm-exclusive-divi-modules'),
	                'rollIn' => esc_html__('rollIn', 'edm-exclusive-divi-modules'),
				),
				'toggle_slug'      => 'fancy_animation',
			),
			'text_speed'        => array(
				'label'            => esc_html__( 'Speed (in ms)', 'edm-exclusive-divi-modules' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '1000ms',
				'default_on_front' => '1000ms',
				'default_unit'     => 'ms',
				'range_settings'   => array(
					'min'  => '10',
					'max'  => '3000',
					'step' => '1',
				),
				'toggle_slug'      => 'fancy_animation',
			),
			
			'spacing_between'        => array(
				'label'          => __( 'Text Padding', 'edm-exclusive-divi-modules' ),
				'description'    => __( 'Define custom padding for the fancy text.', 'edm-exclusive-divi-modules' ),
				'type'           => 'custom_padding',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'fancy_text_settings',
				'default'        => '0px|10px|0px|10px'
			),



		);
	}

	public function process_margin_padding(
		$val,
		$type,
		$imp
	) {

		$_top     = '';
		$_right   = '';
		$_bottom  = '';
		$_left    = '';
		$imp_text = '';
		$_val     = explode( '|', $val );

		if ( $imp ) {
			$imp_text = '!important';
		}

		if ( isset( $_val[0] ) && !empty( $_val[0] ) ) {
			$_top = "{$type}-top:" . $_val[0] . $imp_text . ';';
		}

		if ( isset( $_val[1] ) && !empty( $_val[1] ) ) {
			$_right = "{$type}-right:" . $_val[1] . $imp_text . ';';
		}

		if ( isset( $_val[2] ) && !empty( $_val[2] ) ) {
			$_bottom = "{$type}-bottom:" . $_val[2] . $imp_text . ';';
		}

		if ( isset( $_val[3] ) && !empty( $_val[3] ) ) {
			$_left = "{$type}-left:" . $_val[3] . $imp_text . ';';
		}

		return esc_html( "{$_top} {$_right} {$_bottom} {$_left}" );
	}

    public function withoutMSFromVal($typingval){
      $typingval = str_replace("ms","",$typingval);
      $typingval = (int)($typingval);
      return $typingval;
    }

	public function render( $attrs, $content = null, $render_slug ) {

//		wp_enqueue_style('animatecss');
		$spacing_between = $this->props['spacing_between'];

		if ( '' !== $spacing_between  ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .edm_fancy_text',
					'declaration' => sprintf( '%1$s', esc_attr($this->process_margin_padding($spacing_between, 'padding', true)  ) ),
				)
			);
		}


		return sprintf( '<div class="edm_fancy_container" data-speed="%4$s" data-animation="%5$s"><span class="edm_fancy_before">%1$s</span><span class="edm_fancy_text">%2$s</span><span class="edm_fancy_after">%3$s</span></div>', $this->props['before_text'], $this->props['fancy_text'], $this->props['after_text'], $this->withoutMSFromVal($this->props['text_speed']) ,$this->props['animation_type'] );
	}
}

new EDM_FacnyText;
