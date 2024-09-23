<?php

class EDM_MouseParallax extends ET_Builder_Module {

	public $slug       = 'edm_mouse_parallax';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'http://www.exclusivedivi.com/',
		'author'     => 'Exclusive Divi',
		'author_uri' => 'http://www.exclusivedivi.com/',
	);

	public function init() {
		$this->name = esc_html__( 'ED Scroll Image', 'edm-exclusive-divi-modules' );
		$this->main_css_element = '%%order_class%%.edm_mouse_parallax';
		$this->icon_path = EDM_PLUGIN_PATH . 'admin/icons/edm_mouse_parallax.svg';
	}

	public function get_settings_modal_toggles() {

		return array(

			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title'    => esc_html__( 'Mouse Parallax Content', 'edm-exclusive-divi-modules' ),
						'priority' => 1,
					),
					'main_link'  => et_builder_i18n( 'Button Settings' ),
				),
			),
		

		);

	}

	public function get_advanced_fields_config() {

		return array(
		
			'fonts'      => array(
				'header' => array(
					'label'          => esc_html__( 'Mouse Parallax Title', 'edm-exclusive-divi-modules' ),
					'css'            => array(
						'main' => '%%order_class%% h1.edm_title_text, %%order_class%% h2.edm_title_text, %%order_class%% h3.edm_title_text, %%order_class%% h4.edm_title_text, %%order_class%% h5.edm_title_text, %%order_class%% h6.edm_title_text',
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
			'margin_padding' => array(
				'css' => array(
					'padding'   => "{$this->main_css_element}",
					'margin'    => "{$this->main_css_element}",
					'important' => 'all',
				),
			),

			'text'       => false,
			'background' => array(
				'options' => array(
					'background_color' => array(
						'default'          => et_builder_accent_color(),
					),
				),
			),

			'button'          => array(
				'button' => array(
					'label'          => et_builder_i18n( 'Button' ),
					'css'            => array(
						'main'         => "{$this->main_css_element} .et_pb_button.edm_mouse_button_link",
					),
					'box_shadow'     => false,
					'margin_padding' => false,
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

				'heading' => array(
					'label'            => esc_html__( 'Title Text', 'edm-exclusive-divi-modules' ),
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
					'mobile_options'  => true,
					'hover'           => 'tabs',
				),
				'button_text'      => array(
					'label'           => et_builder_i18n( 'Button Text' ),
					'type'            => 'text',
					'option_category' => 'basic_option',
					'default' => esc_html__('Button Text','edm-exclusive-divi-modules'),
					'description'     => esc_html__( 'Input your desired button text.', 'edm-exclusive-divi-modules' ),
					'toggle_slug'     => 'main_link',
					'dynamic_content' => 'text',
					'mobile_options'  => true,
					'hover'           => 'tabs',
				),
				'button_url'       => array(
					'label'           => esc_html__( 'Button Link URL', 'edm-exclusive-divi-modules' ),
					'type'            => 'text',
					'option_category' => 'basic_option',
					'default' => '#',
					'description'     => esc_html__( 'Input the destination URL for your button.', 'edm-exclusive-divi-modules' ),
					'toggle_slug'     => 'main_link',
					'dynamic_content' => 'url',
				),
				'url_new_window'   => array(
					'label'            => esc_html__( 'Button Link Target', 'edm-exclusive-divi-modules' ),
					'type'             => 'select',
					'option_category'  => 'configuration',
					'options'          => array(
						'off' => esc_html__( 'In The Same Window', 'edm-exclusive-divi-modules' ),
						'on'  => esc_html__( 'In The New Tab', 'edm-exclusive-divi-modules' ),
					),
					'toggle_slug'      => 'main_link',
					'description'      => esc_html__( 'Here you can choose whether or not your link opens in a new window', 'edm-exclusive-divi-modules' ),
					'default_on_front' => 'off',
				),
				'button_alignment' => array(
					'label'           => esc_html__( 'Button Alignment', 'edm-exclusive-divi-modules' ),
					'description'     => esc_html__( 'Align your button to the left, right or center of the module.', 'edm-exclusive-divi-modules' ),
					'type'            => 'text_align',
					'option_category' => 'configuration',
					'options'         => et_builder_get_text_orientation_options( array( 'justified' ) ),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'alignment',
					'description'     => esc_html__( 'Here you can define the alignment of Button', 'edm-exclusive-divi-modules' ),
					'mobile_options'  => true,
				),



			);
				}

	public function render( $attrs, $content = null, $render_slug ) {

		$heading_txt = $this->props['heading'];
		$body_content  = $this->props['body_content'];
		$button_url  = $this->props['button_url'];
		$button_text  = $this->props['button_text'];
		$header_level  = $this->props['header_level'];




		$output = sprintf('
	      <div class="edm_mouse_parallax_wrp">
	        <div class="edm_mouse_parallax_inner">
	          <%1$s class="edm_title_text">%5$s</%1$s>
	          <div class="edm_content_inner">
	          	%4$s
	          </div>
	          <div className="edm_mouse_button">
	            <a href="%2$s" class="et_pb_button edm_mouse_button_link">%3$s</a>
	          </div>
	        </div>
	      </div>
		',et_pb_process_header_level( $header_level, 'h1' ), $button_url, $button_text, $body_content, $heading_txt );
		return $output;
	
	}
}

new  EDM_MouseParallax;
