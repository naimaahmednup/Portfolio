<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trueman
 */

get_header();
?>

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="trm-card trm-publication">
			<?php get_template_part( 'template-parts/content', 'page' ); ?>
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
