<?php

class EDM_MultiButton extends ET_Builder_Module {

	public $slug       = 'edm_multi_button';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'http://www.exclusivedivi.com/',
		'author'     => 'Exclusive Divi',
		'author_uri' => 'http://www.exclusivedivi.com/',
	);

    public function init()
    {
        $this->icon_path = EDM_PLUGIN_PATH . 'admin/icons/edm_multi_button.svg';
        $this->slug = 'edm_multi_button';
        $this->vb_support = 'on';
        $this->child_slug = 'edm_multi_button_child';
        $this->name = esc_html__('ED Multi Button', 'edm-exclusive-divi-modules');
    }

    public function get_settings_modal_toggles()
    {
        return [
            'general' => [
                'toggles' => [
                    'displaysettings' => esc_html__('Display Settings', 'edm-exclusive-divi-modules'),
                ],
            ],
        ];
    }

    public function get_custom_css_fields_config()
    {
        $fields = [];
        return $fields;
    }

    public function get_fields()
    {
        $fields = [];


        $fields['align_items'] = [
            'label' => esc_html__('Align Buttons', 'edm-exclusive-divi-modules'),
            'type' => 'select',
            'option_category' => 'configuration',
            'default' => 'baseline',
            'options' => [
                'left' => esc_html__('Left', 'edm-exclusive-divi-modules'),
                'center' => esc_html__('Center', 'edm-exclusive-divi-modules'),
                'right' => esc_html__('Right', 'edm-exclusive-divi-modules'),
            ],
            'toggle_slug' => 'displaysettings',
        ];

        return $fields;
    }

    public function get_advanced_fields_config()
    {
        $advanced_fields = [];
        $advanced_fields["text"] = false;
        $advanced_fields["text_shadow"] = false;

        $advanced_fields["fonts"] = false;
        $advanced_fields["text"] = false;

        $advanced_fields['margin_padding'] = [
            'css' => [
                'margin' => '%%order_class%%',
                'padding' => '%%order_class%%',
                'important' => 'all',
            ],
        ];


        return $advanced_fields;
    }

    public function render($attrs, $content, $render_slug)
    {

        $align_items = $this->props['align_items'];

        if ( '' !== $align_items ) { 

            

            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => "%%order_class%% .edm_multi_button",
                'declaration' => 'text-align:'.esc_attr( $align_items  ).';',
            ) );
    
        }        


        $output = sprintf(
            '<div class="edm_multi_button">
                %1$s
            </div>',
            et_core_sanitized_previously($this->content)
        );

        return $output;
    }
}

new  EDM_MultiButton;
