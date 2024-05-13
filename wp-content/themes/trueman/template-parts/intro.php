<?php

$title = get_field( 'intro_title' );
$subtitle = get_field( 'intro_subtitle' );
$media_type = get_field( 'intro_media_type' );
$image = get_field( 'intro_image' );
$images = get_field( 'intro_images' );
$video = get_field( 'intro_video' );
$button_type = get_field( 'intro_button_type' );
$button = get_field( 'intro_button' );

$hide_vcard_panel = get_field( 'hide_vcard_panel' );

$image_url = wp_get_attachment_image_url( $image, 'trueman_1920xAuto' );

if ( is_singular( 'post' ) || is_page() ) {
  if ( ! $title ) {
    $title = get_the_title();
  }
  if ( ! $subtitle && get_post_type() == 'post' ) {
    $subtitle = esc_html__( 'Newsletter', 'trueman' );
  }
  if ( ! $media_type ) {
    $media_type = 'image';
  }
  if ( ! $image_url ) {
    $image_url = get_the_post_thumbnail_url( get_the_ID(), 'trueman_1920xAuto' );
  }
  if ( ! $button_type ) {
    $button_type = 'breadcrumbs';
  }
}

?>

<?php if ( $title ) : ?>
<!-- banner -->
<div class="trm-banner" data-scroll data-scroll-direction="vertical" data-scroll-speed="-1">
  <?php if ( $media_type == 'image' ) : ?>
  <?php if ( $image_url ) : ?>
  <!-- banner cover -->
  <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $subtitle ); ?>" class="trm-banner-cover" data-scroll data-scroll-direction="vertical" data-scroll-speed="-4">
  <!-- banner cover end -->
  <?php endif; ?>
  <?php endif; ?>

  <?php if ( $media_type == 'video' ) : ?>
  <?php if ( $video ) : ?>
  <!-- banner video cover -->
  <video autoplay="autoplay" loop muted playsinline class="trm-banner-cover" data-scroll data-scroll-direction="vertical" data-scroll-speed="-4">
    <source src="<?php echo esc_url( $video ); ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
  </video>
  <!-- banner video cover end -->
  <?php endif; ?>
  <?php endif; ?>

  <?php if ( $media_type == 'slideshow' ) : ?>
  <?php if ( $images ) : ?>
  <!-- banner slideshow cover -->
  <div class="swiper-container trm-slideshow" data-scroll data-scroll-direction="vertical" data-scroll-speed="-4">
    <div class="swiper-wrapper">
      <?php foreach ( $images as $slide ) : $slide_url = wp_get_attachment_image_url( $slide['image'], 'trueman_1920xAuto' ); ?>
      <div class="swiper-slide">
        <img src="<?php echo esc_url( $slide_url ); ?>" alt="<?php echo esc_attr( $subtitle ); ?>" class="trm-banner-cover" data-swiper-parallax-y="-100" data-swiper-parallax-scale="1.2">
      </div>
      <?php endforeach; ?>
    </div>
  </div>
  <!-- banner slideshow cover end -->
  <?php endif; ?>
  <?php endif; ?>

  <!-- banner content -->
  <div class="trm-banner-content trm-overlay">

    <div class="container" data-scroll data-scroll-direction="vertical" data-scroll-speed="1">
      <div class="row">
        <?php if ( ! $hide_vcard_panel ) : ?>
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
        <?php else : ?>
        <div class="col-lg-12">
        <?php endif; ?>

          <!-- banner title -->
          <div class="trm-banner-text<?php if ( $hide_vcard_panel ) : ?> trm-text-center<?php endif; ?>">
            <?php if ( $subtitle ) : ?>
            <div class="trm-label trm-mb-20"><?php echo wp_kses_post( $subtitle ); ?></div>
            <?php endif; ?>
            <?php if ( $title ) : ?>
            <h1 class="trm-mb-30"><?php echo wp_kses_post( $title ); ?></h1>
            <?php endif; ?>
            <?php if ( $button_type == 'button' ) : ?>
            <a<?php if ( $button['popup'] ) : ?> data-magnific-video<?php endif; ?> href="<?php echo esc_url( $button['url'] ); ?>" class="trm-btn trm-btn-border"><?php echo esc_html( $button['label'] ); ?> <i class="<?php echo esc_attr( $button['icon'] ); ?>"></i></a>
            <?php endif; ?>
            <?php if ( $button_type == 'breadcrumb' ) : trueman_breadcrumbs( get_the_ID() ); endif; ?>
          </div>
          <!-- banner title end -->

          <?php if ( ! $hide_vcard_panel ) : ?>
          <!-- scroll hint -->
          <a href="#about-triger" data-scroll-to="#about-triger" data-scroll-offset="-130" class="trm-scroll-hint-frame">
            <div class="trm-scroll-hint"></div>
            <span class="trm-label"><?php echo esc_html__( 'Scroll down', 'trueman' ); ?></span>
          </a>
          <!-- scroll hint end -->
          <?php endif; ?>

        </div>
      </div>
    </div>

  </div>
  <!-- banner content end -->

