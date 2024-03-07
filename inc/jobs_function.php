<?php

function theme_boost_get_jobs_list () {
    global $wpdb;

    $query = "
    SELECT p.post_title, pm.meta_value AS custom_url
    FROM {$wpdb->posts} p
    INNER JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id
    WHERE p.post_type = 'jobs' AND p.post_status = 'publish'
    AND pm.meta_key = 'custom_url'
    ORDER BY p.post_title ASC
";

    $results = $wpdb->get_results($query);

    $sorted_posts = array();

    foreach ($results as $result) {
        $first_letter = strtoupper(substr($result->post_title, 0, 1));
        $sorted_posts[$first_letter][$result->post_title] = $result->custom_url;
    }

    ksort($sorted_posts);

    return $sorted_posts;
}