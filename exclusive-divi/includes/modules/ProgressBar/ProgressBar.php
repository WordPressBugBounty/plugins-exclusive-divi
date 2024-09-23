<?php

class EDM_ProgressBar extends ET_Builder_Module {

	public $slug       = 'edm_progress_bar';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'http://www.exclusivedivi.com/',
		'author'     => 'Exclusive Divi',
		'author_uri' => 'http://www.exclusivedivi.com/',
	);

	public function init() {
		$this->name = esc_html__( 'ED Progress Bar', 'edm-exclusive-divi-modules' );
		$this->icon_path = EDM_PLUGIN_PATH . 'admin/icons/edm_typing_text.svg';
	}

	public function get_settings_modal_toggles() {

		return array(

			'general'  => array(
				'toggles' => array(
					'main_content'  => esc_html__( 'Progress Bar Settings', 'edm-exclusive-divi-modules' ),
				),

			),

			'advanced' => array(
				'toggles' => array(
					'progress_bar_styles' => array(
						'title'    => esc_html__( 'Progress Bar Styles', 'edm-exclusive-divi-modules' )
					)
				),
			),
		);

	}

	public function get_advanced_fields_config() {

		return array(
		
			'fonts'                 => array(
			),
			'text'                  => false,
		);

	}

	public function get_fields() {
		
		return array(
			'display_position'       => array(
				'label'            => esc_html__( 'Display Position', 'edm-exclusive-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'top' => esc_html__( 'Top', 'edm-exclusive-divi-modules' ),
					'after_header' => esc_html__( 'After Header', 'edm-exclusive-divi-modules' ),
					'bottom' => esc_html__( 'Bottom', 'edm-exclusive-divi-modules' ),
				),
				'description'      => esc_html__( 'Select where you would like to display the bar.', 'edm-exclusive-divi' ),
				'default_on_front' => 'after_header',
				'toggle_slug'      => 'main_content',
			),



			'progress_bar_background' => array(
				'label'        => esc_html__( 'Background Color', 'edm-exclusive-divi-modules' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'progress_bar_styles',
			),


			'progress_bar_progress' => array(
				'label'        => esc_html__( 'Progress Color', 'edm-exclusive-divi-modules' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'progress_bar_styles',
			),

			'progress_bar_size'    => array(
				'label'            => esc_html__( 'Size', 'edm-exclusive-divi-modules' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '4px',
				'default_on_front' => '4px',
				'default_unit'     => 'px',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'toggle_slug'      => 'progress_bar_styles',
				'tab_slug'     => 'advanced',
			),

			'progress_bar_radius'    => array(
				'label'            => esc_html__( 'Bar Radius', 'edm-exclusive-divi-modules' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '0px',
				'default_on_front' => '0px',
				'default_unit'     => 'px',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'toggle_slug'      => 'progress_bar_styles',
				'tab_slug'     => 'advanced',
			),



		);
	}

	public function render( $attrs, $content = null, $render_slug ) {

		$display_position = $this->props['display_position'];
		$order_class = self::get_module_order_class( $render_slug );
		$progress_bar_background = $this->props['progress_bar_background'];
		$progress_bar_progress = $this->props['progress_bar_progress'];
		$progress_bar_size = $this->props['progress_bar_size'];
		$progress_bar_radius = $this->props['progress_bar_radius'];

		if ( '' !== $progress_bar_background  ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%-outer .edm_progressbar_inner',
					'declaration' => sprintf( 'background: %1$s;', esc_attr($progress_bar_background  ) ),
				)
			);
		}

		if ( '' !== $progress_bar_progress  ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%-outer .edm_progressbar_bar',
					'declaration' => sprintf( 'background: %1$s;', esc_attr($progress_bar_progress  ) ),
				)
			);
		}	
		
		if ( '' !== $progress_bar_progress  ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%-outer .edm_progressbar_bar',
					'declaration' => sprintf( 'padding: %1$s;', esc_attr($progress_bar_size  ) ),
				)
			);
		}	

		if ( '' !== $progress_bar_radius  ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%-outer .edm_progressbar_bar',
					'declaration' => sprintf( 'border-radius:0 %1$s %2$s 0;', esc_attr($progress_bar_radius), esc_attr($progress_bar_radius) ),
				)
			);
		}

		if ( 'bottom' == $display_position  ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%-outer',
					'declaration' => 'position:fixed;z-index:9999;bottom:0;left:0;width:100%;',
				)
			);
		}	
		if ( 'top' == $display_position  ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%-outer',
					'declaration' => 'position:fixed;z-index:99999999;top:0;left:0;width:100%;',
				)
			);
		}	


		return ( '<div class="edm_progress_build" data-orderclass="'.$order_class.'-outer" data-position="'.$display_position.'"></div>' );
	}
}

new EDM_ProgressBar;
