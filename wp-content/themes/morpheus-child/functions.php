<?php
function my_theme_enqueue_styles() {

    $parent_style = 'parent-style'; // This is 'morpheus theme for morpheus theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );


}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles' ); 
?>
<?php 
wp_enqueue_script("jquery");
?>

<?php
// my custom jQuery
function my_theme_scripts() {
    wp_enqueue_script( 'my-custom-script', get_template_directory_uri() . '/js/my-custom-script.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );

 ?>