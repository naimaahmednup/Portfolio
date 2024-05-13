<?php

$vcard_image = get_field( 'vcard_image', 'option' );
$vcard_name = get_field( 'vcard_name', 'option' );
$vcard_available = get_field( 'vcard_available', 'option' );
$vcard_live = get_field( 'vcard_live', 'option' );
$vcard_typed = get_field( 'vcard_typed', 'option' );
$vcard_typed_start = get_field( 'vcard_typed_start', 'option' );
$vcard_typed_list = get_field( 'vcard_typed_list', 'option' );
$vcard_info = get_field( 'vcard_info', 'option' );
$vcard_buttons = get_field( 'vcard_buttons', 'option' );
$social_links = get_field( 'social_links', 'option' );

?>

<!-- main card -->
<div class="<?php if ( $vcard_name ) : ?>trm-main-card-frame <?php else : ?> trm-main-card-frame trm-sidebar--default<?php endif; ?>trm-sidebar">
  <?php if ( $vcard_name ) : ?>
  <div class="trm-main-card" data-scroll data-scroll-repeat data-scroll-sticky data-scroll-target="#content" data-scroll-offset="60">
    <div class="trm-main-card-inner">
    <!-- card header -->
    <div class="trm-mc-header">
      <div class="trm-avatar-frame trm-mb-20">
        <img class="trm-avatar" src="<?php echo esc_url( $vcard_image ); ?>" alt="<?php echo esc_attr( $vcard_name ); ?>">
        <?php if ( $vcard_available ) : ?>
        <div class="trm-dot" data-text="<?php echo esc_attr( $vcard_live ); ?>"></div>
        <?php endif; ?>
      </div>
      <h5 class="trm-name trm-mb-15"><?php echo esc_html( $vcard_name ); ?></h5>
      <?php if ( $vcard_typed ) : ?>
      <div class="trm-label">
        <?php echo esc_html( $vcard_typed_start ); ?>
        <?php if ( $vcard_typed_list ) : ?>
        <?php
          $typed_data = [];
          foreach ( $vcard_typed_list as $item ) :
           $typed_data[] = $item['text'];
          endforeach;
          $typed_data_str = implode( '|', $typed_data );
        ?>
        <span class="trm-typed-text" data-text="<?php echo esc_attr( $typed_data_str ); ?>"></span>
        <?php endif; ?>
      </div>
      <?php endif; ?>
    </div>
    <!-- card header end -->

    <div class="trm-divider trm-mb-40 trm-mt-40"></div>

    <?php if ( $social_links ) : ?>
    <!-- sidebar social -->
    <div class="trm-social">
      <?php foreach ( $social_links as $link ) : ?>
      <a href="<?php echo esc_url( $link['url'] ); ?>" target="_blank" title="<?php echo esc_attr( $link['title'] ); ?>">
        <?php echo wp_kses_post( $link['icon'] ); ?>
      </a>
      <?php endforeach; ?>
    </div>
    <!-- sidebar social end -->

    <div class="trm-divider trm-mb-40 trm-mt-40"></div>
    <?php endif; ?>

    <?php if ( $vcard_info ) : ?>
    <!-- info -->
    <ul class="trm-table trm-mb-20">
      <?php foreach ( $vcard_info as $item ) : ?>
      <li>
        <div class="trm-label"><?php echo esc_html( $item['label'] ); ?></div>
        <div class="trm-label trm-label-light"><?php echo esc_html( $item['value'] ); ?></div>
      </li>
      <?php endforeach; ?>
    </ul>
    <!-- info end -->


    <div class="trm-divider trm-mb-40 trm-mt-40"></div>
    <?php endif; ?>

    <?php if ( $vcard_buttons ) : ?>
    <!-- action button -->
    <div class="text-center">
      <?php foreach ( $vcard_buttons as $button ) : ?>
      <a href="<?php echo esc_url( $button['url'] ); ?>" class="trm-btn"<?php if ( $button['attributes']['download'] ) : ?> download<?php endif; ?><?php if ( $button['attributes']['new_window'] ) : ?> target="_blank"<?php endif; ?>><?php echo esc_html( $button['label'] ); ?> <i class="<?php echo esc_attr( $button['icon'] ); ?>"></i></a>
      <?php endforeach; ?>
    </div>
    <!-- action button end -->
    <?php endif; ?>
    </div>
  </div>
  <?php else : ?>
    <div class="trm-main-card">
      <div class="trm-main-card-inner">
      <?php get_sidebar(); ?>
      </div>
    </div>
  <?php endif; ?>
</div>
<!-- main card end -->
