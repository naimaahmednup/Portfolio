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

$blog_categories = get_field( 'blog_categories', 'option' );
$blog_excerpt = get_field( 'blog_excerpt', 'option' );
$excerpt_text = get_the_excerpt();

?>

<!-- blog card -->
<div class="trm-blog-card trm-scroll-animation" data-scroll data-scroll-offset="40">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	  <?php trueman_post_thumbnail( 'blog' ); ?>

	  <div class="trm-card-descr">
	  	<?php if ( 'post' === get_post_type() ) : ?>
			<?php if ( $blog_categories ) : ?>
			<div class="trm-label trm-category trm-mb-20">
	   	<?php
				$categories_list = get_the_category();
				if ( $categories_list ) :
					$total = count( $categories_list );
					$i = 0;
					foreach ( $categories_list as $category ) { $i++;
						if ( $total != $i ) {
							echo '<span class="trm-el-category">';
							echo esc_html( $category->cat_name );
							echo '</span>';
							echo esc_html__( ', ', 'trueman' );
						} else {
							echo '<span class="trm-el-category">';
							echo esc_html( $category->cat_name );
							echo '</span>';
						}
					}
				endif;
			?>
	    </div>
			<?php endif; ?>
	    <?php endif; ?>
	    <h5 class="trm-mb-20"><a href="<?php echo esc_url( get_permalink() ); ?>" class="trm-anima-link"><?php the_title(); ?></a></h5>
	    <?php if ( ! $blog_excerpt && $excerpt_text ) : ?>
	    <!-- text -->
	    <div class="trm-el-description">
	    	<?php the_excerpt(); ?>
	    </div>
	    <?php endif; ?>
	    <div class="trm-divider trm-mb-20 trm-mt-20"></div>
	    <?php if ( 'post' === get_post_type() ) : ?>
	    <ul class="trm-card-data trm-label">
	      <li><?php echo esc_html( get_the_date() ); ?></li>
	      <li><?php echo esc_html( get_the_author() ); ?></li>
	    </ul>
	    <?php endif; ?>
	  </div>
	</div>
</div>
<!-- blog card end -->
