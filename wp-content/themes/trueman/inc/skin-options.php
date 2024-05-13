<?php
/**
 * Skin
**/
function trueman_skin() {
	$theme_ui = get_field( 'theme_ui', 'options' );
	$theme_color = get_field( 'theme_color', 'options' );

	$bg_color = get_field( 'bg_color', 'options' );
	$card_color = get_field( 'card_color', 'options' );
	$heading_color = get_field( 'heading_color', 'options' );
	$text_color = get_field( 'text_color', 'options' );
	$menu_font_color = get_field( 'menu_font_color', 'options' );

	$bg_color_light = get_field( 'bg_color_light', 'options' );
	$card_color_light = get_field( 'card_color_light', 'options' );
	$heading_color_light = get_field( 'heading_light_color', 'options' );
	$text_color_light = get_field( 'text_light_color', 'options' );
	$menu_font_color_light = get_field( 'menu_font_light_color', 'options' );

	$heading_font_family = get_field( 'heading_font_family', 'options' );
	$text_font_family = get_field( 'text_font_family', 'options' );
	$menu_font_family = get_field( 'menu_font_family', 'options' );

	$heading_font_size = get_field( 'heading_font_size', 'options' );
	$text_font_size = get_field( 'text_font_size', 'options' );
	$menu_font_size = get_field( 'menu_font_size', 'options' );

?>

<style>

	<?php if ( $bg_color ) : ?>
	/* Bg Color */
	.trm-app-frame {
		background-color: <?php echo esc_attr( $bg_color ); ?>;
	}
	@media (max-width: 992px) {
		body {
			background-color: <?php echo esc_attr( $bg_color ); ?>;
		}
	}
	<?php endif; ?>

	<?php if ( $bg_color_light ) : ?>
	/* Bg Color Light */
	body.ui-light .trm-app-frame {
		background-color: <?php echo esc_attr( $bg_color_light ); ?>;
	}
	@media (max-width: 992px) {
		body.ui-light {
			background-color: <?php echo esc_attr( $bg_color_light ); ?>;
		}
	}
	<?php endif; ?>

	<?php if ( $card_color ) : ?>
	/* Cards Color */
	.trm-top-bar,
	.trm-top-bar:after,
	.trm-card,
	.form-comment,
	.comments>.post-comment,
	.art-pagination,
	.trm-main-card-frame .trm-main-card,
	.trm-main-card-frame .trm-main-card:before,
	.trm-counter-up,
	.trm-counter-up:before,
	.trm-service-icon-box,
	.trm-skill-card,
	.trm-portfolio-item .trm-item-description,
	.trm-price,
	.trm-testimonial-card,
	.trm-timeline::before,
	.trm-timeline .trm-timeline-item .trm-timeline-mark,
	.trm-timeline .trm-timeline-content,
	.trm-timeline .trm-timeline-content:after,
	.trm-contact-card,
	.trm-blog-categories,
	.trm-blog-categories:before,
	.trm-blog-card,
	.trm-older-publications-card,
	.trm-subscribe-card,
	.footer,
	.trm-order,
	.fancybox-thumbs,
	.fancybox-thumbs .fancybox-thumbs__list,
	blockquote,
	.trm-footer {
		background-color: <?php echo esc_attr( $card_color ); ?>;
	}
	@media (max-width: 1200px) {
		.trm-top-bar .container .trm-right-side {
			background-color: <?php echo esc_attr( $card_color ); ?>;
		}
	}
	<?php endif; ?>

	<?php if ( $card_color_light ) : ?>
	/* Cards Color Light */
	body.ui-light .trm-top-bar,
	body.ui-light .trm-top-bar:after,
	body.ui-light .trm-card,
	body.ui-light .form-comment,
	body.ui-light .comments>.post-comment,
	body.ui-light .art-pagination,
	body.ui-light .trm-main-card-frame .trm-main-card,
	body.ui-light .trm-main-card-frame .trm-main-card:before,
	body.ui-light .trm-counter-up,
	body.ui-light .trm-counter-up:before,
	body.ui-light .trm-service-icon-box,
	body.ui-light .trm-skill-card,
	body.ui-light .trm-portfolio-item .trm-item-description,
	body.ui-light .trm-price,
	body.ui-light .trm-testimonial-card,
	body.ui-light .trm-timeline::before,
	body.ui-light .trm-timeline .trm-timeline-item .trm-timeline-mark,
	body.ui-light .trm-timeline .trm-timeline-content,
	body.ui-light .trm-timeline .trm-timeline-content:after,
	body.ui-light .trm-contact-card,
	body.ui-light .trm-blog-categories,
	body.ui-light .trm-blog-categories:before,
	body.ui-light .trm-blog-card,
	body.ui-light .trm-older-publications-card,
	body.ui-light .trm-subscribe-card,
	body.ui-light .footer,
	body.ui-light .trm-order,
	body.ui-light .fancybox-thumbs,
	body.ui-light .fancybox-thumbs .fancybox-thumbs__list,
	body.ui-light blockquote,
  body.ui-light .trm-footer {
		background-color: <?php echo esc_attr( $card_color_light ); ?>;
	}
	@media (max-width: 1200px) {
		body.ui-light .trm-top-bar .container .trm-right-side {
			background-color: <?php echo esc_attr( $card_color_light ); ?>;
		}
	}
	<?php endif; ?>

	<?php if ( $heading_color ) : ?>
	/* Heading Color */
	.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6,
	.title.comment-reply-title, .post-comments .title,
	.title.comment-reply-title, .post-comments .title,
	.post-comments .post-comment .desc .name {
		color: <?php echo esc_attr( $heading_color ); ?>;
	}
	<?php endif; ?>

	<?php if ( $heading_color_light ) : ?>
	/* Heading Color Light */
	body.ui-light .h1,
	body.ui-light .h2,
	body.ui-light .h3,
	body.ui-light .h4,
	body.ui-light .h5,
	body.ui-light .h6,
	body.ui-light h1,
	body.ui-light h2,
	body.ui-light h3,
	body.ui-light h4,
	body.ui-light h5,
	body.ui-light h6,
	body.ui-light .title.comment-reply-title,
	body.ui-light .post-comments .title,
	body.ui-light .title.comment-reply-title,
	body.ui-light .post-comments .title,
	body.ui-light .post-comments .post-comment .desc .name {
		color: <?php echo esc_attr( $heading_color_light ); ?>;
	}
	<?php endif; ?>

	<?php if ( $heading_font_family ) : ?>
	/* Heading Font Family */
	.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6, .title.comment-reply-title, .post-comments .title {
		font-family: '<?php echo esc_attr( $heading_font_family['font_name'] ); ?>';
	}
	<?php endif; ?>

	<?php if ( $heading_font_size ) : ?>
	/* Heading Font Size */
	h1, .trm-banner .trm-banner-content .trm-banner-text h1 {
		font-size: <?php echo esc_attr( $heading_font_size ); ?>px;
	}
	<?php endif; ?>

	<?php if ( $text_color ) : ?>
	/* Text Color */
	body,
	.trm-label.trm-label-light,
	.trm-title-with-divider span[data-number]:after,
	.trm-price .trm-price-number sup,
	.footer .trm-label,
	.content-sidebar table caption,
	.single-post-text table th,
	.single-post-text table td,
	.single-post-text table caption,
	.single-post-text ul>li a,
	.single-post-text ol>li a,
	.comment-text ul>li a,
	.comment-text ol>li a,
	.wp-block-categories-list li a,
	.wp-block-archives-list li a,
	.widget.widget_nav_menu ul li a,
	.widget.widget_pages ul li a,
	.widget_categories ul li a,
	.post-comments .post-comment .desc .name,
	.post-comments .post-comment .desc .name a,
	.social-share a:hover,
	.social-share a:hover .icon,
	.rssSummary,
	.content-sidebar .search-form input[type=text],
	.content-sidebar .search-form input[type=email],
	.content-sidebar .search-form input[type=password],
	.content-sidebar .search-form input[type=datetime],
	.content-sidebar .search-form input[type=date],
	.content-sidebar .search-form input[type=month],
	.content-sidebar .search-form input[type=time],
	.content-sidebar .search-form input[type=week],
	.content-sidebar .search-form input[type=search],
	.content-sidebar .search-form textarea,
	.content-sidebar .search-form textarea.form-control,
	.wp-block-search input[type=text],
	.wp-block-search input[type=email],
	.wp-block-search input[type=password],
	.wp-block-search input[type=datetime],
	.wp-block-search input[type=date],
	.wp-block-search input[type=month],
	.wp-block-search input[type=time],
	.wp-block-search input[type=week],
	.wp-block-search input[type=search],
	.wp-block-search textarea,
	.wp-block-search textarea.form-control,
	.content-sidebar .widget-title,
	.content-sidebar a,
	.wp-block-cover p a,
	.wp-block-cover-image p a,
	blockquote cite,
	.wp-block-pullquote.is-style-solid-color,
	.wp-block-pullquote.is-style-solid-color p,
	.wp-block-pullquote.is-style-solid-color blockquote,
	.post .single-post-text,
	.content-box,
	.post-comments,
	.wp-calendar-nav span.wp-calendar-nav-prev,
	.wp-calendar-nav span.wp-calendar-nav-next,
	.wpcf7 form.invalid .wpcf7-response-output,
	.wpcf7 form.unaccepted .wpcf7-response-output,
	.wpcf7 form.sent .wpcf7-response-output,
	.started-lnk p a {
		color: <?php echo esc_attr( $text_color ); ?>;
	}
	<?php endif; ?>

	<?php if ( $text_color_light ) : ?>
	/* Text Color Light */
	body.ui-light,
	body.ui-light .trm-label.trm-label-light,
	body.ui-light .trm-title-with-divider span[data-number]:after,
	body.ui-light .trm-price .trm-price-number sup,
	body.ui-light .footer .trm-label,
	body.ui-light .content-sidebar table caption,
	body.ui-light .single-post-text table th,
	body.ui-light .single-post-text table td,
	body.ui-light .single-post-text table caption,
	body.ui-light .single-post-text ul>li a,
	body.ui-light .single-post-text ol>li a,
	body.ui-light .comment-text ul>li a,
	body.ui-light .comment-text ol>li a,
	body.ui-light .wp-block-categories-list li a,
	body.ui-light .wp-block-archives-list li a,
	body.ui-light .widget.widget_nav_menu ul li a,
	body.ui-light .widget.widget_pages ul li a,
	body.ui-light .widget_categories ul li a,
	body.ui-light .post-comments .post-comment .desc .name,
	body.ui-light .post-comments .post-comment .desc .name a,
	body.ui-light .social-share a:hover,
	body.ui-light .social-share a:hover .icon,
	body.ui-light .rssSummary,
	body.ui-light .content-sidebar .search-form input[type=text],
	body.ui-light .content-sidebar .search-form input[type=email],
	body.ui-light .content-sidebar .search-form input[type=password],
	body.ui-light .content-sidebar .search-form input[type=datetime],
	body.ui-light .content-sidebar .search-form input[type=date],
	body.ui-light .content-sidebar .search-form input[type=month],
	body.ui-light .content-sidebar .search-form input[type=time],
	body.ui-light .content-sidebar .search-form input[type=week],
	body.ui-light .content-sidebar .search-form input[type=search],
	body.ui-light .content-sidebar .search-form textarea,
	body.ui-light .content-sidebar .search-form textarea.form-control,
	body.ui-light .wp-block-search input[type=text],
	body.ui-light .wp-block-search input[type=email],
	body.ui-light .wp-block-search input[type=password],
	body.ui-light .wp-block-search input[type=datetime],
	body.ui-light .wp-block-search input[type=date],
	body.ui-light .wp-block-search input[type=month],
	body.ui-light .wp-block-search input[type=time],
	body.ui-light .wp-block-search input[type=week],
	body.ui-light .wp-block-search input[type=search],
	body.ui-light .wp-block-search textarea,
	body.ui-light .wp-block-search textarea.form-control,
	body.ui-light .content-sidebar .widget-title,
	body.ui-light .content-sidebar a,
	body.ui-light .wp-block-cover p a,
	body.ui-light .wp-block-cover-image p a,
	body.ui-light blockquote cite,
	body.ui-light .wp-block-pullquote.is-style-solid-color,
	body.ui-light .wp-block-pullquote.is-style-solid-color p,
	body.ui-light .wp-block-pullquote.is-style-solid-color blockquote,
	body.ui-light .post .single-post-text,
	body.ui-light .content-box,
	body.ui-light .post-comments,
	body.ui-light .wp-calendar-nav span.wp-calendar-nav-prev,
	body.ui-light .wp-calendar-nav span.wp-calendar-nav-next,
	body.ui-light .wpcf7 form.invalid .wpcf7-response-output,
	body.ui-light .wpcf7 form.unaccepted .wpcf7-response-output,
	body.ui-light .wpcf7 form.sent .wpcf7-response-output,
	body.ui-light .started-lnk p a {
		color: <?php echo esc_attr( $text_color_light ); ?>;
	}
	<?php endif; ?>

	<?php if ( $text_font_family ) : ?>
	/* Text Font Family */
	body {
		font-family: '<?php echo esc_attr( $text_font_family['font_name'] ); ?>';
	}
	<?php endif; ?>

	<?php if ( $text_font_size ) : ?>
	/* Text Font Size */
	body,
	.single-post-text table td,
	.post-comments .post-comment .desc .name,
	.content-sidebar .widget-title,
	.post .single-post-text,
	.content-box,
	.post-comments {
		font-size: <?php echo esc_attr( $text_font_size ); ?>px;
	}
	<?php endif; ?>

	<?php if ( $menu_font_color ) : ?>
	/* Menu Color */
	.trm-menu nav ul li a {
		color: <?php echo esc_attr( $menu_font_color ); ?>;
	}
	<?php endif; ?>

	<?php if ( $menu_font_color_light ) : ?>
	/* Menu Color */
	body.ui-light .trm-menu nav ul li a {
		color: <?php echo esc_attr( $menu_font_color_light ); ?>;
	}
	<?php endif; ?>

	<?php if ( $menu_font_family ) : ?>
	/* Menu Font Family */
	.trm-menu nav ul li a {
		font-family: '<?php echo esc_attr( $menu_font_family['font_name'] ); ?>';
	}
	<?php endif; ?>

	<?php if ( $menu_font_size ) : ?>
	/* Menu Font Size */
	.trm-menu nav ul li a {
		font-size: <?php echo esc_attr( $menu_font_size ); ?>px;
	}
	<?php endif; ?>

	<?php if ( $theme_color ) : ?>
	/* Theme Color */
	.trm-menu nav ul li:after,
	.trm-btn,
	.comment-form .btn.fill,
	form.post-password-form input[type="submit"],
	.trm-mc-header .trm-avatar-frame .trm-dot,
	.trm-mc-header .trm-avatar-frame .trm-dot:after,
	.trm-video .trm-play-button,
	.trm-skill-card .trm-progressbar-frame .trm-progressbar,
	.trm-portfolio-item .trm-item-description .trm-zoom-icon,
	.trm-price.trm-popular:after,
	.trm-blog-categories .trm-number,
	.art-pagination .art-w-chevron,
	.art-pagination .art-left-link,
	.trm-pagination span,
	.art-pagination span,
	.c-scrollbar_thumb,
	.content-sidebar td#today,
	.single-post-text ul>li:before,
	.comment-text ul>li:before,
	.sticky:before,
	.wp-block-button a.wp-block-button__link,
	.trm-filter a.trm-link.trm-current,
	.elementor a.trm-link:hover {
		background-color: <?php echo esc_attr( $theme_color ); ?>;
	}
	.trm-top-bar .container .trm-left-side .trm-logo-frame .trm-logo-text span,
	.trm-menu nav ul li a:hover,
	.trm-accent-color,
	.trm-label.trm-label-color,
	a.trm-label:focus,
	a.trm-label:hover,
	blockquote:before,
	blockquote:after,
	blockquote.trm-color-quote:before,
	blockquote.trm-color-quote:after,
	.logged-in-as a,
	.trm-banner .trm-banner-content .trm-banner-text .trm-breadcrumbs li a:hover,
	.trm-main-card-frame .trm-main-card .trm-social a:hover,
	.trm-counter-up .trm-counter-number .trm-counter-symbol,
	.trm-blog-card .trm-card-descr .trm-category a:hover,
	.trm-older-publications-card .trm-older-publication .trm-op-top:hover .trm-op-title,
	.trm-older-publications-card .trm-older-publication .trm-category a:hover,
	.trm-pagination a:hover,
	.art-pagination a:hover,
	.footer .trm-label a,
	.single-post-text p a,
	.comment-text p a,
	.post-text-bottom span.cat-links a,
	.post-text-bottom .tags-links a,
	.post-text-bottom .tags-links span,
	.content-sidebar .tagcloud a,
	.wp-block-tag-cloud .tag-cloud-link,
	.content-sidebar a:hover,
	.wp-block-button.is-style-outline a.wp-block-button__link,
	.error-page__num,
	.post-text-bottom .author a, a.comment-reply-link {
		color: <?php echo esc_attr( $theme_color ); ?>;
	}
	.trm-mode-switcher-place .trm-mode-switcher .tgl-light+.trm-swich:after,
	.trm-list li:before,
	.trm-btn,
	.comment-form .btn.fill,
	form.post-password-form input[type="submit"],
	.trm-timeline .trm-timeline-item .trm-timeline-mark,
	.post-text-bottom .tags-links a,
	.post-text-bottom .tags-links span,
	.content-sidebar .tagcloud a,
	.wp-block-tag-cloud .tag-cloud-link,
	.wp-block-pullquote blockquote,
	.wp-block-button.is-style-outline a.wp-block-button__link {
		border-color: <?php echo esc_attr( $theme_color ); ?>;
	}
	@media (max-width: 1200px) {
		.trm-menu nav ul li.current-menu-item a {
			color: <?php echo esc_attr( $theme_color ); ?>;
		}
	}
	<?php endif; ?>

</style>

<?php
}
add_action( 'wp_head', 'trueman_skin', 10 );
