<?php

class EDM_MultiButtonItem extends ET_Builder_Module
{

    public function init()
    {
        $this->icon_path = plugin_dir_path(__FILE__) . 'icon.svg';
        $this->slug = 'edm_multi_button_child';
        $this->vb_support = 'on';
        $this->type = 'child';
        $this->name = esc_html__('Button Grid', 'edm-exclusive-divi-modules');
        $this->main_css_element = '%%order_class%%.dipi_button_grid_child';
        $this->child_title_var = 'button_id';
        $this->advanced_setting_title_text = esc_html__('New Button', 'edm-exclusive-divi-modules');
        $this->settings_text = esc_html__('Button Settings', 'edm-exclusive-divi-modules');
    }

    public function get_settings_modal_toggles()
    {
        return [
            'general' => [
                'toggles' => [
                    'general' => esc_html__('General', 'edm-exclusive-divi-modules'),
                    'button_info' => esc_html__('Button Settings', 'edm-exclusive-divi-modules'),
                    'text_info' => esc_html__('Text Settings', 'edm-exclusive-divi-modules'),
                ],
            ],
    
            'custom_css' => [
                'toggles' => [
                    'classes' => esc_html__('CSS ID & Classes', 'edm-exclusive-divi-modules'),
                ],
            ]
        ];
    }

    public function get_custom_css_fields_config()
    {
        $fields = [];

        $fields['button_type'] = array(
            'label' => esc_html__('Button Style', 'edm-exclusive-divi-modules'),
            'selector' => '%%order_class%% .edm_button_link',
        );


        return $fields;
    }

    public function get_fields()
    {
        return array(
            'button_text'      => array(
                'label'           => et_builder_i18n( 'Button Text' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'default_on_front' => esc_html__( 'Button Text', 'edm-exclusive-divi-modules' ),
                'default' => esc_html__('Button Text','edm-exclusive-divi-modules'),
                'description'     => esc_html__( 'Input your desired button text.', 'edm-exclusive-divi-modules' ),
                'toggle_slug'     => 'button_info',
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
                'toggle_slug'     => 'button_info',
                'dynamic_content' => 'url',
            ),
            'button_link_target' => array(
                'label'           => esc_html__('Button Link Target', 'edm-exclusive-divi-modules'),
                'type'            => 'select',
                'option_category' => 'basic_option',
                'options'         => [
                    'off'    => esc_html__('Same Window', 'edm-exclusive-divi-modules'),
                    'on'  => esc_html__('New Window', 'edm-exclusive-divi-modules'),
                ],
                'toggle_slug' => 'button_info',
            )
        );
    }

    public function get_advanced_fields_config()
    {
        $advanced_fields = [];
        $advanced_fields["text"] = false;
        $advanced_fields["font"] = false;
        $advanced_fields["fonts"] = false;
        $advanced_fields["text_shadow"] = false;
        $advanced_fields["link_options"] = false;

        $advanced_fields['margin_padding'] = [
            'css' => [
                'margin' => '%%order_class%%',
                'padding' => '%%order_class%%',
                'important' => 'all',
            ],
        ];

        $advanced_fields['button']["button"] = [
            'label'    => esc_html__('Button Style', 'edm-exclusive-divi-modules'),
            'css' => [
                'main' => "%%order_class%% .edm_button_link",
                'limited_main' => "%%order_class%% .edm_button_link",
                'important' => true,
            ],
            'box_shadow'  => [
                'css' => [
                    'main' => "%%order_class%% .edm_button_link",
                    'important' => true,
                ],
            ],
            'use_alignment' => false,
            'margin_padding' => [
                'css' => [
                    'main' => "%%order_class%% .edm_button_link",
                    'important' => 'all',
                ],
            ]

        ];

        return $advanced_fields;
    }

    public function render($attrs, $content, $render_slug)
    {

        $button_custom = $this->props['custom_button'];

        $button = $this->render_button(
            array(
                'button_id'           => $this->module_id( false ),
                'button_custom'       => $button_custom,
                'button_classname'    => array( 'edm_button_link' ),
                'button_text'         => $this->props['button_text'],
                'button_text_escaped' => true,
                'button_url'          => $this->props['button_url'],
                'custom_icon'         => $this->props['button_icon'],
                'url_new_window'      => $this->props['button_link_target'],
                'has_wrapper'         => false,
            )
        );
        return $button;
    }
}

new EDM_MultiButtonItem;
