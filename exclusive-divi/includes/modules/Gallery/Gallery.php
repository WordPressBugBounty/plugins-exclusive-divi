<?php

class EDM_Gallery extends ET_Builder_Module {

	public $slug       = 'edm_gallery';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'http://www.exclusivedivi.com/',
		'author'     => 'Exclusive Divi',
		'author_uri' => 'http://www.exclusivedivi.com/',
	);

	public function init() {
		$this->name = esc_html__( 'ED Gallery', 'edm-exclusive-divi-modules' );
		$this->icon_path = EDM_PLUGIN_PATH . 'admin/icons/edm_gallery.svg';
	}

	public function get_settings_modal_toggles() {

		return array(

			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title'    => esc_html__( 'Gallery Content', 'edm-exclusive-divi-modules' ),
						'priority' => 1,
					),
					'gallery_settings' => array(
						'title'    => esc_html__( 'Gallery Settings', 'edm-exclusive-divi-modules' ),
						'priority' => 1,
					)

				),
			),
			'advanced' => array(
				'toggles' => array(
			
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

			'gallery_ids'            => array(
				'label'            => esc_html__( 'Images', 'edm-exclusive-divi-modules' ),
				'description'      => esc_html__( 'Choose the images that you would like to appear in the image gallery.', 'edm-exclusive-divi-modules' ),
				'type'             => 'upload-gallery',
				'computed_affects' => array(
					'__gallery',
				),
				'option_category'  => 'basic_option',
				'toggle_slug'      => 'main_content',
			),
			'__gallery'              => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'ET_Builder_Module_Gallery', 'get_gallery' ),
				'computed_depends_on' => array(
					'gallery_ids',
					'gallery_orderby',
					'gallery_captions',
					'fullwidth',
					'orientation',
					'show_pagination',
				),
			),
			'gallery_layout'                  => array(
				'label'           => esc_html__( 'Layout', 'edm-exclusive-divi-modules' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'carousel'  => esc_html__( 'Carousel', 'edm-exclusive-divi-modules' ),
					'masonry' => esc_html__( 'Masonry', 'edm-exclusive-divi-modules' ),
				),
				'default'         => 'carousel',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'gallery_settings',
				'description'     => esc_html__( 'Here you can choose Divider Line Type', 'edm-exclusive-divi-modules' ),
			),

			'gallery_col_padding'                   => array(
				'label'           => esc_html__( 'Gutter', 'edm-exclusive-divi-modules' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'validate_unit'         => true,
				'default_unit'     => 'px',
				'range_settings'        => array(
					'min'   => '1',
					'max'   => '100',
					'step'  => '1',
				),
				'default'               => '20px',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'gallery_settings',
				'description'     => esc_html__( 'Choose padding between the slider items.', 'edm-exclusive-divi-modules' ),
			),


			'number_of_col'                   => array(
				'label'           => esc_html__( 'Number of columns', 'edm-exclusive-divi-modules' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'validate_unit'         => true,
				'range_settings'        => array(
					'min'   => '1',
					'max'   => '5',
					'step'  => '1',
				),
				'default'               => '3',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'gallery_settings',
				'description'     => esc_html__( 'Choose number of columns in the slider.', 'edm-exclusive-divi-modules' ),
			),

			'slider_auto'         => array(
				'label'            => esc_html__( 'Auto Slide', 'edm-exclusive-divi-modules' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'default'          => 'off',
				'default_on_front' => 'off',
				'options'          => array(
					'off' => esc_html__( 'No', 'edm-exclusive-divi-modules' ),
					'on'  => esc_html__( 'Yes', 'edm-exclusive-divi-modules' ),
				),
				'show_if' => array(
					'gallery_layout' => 'carousel'
				),
				'description'      => esc_html__( 'Enable slider to auto move.', 'edm-exclusive-divi-modules' ),
				'toggle_slug'      => 'gallery_settings',
				'tab_slug'     => 'general',
			),


			'auto_speed'        => array(
				'label'            => esc_html__( 'Auto Slide Speed (in ms)', 'edm-exclusive-divi-modules' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '100ms',
				'default_on_front' => '100ms',
				'default_unit'     => 'ms',
				'range_settings'   => array(
					'min'  => '500',
					'max'  => '3000',
					'step' => '100',
				),
				'show_if' => array(
					'slider_auto' => 'on'
				),
				'toggle_slug'      => 'gallery_settings',
				'tab_slug'     => 'general',
			),

			'slider_infinite'         => array(
				'label'            => esc_html__( 'Infinite Slide', 'edm-exclusive-divi-modules' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'default'          => 'off',
				'default_on_front' => 'off',
				'options'          => array(
					'off' => esc_html__( 'No', 'edm-exclusive-divi-modules' ),
					'on'  => esc_html__( 'Yes', 'edm-exclusive-divi-modules' ),
				),
				'show_if' => array(
					'gallery_layout' => 'carousel'
				),
				'description'      => esc_html__( 'Enable slider to auto move.', 'edm-exclusive-divi-modules' ),
				'toggle_slug'      => 'gallery_settings',
				'tab_slug'     => 'general',
			),


			'slide_speed'        => array(
				'label'            => esc_html__( 'Slide Speed (in ms)', 'edm-exclusive-divi-modules' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '100ms',
				'default_on_front' => '100ms',
				'default_unit'     => 'ms',
				'range_settings'   => array(
					'min'  => '500',
					'max'  => '3000',
					'step' => '100',
				),

				'show_if' => array(
					'gallery_layout' => 'carousel'
				),

				'toggle_slug'      => 'gallery_settings',
				'tab_slug'     => 'general',
			),


			'center_mode'         => array(
				'label'            => esc_html__( 'Center Mode', 'edm-exclusive-divi-modules' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'default'          => 'off',
				'default_on_front' => 'off',
				'options'          => array(
					'off' => esc_html__( 'No', 'edm-exclusive-divi-modules' ),
					'on'  => esc_html__( 'Yes', 'edm-exclusive-divi-modules' ),
				),
				'show_if' => array(
					'gallery_layout' => 'carousel'
				),
				'description'      => esc_html__( 'Enable slider to auto move.', 'edm-exclusive-divi-modules' ),
				'toggle_slug'      => 'gallery_settings',
				'tab_slug'     => 'general',
			),

			'center_padding'        => array(
				'label'            => esc_html__( 'Center Mode (in px)', 'edm-exclusive-divi-modules' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '50px',
				'default_on_front' => '50px',
				'default_unit'     => 'px',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '200',
					'step' => '1',
				),

				'show_if' => array(
					'center_mode' => 'on'
				),

				'toggle_slug'      => 'gallery_settings',
				'tab_slug'     => 'general',
			),

		);
	}


	static function get_gallery( $args = array(), $conditional_tags = array(), $current_page = array() ) {
		$attachments = array();

		$defaults = array(
			'gallery_ids'      => array(),
			'gallery_orderby'  => '',
			'gallery_captions' => array(),
			'fullwidth'        => 'off',
			'orientation'      => 'landscape',
		);

		$args = wp_parse_args( $args, $defaults );

		$attachments_args = array(
			'include'        => $args['gallery_ids'],
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'post__in',
		);

		// Woo Gallery module shouldn't display placeholder image when no Gallery image is
		// available.
		// @see https://github.com/elegantthemes/submodule-builder/pull/6706#issuecomment-542275647
		if ( isset( $args['attachment_id'] ) ) {
			$attachments_args['attachment_id'] = $args['attachment_id'];
		}

		if ( 'rand' === $args['gallery_orderby'] ) {
			$attachments_args['orderby'] = 'rand';
		}

		if ( 'on' === $args['fullwidth'] ) {
			$width  = 1080;
			$height = 9999;
		} else {
			$width  = 400;
			$height = ( 'landscape' === $args['orientation'] ) ? 284 : 516;
		}

		$width  = (int) apply_filters( 'et_pb_gallery_image_width', $width );
		$height = (int) apply_filters( 'et_pb_gallery_image_height', $height );

		$_attachments = get_posts( $attachments_args );

		foreach ( $_attachments as $key => $val ) {
			$attachments[ $key ]                  = $_attachments[ $key ];
			$attachments[ $key ]->image_alt_text  = get_post_meta( $val->ID, '_wp_attachment_image_alt', true );
			$attachments[ $key ]->image_src_full  = wp_get_attachment_image_src( $val->ID, 'full' );
			$attachments[ $key ]->image_src_thumb = wp_get_attachment_image_src( $val->ID, array( $width, $height ) );
		}

		return $attachments;
	}

	public function get_attachments( $args = array() ) {
		return self::get_gallery( $args );
	}

	public function get_pagination_alignment() {
		$text_orientation = isset( $this->props['pagination_text_align'] ) ? $this->props['pagination_text_align'] : '';

		return et_pb_get_alignment( $text_orientation );
	}

	public function render( $attrs, $content = null, $render_slug ) {

			$gallery_items = $this->props['gallery_ids'];
			$gallery_items = explode(",", $gallery_items);
			$gallery_col_padding = $this->props['gallery_col_padding'];
			$columns = $this->props['number_of_col'];

			$gallery_data = "";
			foreach ($gallery_items as $gallery_item) {
				$gallery_image = wp_get_attachment_url( $gallery_item );
				$image_alt = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true);
				$gallery_data .= '<div class="edm_gallery_items" ><img src="'.$gallery_image.'" alt="'.$image_alt.'" /></div>';
			}
	
			if ( '' !== $gallery_col_padding) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm_gallery .edm_gallery_inner .edm_gallery_items',
						'declaration' => sprintf( 'padding: %1$s;', esc_attr( $gallery_col_padding   ) ),
					)
				);
			}


			if ( '' !== $gallery_col_padding || '' !== $columns) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm_gallery .edm_masnory_layout .edm_gallery_items',
						'declaration' => "width: calc((100% - (".$columns." - 1) * ".$gallery_col_padding.") / ".$columns.")",
					)
				);
			}

			


			if($this->props['gallery_layout'] == 'carousel'){

				wp_enqueue_script('slick-slider');
				wp_enqueue_style('slick-style');

				$output = '<div class="edm_gallery" ><div class="edm_gallery_inner"  data-gallery-col-padding="'.$this->props['gallery_col_padding'].'" data-number-of-col="'.$this->props['number_of_col'].'" data-slider-auto="'.$this->props['slider_auto'].'" data-auto-speed="'.$this->props['auto_speed'].'" data-slider-infinite="'.$this->props['slider_infinite'].'"  data-slide-speed="'.$this->props['slide_speed'].'" data-center-mode="'.$this->props['center_mode'].'" data-center-padding="'.$this->props['center_padding'].'" >'.$gallery_data.'</div></div>';
			}
			else{

				wp_enqueue_script('masonry');

				$output  = '<div class="edm_gallery"><div class="edm_masnory_layout" data-gutter="'.$this->props['gallery_col_padding'].'" >'.$gallery_data.'</div></div>';
			}

			return $output;
		
	}
}

new  EDM_Gallery;
