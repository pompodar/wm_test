<?php
/*
Plugin Name: WM Test
Description: The plugin is for test
Version: 1.0.0
Author: Svjatoslav Kachmar
Author Uri: http://example.com
*/

if (!defined('ABSPATH'))
{
    die("Hey, you don't access this file");
}

add_action( 'admin_init', 'wp_plugin_has_parents' );
function wp_plugin_has_parents() {
if ( is_admin() && current_user_can( 'activate_plugins') && !is_plugin_active( 'advanced-custom-fields/acf.php') ) {

    add_action( 'admin_notices', 'wp_plugin_notice' );

    deactivate_plugins( plugin_basename( __FILE__) );
    if ( isset( $_GET['activate'] ) ) {
      unset( $_GET['activate'] );
    }
  }
}
function wp_plugin_notice() {
  ?><div class="error">
    <p>Sorry, But this plugin requires Advanced Custom Fields to be installed and activated</p>
</div><?php }

function yourprefix_add_to_content( $content ) {    
    if( is_single() && 'movies' == get_post_type()) {
        $countries = get_the_terms( $post->ID, 'countries' );
        if( $countries ){
            $countries = array_shift( $countries );
        }

        $genres = get_the_terms( $genres->ID, 'genres' );
        if( $genres ){
            $genres = array_shift( $genres );
        }

        $cost = get_field_object('cost');

        $date = get_field_object('date');
        
        $content .= $countries->name . "<br>" . $genres->name . "<br>" . $cost['value']  . "<br>" . $date['value'];
    }
    return $content;
}
add_filter( 'the_content', 'yourprefix_add_to_content' );