</div>
<!-- banner end -->
<?php else : ?>
<?php
  $breadcrumbs = true;

  if ( is_archive() ) :
    $title = get_the_archive_title();
    $subtitle = esc_html__( 'Latest Posts', 'trueman' );
  endif;
  if ( is_home() ) :
    $title = esc_html__( 'Latest Posts', 'trueman' );
    $subtitle = get_bloginfo( 'description' );
    $breadcrumbs = false;
  endif;
  if ( is_search() ) {
    $title = esc_html__( 'Search: ', 'trueman' ) . esc_html( get_search_query() );
    $subtitle = esc_html__( 'Results', 'trueman' );
  }
  if ( is_404() ) {
    $title = esc_html__( '404', 'trueman' );
    $subtitle = get_field( 'p404_title', 'option' );
    if ( ! $subtitle ) {
    	$subtitle = esc_html__( 'Page not found...', 'trueman' );
    }
  }

  $image = get_field( 'blog_intro_image', 'option' );
  $image_url = wp_get_attachment_image_url( $image, 'trueman_1920xAuto' );

  if ( $title ) :
?>
  <!-- banner -->
  <div class="trm-banner" data-scroll data-scroll-direction="vertical" data-scroll-speed="-1">
    <?php if ( $image ) : ?>
    <?php if ( $image_url ) : ?>
    <!-- banner cover -->
    <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $subtitle ); ?>" class="trm-banner-cover" data-scroll data-scroll-direction="vertical" data-scroll-speed="-4">
    <!-- banner cover end -->
    <?php endif; ?>
    <?php endif; ?>

  	<!-- banner content -->
  	<div class="trm-banner-content trm-overlay">

  		<div class="container" data-scroll data-scroll-direction="vertical" data-scroll-speed="1">
  			<div class="row">
  				<div class="col-lg-4"></div>
  				<div class="col-lg-8">

  					<!-- banner title -->
  					<div class="trm-banner-text">
  						<?php if ( $subtitle ) : ?>
  						<div class="trm-label trm-mb-20"><?php echo wp_kses_post( $subtitle ); ?></div>
  						<?php endif; ?>
  						<h1 class="trm-mb-30"><?php echo wp_kses_post( $title ); ?></h1>
  						<?php if ( $breadcrumbs ) : trueman_breadcrumbs( get_the_ID() ); endif; ?>
  					</div>
  					<!-- banner title end -->

  					<!-- scroll hint -->
  					<a href="#about-triger" data-scroll-to="#about-triger" data-scroll-offset="-130" class="trm-scroll-hint-frame">
  						<div class="trm-scroll-hint"></div>
  						<span class="trm-label"><?php echo esc_html__( 'Scroll down', 'trueman' ); ?></span>
  					</a>
  					<!-- scroll hint end -->

  				</div>
  			</div>
  		</div>

  	</div>
  	<!-- banner content end -->

  </div>
  <!-- banner end -->
<?php endif; endif; ?>
