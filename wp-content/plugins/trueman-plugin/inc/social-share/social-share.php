<?php

/*
 * Social Share
*/

if ( ! function_exists( 'trueman_add_social_share' ) ) :
	function trueman_add_social_share( $post_id ) {
	    $html = '';

	    if ( 'post' === get_post_type( $post_id ) || 'portfolio' === get_post_type( $post_id ) ) {
			$social_share = get_field( 'social_share', 'options' );

			if ( $social_share ) {
				foreach ($social_share as $share) {
					$html .= '<a class="share-btn share-btn-' . esc_attr( $share['value'] ) . '" title="' . esc_html__( 'Share on ', 'trueman-plugin' ) . esc_attr( $share['label'] ) . '"><i class="icon fab fa-' . esc_attr ( $share['value'] ) . '"></i></a>';
				}
			}

			if ( $html ) {
				$html = '<div class="social-share"><strong>' . esc_html__( 'Share:', 'trueman-plugin' ) . '</strong> ' . $html . '</div>';
			}
		}

	    return $html;
	}
endif;

function trueman_social_share_scripts() {
    if ( 'portfolio' === get_post_type() ) {
    	$trueman_rrssb_init = 'jQuery(document).ready(function ($) { $(".social-share").rrssb({ title: "' . esc_attr( get_the_title() ) . '", url: "' . esc_url( get_the_permalink() ) . '" }); });';

    	wp_enqueue_script( 'trueman-rrssb', plugin_dir_url( __FILE__ ) . '/js/rrssb.js', array('jquery'), '1.0.0', true );
		wp_add_inline_script('trueman-rrssb', $trueman_rrssb_init );
    }
}
add_action("wp_enqueue_scripts", "trueman_social_share_scripts");

?>