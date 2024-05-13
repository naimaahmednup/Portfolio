<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trueman
 */

?>

<?php

$footer_text = get_field( 'footer_text', 'option' );
if ( ! $footer_text ) {
  $footer_text = __( '© 2022 All Rights Reserved.', 'trueman' );
}
$footer_text2 = get_field( 'footer_text2', 'option' );
$theme_ui = get_field( 'theme_ui', 'option' );

?>
                    <div class="trm-divider trm-mb-40"></div>

                    <!-- footer -->
                    <footer class="trm-footer trm-scroll-animation" data-scroll data-scroll-offset="50">
                      <div class="trm-label"><?php echo wp_kses_post( $footer_text ); ?></div>
                      <?php if ( $footer_text2 ) : ?>
                      <div class="trm-label">
                        <?php echo wp_kses_post( $footer_text2 ); ?>
                      </div>
                      <?php endif; ?>
                    </footer>
                    <!-- footer end -->

                  </div>
                  <!-- content end -->

                  <?php
                  $popup_title = get_field( 'popup_title', 'option' );
                  $popup_image = get_field( 'popup_image', 'option' );
                  $popup_form = get_field( 'popup_form', 'option' );
                  $popup_image_url = wp_get_attachment_image_url( $popup_image, 'trueman_1920xAuto' );
                  if ( $popup_title ) : ?>
                  <!-- popup -->
                  <div id="trm-order" class="trm-order mfp-hide">
                    <div class="trm-popup-content">
                      <?php if ( $popup_image_url ) : ?>
                      <img src="<?php echo esc_url( $popup_image_url ); ?>" alt="<?php echo esc_attr( $popup_title ); ?>" />
                      <?php endif; ?>

                      <div class="trm-popup-form-frame">
                        <h5 class="trm-mb-40"><?php echo esc_html( $popup_title ); ?></h5>
                        <?php if ( $popup_form ) : echo do_shortcode( $popup_form ); endif; ?>
                      </div>

                    </div>
                  </div>
                  <!-- popup end -->
                  <?php endif; ?>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
    <!-- scroll container end -->

    <!-- mode switcher -->
    <div class="trm-hidden-switcher">
      <div class="trm-mode-switcher">
        <i class="far fa-sun"></i>
        <input class="tgl tgl-light" id="trm-swich" type="checkbox"<?php if ( ! $theme_ui ) : ?> checked<?php endif; ?>>
        <label class="trm-swich" for="trm-swich"></label>
        <i class="far fa-moon"></i>
      </div>
    </div>
    <!-- mode switcher end -->

  </div>
  <!-- app wrapper end -->

<?php wp_footer(); ?>

</body>
</html>
