<?php
/**
 * Template part for displaying posts list
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trueman
 */

?>

<!-- blog -->
<div class="row">
	<?php if ( have_posts() ) : ?>
	<?php
	/* Start the Loop */
	while ( have_posts() ) : the_post(); ?>
	<!-- col -->
	<div class="col-lg-12">
		<?php
		/*
		 * Include the Post-Type-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
		 */
		get_template_part( 'template-parts/content' );
		?>
	</div>
	<!-- col end -->
	<?php endwhile; ?>
	<?php else : ?>
	<div class="col-lg-12">
		 <?php get_template_part( 'template-parts/content', 'none' ); ?>
	</div>
	<?php endif; ?>

	<?php if ( get_the_posts_pagination() ) : ?>
	<div class="col-lg-12">
		<div class="trm-divider trm-mb-40"></div>

		<!-- pagination -->
		<div class="trm-pagination">
			<?php
				echo paginate_links( array(
					'prev_text'		=> esc_html__( 'Prev', 'trueman' ),
					'next_text'		=> esc_html__( 'Next', 'trueman' ),
				) );
			?>
		</div>
	</div>
	<!-- pagination end -->
	<?php endif; ?>
</div>
<!-- blog end -->
