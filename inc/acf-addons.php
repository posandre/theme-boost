<?php
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => __('Mega menu settings', 'THEME_BOOST_TEXT_DOMAIN'),
        'menu_title'    => __('Mega menu', 'THEME_BOOST_TEXT_DOMAIN'),
        'menu_slug'     => 'mega-menu-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}
