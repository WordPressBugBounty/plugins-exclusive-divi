<?php

class EDM_GlitchText extends ET_Builder_Module {

	public $slug       = 'edm_glitch_text';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'http://www.exclusivedivi.com/',
		'author'     => 'Exclusive Divi',
		'author_uri' => 'http://www.exclusivedivi.com/',
	);

	public function init() {
		$this->name = esc_html__( 'ED Glitch Text', 'edm-exclusive-divi-modules' );
		$this->icon_path = EDM_PLUGIN_PATH . 'admin/icons/edm_glitch_text.svg';
	}

	public function get_settings_modal_toggles() {

		return array(

			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title'    => esc_html__( 'Glitch Content', 'edm-exclusive-divi-modules' ),
						'priority' => 1,
					),

					'glitch_effect' => array(
						'title'    => esc_html__( 'Glitch Settings', 'edm-exclusive-divi-modules' ),
					),
				),
			),
			
			'advanced'  => array(
				'toggles' => array(
		
					'glitch_colors' => array(
						'title'    => esc_html__( 'Glitch Colors', 'edm-exclusive-divi-modules' ),
					),
				),
			),

		);

	}

	public function get_advanced_fields_config() {

		return array(
		
			'fonts'      => array(
				
				'header' => array(
					'label'          => esc_html__( 'Glitch', 'edm-exclusive-divi-modules' ),
					'css'            => array(
						'main' => '%%order_class%% h1.edm-glitch-text-content, %%order_class%% h2.edm-glitch-text-content, %%order_class%% h3.edm-glitch-text-content, %%order_class%% h4.edm-glitch-text-content, %%order_class%% h5.edm-glitch-text-content, %%order_class%% h6.edm-glitch-text-content',
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
					'hide_text_color' => true,
				),
			),
			'text'       => false,
			'background'   => array(
				'settings' => array(
					'color'=> 'alpha',
				),
				'css'      => array(
					'main' => "%%order_class%% .edm-glitch-text-wrap",
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
				'glitch_text' => array(
					'label'            => esc_html__( 'Glitch Text', 'edm-exclusive-divi-modules' ),
					'type'             => 'text',
					'option_category'  => 'basic_option',
					'toggle_slug'      => 'main_content',
					'default_on_front' => 'Exclusive Glitch Text Module',
				),


				'glitch_type'                   => array(
					'label'            => esc_html__( 'Select Glitch Style', 'edm-exclusive-divi-modules' ),
					'type'             => 'select',
					'option_category'  => 'layout',
					'options'          => array(
						'edm-glitch-1' => esc_html__( 'Style One', 'edm-exclusive-divi-modules' ),
						'edm-glitch-2' => esc_html__( 'Style Two', 'edm-exclusive-divi-modules' ),
						'edm-glitch-3' => esc_html__( 'Style Three', 'edm-exclusive-divi-modules' ),
						'edm-glitch-4' => esc_html__( 'Style Four', 'edm-exclusive-divi-modules' ),
						'edm-glitch-5' => esc_html__( 'Style Five', 'edm-exclusive-divi-modules' ),
						
					),
					'default_on_front' => 'edm-glitch-1',
					'toggle_slug'      => 'glitch_effect',
					'description'     => esc_html__( 'Choose Glitch Styling', 'edm-exclusive-divi-modules' ),
			
				),

				
				'glitch_text_color'  => array(
					'label'          => esc_html__('Text Color', 'edm-exclusive-divi-modules'),
					'type'           => 'color-alpha',
					'description'     => esc_html__( 'Select a color for the text used for the glitch style.', 'edm-exclusive-divi-modules' ),				
					'tab_slug'	  	  => 'advanced',
					'toggle_slug'     => 'glitch_colors',
					'default'        => '#0077FF'
				),
				
				'glitch_color_text_one'        => array(
					'label'          => esc_html__('Glitch Accent Color One', 'edm-exclusive-divi-modules'),
					'type'           => 'color-alpha',
					'description'     => esc_html__( 'Select color one to use for the top part of the text with the glitch effect.', 'edm-exclusive-divi-modules' ),				
					'tab_slug'	  	  => 'advanced',
					'toggle_slug'     => 'glitch_colors',
					'default'        => '#772ADB'
				),
				
				'glitch_color_text_two'        => array(
					'label'          => esc_html__('Glitch Accent Color Two', 'edm-exclusive-divi-modules'),
					'type'           => 'color-alpha',	
					'description'     => esc_html__( 'Select color two to use for the bottom part of the text with the glitch effect.', 'edm-exclusive-divi-modules' ),			
					'tab_slug'	  	  => 'advanced',
					'toggle_slug'     => 'glitch_colors',
					'default'        => '#00e1ff'
				),

			);

	}

	public function render( $attrs, $content = null, $render_slug ) {

		$glitch_text = $this->props['glitch_text'];
		$header_level  = $this->props['header_level'];
		$glitch_style  = $this->props['glitch_type'];
		$glitch_text_color  = $this->props['glitch_text_color'];
		$glitch_color_text_one  = $this->props['glitch_color_text_one'];
		$glitch_color_text_two  = $this->props['glitch_color_text_two'];




		
		if ( '' !== $glitch_text_color  ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .edm-glitch-text-content',
					'declaration' => sprintf( 'color: %1$s;', esc_attr( $glitch_text_color  ) ),
				)
			);
		}


		if('edm-glitch-1' === $glitch_style ) {

			if ( '' !== $glitch_color_text_one  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm-glitch-1 .edm-glitch-text-content::before',
						'declaration' => sprintf( 'text-shadow:-2px 0 %1$s;', esc_attr( $glitch_color_text_one  ) ),
					)
				);
			}


			if ( '' !== $glitch_color_text_two  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm-glitch-1 .edm-glitch-text-content::after',
						'declaration' => sprintf( 'text-shadow:-2px 0 %1$s , 2px 2px %1$s;', esc_attr( $glitch_color_text_two  ) ),
					)
				);
			}

		}




		if('edm-glitch-2' === $glitch_style ) {

			if ( '' !== $glitch_color_text_one  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm-glitch-2 .edm-glitch-text-content::before',
						'declaration' => sprintf( 'text-shadow:-2px 0 %1$s;', esc_attr( $glitch_color_text_one  ) ),
					)
				);
			}


			if ( '' !== $glitch_color_text_two  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm-glitch-2 .edm-glitch-text-content::after',
						'declaration' => sprintf( 'text-shadow:-2px 0 %1$s , 2px 2px %1$s;', esc_attr( $glitch_color_text_two  ) ),
					)
				);
			}

		}


		if('edm-glitch-3' === $glitch_style ) {

			if ( '' !== $glitch_color_text_one  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm-glitch-3 .edm-glitch-text-content::before',
						'declaration' => sprintf( 'text-shadow:-3px 0 %1$s;', esc_attr( $glitch_color_text_one  ) ),
					)
				);
			}


			if ( '' !== $glitch_color_text_two  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm-glitch-3 .edm-glitch-text-content::after',
						'declaration' => sprintf( 'text-shadow:-1px 0 %1$s;', esc_attr( $glitch_color_text_two  ) ),
					)
				);
			}

		}


		if('edm-glitch-4' === $glitch_style ) {

			if ( '' !== $glitch_color_text_one  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm-glitch-4 .edm-glitch-text-content::before',
						'declaration' => sprintf( 'text-shadow:-5px 0 %1$s;', esc_attr( $glitch_color_text_one  ) ),
					)
				);
			}


			if ( '' !== $glitch_color_text_two  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm-glitch-4 .edm-glitch-text-content::after',
						'declaration' => sprintf( 'text-shadow:-5px 0 %1$s;', esc_attr( $glitch_color_text_two  ) ),
					)
				);
			}

		}


		if('edm-glitch-5' === $glitch_style ) {

			if ( '' !== $glitch_color_text_one  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm-glitch-5 .edm-glitch-text-content::before',
						'declaration' => sprintf( 'color:%1$s;', esc_attr( $glitch_color_text_one  ) ),
					)
				);
			}


			if ( '' !== $glitch_color_text_two  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm-glitch-5 .edm-glitch-text-content::after',
						'declaration' => sprintf( 'color:%1$s;', esc_attr( $glitch_color_text_two  ) ),
					)
				);
			}

		}


		if ( '' !== $glitch_text ) {
			$glitch_text = sprintf(
				'<%1$s class="edm-glitch-text-content" data-text="%2$s">%2$s</%1$s>',
				et_pb_process_header_level( $header_level, 'h2' ),
				$glitch_text
			);
		}

		$output = sprintf(
			'<div class="edm-glitch-text-wrap">
				<div class="edm-glitch-text %1$s">
			%2$s
			</div>
			</div>',
			$glitch_style,
			$glitch_text
		);

		return $output;
	
	}
}

new  EDM_GlitchText;
