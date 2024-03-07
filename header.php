<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme-boost
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="container">
    <div class="row">
        <div class="col-md-12">
            <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'theme-boost' ); ?></a>
        </div>
        <header id="masthead" class="site-heade col-md-12r">
            <div class="site-branding">
                <?php
                the_custom_logo();
                if ( is_front_page() && is_home() ) :
                    ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php
                else :
                    ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php
                endif;
                $theme_boost_description = get_bloginfo( 'description', 'display' );
                if ( $theme_boost_description || is_customize_preview() ) :
                    ?>
                    <p class="site-description"><?php echo $theme_boost_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                <?php endif; ?>
            </div><!-- .site-branding -->

            <?php if( class_exists('ACF') && !empty(get_field('mega_menu_items', 'options')) ) :
                get_template_part('template-parts/menu', 'header');
            else :
            ?>
            <nav id="site-default-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'theme-boost' ); ?></button>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                    )
                );
                ?>
            </nav><!-- #site-default-navigation -->
            <?php endif; ?>
        </header><!-- #masthead -->
    </div>
