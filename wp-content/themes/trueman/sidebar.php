<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trueman
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<!-- sidebar -->
<div class="trm-sidebar">
  <!-- sidebar frame -->
  <div class="trm-sidebar-frame">
    <!-- sidebar scroll frame -->
    <div id="scrollbar2" class="trm-sidebar-scroll-frame">
    	<div class="content-sidebar">
				<aside id="secondary" class="widget-area">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</aside>
			</div>
    </div>
  </div>
  <!-- sidebar frame end -->
</div>
<!-- sidebar end -->
