<?php

class EDM_VideoLightBox extends ET_Builder_Module {

	public $slug       = 'edm_video_lightbox';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'http://www.exclusivedivi.com/',
		'author'     => 'Exclusive Divi',
		'author_uri' => 'http://www.exclusivedivi.com/',
	);

	public function init() {
		$this->name = esc_html__( 'ED Video Lightbox', 'edm-exclusive-divi-modules' );
		$this->icon_path = EDM_PLUGIN_PATH . 'admin/icons/edm_video_lightbox.svg';
	}

	public function get_settings_modal_toggles() {

		return array(

			'general'  => array(
				'toggles' => array(
					'main_content'  => esc_html__( 'Video Content', 'edm-exclusive-divi-modules' ),
					'light_box_settings'  => esc_html__( 'Lightbox Settings', 'edm-exclusive-divi-modules' ),
				),

			),

			'advanced' => array(
				'toggles' => array(
					'lightbox_styles' => array(
						'title'    => esc_html__( 'Lightbox Style', 'edm-exclusive-divi-modules' )
					),
					'icon_styles' => array(
						'title'    => esc_html__( 'Icon Style', 'edm-exclusive-divi-modules' )
					)

				),
			),
		);

	}

	public function get_advanced_fields_config() {

		$this->main_css_element = '%%order_class%%.edm_video_lightbox';
			
		return array(

			'background' => array(
				'options' => array(
					'background_color' => array(
						'default'          => et_builder_accent_color(),
					),
				),
			),
			'margin_padding' => array(
				'css' => array(
					'padding'   => "{$this->main_css_element}",
					'margin'    => "{$this->main_css_element}",
					'important' => 'all',
				),
			),
			'text' => false,
			'fonts' => false,
			'back'
		);

	}

	public function get_fields() {
		
		return array(
			'video_source'       => array(
				'label'            => esc_html__( 'Video', 'edm-exclusive-divi' ),
				'type'             => 'upload',
				'option_category'  => 'basic_option',
				'data_type'          => 'video',
				'upload_button_text' => esc_attr__( 'Upload a video', 'et_builder' ),
				'choose_text'        => esc_attr__( 'Choose a Video MP4 File', 'et_builder' ),
				'update_text'        => esc_attr__( 'Set As Video', 'et_builder' ),
				'description'        => esc_html__( 'Upload your desired video in .MP4 format, or type in the URL to the video you would like to display', 'et_builder' ),
				'description'      => esc_html__( 'Add your video here', 'edm-exclusive-divi' ),
				'toggle_slug'      => 'main_content',
				'tab_slug'     => 'general'
			),

			// Animation Control For Typing Text
			'play_button_type'         => array(
				'label'            => esc_html__( 'Play Button Type', 'edm-exclusive-divi-modules' ),
				'type'             => 'select',
				'default'          => 'edm_video_type_1',
				'default_on_front' => 'edm_video_type_1',
				'options'          => array(
					'edm_video_type_1' => esc_html__( 'Type 1', 'edm-exclusive-divi-modules' ),
					'edm_video_type_2'  => esc_html__( 'Type 2', 'edm-exclusive-divi-modules' ),
				),
				'description'      => esc_html__( 'Select your play button type.', 'edm-exclusive-divi-modules' ),
				'toggle_slug'      => 'light_box_settings',
				'tab_slug'     => 'general',
			),
			/*
			'show_button_text'        => array(
				'label'            => esc_html__( 'Show Inline Text', 'edm-exclusive-divi-modules' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'default'          => 'off',
				'default_on_front' => 'off',
				'options'          => array(
					'off' => esc_html__( 'No', 'edm-exclusive-divi-modules' ),
					'on'  => esc_html__( 'Yes', 'edm-exclusive-divi-modules' ),
				),
				'toggle_slug'      => 'light_box_settings',
				'tab_slug'     => 'general',
			),
			'play_button_inline_text'        => array(
				'label'            => esc_html__( 'Inline Text', 'edm-exclusive-divi-modules' ),
				'type'             => 'text',
				'option_category'  => 'configuration',
				'default'          => esc_html__( 'Play Button', 'edm-exclusive-divi-modules' ),
				'default_on_front' => esc_html__( 'Play Button', 'edm-exclusive-divi-modules' ),
				'toggle_slug'      => 'light_box_settings',
				'tab_slug'     => 'general',
				'show_if' => array(
					'show_button_text' => 'on'
				)
			),
			*/
			'background_image_zoom'        => array(
				'label'            => esc_html__( 'Backrgound Image Zoom', 'edm-exclusive-divi-modules' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'default'          => 'off',
				'default_on_front' => 'off',
				'options'          => array(
					'off' => esc_html__( 'No', 'edm-exclusive-divi-modules' ),
					'on'  => esc_html__( 'Yes', 'edm-exclusive-divi-modules' ),
				),
				'toggle_slug'      => 'light_box_settings',
				'tab_slug'     => 'general',
			),
			/*
			'follow_mouse'        => array(
				'label'            => esc_html__( 'Follow Mouse', 'edm-exclusive-divi-modules' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'default'          => 'off',
				'default_on_front' => 'off',
				'options'          => array(
					'off' => esc_html__( 'No', 'edm-exclusive-divi-modules' ),
					'on'  => esc_html__( 'Yes', 'edm-exclusive-divi-modules' ),
				),
				'toggle_slug'      => 'light_box_settings',
				'tab_slug'     => 'general',
			),
			*/
			/* Lightbox Background Color */
			'light_box_background' => array(
				'label'        => esc_html__( 'Lightbox Background', 'edm-exclusive-divi-modules' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default' => '#000',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'lightbox_styles',
			),
			'close_icon' => array(
				'label'        => esc_html__( 'Close Icon', 'edm-exclusive-divi-modules' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'	   => '#fff',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'lightbox_styles',
			),
			/* Play Icon Color Style */
			'icon_color' => array(
				'label'        => esc_html__( 'Icon Color', 'edm-exclusive-divi-modules' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'icon_styles',
			),

			'icon_background' => array(
				'label'        => esc_html__( 'Icon Background', 'edm-exclusive-divi-modules' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'icon_styles',
			),
			'icon_border' => array(
				'label'        => esc_html__( 'Icon Border', 'edm-exclusive-divi-modules' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'icon_styles',
			),
			'icon_size'         => array(
				'label'           => esc_html__( 'Icon Size', 'edm-exclusive-divi-modules' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'range_settings'  => array(
					'min'  => '30',
					'max'  => '100',
					'step' => '1',
				),
				'default'         => '100px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_styles',
				'description'     => esc_html__( 'Icon Size', 'edm-exclusive-divi-modules' ),
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$order_class = self::get_module_order_class( $render_slug );
		$video_source = $this->props['video_source'];
		$play_button_type = $this->props['play_button_type'];
		$background_image_zoom = $this->props['background_image_zoom'];
		$light_box_background = $this->props['light_box_background'];
		$close_icon = $this->props['close_icon'];
		$icon_color = $this->props['icon_color'];
		$icon_background = $this->props['icon_background'];
		$icon_border = $this->props['icon_border'];
		$icon_size = $this->props['icon_size'];

			wp_enqueue_script( 'magnific-popup');
			wp_enqueue_style( 'magnific-popup');

			if ( '' !== $icon_size  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm_lightbox_video .edm_video_lightbox_inner .edm_video_box .edm_open_video_link',
						'declaration' => sprintf( 'width:%1$s;height:%2$s;', esc_attr( $icon_size  ), esc_attr( $icon_size  ) ),
					)
				);
			}

			if ( '' !== $icon_size  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm_lightbox_video .edm_video_lightbox_inner .edm_video_box.edm_video_type_2::before',
						'declaration' => sprintf( 'width:%1$s;height:%2$s;', esc_attr( $icon_size  ), esc_attr( $icon_size  ) ),
					)
				);
			}

			if ( '' !== $icon_size  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm_lightbox_video .edm_video_lightbox_inner .edm_play_icon',
						'declaration' => sprintf( 'width:%1$s;height:%2$s;', esc_attr( "calc(".$icon_size." - 66%)" ), esc_attr( "calc(".$icon_size." - 66%)" ) ),
					)
				);
			}

			if ( '' !== $icon_size  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm_lightbox_video .edm_video_lightbox_inner .edm_video_box.edm_video_type_1',
						'declaration' => sprintf( 'width:%1$s;height:%2$s;', esc_attr( "calc(".$icon_size." + 30px)" ), esc_attr( "calc(".$icon_size." + 30px)"  ) ),
					)
				);
			}

			if ( 'on' == $background_image_zoom  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%:hover',
						'declaration' => 'background-size: 110% !important;-webkit-transition: all 0.3s ease-in-out !important;',
					)
				);
			}
			if ( '' !== $light_box_background  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%_edm_light_box',
						'declaration' => sprintf( 'background: %1$s;opacity:1;', esc_attr( $light_box_background  ) ),
					)
				);
			}
			if ( '' !== $close_icon  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%_edm_light_box .mfp-close',
						'declaration' => sprintf( 'color: %1$s;', esc_attr( $close_icon  ) ),
					)
				);
			}
			if ( '' !== $icon_color  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm_lightbox_video .edm_play_icon',
						'declaration' => sprintf( 'fill: %1$s;', esc_attr( $icon_color  ) ),
					)
				);
			}
			if ( '' !== $icon_background  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm_lightbox_video .edm_video_lightbox_inner .edm_video_box a.edm_open_video_link',
						'declaration' => sprintf( 'background: %1$s;', esc_attr( $icon_background  ) ),
					)
				);
			}		

			if ( '' !== $icon_border  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm_lightbox_video .edm_video_lightbox_inner .edm_video_box.edm_video_type_2::before',
						'declaration' => sprintf( 'background: %1$s;', esc_attr( $icon_border  ) ),
					)
				);
			}	

			if ( '' !== $icon_border  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm_lightbox_video .edm_video_box.edm_video_type_1',
						'declaration' => sprintf( 'background: %1$s;', esc_attr( $icon_border  ) ),
					)
				);
			}	

		return sprintf( '<div class="edm_lightbox_video" data-edm-module-class="%3$s">
          <div class="edm_video_lightbox_inner" ref="edm_video_box" >
            <div class="edm_video_box %1$s">
              <a href="%2$s" ref="edm_open_video_link" class="edm_open_video_link">
                <svg class="edm_play_icon" viewBox="0 0 330 330" ><path id="XMLID_308_" d="M37.728,328.12c2.266,1.256,4.77,1.88,7.272,1.88c2.763,0,5.522-0.763,7.95-2.28l240-149.999c4.386-2.741,7.05-7.548,7.05-12.72c0-5.172-2.664-9.979-7.05-12.72L52.95,2.28c-4.625-2.891-10.453-3.043-15.222-0.4C32.959,4.524,30,9.547,30,15v300C30,320.453,32.959,325.476,37.728,328.12z"/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
              </a>            
            </div>
          </div>
        </div>', $play_button_type, $video_source, $order_class  );
	}
}

new EDM_VideoLightBox;
