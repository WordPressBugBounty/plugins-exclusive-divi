<?php

class EDM_HighlightedText extends ET_Builder_Module {

	public $slug       = 'edm_highlighted_text';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'http://www.exclusivedivi.com/',
		'author'     => 'Exclusive Divi',
		'author_uri' => 'http://www.exclusivedivi.com/',
	);

	public function init() {
		$this->name 		= esc_html__( 'ED Highlighted Text', 'edm-exclusive-divi-modules' );
		$this->icon_path = EDM_PLUGIN_PATH . 'admin/icons/edm_highlighted_text.svg';

		$this->settings_modal_toggles = array(
			'general'	=> array(
				'toggles'		=>	array(
					'main_content'	=> esc_html__( 'Highlighted Text', 'edm-exclusive-divi-modules' ),
					'highlighted_style'	=> esc_html__( 'Highlighted Styling', 'edm-exclusive-divi-modules' ),
				),
			),
			'advanced'	=> array(
				'toggles'		=>	array(
					//Highlight color
					'highlighted_stroke_toggle'	=>	array(
						'title'		=>	esc_html__( 'Highlighted Text', 'edm-exclusive-divi-modules' ),
						'priority'	=>	1,
					),
					// Highlight font
					'highlighted_toggle' => array(
						'title'             => esc_html__('Highlighted Typography', 'edm-exclusive-divi-modules'),
						'priority'          => 2,
						'sub_toggles'       => array(
							'sub_toogle_heading_font'   => array(
								'name' => 'Heading Text',
							),
							'sub_toogle_highlight_font'   => array(
								'name' => 'Highlight Text',
							),
						),
						'tabbed_subtoggles' => true,			
					),
				
				),
			),
		);

        // Custom CSS Field
        $this->custom_css_fields = array(
            'before_css' => array(
                'label'    => esc_html__('Before Text', 'edm-exclusive-divi-modules'),
                'selector' => '%%order_class%% .edm-highlighted-text-before',
            ),
            'highlight_css'  => array(
                'label'    => esc_html__('Highlighted Text', 'edm-exclusive-divi-modules'),
                'selector' => '%%order_class%% .edm-highlighted-text',
            ),  
            'after_css'  => array(
                'label'    => esc_html__('After Text', 'edm-exclusive-divi-modules'),
                'selector' => '%%order_class%% .edm-highlighted-text-after',
            ),
        );
	}

	public function get_fields() {
		return array(
            // Before Text Field
			'before_text'     	  => array(
				'label'           => esc_html__( 'Before Text', 'edm-exclusive-divi-modules' ),
				'type'            => 'text',
				'dynamic_content' => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Before Text entered here will appear inside the module.', 'edm-exclusive-divi-modules' ),
                'toggle_slug'     => 'main_content',
			),
			// Highlight Text
			'highlighted_text'      => array(
				'label'           => esc_html__( 'Highlighted Text', 'edm-exclusive-divi-modules' ),
				'type'            => 'text',
				'dynamic_content' => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Hightlighted Text entered here will appear inside the module.', 'edm-exclusive-divi-modules' ),
				'toggle_slug'     => 'main_content',
				
			),
			// After Text Field
			'after_text'      => array(
				'label'           => esc_html__( 'After Text', 'edm-exclusive-divi-modules' ),
				'type'            => 'text',
				'dynamic_content' => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'After Text entered here will appear inside the module.', 'edm-exclusive-divi-modules' ),
				'toggle_slug'     => 'main_content',
			),
			// Heading Tag Option
			'heading_tag'         => array(
				'label'           => esc_html__('Select Heading Tag', 'edm-exclusive-divi-modules'),
				'type'            => 'select',
				'description'     => esc_html__('Select the heading tag, which you would like to use', 'edm-exclusive-divi-modules'),
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'default'         => 'h2',
				'options'         => array(
					'h1'	  => esc_html__('H1', 'edm-exclusive-divi-modules'),
					'h2'	  => esc_html__('H2', 'edm-exclusive-divi-modulesbuilder'),
					'h3'	  => esc_html__('H3', 'edm-exclusive-divi-modules'),
					'h4'	  => esc_html__('H4', 'edm-exclusive-divi-modules'),
					'h5'	  => esc_html__('H5', 'edm-exclusive-divi-modules'),
					'h6'	  => esc_html__('H6', 'edm-exclusive-divi-modules'),
					'p'	      => esc_html__('P', 'edm-exclusive-divi-modules'),
					'span'	  => esc_html__('Span', 'edm-exclusive-divi-modules'),
				),
			),

			

					
			'highlighted_style'           => array(
				'label'             => esc_html__( 'Select Highlighted Text Style', 'edm-exclusive-divi-modules' ),
				'type'              => 'select',
				'option_category'   => 'basic_option',
				'toggle_slug'       => 'highlighted_style',
				'default'           => 'highlighted-underline',
				'description'       => esc_html__( 'Here you can select Highlighted Text styles.' , 'edm-exclusive-divi-modules' ),
				'options'           => array(
					'highlighted-underline'     => esc_html__( 'Underline Highlighted', 'edm-exclusive-divi-modules' ),
					'highlighted-background'     => esc_html__( 'Background Highlighted', 'edm-exclusive-divi-modules' ),
					'highlighted-strikethrough'     => esc_html__( 'Strikethrough Highlighted', 'edm-exclusive-divi-modules' ),
				),				
			),

		


			// Highlight Color
			'stroke_color'       => array(
				'label'          => esc_html__('Select Color', 'edm-exclusive-divi-modules'),
				'type'           => 'color-alpha',
				'description'     => esc_html__( 'Select a suitable color to use as highlight for the text.', 'edm-exclusive-divi-modules' ),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'highlighted_stroke_toggle',
				'default'        => '#0077FF',
				'hover'			 => 'tabs',
				'mobile_options' => true,
				'responsive'	 => true,
			),
			// Highlight Width
			'stroke_width'		=> array(
				'label'         => esc_html__('Stroke Width', 'edm-exclusive-divi-modules'),
				'type'			=> 'range',
				'description'     => esc_html__( 'Adjust the width of the stroke added for the highlighted text.', 'edm-exclusive-divi-modules' ),
				'tab_slug'		=> 'advanced',
				'toggle_slug'	=> 'highlighted_stroke_toggle',
				'default'		=> '10%',
				'show_if' => array(
					'highlighted_style' => 'highlighted-underline'
				),
				'range_settings'  => array(
					'min'  => '10',
					'max'  => '50',
					'step' => '5',
				),
				'fixed_unit'      => '%',
				'validate_unit'   => true,
			),
		
		
		);
		
	}


    public function get_advanced_fields_config() {
		$advanced_fields = array();
		$advanced_fields['fonts'] 	= false;
		$advanced_fields['text'] 	= false;

		$advanced_fields['fonts'] = array(
            // Before After Fonts
            'heading_fonts'   => array(
                'label'       => esc_html__('', 'edm-exclusive-divi-modules'),
                'toggle_slug' => 'highlighted_toggle',
				'tab_slug'    => 'advanced',
				'hide_text_align' => true,
				'sub_toggle'  => 'sub_toogle_heading_font',
                'line_height' => array(
                    'default' => '1em',
                ),
                'font_size'   => array(
                    'default' => '26px',
                ),
                'css'         => array(
                    'main' => "%%order_class%% .edm-highlighted-text-heading",
                ),
			),
			// Highlight Text
			'animation_fonts'   => array(
				'label'       => esc_html__('', 'edm-exclusive-divi-modules'),
				'toggle_slug' => 'highlighted_toggle',
				'tab_slug'    => 'advanced',
				'hide_text_align' => true,
				'sub_toggle'  => 'sub_toogle_highlight_font',
				'line_height' => array(
					'default' => '1em',
				),
				'font_size'   => array(
					'default' => '26px',
				),
				'css'         => array(
					'main' => "%%order_class%% .edm-highlighted-text",
				),
			),
		);

		return $advanced_fields;
	}

	public function render( $attrs, $content, $render_slug ) {
	
		$headingTag  	= 	$this->props['heading_tag'];
		$before_text 	= 	$this->props['before_text'];
		$after_text		=	$this->props['after_text'];
		$highlight_text	=	$this->props['highlighted_text'];
		$highlighted_style =$this->props['highlighted_style']; 
     
		// Before Text
		$text_before = "";
		if ( "" !== $before_text ) {
			$text_before = sprintf(
				'<span class="edm-highlighted-text-before edm-highlighted-text-heading">%1$s</span>',
				esc_html__( $before_text )
			);
		}

		// Highlight Text
		$text_highlight = "";
		if ( "" !== $highlight_text ) {
			$text_highlight = sprintf(
				'<span class="edm-highlighted-text">%1$s</span>',
				esc_html__( $highlight_text )
			);
		}

		// After Text
		$text_after = "";
		if ( "" !== $after_text ) {
			$text_after = sprintf(
				'<span class="edm-highlighted-text-after edm-highlighted-text-heading">%1$s</span>',
				esc_html__( $after_text )
			);
		}

		$stroke_color			= $this->props['stroke_color'];
		$stroke_width			=	$this->props['stroke_width'];
	
		if ( '' !== $stroke_width ) { 

			

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .highlighted-underline .edm-highlighted-text-inner",
				'declaration' => 'background-size: 100% '.esc_attr( $stroke_width  ).' ;',
			) );
	
		}

		if ( '' !== $stroke_color ) {

		

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .highlighted-underline .edm-highlighted-text-inner",
				'declaration' => sprintf( 'background-image: linear-gradient(%1$s, %1$s) ;', esc_attr( $stroke_color  ) ),
			) );


			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .highlighted-background .edm-highlighted-text-inner .edm-highlighted-text",
				'declaration' => 'background-image: linear-gradient(to bottom, transparent 8%, '.esc_attr( $stroke_color  ).' 8%, '.esc_attr( $stroke_color  ).' 94%, transparent 94%) ;'
			) );
			
		}

		$this->apply_css($render_slug);

		return sprintf( 
			'<%4$s class="edm-highlighted-text-wrapper %5$s">
					%1$s
					<span class="edm-highlighted-text-inner">
						%3$s
						
					</span>
					%2$s
			</%4$s>', 
			$text_before,
			$text_after,
			$text_highlight,
			$headingTag,
			$highlighted_style
		);
	}


}

new EDM_HighlightedText;
