<?php
/**
 * Wp Boostrap Sass Gulp enqueue scripts
 *
 * @package Wordpress_Boostrap4_Sass_Gulp
 */

/*
 * Adding Title Tag
 */
add_theme_support( 'title-tag' );

/*
 * Adding Thumbnail basic support
 */
add_theme_support( 'post-thumbnails' );
add_image_size( 'logo-cliente', 150, 150, true ); 
add_image_size( 'single-produto-destaque', 378, 266, true ); 
add_image_size( 'thumb-produto', 150, 114, true ); 

/*
 * Remove Editor
 */
function remove_editor() {
    if (isset($_GET['post'])) {
        $id = $_GET['post'];
        $template = get_post_meta($id, '_wp_page_template', true);

        if($template == 'template-pages/page-apresentacao.php'){ 
            remove_post_type_support( 'page', 'editor' );
        }elseif($template == 'template-pages/page-contato.php'){
	        remove_post_type_support( 'page', 'editor' );
        }elseif($template == 'template-pages/page-clientes.php'){
	        remove_post_type_support( 'page', 'editor' );
        }elseif($template == 'template-pages/page-produtos.php'){
	        remove_post_type_support( 'page', 'editor' );
        }
    }
}
add_action('init', 'remove_editor');

/*
 * Menus
 */
function register_my_menu() {
	register_nav_menu('menu-default',__( 'Menu Default' ));
}
add_action( 'init', 'register_my_menu' );


