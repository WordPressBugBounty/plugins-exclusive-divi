<?php

class EDM_Twitter_Feed extends EDM_Builder_Module {

	protected $module_credits = array(
		'module_uri' => 'https://exclusivedivi.com/module/twitter-feed/',
		'author'     => 'Exclusive Divi',
		'author_uri' => 'http://www.exclusivedivi.com/',
	);

	public function init() {

		$this->icon_path = EDM_PLUGIN_PATH . 'admin/icons/edm_twitter_feed.svg';
		$this->vb_support = 'on';
		$this->name       = esc_html__( 'ED Twitter Feed', 'edm-exclusive-divi-modules' );
		$this->slug       = 'edm_twitter_feed';

		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'twitter_feed'  => esc_html__( 'Twitter Feed', 'edm-exclusive-divi-modules' ),
					'elements'      => esc_html__( 'Elements', 'edm-exclusive-divi-modules' ),
					'grid_settings' => esc_html__( 'Grid Settings', 'edm-exclusive-divi-modules' ),
				),
			),

			'advanced' => array(
				'toggles' => array(
					'tweets'      => esc_html__( 'Tweets Box', 'edm-exclusive-divi-modules' ),
					'user_avatar' => esc_html__( 'User Avatar', 'edm-exclusive-divi-modules' ),
					'user_text'   => array(
						'title'             => esc_html__( 'User Text', 'edm-exclusive-divi-modules' ),
						'tabbed_subtoggles' => true,
						'sub_toggles'       => array(
							'name'     => array(
								'name' => esc_html__( 'Name', 'edm-exclusive-divi-modules' ),
							),
							'username' => array(
								'name' => esc_html__( 'Username', 'edm-exclusive-divi-modules' ),
							),
						),
					),
					'content'     => array(
						'title'             => esc_html__( 'Content', 'edm-exclusive-divi-modules' ),
						'tabbed_subtoggles' => true,
						'sub_toggles'       => array(
							'description' => array(
								'name' => esc_html__( 'Description', 'edm-exclusive-divi-modules' ),
							),
							'read_more'   => array(
								'name' => esc_html__( 'Read More', 'edm-exclusive-divi-modules' ),
							),
							'date'        => array(
								'name' => esc_html__( 'Date', 'edm-exclusive-divi-modules' ),
							),
						),
					),
					'footer'      => esc_html__( 'Footer', 'edm-exclusive-divi-modules' ),
				),
			),
		);
	}

	public function get_fields() {

		$fields = array(

			// Twitter Feed.
			'user_name'           => array(
				'label'            => __( 'User Name', 'edm-exclusive-divi-modules' ),
				'type'             => 'text',
				'default'          => '@exclusivedivi',
				'description'      => __( 'Use @ sign with your Twitter user name.', 'edm-exclusive-divi-modules' ),
				'toggle_slug'      => 'twitter_feed',
				'computed_affects' => array( '__twitterfeed' ),
			),

			'consumer_key'        => array(
				'label'            => __( 'Consumer Key', 'edm-exclusive-divi-modules' ),
				'description'      => __( '.', 'edm-exclusive-divi-modules' ),
				'type'             => 'text',
				'default'          => 'okjSlxMnSMCKTKlBVjPhg5R1v',
				'description'      => '<a href="https://apps.twitter.com/app/" target="_blank">Get Consumer Key.</a> Create a new app or select existing app and grab the consumer key.',
				'toggle_slug'      => 'twitter_feed',
				'computed_affects' => array( '__twitterfeed' ),
			),

			'consumer_secret'     => array(
				'label'            => __( 'Consumer Secret', 'edm-exclusive-divi-modules' ),
				'description'      => __( '.', 'edm-exclusive-divi-modules' ),
				'type'             => 'text',
				'default'          => '8GhKIROr4kT1byyCqiXsJkttS3BXqePOJlWN2TfKCVgenHMCeb',
				'description'      => '<a href="https://apps.twitter.com/app/" target="_blank">Get Consumer Secret key.</a> Create a new app or select existing app and grab the consumer secret.',
				'toggle_slug'      => 'twitter_feed',
				'computed_affects' => array( '__twitterfeed' ),
			),

			// Twitter Settings.
			'sort_by'             => array(
				'label'            => __( 'Sort By', 'edm-exclusive-divi-modules' ),
				'description'      => __( 'Choose how your feed should be sorted.', 'edm-exclusive-divi-modules' ),
				'type'             => 'select',
				'default'          => 'recent-posts',
				'options'          => array(
					'recent-posts'   => __( 'Recent Posts', 'edm-exclusive-divi-modules' ),
					'old-posts'      => __( 'Old Posts', 'edm-exclusive-divi-modules' ),
					'favorite_count' => __( 'Favorite', 'edm-exclusive-divi-modules' ),
					'retweet_count'  => __( 'Retweet', 'edm-exclusive-divi-modules' ),
				),
				'toggle_slug'      => 'elements',
				'computed_affects' => array( '__twitterfeed' ),
			),

			'tweets_limit'        => array(
				'label'            => __( 'Number of tweets to show', 'edm-exclusive-divi-modules' ),
				'description'      => __( 'Choose how much posts you would like to display per List.', 'edm-exclusive-divi-modules' ),
				'type'             => 'range',
				'default'          => '8',
				'unitless'         => true,
				'range_settings'   => array(
					'step' => 1,
					'min'  => 3,
					'max'  => 24,
				),
				'toggle_slug'      => 'elements',
				'computed_affects' => array( '__twitterfeed' ),
			),

			'show_twitter_icon'   => array(
				'label'            => __( 'Show Twitter Logo', 'edm-exclusive-divi-modules' ),
				'description'      => __( 'Here you can choose whether twitter logo should be displayed.', 'edm-exclusive-divi-modules' ),
				'type'             => 'yes_no_button',
				'options'          => array(
					'on'  => __( 'Yes', 'edm-exclusive-divi-modules' ),
					'off' => __( 'No', 'edm-exclusive-divi-modules' ),
				),
				'default'          => 'on',
				'toggle_slug'      => 'elements',
				'computed_affects' => array( '__twitterfeed' ),
			),

			'show_user_image'     => array(
				'label'            => __( 'Show User Image', 'edm-exclusive-divi-modules' ),
				'description'      => __( 'Here you can choose whether user image should be displayed.', 'edm-exclusive-divi-modules' ),
				'type'             => 'yes_no_button',
				'options'          => array(
					'on'  => __( 'Yes', 'edm-exclusive-divi-modules' ),
					'off' => __( 'No', 'edm-exclusive-divi-modules' ),
				),
				'default'          => 'on',
				'toggle_slug'      => 'elements',
				'computed_affects' => array( '__twitterfeed' ),
			),

			'show_name'           => array(
				'label'            => __( 'Show Name', 'edm-exclusive-divi-modules' ),
				'description'      => __( 'Here you can choose whether name should be displayed.', 'edm-exclusive-divi-modules' ),
				'type'             => 'yes_no_button',
				'options'          => array(
					'on'  => __( 'Yes', 'edm-exclusive-divi-modules' ),
					'off' => __( 'No', 'edm-exclusive-divi-modules' ),
				),
				'default'          => 'on',
				'toggle_slug'      => 'elements',
				'computed_affects' => array( '__twitterfeed' ),
			),

			'show_user_name'      => array(
				'label'            => __( 'Show User Name', 'edm-exclusive-divi-modules' ),
				'description'      => __( 'Here you can choose whether user name should be displayed.', 'edm-exclusive-divi-modules' ),
				'type'             => 'yes_no_button',
				'options'          => array(
					'on'  => __( 'Yes', 'edm-exclusive-divi-modules' ),
					'off' => __( 'No', 'edm-exclusive-divi-modules' ),
				),
				'default'          => 'off',
				'toggle_slug'      => 'elements',
				'computed_affects' => array( '__twitterfeed' ),
			),

			'show_date'           => array(
				'label'            => __( 'Show Date', 'edm-exclusive-divi-modules' ),
				'description'      => __( 'Here you can choose whether date should be displayed.', 'edm-exclusive-divi-modules' ),
				'type'             => 'yes_no_button',
				'options'          => array(
					'on'  => __( 'Yes', 'edm-exclusive-divi-modules' ),
					'off' => __( 'No', 'edm-exclusive-divi-modules' ),
				),
				'default'          => 'on',
				'toggle_slug'      => 'elements',
				'computed_affects' => array( '__twitterfeed' ),
			),

			'show_favorite'       => array(
				'label'            => __( 'Show Favorite', 'edm-exclusive-divi-modules' ),
				'description'      => __( 'Here you can choose whether favorite should be displayed.', 'edm-exclusive-divi-modules' ),
				'type'             => 'yes_no_button',
				'options'          => array(
					'on'  => __( 'Yes', 'edm-exclusive-divi-modules' ),
					'off' => __( 'No', 'edm-exclusive-divi-modules' ),
				),
				'default'          => 'on',
				'toggle_slug'      => 'elements',
				'computed_affects' => array( '__twitterfeed' ),
			),

			'show_retweet'        => array(
				'label'            => __( 'Show Retweet', 'edm-exclusive-divi-modules' ),
				'description'      => __( 'Here you can choose whether retweet should be displayed.', 'edm-exclusive-divi-modules' ),
				'type'             => 'yes_no_button',
				'options'          => array(
					'on'  => __( 'Yes', 'edm-exclusive-divi-modules' ),
					'off' => __( 'No', 'edm-exclusive-divi-modules' ),
				),
				'default'          => 'on',
				'toggle_slug'      => 'elements',
				'computed_affects' => array( '__twitterfeed' ),
			),

			'read_more'           => array(
				'label'            => __( ' Show Read More', 'edm-exclusive-divi-modules' ),
				'description'      => __( 'Here you can choose whether readmore should be displayed.', 'edm-exclusive-divi-modules' ),
				'type'             => 'yes_no_button',
				'options'          => array(
					'on'  => __( 'Yes', 'edm-exclusive-divi-modules' ),
					'off' => __( 'No', 'edm-exclusive-divi-modules' ),
				),
				'default'          => 'on',
				'toggle_slug'      => 'elements',
				'computed_affects' => array(
					'__twitterfeed',
				),
			),

			'read_more_text'      => array(
				'label'            => __( 'Read More Text', 'edm-exclusive-divi-modules' ),
				'description'      => __( 'Define your custom readmore text.', 'edm-exclusive-divi-modules' ),
				'type'             => 'text',
				'default'          => 'Read More',
				'description'      => __( 'Use @ sign with your Twitter user name.', 'edm-exclusive-divi-modules' ),
				'toggle_slug'      => 'elements',
				'show_if'          => array( 'read_more' => 'on' ),
				'computed_affects' => array(
					'__twitterfeed',
				),
			),

			// grid settings.
			'column_count'        => array(
				'label'          => __( 'Numbers of Column', 'edm-exclusive-divi-modules' ),
				'description'    => __( 'Define column numbers per row.', 'edm-exclusive-divi-modules' ),
				'type'           => 'range',
				'default'        => '3',
				'unitless'       => true,
				'mobile_options' => true,
				'range_settings' => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 10,
				),
				'toggle_slug'    => 'grid_settings',
			),

			'column_gap_x'        => array(
				'label'          => __( 'Column Gap Left/Right', 'edm-exclusive-divi-modules' ),
				'description'    => __( 'Define left/right column spacing.', 'edm-exclusive-divi-modules' ),
				'type'           => 'range',
				'default'        => '20px',
				'mobile_options' => true,
				'range_settings' => array(
					'step' => 1,
					'min'  => 0,
					'max'  => 100,
				),
				'toggle_slug'    => 'grid_settings',
			),

			'column_gap_y'        => array(
				'label'          => __( 'Column Gap Top/Bottom', 'edm-exclusive-divi-modules' ),
				'description'    => __( 'Define top/bottom column spacing.', 'edm-exclusive-divi-modules' ),
				'type'           => 'range',
				'default'        => '20px',
				'mobile_options' => true,
				'range_settings' => array(
					'step' => 1,
					'min'  => 0,
					'max'  => 100,
				),
				'toggle_slug'    => 'grid_settings',
			),

			// User Avatar.
			'avatar_position'     => array(
				'label'       => __( 'Avatar Position', 'edm-exclusive-divi-modules' ),
				'description' => __( 'Here you can define avatar position. By selecting absolute position avatar can be placed any where on the feed.', 'edm-exclusive-divi-modules' ),
				'type'        => 'select',
				'default'     => 'normal',
				'options'     => array(
					'normal'   => __( 'Normal', 'edm-exclusive-divi-modules' ),
					'absolute' => __( 'Absolute', 'edm-exclusive-divi-modules' ),
				),
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'user_avatar',
			),

			'avatar_placement'    => array(
				'label'       => esc_html__( 'Avatar Placement', 'edm-exclusive-divi-modules' ),
				'description' => __( 'Here you can define avatar placement.', 'edm-exclusive-divi-modules' ),
				'type'        => 'select',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'user_avatar',
				'default'     => 'left_top',
				'options'     => array(
					'left_top'     => esc_html__( 'Left Top', 'edm-exclusive-divi-modules' ),
					'left_bottom'  => esc_html__( 'Left Bottom', 'edm-exclusive-divi-modules' ),
					'right_top'    => esc_html__( 'Right Top', 'edm-exclusive-divi-modules' ),
					'right_bottom' => esc_html__( 'Right Bottom', 'edm-exclusive-divi-modules' ),
				),
				'show_if'     => array(
					'avatar_position' => 'absolute',
				),
			),

			'avatar_offset_x'     => array(
				'label'          => esc_html__( 'Avatar Offset X', 'edm-exclusive-divi-modules' ),
				'description'    => __( 'Define avatar horizontal offset value.', 'edm-exclusive-divi-modules' ),
				'type'           => 'range',
				'default'        => '50%',
				'range_settings' => array(
					'min'  => -600,
					'max'  => 600,
					'step' => 1,
				),
				'show_if'        => array(
					'avatar_position' => 'absolute',
				),
				'toggle_slug'    => 'user_avatar',
				'tab_slug'       => 'advanced',
			),

			'avatar_offset_y'     => array(
				'label'           => esc_html__( 'Avatar Offset Y', 'edm-exclusive-divi-modules' ),
				'description'     => __( 'Define avatar vertical offset value.', 'edm-exclusive-divi-modules' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'default'         => '0px',
				'range_settings'  => array(
					'min'  => -600,
					'max'  => 600,
					'step' => 1,
				),
				'show_if'         => array(
					'avatar_position' => 'absolute',
				),
				'toggle_slug'     => 'user_avatar',
				'tab_slug'        => 'advanced',
			),

			'avatar_size'         => array(
				'label'          => __( 'Profile Image Size', 'edm-exclusive-divi-modules' ),
				'description'    => __( 'Here you can define custom size for your avatar.', 'edm-exclusive-divi-modules' ),
				'type'           => 'range',
				'default'        => '50px',
				'range_settings' => array(
					'step' => 1,
					'min'  => 0,
					'max'  => 100,
				),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'user_avatar',
			),

			'avatar_spacing'      => array(
				'label'          => __( 'Avatar Spacing', 'edm-exclusive-divi-modules' ),
				'description'    => __( 'Define avatar spacing gap.', 'edm-exclusive-divi-modules' ),
				'type'           => 'range',
				'default'        => '15px',
				'range_settings' => array(
					'step' => 1,
					'min'  => 0,
					'max'  => 200,
				),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'user_avatar',
				'show_if'        => array(
					'avatar_position' => 'normal',
				),
			),

			// Tweets.
			'alignment'           => array(
				'label'            => __( 'Alignment', 'edm-exclusive-divi-modules' ),
				'description'      => __( 'Align content to the left, right or center.', 'edm-exclusive-divi-modules' ),
				'type'             => 'text_align',
				'options'          => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'options_icon'     => 'module_align',
				'default'          => 'left',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'tweets',
				'computed_affects' => array( '__feed' ),
			),

			'twitter_icon_size'   => array(
				'label'          => __( 'Twitter Icon Size', 'edm-exclusive-divi-modules' ),
				'description'    => __( 'Here you can define custom size for your twitter icon.', 'edm-exclusive-divi-modules' ),
				'type'           => 'range',
				'default'        => '20px',
				'range_settings' => array(
					'step' => 1,
					'min'  => 0,
					'max'  => 100,
				),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'tweets',
			),

			'content_padding'     => array(
				'label'          => __( 'Tweets Padding', 'edm-exclusive-divi-modules' ),
				'description'    => __( 'Here you can define custom padding for your tweets content.', 'edm-exclusive-divi-modules' ),
				'type'           => 'custom_padding',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'tweets',
				'default'        => '50px|50px|50px|50px',
				'mobile_options' => true,
			),

			// Description.
			'description_spacing' => array(
				'label'          => __( 'Bottom Spacing', 'edm-exclusive-divi-modules' ),
				'description'    => __( 'Here you can define a custom spacing at the bottom of the description text.', 'edm-exclusive-divi-modules' ),
				'type'           => 'range',
				'default'        => '25px',
				'range_settings' => array(
					'step' => 1,
					'min'  => 0,
					'max'  => 100,
				),
				'mobile_options' => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'content',
				'sub_toggle'     => 'description',
			),

			// Footer.
			'footer_alignment'    => array(
				'label'       => esc_html__( 'Footer Alignment', 'edm-exclusive-divi-modules' ),
				'description' => __( 'Define footer content alignment from the list.', 'edm-exclusive-divi-modules' ),
				'type'        => 'select',
				'default'     => 'space-between',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'footer',
				'options'     => array(
					'flex-start'    => esc_html__( 'Left', 'edm-exclusive-divi-modules' ),
					'flex-end'      => esc_html__( 'Right', 'edm-exclusive-divi-modules' ),
					'center'        => esc_html__( 'Center', 'edm-exclusive-divi-modules' ),
					'space-around'  => esc_html__( 'Space Around', 'edm-exclusive-divi-modules' ),
					'space-between' => esc_html__( 'Space Between', 'edm-exclusive-divi-modules' ),
				),
			),

			'footer_padding'      => array(
				'label'          => __( 'Footer Padding', 'edm-exclusive-divi-modules' ),
				'description'    => __( 'Define custom padding for the footer content.', 'edm-exclusive-divi-modules' ),
				'type'           => 'custom_padding',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'footer',
				'default'        => '0px|50px|50px|50px',
				'mobile_options' => true,
			),

			'favorite_color'      => array(
				'label'       => __( 'Favorite Text Color', 'edm-exclusive-divi-modules' ),
				'description' => __( 'Here you can define custom color for favorite text.', 'edm-exclusive-divi-modules' ),
				'type'        => 'color-alpha',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'footer',

				'show_if'     => array( 'show_favorite' => 'on' ),
				'default'     => '#000000',
			),

			'favorite_font_size'  => array(
				'label'          => __( 'Favorite Text Size', 'edm-exclusive-divi-modules' ),
				'description'    => __( 'Here you can define custom size for favorite text.', 'edm-exclusive-divi-modules' ),
				'type'           => 'range',
				'default'        => '14px',
				'range_settings' => array(
					'step' => 1,
					'min'  => 0,
					'max'  => 100,
				),
				'mobile_options' => true,
				'show_if'        => array( 'show_favorite' => 'on' ),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'footer',
			),

			'favorite_icon_color' => array(
				'label'       => __( 'Favorite Icon Color', 'edm-exclusive-divi-modules' ),
				'description' => __( 'Here you can define custom color for favorite icon.', 'edm-exclusive-divi-modules' ),
				'type'        => 'color-alpha',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'footer',

				'show_if'     => array( 'show_favorite' => 'on' ),
				'default'     => '#000000',
			),

			'favorite_icon_size'  => array(
				'label'          => __( 'Favorite Icon Size', 'edm-exclusive-divi-modules' ),
				'description'    => __( 'Here you can define custom size for favorite icon.', 'edm-exclusive-divi-modules' ),
				'type'           => 'range',
				'default'        => '14px',
				'range_settings' => array(
					'step' => 1,
					'min'  => 0,
					'max'  => 100,
				),
				'mobile_options' => true,
				'show_if'        => array( 'show_favorite' => 'on' ),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'footer',
			),

			'retweet_color'       => array(
				'label'       => __( 'Retweet Text Color', 'edm-exclusive-divi-modules' ),
				'description' => __( 'Here you can define custom color for retweet text.', 'edm-exclusive-divi-modules' ),
				'type'        => 'color-alpha',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'footer',
				'show_if'     => array( 'show_retweet' => 'on' ),
				'default'     => '#000000',
			),

			'retweet_font_size'   => array(
				'label'          => __( 'Retweet Text Size', 'edm-exclusive-divi-modules' ),
				'description'    => __( 'Here you can define custom size for retweet text.', 'edm-exclusive-divi-modules' ),
				'type'           => 'range',
				'default'        => '14px',
				'range_settings' => array(
					'step' => 1,
					'min'  => 0,
					'max'  => 100,
				),
				'mobile_options' => true,
				'tab_slug'       => 'advanced',
				'show_if'        => array( 'show_retweet' => 'on' ),
				'toggle_slug'    => 'footer',
			),

			'retweet_icon_color'  => array(
				'label'       => __( 'Retweet Icon Color', 'edm-exclusive-divi-modules' ),
				'description' => __( 'Here you can define custom color for retweet icon.', 'edm-exclusive-divi-modules' ),
				'type'        => 'color-alpha',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'footer',
				'show_if'     => array( 'show_retweet' => 'on' ),
				'default'     => '#000000',
			),

			'retweet_icon_size'   => array(
				'label'          => __( 'Retweet Icon Size', 'edm-exclusive-divi-modules' ),
				'description'    => __( 'Here you can define custom size for retweet icon.', 'edm-exclusive-divi-modules' ),
				'type'           => 'range',
				'default'        => '14px',
				'range_settings' => array(
					'step' => 1,
					'min'  => 0,
					'max'  => 100,
				),
				'mobile_options' => true,
				'tab_slug'       => 'advanced',
				'show_if'        => array( 'show_retweet' => 'on' ),
				'toggle_slug'    => 'footer',
			),

			'__twitterfeed'       => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'EDM_Twitter_Feed', 'twitter_feed_render' ),
				'computed_depends_on' => array(
					'user_name',
					'consumer_key',
					'consumer_secret',
					'sort_by',
					'tweets_limit',
					'show_twitter_icon',
					'show_user_image',
					'show_name',
					'show_user_name',
					'show_date',
					'show_favorite',
					'show_retweet',
					'read_more',
					'read_more_text',
				),
				'computed_minimum'    => array(
					'user_name',
					'consumer_key',
					'consumer_secret',
				),
			),
		);
		$additional_options = $this->custom_background_fields(
			'tweets_item',
			__( 'Tweets', 'edm-exclusive-divi-modules' ),
			'advanced',
			'tweets',
			array( 'color', 'gradient', 'hover' ),
			array(),
			''
		);

		return array_merge( $fields, $additional_options );
	}

	public function get_advanced_fields_config() {

		$advanced_fields = array();

		$advanced_fields['text']        = false;
		$advanced_fields['text_shadow'] = false;
		$advanced_fields['fonts']       = false;

		$advanced_fields['borders']['tweets'] = array(
			'css'          => array(
				'main'      => array(
					'border_radii'  => '%%order_class%% .edm-twitter-grid-item-inner',
					'border_styles' => '%%order_class%% .edm-twitter-grid-item-inner',
				),
				'important' => 'all',
			),
			'label_prefix' => esc_html__( 'Tweets Box', 'edm-exclusive-divi-modules' ),
			'defaults'     => array(
				'border_radii'  => 'on|0px|0px|0px|0px',
				'border_styles' => array(
					'width' => '1px',
					'color' => '#efefef',
					'style' => 'solid',
				),
			),
			'tab_slug'     => 'advanced',
			'toggle_slug'  => 'tweets',
		);

		$advanced_fields['borders']['avatar'] = array(
			'css'          => array(
				'main'      => array(
					'border_radii'  => '%%order_class%% .edm-twitter-grid-avatar',
					'border_styles' => '%%order_class%% .edm-twitter-grid-avatar',
				),
				'important' => 'all',
			),
			'label_prefix' => esc_html__( 'Avatar', 'edm-exclusive-divi-modules' ),
			'defaults'     => array(
				'border_radii'  => 'on|0px|0px|0px|0px',
				'border_styles' => array(
					'width' => '0px',
					'color' => '#333',
					'style' => 'solid',
				),
			),
			'tab_slug'     => 'advanced',
			'toggle_slug'  => 'user_avatar',
		);

		$advanced_fields['box_shadow']['tweets'] = array(
			'label'       => esc_html__( 'Tweets Box Shadow', 'edm-exclusive-divi-modules' ),
			'css'         => array(
				'main'      => '%%order_class%% .edm-twitter-grid-item-inner',
				'important' => 'all',
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'tweets',
		);

		$advanced_fields['box_shadow']['avatar'] = array(
			'label'       => esc_html__( 'Avatar Box Shadow', 'edm-exclusive-divi-modules' ),
			'css'         => array(
				'main'      => '%%order_class%% .edm-twitter-grid-avatar',
				'important' => 'all',
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'user_avatar',
		);

		$advanced_fields['fonts']['name'] = array(
			'css'             => array(
				'main'      => '%%order_class%% .edm-twitter-grid-author-name',
				'important' => 'all',
			),
			'line_height'     => array(
				'range_settings' => array(
					'min'  => '1',
					'max'  => '3',
					'step' => '1',
				),
			),
			'hide_text_align' => true,
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'user_text',
			'sub_toggle'      => 'name',
		);

		$advanced_fields['fonts']['username'] = array(
			'css'             => array(
				'main'      => '%%order_class%% .edm-twitter-grid-username',
				'important' => 'all',
			),
			'line_height'     => array(
				'range_settings' => array(
					'min'  => '1',
					'max'  => '3',
					'step' => '1',
				),
			),
			'hide_text_align' => true,
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'user_text',
			'sub_toggle'      => 'username',
		);

		$advanced_fields['fonts']['description'] = array(
			'css'             => array(
				'main'      => '%%order_class%% .edm-twitter-grid-content p',
				'important' => 'all',
			),
			'line_height'     => array(
				'range_settings' => array(
					'min'  => '1',
					'max'  => '3',
					'step' => '1',
				),
			),
			'hide_text_align' => true,
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'content',
			'sub_toggle'      => 'description',
		);

		$advanced_fields['fonts']['readmore'] = array(
			'css'             => array(
				'main'      => '%%order_class%% .edm-twitter-grid-content p a',
				'important' => 'all',
			),
			'line_height'     => array(
				'range_settings' => array(
					'min'  => '1',
					'max'  => '3',
					'step' => '1',
				),
			),
			'hide_text_align' => true,
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'content',
			'sub_toggle'      => 'read_more',
		);

		$advanced_fields['fonts']['date'] = array(
			'css'             => array(
				'main'      => '%%order_class%% .edm-twitter-grid-date',
				'important' => 'all',
			),
			'line_height'     => array(
				'range_settings' => array(
					'min'  => '1',
					'max'  => '3',
					'step' => '1',
				),
			),
			'hide_text_align' => true,
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'content',
			'sub_toggle'      => 'date',
		);

		return $advanced_fields;
	}

	public static function twitter_feed_render( $args = array(), $conditional_tags = array(), $current_page = array() ) {

		$defaults = array(
			'user_name'         => '',
			'consumer_key'      => '',
			'consumer_secret'   => '',
			'sort_by'           => '',
			'tweets_limit'      => '',
			'show_twitter_icon' => '',
			'show_user_image'   => '',
			'show_name'         => '',
			'show_user_name'    => '',
			'show_date'         => '',
			'show_favorite'     => '',
			'show_retweet'      => '',
			'read_more'         => '',
			'read_more_text'    => '',
		);

		$args = wp_parse_args( $args, $defaults );

		$ba_tweets_token = '_builder_tweet_grid_token';
		$ba_tweets_cash  = '_builder_tweet_grid_cash';
		$user_name       = trim( $args['user_name'] );

		if ( empty( $user_name ) || empty( $args['consumer_key'] ) || empty( $args['consumer_secret'] ) ) {
			return;
		}

		$transient_key = $user_name . $ba_tweets_cash;
		$twitter_data  = get_transient( $transient_key );
		$credentials   = base64_encode( $args['consumer_key'] . ':' . $args['consumer_secret'] ); // phpcs:ignore

		$messages = array();
		if ( ! $twitter_data ) {

			$auth_url      = 'https://api.twitter.com/oauth2/token';
			$auth_response = wp_remote_post(
				$auth_url,
				array(
					'method'      => 'POST',
					'httpversion' => '1.1',
					'blocking'    => true,
					'headers'     => array(
						'Authorization' => 'Basic ' . $credentials,
						'Content-Type'  => 'application/x-www-form-urlencoded;charset=UTF-8',
					),
					'body'        => array(
						'grant_type' => 'client_credentials',
					),
				)
			);

			$body  = json_decode( wp_remote_retrieve_body( $auth_response ) );
			$token = $body->access_token;

			// Twitter Url.
			$twitter_url     = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=' . $user_name . '&count=999&tweet_mode=extended';
			$tweets_response = wp_remote_get(
				$twitter_url,
				array(
					'httpversion' => '1.1',
					'blocking'    => true,
					'headers'     => array( 'Authorization' => "Bearer $token" ),
				)
			);

			$twitter_data = json_decode( wp_remote_retrieve_body( $tweets_response ), true );
			set_transient( $user_name . $ba_tweets_cash, $twitter_data, 5 * MINUTE_IN_SECONDS );
		}

		if ( ! empty( $twitter_data ) && array_key_exists( 'errors', $twitter_data ) ) {
			foreach ( $twitter_data['errors'] as $error ) {
				$messages['error'] = $error['message'];
			}
		} elseif ( count( $twitter_data ) < $args['tweets_limit'] ) {
			$messages['item_limit'] = __( '"Number of Tweets to show" is more than your actual total Tweets\'s number. You have only ' . count( $twitter_data ) . ' Tweets', 'edm-exclusive-divi-modules' ); // phpcs:ignore

		}

		if ( ! empty( $messages ) ) {
			foreach ( $messages as $key => $message ) {
				$output = sprintf( '<div class="edm-%2$s edm-tweet-error-message ed-022">%1$s</div>', esc_html( $message ), esc_html( $key ) );
			}

			return $output;
		}

		switch ( $args['sort_by'] ) {

			case 'old-posts':
				usort(
					$twitter_data,
					function ( $a, $b ) {
						if ( strtotime( $a['created_at'] ) === strtotime( $b['created_at'] ) ) {
							return 0;
						}
						return ( strtotime( $a['created_at'] ) < strtotime( $b['created_at'] ) ? -1 : 1 );
					}
				);
				break;

			case 'favorite_count':
				usort(
					$twitter_data,
					function ( $a, $b ) {
						if ( $a['favorite_count'] === $b['favorite_count'] ) {
							return 0;
						}
						return ( $a['favorite_count'] > $b['favorite_count'] ) ? -1 : 1;
					}
				);
				break;

			case 'retweet_count':
				usort(
					$twitter_data,
					function ( $a, $b ) {
						if ( $a['retweet_count'] === $b['retweet_count'] ) {
							return 0;
						}
						return ( $a['retweet_count'] > $b['retweet_count'] ) ? -1 : 1;
					}
				);
				break;
			default:
				$twitter_data;

		}

		if ( ! empty( $args['tweets_limit'] ) && count( $twitter_data ) > $args['tweets_limit'] ) {
			$items = array_splice( $twitter_data, 0, $args['tweets_limit'] );
		}

		if ( empty( $args['tweets_limit'] ) ) {
			$items = $twitter_data;
		}

		ob_start();

		foreach ( $items as $item ) : ?>
			<div class = "edm-twitter-grid-item">
			<div class = "edm-twitter-grid-item-inner">

					<?php if ( 'on' === $args['show_twitter_icon'] ) : ?>
						<div class = "edm-twitter-grid-icon">
							<span>
								<svg  version="1.1" id="edm-twitter" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox = "0 0 512 512" >
								<path style="fill:#1da1f2;" d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016 c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992
									c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056
									c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152
									c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792
									c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44
									C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568
									C480.224,136.96,497.728,118.496,512,97.248z"/>
								</svg>
							</span>
						</div>
					<?php endif; ?>

					<div class = "edm-twitter-grid-inner-wrapper">
					<div class = "edm-twitter-grid-author">

							<?php if ( 'on' === $args['show_user_image'] ) : ?>

								<a class = "edm-twitter-grid-avatar-wrapper" href = "<?php echo esc_url( 'https://twitter.com/' . $user_name ); ?>">
									<img
										src   = "<?php echo esc_url( $item['user']['profile_image_url_https'] ); ?>"
										alt   = "<?php echo esc_attr( $item['user']['name'] ); ?>"
										class = "edm-twitter-grid-avatar"
									>
								</a>

							<?php endif; ?>

							<div class = "edm-twitter-grid-user">

								<?php if ( 'on' === $args['show_name'] ) : ?>
									<a href = "<?php echo esc_url( 'https://twitter.com/' . $user_name ); ?>" class = "edm-twitter-grid-author-name">
										<?php echo esc_html( $item['user']['name'] ); ?>
									</a>
								<?php endif; ?>

								<?php if ( 'on' === $args['show_user_name'] ) : ?>
									<a href = "<?php echo esc_url( 'https://twitter.com/' . $user_name ); ?>" class = "edm-twitter-grid-username">
										<?php echo esc_html( $args['user_name'] ); ?>
									</a>
								<?php endif; ?>
							</div>
						</div>
						<div class = "edm-twitter-grid-content">

							<?php
							if ( isset( $item['entities']['urls'][0] ) ) {
								$content = str_replace( $item['entities']['urls'][0]['url'], '', $item['full_text'] );
							} else {
								$content = $item['full_text'];
							}
							?>

							<div class = "edm-inner-twitter-grid-content">
								<p>
									<?php echo esc_html( $content ); ?>
									<?php if ( 'on' === $args['read_more'] ) : ?>
										<a href = "<?php echo esc_url( '//twitter.com/' . $item['user']['screen_name'] . '/status/' . $item['id'] ); ?>" target = "_blank">
											<?php echo esc_html( $args['read_more_text'] ); ?>
										</a>
									<?php endif; ?>
								</p>
							</div>

							<?php if ( 'on' === $args['show_date'] ) : ?>
								<div class = "edm-twitter-grid-date">
									<?php echo esc_html( gmdate( 'M d Y', strtotime( $item['created_at'] ) ) ); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>

					<?php if ( 'on' === $args['show_favorite'] || 'on' === $args['show_retweet'] ) : ?>
						<div class = "edm-twitter-grid-footer-wrapper">
						<div class = "edm-twitter-grid-footer">
								<?php if ( 'on' === $args['show_favorite'] ) : ?>
									<div class = "edm-tweet-favorite">
										<?php echo esc_html( $item['favorite_count'] ); ?>
										<span class = "et-pb-icon edm-icon edm-tweet-favorite-icon"></span>
									</div>
								<?php endif; ?>

								<?php if ( 'on' === $args['show_retweet'] ) : ?>
									<div class = "edm-tweet-retweet">
										<?php echo esc_html( $item['retweet_count'] ); ?>
										<span class = "et-pb-icon edm-icon edm-tweet-retweet-icon"></span>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>

			<?php

		endforeach;

		$output = ob_get_clean();

		if ( ! $output ) {
			$output = 'Something is wrong';
		}

		return $output;
	}

	public function render( $attrs, $content, $render_slug ) {

		$this->render_css( $render_slug );

		$user_name         = $this->props['user_name'];
		$consumer_key      = $this->props['consumer_key'];
		$consumer_secret   = $this->props['consumer_secret'];
		$sort_by           = $this->props['sort_by'];
		$tweets_limit      = $this->props['tweets_limit'];
		$show_twitter_icon = $this->props['show_twitter_icon'];
		$show_user_image   = $this->props['show_user_image'];
		$show_name         = $this->props['show_name'];
		$show_user_name    = $this->props['show_user_name'];
		$show_date         = $this->props['show_date'];
		$show_favorite     = $this->props['show_favorite'];
		$show_retweet      = $this->props['show_retweet'];
		$read_more         = $this->props['read_more'];
		$read_more_text    = $this->props['read_more_text'];
		$order_class       = self::get_module_order_class( $render_slug );
		$unique_number     = str_replace( '_', '', str_replace( $this->slug, '', $order_class ) );
		$ba_tweets_token   = '_' . $unique_number . '_tweet_grid_token';
		$ba_tweets_cash    = '_' . $unique_number . '_tweet_grid_cash';
		$user_name         = trim( $user_name );
		$alignment         = $this->props['alignment'];

		if ( empty( $user_name ) || empty( $consumer_key ) || empty( $consumer_secret ) ) {
			return;
		}

		//echo $consumer_key."<br />".$consumer_secret;

		$transient_key = $user_name . $ba_tweets_cash;
		$twitter_data  = get_transient( $transient_key );

		$credentials   = base64_encode( trim($consumer_key) . ':' . trim($consumer_secret) ); // phpcs:ignore

		$messages = array();

		if ( $twitter_data['errors'] || empty($twitter_data['errors']) ) {

			$auth_url = 'https://api.twitter.com/oauth2/token';

			$auth_response = wp_remote_post(
				$auth_url,
				array(
					'method'      => 'POST',
					'httpversion' => '1.1',
					'blocking'    => true,
					'headers'     => array(
						'Authorization' => 'Basic ' . $credentials,
						'Content-Type'  => 'application/x-www-form-urlencoded;charset=UTF-8',
					),
					'body'        => array(
						'grant_type' => 'client_credentials',
					),
				)
			);

			$body = json_decode( wp_remote_retrieve_body( $auth_response ) );

			$token = $body->access_token;

			// Twitter Url.
			$twitter_url = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=' . $user_name . '&count=999&tweet_mode=extended';

			$tweets_response = wp_remote_get(
				$twitter_url,
				array(
					'httpversion' => '1.1',
					'blocking'    => true,
					'headers'     => array( 'Authorization' => "Bearer $token" ),
				)
			);

			$twitter_data = json_decode( wp_remote_retrieve_body( $tweets_response ), true );
			set_transient( $user_name . $ba_tweets_cash, $twitter_data, 5 * MINUTE_IN_SECONDS );

		}

		if ( ! empty( $twitter_data ) && array_key_exists( 'errors', $twitter_data ) ) {

			foreach ( $twitter_data['errors'] as $error ) {
				$messages['error'] = $error['message'];
			}
		} elseif ( count( $twitter_data ) < $tweets_limit ) {

			$messages['item_limit'] = __( '"Number of Tweets to show" is more than your actual total Tweets\'s number. You have only ' . count( $twitter_data ) . ' Tweets', 'edm-exclusive-divi-modules' ); //phpcs:ignore

		}
		if ( ! empty( $messages ) ) {

			foreach ( $messages as $key => $message ) {
				$output = sprintf( '<div class="edm-tweet-error-message ed-0023">%1$s</div>', esc_html( $message ) );
			}

			return $output;

		}

		switch ( $sort_by ) {

			case 'old-posts':
				usort(
					$twitter_data,
					function ( $a, $b ) {
						if ( strtotime( $a['created_at'] ) === strtotime( $b['created_at'] ) ) {
							return 0;
						}
						return ( strtotime( $a['created_at'] ) < strtotime( $b['created_at'] ) ? -1 : 1 );
					}
				);
				break;

			case 'favorite_count':
				usort(
					$twitter_data,
					function ( $a, $b ) {
						if ( $a['favorite_count'] === $b['favorite_count'] ) {
							return 0;
						}
						return ( $a['favorite_count'] > $b['favorite_count'] ) ? -1 : 1;
					}
				);
				break;

			case 'retweet_count':
				usort(
					$twitter_data,
					function ( $a, $b ) {
						if ( $a['retweet_count'] === $b['retweet_count'] ) {
							return 0;
						}
						return ( $a['retweet_count'] > $b['retweet_count'] ) ? -1 : 1;
					}
				);
				break;

			default:
				$twitter_data;

		}

		if ( ! empty( $tweets_limit ) && count( $twitter_data ) > $tweets_limit ) {
			$items = array_splice( $twitter_data, 0, $tweets_limit );
		}

		if ( empty( $tweets_limit ) ) {
			$items = $twitter_data;
		}

		ob_start();

		foreach ( $items as $item ) :
			?>
			<div class = "edm-twitter-grid-item">
			<div class = "edm-twitter-grid-item-inner">

					<?php if ( 'on' === $show_twitter_icon ) : ?>
						<div class = "edm-twitter-grid-icon">
							<span>
								<svg  version = "1.1" id = "edm-twitter" xmlns = "http://www.w3.org/2000/svg" xmlns:xlink = "http://www.w3.org/1999/xlink" x = "0px" y = "0px" viewBox = "0 0 512 512">
								<path style   = "fill:#1da1f2;" d   = "M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016
									c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992
									c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056
									c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152
									c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792
									c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44
									C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568
									C480.224,136.96,497.728,118.496,512,97.248z"/>
								</svg>
							</span>
						</div>
					<?php endif; ?>

					<div class = "edm-twitter-grid-inner-wrapper">
					<div class = "edm-twitter-grid-author">

							<?php if ( 'on' === $show_user_image ) : ?>
								<a class = "edm-twitter-grid-avatar-wrapper" href = "<?php echo esc_url( 'https://twitter.com/' . $user_name ); ?>">
									<img
										src   = "<?php echo esc_url( $item['user']['profile_image_url_https'] ); ?>"
										alt   = "<?php echo esc_attr( $item['user']['name'] ); ?>"
										class = "edm-twitter-grid-avatar"
									>
								</a>
							<?php endif; ?>
							<div class = "edm-twitter-grid-user">

								<?php if ( 'on' === $show_name ) : ?>
									<a href = "<?php echo esc_url( 'https://twitter.com/' . $user_name ); ?>" class = "edm-twitter-grid-author-name">
										<?php echo esc_html( $item['user']['name'] ); ?>
									</a>
								<?php endif; ?>

								<?php if ( 'on' === $show_user_name ) : ?>
									<a href = "<?php echo esc_url( 'https://twitter.com/' . $user_name ); ?>" class = "edm-twitter-grid-username">
										<?php echo esc_html( $user_name ); ?>
									</a>
								<?php endif; ?>

							</div>

						</div>

						<div class = "edm-twitter-grid-content">

							<?php
							if ( isset( $item['entities']['urls'][0] ) ) {
								$content = str_replace( $item['entities']['urls'][0]['url'], '', $item['full_text'] );
							} else {
								$content = $item['full_text'];
							}
							?>

							<div class = "edm-inner-twitter-grid-content">
								<p>
									<?php echo esc_html( $content ); ?>
									<?php if ( 'on' === $read_more ) : ?>
										<a href = "<?php echo esc_url( '//twitter.com/' . $item['user']['screen_name'] . '/status/' . $item['id'] ); ?>" target = "_blank">
											<?php echo esc_html( $read_more_text ); ?>
										</a>
									<?php endif; ?>
								</p>
							</div>

							<?php if ( 'on' === $show_date ) : ?>
								<div class = "edm-twitter-grid-date">
									<?php echo esc_html( gmdate( 'M d Y', strtotime( $item['created_at'] ) ) ); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>

					<?php if ( 'on' === $show_favorite || 'on' === $show_retweet ) : ?>
						<div class = "edm-twitter-grid-footer-wrapper">
						<div class = "edm-twitter-grid-footer">
								<?php if ( 'on' === $show_favorite ) : ?>
									<div class = "edm-tweet-favorite">
										<?php echo esc_html( $item['favorite_count'] ); ?>
										<span class = "et-pb-icon edm-icon edm-tweet-favorite-icon"></span>
									</div>
								<?php endif; ?>

								<?php if ( 'on' === $show_retweet ) : ?>
									<div class = "edm-tweet-retweet">
										<?php echo esc_html( $item['retweet_count'] ); ?>
										<span class = "et-pb-icon edm-icon edm-tweet-retweet-icon"></span>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>

				</div>
			</div>
			<?php
		endforeach;

		$twitter_items = ob_get_clean();

		if ( ! $twitter_items ) {
			$twitter_items = 'Something is wrong!';
		}

		// CSS Classes.
		$classes = array();
		array_push( $classes, "edm-twitter-{$alignment}" );

		$output = sprintf(
			'
			<div class="edm-twitter-grid %2$s">
				%1$s
			</div>',
			$twitter_items,
			join( ' ', $classes )
		);

		return $output;
	}

	public function render_user_info_css( $render_slug ) {

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .edm-twitter-grid-icon span',
				'declaration' => sprintf( 'width: %1$s; height: %1$s;', $this->props['twitter_icon_size'] ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .edm-twitter-grid-avatar',
				'declaration' => sprintf( 'width: %1$s; height: %1$s;', $this->props['avatar_size'] ),
			)
		);
	}

	public function render_footer_css( $render_slug ) {

		$favorite_color      = $this->props['favorite_color'];
		$favorite_icon_color = $this->props['favorite_icon_color'];
		$favorite_font_size  = $this->props['favorite_font_size'];
		$favorite_icon_size  = $this->props['favorite_icon_size'];
		$retweet_color       = $this->props['retweet_color'];
		$retweet_icon_color  = $this->props['retweet_icon_color'];
		$retweet_font_size   = $this->props['retweet_font_size'];
		$retweet_icon_size   = $this->props['retweet_icon_size'];

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .edm-tweet-favorite',
				'declaration' => sprintf( 'color: %1$s !important;', $favorite_color ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .edm-tweet-favorite',
				'declaration' => sprintf( 'font-size: %1$s !important;', $favorite_font_size ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .edm-tweet-favorite span',
				'declaration' => sprintf( 'color: %1$s !important;', $favorite_icon_color ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .edm-tweet-favorite span',
				'declaration' => sprintf( 'font-size: %1$s !important;', $favorite_icon_size ),
			)
		);

		// Retweets.
		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .edm-tweet-retweet',
				'declaration' => sprintf( 'color: %1$s !important;', $retweet_color ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .edm-tweet-retweet span',
				'declaration' => sprintf( 'color: %1$s !important;', $retweet_icon_color ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .edm-tweet-retweet',
				'declaration' => sprintf( 'font-size: %1$s !important;', $retweet_font_size ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .edm-tweet-retweet span',
				'declaration' => sprintf( 'font-size: %1$s !important;', $retweet_icon_size ),
			)
		);

		$this->get_responsive_styles(
			'footer_padding',
			'%%order_class%% .edm-twitter-grid-footer-wrapper',
			array( 'primary' => 'padding' ),
			array( 'default' => '0px|50px|50px|50px' ),
			$render_slug
		);
	}

	public function render_content_css( $render_slug ) {

		$this->get_responsive_styles(
			'description_spacing',
			'%%order_class%% .edm-twitter-grid-content p',
			array(
				'primary'   => 'margin-bottom',
				'important' => true,
			),
			array( 'default' => '25px' ),
			$render_slug
		);

		$this->get_responsive_styles(
			'content_padding',
			'%%order_class%% .edm-twitter-grid-inner-wrapper',
			array( 'primary' => 'padding' ),
			array( 'default' => '50px|50px|50px|50px' ),
			$render_slug
		);

	}

	public function render_css( $render_slug ) {

		$border_width_all_tweets = $this->props['border_width_all_tweets'];
		$border_color_all_tweets = $this->props['border_color_all_tweets'];
		$avatar_position         = $this->props['avatar_position'];
		$alignment               = $this->props['alignment'];
		$avatar_spacing          = $this->props['avatar_spacing'];
		$avatar_offset_x         = $this->props['avatar_offset_x'];
		$avatar_offset_y         = $this->props['avatar_offset_y'];
		$avatar_placement        = $this->props['avatar_placement'];
		$avatar__placement       = explode( '_', $avatar_placement );

		$this->render_content_css( $render_slug );
		$this->render_user_info_css( $render_slug );

		// Item background.
		$this->get_custom_bg_style( $render_slug, 'tweets_item', '%%order_class%% .edm-twitter-grid-item-inner', '%%order_class%% .edm-twitter-grid-item-inner:hover' );

		// Avatar spacing.
		if ( 'normal' === $avatar_position ) {
			if ( 'center' === $alignment ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm-twitter-grid-avatar-wrapper',
						'declaration' => sprintf( 'margin-bottom: %1$s;', $avatar_spacing ),
					)
				);
			} elseif ( 'left' === $alignment ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm-twitter-grid-avatar-wrapper',
						'declaration' => sprintf( 'margin-right: %1$s;', $avatar_spacing ),
					)
				);
			} elseif ( 'right' === $alignment ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm-twitter-grid-avatar-wrapper',
						'declaration' => sprintf( 'margin-left: %1$s;', $avatar_spacing ),
					)
				);
			}
		}

		// Avatar Position.
		if ( 'absolute' === $avatar_position ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .edm-twitter-grid-avatar-wrapper',
					'declaration' => 'position: absolute; z-index: 99;',
				)
			);

			// image offset X.
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .edm-twitter-grid-avatar-wrapper',
					'declaration' => sprintf( '%1$s: %2$s;', $avatar__placement[0], $avatar_offset_x ),
				)
			);

			// image offset Y.
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .edm-twitter-grid-avatar-wrapper',
					'declaration' => sprintf( '%1$s: %2$s;', $avatar__placement[1], $avatar_offset_y ),
				)
			);

			if ( 'right_top' === $avatar_placement ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm-twitter-grid-avatar-wrapper',
						'declaration' => 'transform : translateX(50%) translateY(-50%);',
					)
				);
			} elseif ( 'right_bottom' === $avatar_placement ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm-twitter-grid-avatar-wrapper',
						'declaration' => 'transform : translateX(50%) translateY(50%);',
					)
				);
			} elseif ( 'left_bottom' === $avatar_placement ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm-twitter-grid-avatar-wrapper',
						'declaration' => 'transform : translateX(-50%) translateY(50%);',
					)
				);
			} elseif ( 'left_top' === $avatar_placement ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .edm-twitter-grid-avatar-wrapper',
						'declaration' => 'transform : translateX(-50%) translateY(-50%);',
					)
				);
			}
		}

		$this->render_footer_css( $render_slug );

		$footer_alignment = $this->props['footer_alignment'];
		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .edm-twitter-grid-footer',
				'declaration' => sprintf( 'display: flex; justify-content: %1$s;', $footer_alignment ),
			)
		);

		// Item Border.
		if ( empty( $border_color_all_tweets ) ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .edm-twitter-grid-item-inner',
					'declaration' => 'border-color: #efefef;',
				)
			);
		}

		if ( empty( $border_width_all_tweets ) ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .edm-twitter-grid-item-inner',
					'declaration' => 'border-width: 1px;',
				)
			);
		}

		// Grid Settings.
		$column_gap_x        = $this->props['column_gap_x'];
		$column_gap_x_tablet = ! empty( $this->props['column_gap_x_tablet'] ) ? $this->props['column_gap_x_tablet'] : $column_gap_x;
		$column_gap_x_phone  = ! empty( $this->props['column_gap_x_phone'] ) ? $this->props['column_gap_x_phone'] : $column_gap_x_tablet;
		$column_gap_y        = $this->props['column_gap_y'];
		$column_gap_y_tablet = ! empty( $this->props['column_gap_y_tablet'] ) ? $this->props['column_gap_y_tablet'] : $column_gap_y;
		$column_gap_y_phone  = ! empty( $this->props['column_gap_y_phone'] ) ? $this->props['column_gap_y_phone'] : $column_gap_y_tablet;
		$column_count        = $this->props['column_count'];
		$column_count_tablet = ! empty( $this->props['column_count_tablet'] ) ? $this->props['column_count_tablet'] : $column_count;
		$column_count_phone  = ! empty( $this->props['column_count_phone'] ) ? $this->props['column_count_phone'] : $column_count_tablet;

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .edm-twitter-grid',
				'declaration' => sprintf(
					'grid-column-gap: %1$s;
					grid-row-gap: %2$s;
					-ms-grid-columns: repeat(%3$s,1fr);
					grid-template-columns:repeat(%3$s,1fr);',
					$column_gap_x,
					$column_gap_y,
					$column_count
				),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .edm-twitter-grid',
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				'declaration' => sprintf(
					'grid-column-gap: %1$s;
					grid-row-gap: %2$s;
					-ms-grid-columns: repeat(%3$s,1fr);
					grid-template-columns:repeat(%3$s,1fr);',
					$column_gap_x_tablet,
					$column_gap_y_tablet,
					$column_count_tablet
				),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .edm-twitter-grid',
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				'declaration' => sprintf(
					'grid-column-gap: %1$s;
					grid-row-gap: %2$s;
					-ms-grid-columns: repeat(%3$s,1fr);
					grid-template-columns:repeat(%3$s,1fr);',
					$column_gap_x_phone,
					$column_gap_y_phone,
					$column_count_phone
				),
			)
		);
	}

}

new EDM_Twitter_Feed();
