<?php
/**
 * Breadcrumbs
 *
 * @package trueman
 */

if ( ! function_exists( 'trueman_breadcrumbs' ) ) {
	function trueman_breadcrumbs( $page_id ) {
		if ( ! is_front_page() ) {
			$parent_page_id = wp_get_post_parent_id( $page_id );

			// Start the breadcrumb with a link to your homepage
			echo '<ul class="trm-breadcrumbs trm-label">';
			echo '<li><a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '" class="trm-anima-link">' . esc_html__( 'Home', 'trueman' ) . '</a></li>';

			// If the current page is a static posts page, show its title.
			if ( ( is_home() || is_category() || is_singular( 'post' ) ) && get_option( 'page_for_posts', true ) ) {
				$blog_title = get_the_title( get_option( 'page_for_posts', true ) );
				$blog_link = get_the_permalink( get_option( 'page_for_posts', true ) );

				echo '<li><a href="' . esc_url( $blog_link ) . '" title="' . esc_attr( $blog_title ) . '" class="trm-anima-link">' . esc_html( $blog_title ) . '</a></li>';
			}

			if ( is_singular( 'post' ) && get_field( 'post_page', 'option' ) ) {
				$blog_title = get_the_title(  get_field( 'post_page', 'option' ) );
				$blog_link = get_the_permalink(  get_field( 'post_page', 'option' ) );

				echo '<li><a href="' . esc_url( $blog_link ) . '" title="' . esc_attr( $blog_title ) . '" class="trm-anima-link">' . esc_html( $blog_title ) . '</a></li>';
			}

			if ( $parent_page_id ) {
				echo '<li><a href="' . esc_url( get_the_permalink( $parent_page_id ) ) . '" class="trm-anima-link">' . esc_html( get_the_title( $parent_page_id ) ) . '</a></li>';
			}

			echo '<li><span>';

			// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
			if ( is_category() || is_single() ){
				$category = get_the_category();

				if( $category ) {
					echo esc_html( $category[0]->cat_name );
				}
			} elseif ( is_post_type_archive( 'portfolio' ) ) {
				echo esc_html__( 'Portfolio', 'trueman' );
			} elseif ( is_archive() || is_single() ){
				if ( is_day() ) {
					printf( __( '%s', 'trueman' ), get_the_date() );
				} elseif ( is_month() ) {
					printf( __( '%s', 'trueman' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'trueman' ) ) );
				} elseif ( is_year() ) {
					printf( __( '%s', 'trueman' ), get_the_date( _x( 'Y', 'yearly archives date format', 'trueman' ) ) );
				} elseif ( is_tag() ) {
					echo get_the_archive_title();
				} else {
					echo esc_html__( 'Archives', 'trueman' );
				}
			}

			// If Portfolio page
			if ( is_singular( 'portfolio' ) ) {
				echo esc_html__( 'Portfolio', 'trueman' );
			}

			// If the current page is a static page, show its title.
			if ( is_search() ) {
				printf( esc_html__( 'Search: %s', 'trueman' ), '<span>' . get_search_query() . '</span>' );
			}

			// If the current page is a 404 page, show its title.
			if ( is_404() ) {
				echo esc_html__( 'Not Found', 'trueman' );
			}

			// If the current page is a static page, show its title.
			if ( is_page() ) {
				echo esc_html( get_the_title( $page_id ) );
			}

			echo '</span></li>';

			echo '</ul>';
		}
	}
}
