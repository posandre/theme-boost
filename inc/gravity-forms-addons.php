<?php
class TestProductField extends GF_Field {
    public $type = 'test_product_field';

    //Defining the field’s name
    public function get_form_editor_field_title() {
        return esc_attr__('Test product field', THEME_BOOST_TEXT_DOMAIN);
    }

    //Changing the field category
    public function get_form_editor_button() {
        return [
            'group' => 'advanced_fields',
            'text'  => $this->get_form_editor_field_title(),
        ];
    }

    public function get_form_editor_field_settings() {
        return [
            'label_setting',
            'description_setting',
        ];
    }

    // The rest of the code is added here...
}
GF_Fields::register(new TestProductField());



