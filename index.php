<?php
/**
  Plugin Name: Speed up Contact Form 7 
  Plugin URI: https://hellafast.digital
  Description: Makes Contact Form 7 and several addons to load only on pages with a form. 
  Increases PageSpeed and improves load time.
  Version: 1.1
  Author: Hella fast
  Author URI: https://hellafast.digital
  License: GPL2

  Copyright (c) 2020, Hella Fast 
**/

function hella_contactform7() {

    $load_scripts = false;

    if( is_singular() ) {
    	$post = get_post();

    	if( has_shortcode($post->post_content, 'contact-form-7') ) {
        	$load_scripts = true;
    	}

    }

    if( ! $load_scripts ) {
        wp_dequeue_script( 'contact-form-7' );
		wp_dequeue_script( 'google-recaptcha' );
		wp_dequeue_script( 'wpcf7-recaptcha' );
    wp_dequeue_script( 'wpcf7-redirect-script' );


        wp_dequeue_style( 'contact-form-7' );
		wp_dequeue_style( 'cf7-confirmation-addon' );
    wp_dequeue_style( 'wpcf7-redirect-script-frontend' );

    

    }

}

add_action( 'wp_enqueue_scripts', 'hella_contactform7', 99 );


?>