<?php // template used for the main page
	get_header(); ?>
<?php global $newsframe_options; $newsframe_settings = get_option( 'newsframe_options', $newsframe_options ); ?>
<?php if ( is_active_sidebar( 'home-1' ) or is_active_sidebar( 'home-2' ) or is_active_sidebar( 'home-3') ) { ?>
<div class="container">
	<div class="col-lg-12">
		<div class="four columns">
		<?php do_action( 'before_widget' ); ?>
				<?php if ( !dynamic_sidebar( 'home-1' ) ) : ?>
				<?php endif; ?>
		</div>
		<div class="four columns">
		<?php do_action( 'before_widget' ); ?>
				<?php if ( !dynamic_sidebar( 'home-2' ) ) : ?>
				<?php endif; ?>
		</div>
		<div class="four columns">
		<?php do_action( 'before_widget' ); ?>
				<?php if ( !dynamic_sidebar( 'home-3' ) ) : ?>
				<?php endif; ?>
		</div>
	</div>
</div>
<?php } ?>

<div class="container">
<div class="col-lg-8" id="news_list">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
<div class="news list">
	<h2 class="index-title">
		<span class="post_class"><?php the_category(' '); ?></span>
		<span><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
			<?php the_title(); ?>
		</a></span>
		<i class="comment"><?php echo $post->comment_count;?></i>
	</h2>
	<p class="postinfo">
		
		<span class="spacer"></span>&nbsp;&nbsp;<i class="icon-user"></i> <?php the_author_posts_link(); ?>
		<span class="spacer"></span>&nbsp;&nbsp; <?php the_time ('Y-m-d'); ?>
		<span class="spacer"></span>&nbsp;&nbsp; 浏览：<i><?php echo $post->click;?></i>
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
		<div class="col-lg-12">
			<p>
			<span class="post_tags">标签:</span>&nbsp;&nbsp; 			
			<?php
				
				$tags = wp_get_post_tags($post->ID);
				foreach ($tags as $tag) {
					?>
					<span class="post_tag"><a href="/newslist/?tag=<?php echo $tag->name;?>"><?php echo $tag->name;?></a></span>&nbsp;&nbsp;
					<?php
				}
					if(count($tags) == 0){
						echo '<span class="post_tag_none">暂无标签</span>';
					}
			?>
			</p>
		</div>
<div style="clear:both"></div>
</div>
	<?php endwhile; ?>
	<?php endif; ?></div>
<?php get_sidebar(); ?>
</div>

<div id="jiazai" class="container" style="display:none;">
	<div class="col-md-12 news" style="text-align:center;">
		<p class="neirong" style="padding:10px 30px">
		<img src="<?php echo get_template_directory_uri();?>/images/zhuan.gif" style="display:inline" /><span id="neirong">正在加载，请稍候...</span>
		</p>
	</div>
</div>
<?php get_footer(); ?>
