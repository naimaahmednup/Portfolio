<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trueman
 */

?>

<?php

/* post content */
$is_link = get_query_var( 'link' );

$image = get_the_post_thumbnail_url( get_the_ID(), 'trueman_800x800' );
$title = get_the_title();
$info = get_field( 'short_description' );
$video = get_field( 'video_link_popup' );
$href = get_the_permalink();

$theme_lightbox = get_field( 'portfolio_lightbox_disable', 'option' );

?>

<!-- portfolio item -->
<a<?php if ( $is_link == true ) : ?> href="<?php echo esc_url( $href ); ?>"<?php else : ?><?php if ( ! $theme_lightbox ) : ?> data-magnific-gallery<?php endif; ?> data-no-swup data-elementor-lightbox-slideshow="gallery" data-elementor-lightbox-title="<?php echo esc_attr( $title ); ?>" href="<?php echo esc_url( $image ); ?><?php endif; ?>" class="trm-portfolio-item trm-scroll-animation" data-scroll data-scroll-offset="40" data-cat="card">
  <?php if ( $image ) : ?>
  <div class="trm-cover-frame">
    <img class="trm-cover" src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $title ); ?>" />
  </div>
  <?php endif; ?>
  <div class="trm-item-description">
    <?php if ( $title ) : ?>
    <h6><?php echo esc_html( $title ); ?></h6>
    <?php endif; ?>
    <div class="trm-zoom-icon">
			<?php if ( $is_link == true ) : ?>
			<i class="fas fa-chevron-right"></i>
			<?php else : ?>
      <i class="fas fa-search-plus"></i>
			<?php endif; ?>
    </div>
  </div>
</a>
<!-- portfolio item end -->
