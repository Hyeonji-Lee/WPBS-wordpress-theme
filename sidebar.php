<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WPBS
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<!--<div class="col-md-3 wpbs-sidebar" data-spy="affix" data-offset-top="700" data-offset-bottom="300">-->
<div class="col-md-3 wpbs-sidebar">
	<aside id="secondary" class="widget-area" role="complementary">
		<?php
			ob_start();
			dynamic_sidebar( 'sidebar-1' );
			$sidebar_output = ob_get_clean();
			$ul_class = 'list-group';
			$li_class = 'list-group-item';
			$tables_class='table';
			echo apply_filters( 'widget_output', $sidebar_output, $ul_class, $li_class, $tables_class );
		?>
	</aside><!-- #secondary -->
</div>