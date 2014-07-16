<div class="col-lg-4 col-md-4 col-sm-4 three" id="right">
	<aside id="secondary" class="widget-area" role="complementary">
		<?php do_action( 'before_widget' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?>
	<aside id="archives" class="widget">
	<div class="sidebar-title-block">
		<h4 class="sidebar"><?php _e( 'Archives', 'newsframe' ); ?>
		</h4>
	<ul class="time_list">
	<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
	</ul>
	</div>
	</aside>
<?php endif; // end sidebar widget area ?>
	</aside><!-- #secondary .widget-area -->
</div>
