<?php // template used for the main page
	get_header(); ?>
<?php global $newsframe_options; $newsframe_settings = get_option( 'newsframe_options', $newsframe_options ); ?>
<div class="container">
<div class="col-lg-8">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
	
<div class="news">
	<h2 class="index-title">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
			<?php the_title(); ?>
		</a>
	</h2>
	<p class="postinfo">
		<i class="icon-tags"></i>分类: <?php the_category(', '); ?>
		<span class="spacer"></span><i class="icon-user"></i>&nbsp;&nbsp;作者: <?php the_author_posts_link(); ?>
		<span class="spacer"></span><i class="icon-calendar"></i>&nbsp;&nbsp;发布时间: <?php the_time ('Y-m-d'); ?>
	</p>
	<?php $newsframevideopromote = get_post_meta ($post->ID, 'newsframe_video', true);
	if (empty ($newsframevideopromote)) { ?>
		<div class="col-lg-12">
	<?php if ( has_post_thumbnail() ) {
		$img_id = get_post_thumbnail_id($post->ID); // This gets just the ID of the img
		the_post_thumbnail('large');
		$alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
		}
		?>
		</div><!--end latest image Section-->
	<?php } ?>	
		<div class="col-lg-12">
		<?php the_excerpt(); ?>
		</div><!-- .latest-content -->

</div>
<div style="clear:both"></div>
	<?php endwhile; ?>
	<?php endif; ?></div>
<?php get_sidebar(); ?>
</div>
<section id="post-nav">
	<?php posts_nav_link(' ', '<i class="icon-arrow-left"></i>', '<i class="icon-arrow-right"></i>'); ?>
</section><!--End Navigation-->

<?php get_footer(); ?>