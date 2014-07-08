<?php get_header(); ?>
<?php 
	add_views($post->ID);
?>
	<div class="container">
		<div class="col-lg-8">
			<div class="single-article" role="main">
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<article <?php post_class(); ?>>
				<div class="nav breadcrumbs">
					<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php _e( 'Home', 'newsframe' ); ?></a> &#8250;
						<?php the_category('<span class="category-space"> | </span>'); ?> &#8250; 
						<span itemprop="title"><?php the_title(); ?></span>
					</div>
				</div>
				<h1 id="post-<?php the_ID(); ?>" class="article-title">
				<?php the_title(); ?>
				</h1>
				<h2 class="article-subtitle">
					<?php { $subtitle = get_post_meta
					($post->ID, 'subtitle', $single = true);
					if($subtitle !== '') echo $subtitle;} ?>
				</h2><!-- #article-subtitle -->
				
				<section class="byline">
					所属分类: <?php the_category(', ') ?> &nbsp;&nbsp;
					<span class="postinfo "><?php _e('<i class="icon-user"></i>' , 'newsframe' ); ?>
					<?php the_author_posts_link(); ?></span> 
					<span class="postinfo hideforprint"> &nbsp;&nbsp;<?php the_time('Y-m-d'); ?> 
					</span>
					<span>&nbsp;&nbsp;浏览量：<?php echo the_click($post->ID); ?></span>
				</section><!-- .byline -->
				<br />
<!-- Featured Video -->
<?php $newsframevideometa = get_post_meta ($post->ID, 'newsframe_video', true);
	if ($newsframevideometa != '') {
		?>
			<div class="flex-video">
				<?php echo get_post_meta($post->ID, 'newsframe_video', true); ?>
			</div>
	<?php } ?>
	<section class="post-content">
		<?php the_content(); ?>
		<div style="clear:both;"></div>
	<footer id="post-footer">
		<span class="tag-links">
		<?php the_tags(); ?>
		</span>
	<section class="relatedarticles">
		<?php do_action( 'before_widget' ); ?>
		<?php if ( !dynamic_sidebar( 'belowposts-sidebar' ) ) : ?>
		<?php endif; ?>
	</section>
	</footer>
	</section><!-- #post-content -->
		</article>
<?php endwhile; ?>
	<section id="article-nav" style="margin-top:50px">
		上一篇<?php previous_post_link(); ?> -- <?php next_post_link(); ?>下一篇
	</section><!--End Article Navigation-->
<?php else : ?>
<h2 class="center"><?php _e('Nothing is Here - Page Not Found', 'newsframe'); ?></h2>
<div class="entry-content">
<p><?php _e( 'Sorry, but we couldn\'t find what you we\'re looking for.', 'newsframe' ); ?></p>
</div><!-- .entry-content -->
<?php endif; ?>
</div><!--End Single Article-->
</div>

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>