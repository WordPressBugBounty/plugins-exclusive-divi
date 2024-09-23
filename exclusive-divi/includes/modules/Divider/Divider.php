<?php

class EDM_Divider extends ET_Builder_Module {

	public $slug       = 'edm_divider';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'http://www.exclusivedivi.com/',
		'author'     => 'Exclusive Divi',
		'author_uri' => 'http://www.exclusivedivi.com/',
	);

	public function init() {
		$this->name = esc_html__( 'ED Divider', 'edm-exclusive-divi-modules' );
		$this->icon_path = EDM_PLUGIN_PATH . 'admin/icons/edm_divider.svg';
	}

	public function get_settings_modal_toggles() {

		return array(

			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title'    => esc_html__( 'Divider Content', 'edm-exclusive-divi-modules' ),
						'priority' => 1,
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'divider_settings' => array(
						'title'    => esc_html__( 'Divider Styling', 'edm-exclusive-divi-modules' ),
						'priority' => 1,
					),
					'divider_icon_settings'      => array(
						'title'    => esc_html__( 'Divider Icon', 'edm-exclusive-divi-modules' ),
						'priority' => 2,
					),
					'divider_title_settings'     => array(
						'title'    => esc_html__( 'Divider Title', 'edm-exclusive-divi-modules' ),
						'priority' => 3,
					),
				),
			),

		);

	}

	public function get_advanced_fields_config() {

		return array(
		
			'fonts'                 => array(

				'header' => array(
					'label'          => esc_html__( 'Divider Title', 'edm-exclusive-divi-modules' ),
					'css'             => array(
						'main' => '%%order_class%% .edm_divider_container h1,
									%%order_class%% .edm_divider_container h2,
									%%order_class%% .edm_divider_container h3,
									%%order_class%% .edm_divider_container h4,
									%%order_class%% .edm_divider_container h5,
									%%order_class%% .edm_divider_container h6',
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
						'default' => 'h3',
					),
					'text_align' => array(
						'default' => 'center',
					),
				
				),

			),
			
			'text'                  => false,
		);

	}

	public function get_fields() {
		
		return array(

			'divider_type'                   => array(
				'label'           => esc_html__( 'Divider Type', 'edm-exclusive-divi-modules' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'none' => esc_html__( 'Only Divider Line', 'edm-exclusive-divi-modules' ),
					'text' => esc_html__( 'Divider Line With Text', 'edm-exclusive-divi-modules' ),
					'icon' => esc_html__( 'Divider Liner With Icon', 'edm-exclusive-divi-modules' ),
				),
				'default'         => 'none',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can control text or icon display with Divider', 'edm-exclusive-divi-modules' ),
			),

			'divider_content'                    => array(
				'label'           => esc_html__( 'Divider Text', 'edm-exclusive-divi-modules' ),
				'type'            => 'text',
				'default'		  => 'Exclusive Divi Divder' ,
				'show_if'         => array(
					'divider_type'       => 'text',
				),
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can set divider text', 'edm-exclusive-divi-modules' ),
			),

			'divider_icon'                  => array(
				'label'           => esc_html__( 'Icon', 'edm-exclusive-divi-modules' ),
				'type'            => 'select_icon',
				'default'          => 'P',
				'default_on_front' => 'P',
				'option_category' => 'basic_option',
				'class'           => array(
					'et-pb-font-icon',
				),
				'show_if'         => array(
					'divider_type'       => 'icon',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can set divider icon', 'edm-exclusive-divi-modules' ),
			),

			'divider_line_type'                  => array(
				'label'           => esc_html__( 'Select Divider Line Style', 'edm-exclusive-divi-modules' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'solid'  => esc_html__( 'Solid', 'edm-exclusive-divi-modules' ),
					'dashed' => esc_html__( 'Dashed', 'edm-exclusive-divi-modules' ),
					'dotted' => esc_html__( 'Dotted', 'edm-exclusive-divi-modules' ),
					'double' => esc_html__( 'Double', 'edm-exclusive-divi-modules' ),
					'ridge'  => esc_html__( 'Ridge', 'edm-exclusive-divi-modules' ),
					'groove' => esc_html__( 'Groove', 'edm-exclusive-divi-modules' ),
					'inset'  => esc_html__( 'Inset', 'edm-exclusive-divi-modules' ),
					'outset' => esc_html__( 'Outset', 'edm-exclusive-divi-modules' ),

				),
				'default'         => 'solid',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose Divider Line Type', 'edm-exclusive-divi-modules' ),
			),

			'divider_thickness'         => array(
				'label'           => esc_html__( 'Divider Thickness.', 'edm-exclusive-divi-modules' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '50',
					'step' => '1',
				),
				'default'         => '3px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'divider_settings',
				'description'     => esc_html__( 'Here you can choose Divider Line Weight', 'edm-exclusive-divi-modules' ),
			),
			'divider_color'            => array(
				'label'        => esc_html__( 'Divider Color', 'edm-exclusive-divi-modules' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'      => et_builder_accent_color(),
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'divider_settings',
				'description'  => esc_html__( 'Here you can control Divider Line Color', 'edm-exclusive-divi-modules' ),
			),
			
			'divider_icon_placement'             => array(
				'label'           => esc_html__( 'Icon Position', 'edm-exclusive-divi-modules' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'center' => esc_html__( 'Center', 'edm-exclusive-divi-modules' ),
					'left'   => esc_html__( 'Left', 'edm-exclusive-divi-modules' ),
					'right'  => esc_html__( 'Right', 'edm-exclusive-divi-modules' ),
				),
				'show_if'         => array(
					'divider_type'       => 'icon',
				),
				'default'         => 'center',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'divider_icon_settings',
				'description'     => esc_html__( 'Here you can select divider icon position', 'edm-exclusive-divi-modules' ),
			),

			'divider_icon_color'                 => array(
				'label'       => esc_html__( 'Icon Color', 'edm-exclusive-divi-modules' ),
				'type'        => 'color-alpha',
				'show_if'     => array(
					'divider_type'       => 'icon',
				),
				'default'     => et_builder_accent_color(),
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'divider_icon_settings',
				'description' => esc_html__( 'Here you can define a custom color for your icon.', 'edm-exclusive-divi-modules' ),
			),

			'divider_icon_font_size'             => array(
				'label'           => esc_html__( 'Icon Font Size', 'edm-exclusive-divi-modules' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'show_if'         => array(
					'divider_type'           => 'icon',
			
				),
				'default'         => '30px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'divider_icon_settings',
				'description'     => esc_html__( 'Here you can define a icon font size.', 'edm-exclusive-divi-modules' ),
			),


		);
	}

	public function render( $attrs, $content = null, $render_slug ) {

		$divider_type           = $this->props['divider_type'];
		$divider_content        = $this->props['divider_content'];
		$divider_icon           = $this->props['divider_icon'];
		$divider_thickness      = $this->props['divider_thickness'];
		$divider_color     		= $this->props['divider_color'];
		$divider_icon_color     = $this->props['divider_icon_color'];
		$divider_icon_font_size = $this->props['divider_icon_font_size'];
		$divider_icon_placement = $this->props['divider_icon_placement'];
		$divider_line_type		= $this->props['divider_line_type'];
		$header_level        	= $this->props['header_level'];
		$text_align				= $this->props['header_text_align'];


		if ( '' !== $divider_thickness  ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .edm_divider_line',
					'declaration' => sprintf( 'border-top-width: %1$s;', esc_attr( $divider_thickness  ) ),
				)
			);
		}

		if ( '' !== $divider_color) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .edm_divider_line',
					'declaration' => sprintf( 'border-top-color: %1$s;', esc_attr( $divider_color   ) ),
				)
			);
		}



			if('none' === $divider_type) {


				$output = sprintf(
					'<div class="edm_divider_container edm_divider_line_type">
										<div class="edm_divider_line edm_divider_line_before"></div>
										
										<div class="edm_divider_line edm_divider_line_after"></div>
									</div>', );

			}

			if('icon' === $divider_type) {

		

			if ( '' !== $divider_icon_color  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm-icon-wrapper .et-pb-icon',
						'declaration' => sprintf( 'color: %1$s;', esc_attr( $divider_icon_color  ) ),
					)
				);
			}

			if ( '' !== $divider_icon_font_size  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm-icon-wrapper .et-pb-icon',
						'declaration' => sprintf( 'font-size: %1$s;', esc_attr( $divider_icon_font_size  ) ),
					)
				);
			}

		
			
			

			$icon_container = ( '' !== $divider_icon ) ? sprintf(
				'<span class="et-pb-icon">%1$s</span>',
				esc_attr( et_pb_process_font_icon( $divider_icon ) ),

				) : '';

			$separator_icon = '<div class="edm-icon-wrapper">' . $icon_container . '</div>';
			$alignment      = $divider_icon_placement ? $divider_icon_placement : 'center';


					if ( '' === $alignment ) {
						$alignment = ' align_none';
					} else {
						$alignment = ' align_' . $alignment;
					}

		$output = sprintf(
			'<div class="edm_divider_container%3$s">
								<div class="edm_divider_line edm_divider_line_before"></div>
									%1$s
									%2$s
								<div class="edm_divider_line edm_divider_line_after"></div>
							</div>',
			et_core_intentionally_unescaped( $separator_content, 'html' ),
			et_core_intentionally_unescaped( $separator_icon, 'html' ),
			esc_attr( $alignment )
		);
	}

	if('text' === $divider_type) { 

		


		$output = sprintf(
			'<div class="edm_divider_container %3$s">
								<div class="edm_divider_line edm_divider_line_before"></div>
								<%1$s class="edm_divider_text_header"> 	%2$s </%1$s>
									
								<div class="edm_divider_line edm_divider_line_after"></div>
							</div>',

			et_pb_process_header_level( $header_level, 'h6' ),
			et_core_intentionally_unescaped( $divider_content , 'html' ),
			
			esc_attr( $text_align )
		);
	
	}


			return $output;
		
	}
}

new  EDM_Divider;
