<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package trueman
 */

get_header();
?>

<?php

$content = get_field( 'p404_content', 'option' );
if ( ! $content ) {
	$content = '<p>' . esc_html__( 'We are unable to find the page you are looking for.', 'trueman' ) . '</p>';
}

?>

<!-- 404 -->
<div class="trm-card trm-publication">
	<?php if ( $content ) : echo wp_kses_post( $content ); endif; ?>
</div>
<!-- /404 -->

<?php
get_footer();
