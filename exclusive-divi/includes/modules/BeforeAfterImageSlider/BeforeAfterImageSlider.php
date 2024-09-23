<?php

class EDM_BeforeAfterImageSlider extends ET_Builder_Module {

	public $slug       = 'edm_before_after_image_slider';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'http://www.exclusivedivi.com/',
		'author'     => 'Exclusive Divi',
		'author_uri' => 'http://www.exclusivedivi.com/',
	);

	public function init() {
		$this->name = esc_html__( 'ED Before/After Image Slider', 'edm-exclusive-divi-modules' );
		$this->icon_path = EDM_PLUGIN_PATH . 'admin/icons/edm_before_after_image_slider.svg';
	}

	public function get_settings_modal_toggles() {


			return array(

				'general'  => array(
					'toggles' => array(
						'main_content' => array(
							'title'             => esc_html__( 'Slider Content', 'edm-exclusive-divi-modules' ),
							'priority'          => 1,
							'sub_toggles'       => array(
								'before_content' => array(
									'name' => 'Before',
								),
								'after_content'  => array(
									'name' => 'After',
								),
							),
							'tabbed_subtoggles' => true,
						),
						'slider_settings' 	   => esc_html__( 'Slider Settings', 'edm-exclusive-divi-modules' )
					),
				),

				'advanced' => array(
					'toggles' => array(
						'label_settings'        => array(
							'title'    => esc_html__( 'Label Text Settings', 'edm-exclusive-divi-modules' ),
							'priority' => 2,
						),
						
						'handle_slider'        => array(
							'title'    => esc_html__( 'Handle Slider Settings', 'edm-exclusive-divi-modules' ),
							'priority' => 3,
						),

						'slider_overlay'        => array(
							'title'    => esc_html__( 'Overlay', 'edm-exclusive-divi-modules' ),
							'priority' => 4,
						),
					
						
					),
				),
			);
	}

	public function get_advanced_fields_config() {


		return array(
			'fonts'                 => array(
				'label_text' => array(
					'label'          => esc_html__( 'Label', 'edm-exclusive-divi-modules' ),
					'font_size'      => array(
						'default'        => '18px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'default'        => '1.5em',
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default'        => '0px',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'css'            => array(
						'main' => '%%order_class%% .twentytwenty-before-label:before, %%order_class%% .twentytwenty-after-label:before',
					),
					'important'      => 'all',
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'label_settings',
				),
			),
			'custom_margin_padding' => array(
				'css' => array(
					'main'      => '%%order_class%%',
					'important' => 'all',
				),
			),
			'max_width'             => array(
				'css' => array(
					'main'             => '%%order_class%%',
					'module_alignment' => '%%order_class%%',
				),
			),
			'filters'               => false,
			'text'                  => false,
			'borders'               => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_styles' => '%%order_class%%',
							'border_radii'  => '%%order_class%%',
						),
					),
				),
			),
		);


	}

	public function get_fields() {

				return array(
					'before_image'           => array(
						'label'              => esc_html__( 'Before Image', 'edm-exclusive-divi-modules' ),
						'type'               => 'upload',
						'option_category'    => 'basic_option',
						'default'            => EDM_PLUGIN_URL . 'public/img/placeholder.svg',
						'upload_button_text' => esc_attr__( 'Upload an image', 'edm-exclusive-divi-modules' ),
						'choose_text'        => esc_attr__( 'Choose an Image', 'edm-exclusive-divi-modules' ),
						'update_text'        => esc_attr__( 'Set As Image', 'edm-exclusive-divi-modules' ),
						'tab_slug'           => 'general',
						'toggle_slug'        => 'main_content',
						'sub_toggle'         => 'before_content',
						'description'        => esc_html__( 'Upload Before Image.', 'edm-exclusive-divi-modules' ),
					),

					'before_label'        => array(
						'label'           => esc_html__( 'Before Image Title Text', 'edm-exclusive-divi-modules' ),
						'type'            => 'text',
						'option_category' => 'basic_option',
						'default' 		  => esc_html__( 'Before', 'edm-exclusive-divi-modules' ),
						'tab_slug'        => 'general',
						'toggle_slug'     => 'main_content',
						'show_if'         => array(
										'move_on_hover' => 'off',
						),
						'sub_toggle'      => 'before_content',
						'default_on_front' => esc_html__( 'Before', 'edm-exclusive-divi-modules' ),
						'description'     => esc_html__( 'Set a custom before label', 'edm-exclusive-divi-modules' ),
					),


					'after_image'            => array(
						'label'              => esc_html__( 'After Image', 'edm-exclusive-divi-modules' ),
						'type'               => 'upload',
						'option_category'    => 'basic_option',
						'default'            => EDM_PLUGIN_URL . 'public/img/placeholder.svg',
						'upload_button_text' => esc_attr__( 'Upload an image', 'edm-exclusive-divi-modules' ),
						'choose_text'        => esc_attr__( 'Choose an Image', 'edm-exclusive-divi-modules' ),
						'update_text'        => esc_attr__( 'Set As Image', 'edm-exclusive-divi-modules' ),
						'tab_slug'           => 'general',
						'toggle_slug'        => 'main_content',
						'show_if'         => array(
										'move_on_hover' => 'off',
						),
						'sub_toggle'         => 'after_content',
						'description'        => esc_html__( 'Upload After Image.', 'edm-exclusive-divi-modules' ),
					),

					'after_label'         => array(
						'label'           => esc_html__( 'After Image Title Text', 'edm-exclusive-divi-modules' ),
						'type'            => 'text',
						'option_category' => 'basic_option',
						'default' 		  => esc_html__( 'After', 'edm-exclusive-divi-modules' ),
						'tab_slug'        => 'general',
						'toggle_slug'     => 'main_content',
						'sub_toggle'      => 'after_content',
						'default_on_front' => esc_html__( 'After', 'edm-exclusive-divi-modules' ),
						'description'     => esc_html__( 'Set a custom after label.', 'edm-exclusive-divi-modules' ),
					),
					
					'slider_orientation'                   => array(
						'label'            => esc_html__( 'Slider Orientation', 'edm-exclusive-divi-modules' ),
						'type'             => 'select',
						'option_category'  => 'layout',
						'options'          => array(
							'horizontal' => esc_html__( 'Horizontal', 'edm-exclusive-divi-modules' ),
							'vertical'   => esc_html__( 'Vertical', 'edm-exclusive-divi-modules' ),
						),
						'default_on_front' => 'horizontal',
						'toggle_slug'      => 'slider_settings',
						'description'     => esc_html__( 'Choose Before After Slider Orientation', 'edm-exclusive-divi-modules' ),
				
					),

					

					'starting_point'                   => array(
						'label'           => esc_html__( 'Starting Point', 'edm-exclusive-divi-modules' ),
						'type'            => 'range',
						'option_category' => 'layout',
						'range_settings'  => array(
							'min'  => '0',
							'max'  => '0.99',
							'step' => '0.1',
						),
						'default'         => '0.5',
						'tab_slug'        => 'general',
						'toggle_slug'     => 'slider_settings',
						'description'     => esc_html__( 'How much of the before image is visible when the page loads.', 'edm-exclusive-divi-modules' ),
					),

					'show_image_labels'                => array(
						'label'           => esc_html__( 'Show Image Label Text', 'edm-exclusive-divi-modules' ),
						'type'            => 'yes_no_button',
						'option_category' => 'configuration',
						'options'         => array(
							'off' => esc_html__( 'No', 'edm-exclusive-divi-modules' ),
							'on'  => esc_html__( 'Yes', 'edm-exclusive-divi-modules' ),
						),
						'default'         => 'off',
						'tab_slug'        => 'general',
						'show_if'         => array(
										'move_on_hover' => 'off',
						),
						'toggle_slug'     => 'slider_settings',
						'description'     => esc_html__( 'Control Label Display.', 'edm-exclusive-divi-modules' ),
					),


					'no_overlay'                => array(
						'label'           => esc_html__( 'No Overlay', 'edm-exclusive-divi-modules' ),
						'type'            => 'yes_no_button',
						'option_category' => 'configuration',
						'options'         => array(
							'off' => esc_html__( 'No', 'edm-exclusive-divi-modules' ),
							'on'  => esc_html__( 'Yes', 'edm-exclusive-divi-modules' ),
						),
						'default'         => 'off',
						'tab_slug'        => 'general',
						'show_if'         => array(
										'move_on_hover' => 'off',
						),
						'toggle_slug'     => 'slider_settings',
						'description'     => esc_html__( 'Control Label Display.', 'edm-exclusive-divi-modules' ),
					),


					'move_on_hover'                => array(
						'label'           => esc_html__( 'Move Slider on Hover', 'edm-exclusive-divi-modules' ),
						'type'            => 'yes_no_button',
						'option_category' => 'configuration',
						'options'         => array(
							'off' => esc_html__( 'No', 'edm-exclusive-divi-modules' ),
							'on'  => esc_html__( 'Yes', 'edm-exclusive-divi-modules' ),
						),
						'default'         => 'off',
						'tab_slug'        => 'general',
						'toggle_slug'     => 'slider_settings',
						'description'     => esc_html__( 'Move Before After Image Slider on Hover', 'edm-exclusive-divi-modules' ),
					),

					'move_with_handle_only'                => array(
						'label'           => esc_html__( 'Move with handle only', 'edm-exclusive-divi-modules' ),
						'type'            => 'yes_no_button',
						'option_category' => 'configuration',
						'options'         => array(
							'off' => esc_html__( 'No', 'edm-exclusive-divi-modules' ),
							'on'  => esc_html__( 'Yes', 'edm-exclusive-divi-modules' ),
						),
						'default'         => 'off',
						'tab_slug'        => 'general',
						'toggle_slug'     => 'slider_settings',
						'description'     => esc_html__( 'Allow a user to swipe anywhere on the image to control slider movement.', 'edm-exclusive-divi-modules' ),
					),

					'click_to_move'                => array(
						'label'           => esc_html__( 'Click to move', 'edm-exclusive-divi-modules' ),
						'type'            => 'yes_no_button',
						'option_category' => 'configuration',
						'options'         => array(
							'off' => esc_html__( 'No', 'edm-exclusive-divi-modules' ),
							'on'  => esc_html__( 'Yes', 'edm-exclusive-divi-modules' ),
						),
						'default'         => 'off',
						'tab_slug'        => 'general',
						'toggle_slug'     => 'slider_settings',
						'description'     => esc_html__( 'Allow a user to click (or tap) anywhere on the image to move the slider to that location.', 'edm-exclusive-divi-modules' ),
					),



					'handle_border_color'           => array(
						'label'            => esc_html__( 'Handle Border Color', 'edm-exclusive-divi-modules' ),
						'type'             => 'color-alpha',
						'custom_color'     => true,
						'default_on_front' => '#ffffff',
						'tab_slug'         => 'advanced',
						'toggle_slug'      => 'handle_slider',
						'description'      => esc_html__( 'Here you can define a custom border color for the handle slider.', 'edm-exclusive-divi-modules' ),
					),
					'handle_border_radius'          => array(
						'label'            => esc_html__( 'Handle Border Radius', 'edm-exclusive-divi-modules' ),
						'type'             => 'range',
						'option_category'  => 'layout',
						'tab_slug'         => 'advanced',
						'toggle_slug'      => 'handle_slider',
						'validate_unit'    => true,
						'allowed_units'    => array( 'px' ),
						'default'          => '100px',
						'default_unit'     => 'px',
						'default_on_front' => '',
						'allow_empty'      => true,
						'range_settings'   => array(
							'min'  => '0',
							'max'  => '100px',
							'step' => '1',
						),
					),
					'handle_background_color'       => array(
						'label'          => esc_html__( 'Handle Background Color', 'edm-exclusive-divi-modules' ),
						'type'           => 'color-alpha',
						'custom_color'   => true,
						'tab_slug'       => 'advanced',
						'toggle_slug'    => 'handle_slider',
						'description'    => esc_html__( 'Here you can define a custom background color for the handle slider.', 'edm-exclusive-divi-modules' ),
					),
					'handle_arrow_color'            => array(
						'label'            => esc_html__( 'Arrow Color', 'edm-exclusive-divi-modules' ),
						'type'             => 'color-alpha',
						'custom_color'     => true,
						'default_on_front' => '#ffffff',
						'tab_slug'         => 'advanced',
						'toggle_slug'      => 'handle_slider',
						'description'      => esc_html__( 'Here you can define a custom arrow color for the handle slider.', 'edm-exclusive-divi-modules' ),
					),

					'overlay_color'                 => array(
						'label'            => esc_html__( 'Overlay Color', 'edm-exclusive-divi-modules' ),
						'type'             => 'color-alpha',
						'custom_color'     => true,
						'default_on_front' => 'rgba(0, 0, 0, 0.5)',
						'depends_show_if'  => 'off',
						'tab_slug'         => 'advanced',
						'toggle_slug'      => 'slider_overlay',
						'description'      => esc_html__( 'Here you can define a custom color for the overlay', 'edm-exclusive-divi-modules' ),
					),

				);
				
	
	}

	public function render( $attrs, $content = null, $render_slug ) {

		$before_image                    = $this->props['before_image'];
		$after_image                     = $this->props['after_image'];
		$show_image_labels				 = $this->props['show_image_labels'];
		$before_label				 = $this->props['before_label'];
		$after_label				 = $this->props['after_label'];
		$slider_orientation				 = $this->props['slider_orientation'];
		$starting_point				 	 = $this->props['starting_point'];
		$no_overlay				 		 = $this->props['no_overlay'];
		$move_on_hover				 		 = $this->props['move_on_hover'];
		$move_with_handle_only				 		 = $this->props['move_with_handle_only'];
		$click_to_move				 		 = $this->props['click_to_move'];
		$overlay_color				 	 = $this->props['overlay_color'];
		$handle_border_color			 = $this->props['handle_border_color'];
		$handle_border_radius			 = $this->props['handle_border_radius'];
		$handle_background_color		 = $this->props['handle_background_color'];
		$handle_arrow_color				 = $this->props['handle_arrow_color'];
		$order_class          			 = $this->get_module_order_class( 'edm_before_after_image_slider' );

		wp_enqueue_script( 'edm-before-after-library-event' );
		wp_enqueue_script( 'edm-before-after-library' );
		


		
				if ( 'off' === $no_overlay ) {
					
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .edm_before_after_slider_wrapper .twentytwenty-overlay:hover',
								'declaration' => sprintf( 'background: %1$s;', esc_attr( $overlay_color ) ),
							)
						);
					
					} 
				
				else {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .edm_before_after_slider_wrapper .twentytwenty-overlay:hover',
							'declaration' => sprintf( 'background: transparent;' ),
						)
					);

					}


				if ( '' !== $handle_border_color ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .edm_before_after_slider_wrapper .twentytwenty-handle',
							'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $handle_border_color  ) ),
						)
					);

					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .edm_before_after_slider_wrapper .twentytwenty-handle:after',
							'declaration' => sprintf( 'background: %1$s;', esc_attr( $handle_border_color  ) ),
						)
					);

					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .edm_before_after_slider_wrapper .twentytwenty-handle:before',
							'declaration' => sprintf( 'background: %1$s;', esc_attr( $handle_border_color  ) ),
						)
					);
					
				}

				if('' !== $handle_border_radius) {

					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .twentytwenty-handle',
							'declaration' => sprintf( 'border-radius: %1$s;', esc_attr( $handle_border_radius  ) ),
						)
					);

				}
		
				if('' !== $handle_background_color) {

					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .twentytwenty-handle',
							'declaration' => sprintf( 'background: %1$s;', esc_attr( $handle_background_color  ) ),
						)
					);

				}
		
				if('' !== $handle_arrow_color) {

					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .twentytwenty-up-arrow',
							'declaration' => sprintf( 'border-top-color: %1$s;', esc_attr( $handle_arrow_color  ) ),
						)
					);

					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .twentytwenty-down-arrow',
							'declaration' => sprintf( 'border-top-color: %1$s;', esc_attr( $handle_arrow_color  ) ),
						)
					);

					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .twentytwenty-right-arrow',
							'declaration' => sprintf( 'border-left-color: %1$s;', esc_attr( $handle_arrow_color  ) ),
						)
					);

					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .twentytwenty-left-arrow',
							'declaration' => sprintf( 'border-right-color: %1$s;', esc_attr( $handle_arrow_color  ) ),
						)
					);

	
				}


				$output =sprintf('<div class="edm_before_after_slider_wrapper">
					<div class="edm_ba_images" data-show-image-labels="%3$s" data-slider-orientation="%4$s" data-starting-point="%5$s" data-no-overlay="%6$s" data-before-label="%7$s" data-after-label="%8$s" data-move-on-hover="%9$s" data-move-with-handle-only="%10$s" data-click-to-move="%11$s">
					<img src="%1$s" alt="" />
					<img src="%2$s" alt="" />
				</div>
				</div>',
				esc_attr( $before_image ),
				esc_attr( $after_image ),
				esc_attr( $show_image_labels ),
				esc_attr( $slider_orientation ),
				esc_attr( $starting_point ),
				esc_attr( $no_overlay ),
				$before_label ? esc_attr( $before_label ) : esc_html('Before','edm-exclusive-divi-modules'),
				$after_label ? esc_attr( $after_label ) : esc_html('After','edm-exclusive-divi-modules'),
				$move_on_hover,
				$move_with_handle_only,
				$click_to_move
				);


		return et_core_intentionally_unescaped( $output, 'html' );


		

	
	}

}

new  EDM_BeforeAfterImageSlider;
