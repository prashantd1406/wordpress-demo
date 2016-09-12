<?php
/**
 * YS Magazine Theme Customizer
 *
 * @package YS Magazine
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ys_magazine_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'ys_magazine_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ys_magazine_customize_preview_js() {
	wp_enqueue_script( 'ys_magazine_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'ys_magazine_customize_preview_js' );

function ys_register_theme_customizer( $wp_customize ) {
/*-----------------------------------------------------------*
 * Defining our own 'Category' section
 *-----------------------------------------------------------*/
/* First category */

$title = __( 'Front Page Categories' , 'ys-magazine' );
$wp_customize->add_section(
    'ys_category',
    array(
        'title'     => $title,
        'priority'  => 50
    )
);

$defaultCategory = __( 'Uncategorized', 'ys-magazine' );
$wp_customize->add_setting( 'first_category', array(
    'default'           => $defaultCategory,     // The default category name.
    'sanitize_callback' => 'ys_sanitize_category',  // Sanitize callback function name
) );

function ys_sanitize_category( $category ) {
    if ( ! is_string ( $category ) ) { 
        $category = 'Uncategorized';
    }
    return $category;
}
$firstCategory = __( 'First category', 'ys-magazine' );
$wp_customize->add_control(
    new WP_Customize_Category_Control(
        $wp_customize,
        'first_category',
        array(
            'label'    => $firstCategory,
            'settings' => 'first_category',
            'section'  => 'ys_category'
        )
    )
);

/* Second category */
$wp_customize->add_setting( 'second_category', array(
    'default'           => $defaultCategory,     // The default category name.
    'sanitize_callback' => 'ys_sanitize_category',  // Sanitize callback function name
) );
$secondCategory = __( 'Second category', 'ys-magazine' );
$wp_customize->add_control(
    new WP_Customize_Category_Control(
        $wp_customize,
        'second_category',
        array(
            'label'    => $secondCategory,
            'settings' => 'second_category',
            'section'  => 'ys_category'
        )
    )
);

/* Third category */

$wp_customize->add_setting( 'third_category', array(
    'default'           => $defaultCategory,     // The default category name.
    'sanitize_callback' => 'ys_sanitize_category',  // Sanitize callback function name
) );
$thirdCategory = __( 'Third category', 'ys-magazine' );
$wp_customize->add_control(
    new WP_Customize_Category_Control(
        $wp_customize,
        'third_category',
        array(
            'label'    => $thirdCategory,
            'settings' => 'third_category',
            'section'  => 'ys_category'
        )
    )
);
/* Fourth category */

$wp_customize->add_setting( 'fourth_category', array(
    'default'           => $defaultCategory,     // The default category name.
    'sanitize_callback' => 'ys_sanitize_category',  // Sanitize callback function name
) );
$fourthCategory = __( 'Fourth category', 'ys-magazine' );
$wp_customize->add_control(
    new WP_Customize_Category_Control(
        $wp_customize,
        'fourth_category',
        array(
            'label'    => $fourthCategory,
            'settings' => 'fourth_category',
            'section'  => 'ys_category'
        )
    )
);
} // end of ys_register_theme_customizer
add_action( 'customize_register', 'ys_register_theme_customizer' );