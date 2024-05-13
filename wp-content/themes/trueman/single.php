<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package trueman
 */

get_header();
?>

<?php

$blog_featured_img = get_field( 'blog_featured_img', 'option' );
$theme_lightbox = get_field( 'portfolio_lightbox_disable', 'option' );
$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
}
?>

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="row">
			<div class="col-lg-4">
				<div class="trm-card trm-label trm-label-light text-center">
					<i class="far fa-calendar-alt trm-icon"></i><br>
					<?php the_date(); ?>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="trm-card trm-label trm-label-light text-center">
					<i class="far fa-clock trm-icon"></i><br>
					<?php the_time(); ?>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="trm-card trm-label trm-label-light text-center">
					<i class="far fa-user trm-icon"></i><br>
					<?php the_author(); ?>
				</div>
			</div>
		</div>

		<div class="trm-card trm-publication">
			<?php get_template_part( 'template-parts/content', 'single' ); ?>
		</div>

		<?php if ( comments_open() || get_comments_number() ) : ?>
			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			comments_template();
			?>
    <?php endif; ?>

		<?php trueman_single_navigantion(); ?>

	<?php endwhile; ?>

<?php
get_footer();
