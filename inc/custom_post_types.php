<?php
/**
 * @return void
 */
function theme_boost_jobs_post_type()
{
    $args = [
        'labels' => [
            'name'          => __('Jobs', 'THEME_BOOST_TEXT_DOMAIN'),
            'singular_name' => __('Jobs', 'THEME_BOOST_TEXT_DOMAIN')
        ],
        'supports'  => ['title', 'custom-fields'],
        'public'    => true,
        'menu_icon' => 'dashicons-tickets'
    ];

    register_post_type('jobs', $args);
}

add_action('init', 'theme_boost_jobs_post_type');