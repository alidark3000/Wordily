<?php
/**
 * simple content Theme Customizer
 *
 * @package simple content
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function simple_content_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

$wp_customize->add_setting( 'link_color' , array(
    'default'     => '#ff3a3a',
    'transport'   => 'refresh',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
	'label'        => __( 'Link Color', 'simple_content' ),
	'section'    => 'colors',
	'settings'   => 'link_color',
) ) );



}
add_action( 'customize_register', 'simple_content_customize_register' );



function mytheme_customize_css()
{
    ?>
         <style type="text/css">
             a, a:visited, .main-navigation a, .main-navigation a:visited { color:<?php echo get_theme_mod('link_color'); ?>; }
                @media (min-width: 800px) { a:hover, .main-navigation a:hover {color: #000;} }
             #commentform .form-submit input, .nav-links a, a.toggler, button, input[type="button"], input[type="reset"], input[type="submit"], #respond h3 small a { background:<?php echo get_theme_mod('link_color'); ?>; }
               @media (max-width: 400px) {  .main-navigation a {background:<?php echo get_theme_mod('link_color'); ?>;}}

         </style>
    <?php
}
add_action( 'wp_head', 'mytheme_customize_css');



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function simple_content_customize_preview_js() {
	wp_enqueue_script( 'simple_content_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'simple_content_customize_preview_js' );
