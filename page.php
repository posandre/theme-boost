<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-boost
 */

get_header();
?>

	<main id="primary" class="site-main">
        <h1 style="padding: 60px 0 20px 0;"><?php _e('Result function get_jobs_list from the /inc/jobs_function.php', 'THEME_BOOST_TEXT_DOMAIN');?></h1>

        <?php
                $jobs_list = theme_boost_get_jobs_list();

                if ( empty($jobs_list) ) {
                    echo '<p style="color:red">' . __('Please add some posts to the Jobs post type for displaying result array!', 'THEME_BOOST_TEXT_DOMAIN') . '</p>';
                } else {
                    echo '<pre>';
                    print_r($jobs_list);
                    echo '</pre>';
                }
        ?>


		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
