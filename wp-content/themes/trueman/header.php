<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trueman
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Meta Data -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php $preloader_hide = get_field( 'hide_preloader', 'options' ); ?>
  <?php $theme_ui = get_field( 'theme_ui', 'options' ); ?>

  <!-- app wrapper -->
  <div class="trm-app-frame<?php if ( $theme_ui == 1 ) : ?> trm-app-frame-light<?php endif; ?>">

		<?php if ( $preloader_hide != 1 ) : ?>
    <!-- page preloader -->
    <div class="trm-preloader">
      <div class="trm-holder">
        <div class="preloader">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
    </div>
    <!-- page preloader end -->
		<?php endif; ?>

    <!-- change mode preloader -->
    <div class="trm-mode-swich-animation-frame">
      <div class="trm-mode-swich-animation trm-active">
        <i class="far fa-sun"></i>
        <div class="trm-horizon"></div>
        <i class="far fa-moon"></i>
      </div>
    </div>
    <!-- change mode preloader end -->

    <!-- scroll container -->
    <div id="trm-dynamic-content" class="trm-swup-animation">
      <div id="trm-scroll-container" class="trm-scroll-container" data-scroll-container>
        <div id="content" class="trm-scroll-section" data-scroll-section>

					<?php
					$logo_type = get_field( 'header_logo_type', 'option' );
					$logo_image = get_field( 'header_logo_image', 'option' );
					$logo_text = get_field( 'header_logo_text', 'option' );
					$logo_text_h = get_field( 'header_logo_text_h', 'option' );

					$ui_switch = get_field( 'header_ui_switch', 'option' );
					$button = get_field( 'header_button', 'option' );

					$hide_vcard_panel = get_field( 'hide_vcard_panel' );

					?>

          <!-- top bar -->
          <div class="trm-top-bar" data-scroll data-scroll-sticky data-scroll-target="#content" data-scroll-offset="-10">
            <div class="container">
              <div class="trm-left-side">
                <!-- logo -->
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( bloginfo('name') ); ?>" class="trm-logo-frame trm-anima-link">
									<?php if ( $logo_type == 'text' ) : ?>
									<span class="trm-logo-text">
										<?php echo esc_html( $logo_text ); ?><span><?php echo esc_html( $logo_text_h ); ?></span>
									</span>
									<?php elseif ( $logo_type == 'image' ) : ?>
	                <img src="<?php echo esc_url( $logo_image ); ?>" alt="<?php echo esc_attr( bloginfo('name') ); ?>" />
									<?php else : ?>
									<span class="trm-logo-text trm-logo-text--default">
										<?php echo esc_html( bloginfo('name') ); ?>
									</span>
									<?php endif; ?>
                </a>
                <!-- logo end -->
              </div>
              <div class="trm-right-side">

                <!-- menu -->
                <div class="trm-menu">
									<?php
	                if ( has_nav_menu( 'primary' ) ) :
	                  wp_nav_menu( array(
	                    'theme_location' => 'primary',
	                    'container' => 'nav',
	                    'menu_class' => 'main-menu',
	                    'walker' => new Trueman_Topmenu_Walker(),
	                  ) );
	                endif;
	                ?>
                </div>
                <!-- menu end -->

								<?php if ( $ui_switch ) : $theme_ui = get_field( 'theme_ui', 'option' ); if ( $theme_ui ) : $theme_ui = 'light'; else : $theme_ui = 'dark'; endif; ?>
                <!-- mode switcher place -->
                <div class="trm-mode-switcher-place" data-ui="<?php echo esc_attr( $theme_ui ); ?>"  data-ui-dir="<?php echo esc_attr( get_template_directory_uri() ); ?>"></div>
                <!-- mode switcher place end -->
								<?php endif; ?>

								<?php if ( $button ) : ?>
								<?php if ( $button['show'] == 1 ) : ?>
                <!-- action button -->
                <a href="<?php echo esc_url( $button['url'] ); ?>"<?php if ( $button['download'] == 1 ) : ?> download<?php endif; ?> class="trm-btn trm-btn-sm">
									<?php echo esc_html( $button['text'] ); ?>
									<i class="fas fa-arrow-down"></i>
								</a>
                <!-- action button end -->
							  <?php endif; ?>
								<?php endif; ?>
              </div>
              <div class="trm-menu-btn"><span></span></div>
            </div>
          </div>
          <!-- top bar end -->

          <div class="trm-content-start">
            <?php get_template_part( 'template-parts/intro' ); ?>

            <div class="container">
              <div class="row">
								<?php if ( ! $hide_vcard_panel ) : ?>
                <div class="col-lg-4">
                  <?php get_template_part( 'template-parts/vcard' ); ?>
                </div>
                <div class="col-lg-8">
								<?php else : ?>
								<div class="col-lg-12">
								<?php endif; ?>
                  <!-- content -->
                  <div class="trm-content" id="trm-content">

                    <div data-scroll data-scroll-repeat data-scroll-offset="500" id="about-triger"></div>
