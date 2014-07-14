<?php get_header(); ?>
<div class="container">
<div class="col-lg-8">
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	<div class="news list">
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h2 class="index-title">
				<span class="post_class"><?php the_category(' '); ?></span>
				<span><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
					<?php the_title(); ?>
				</a></span>
				<span class="spacer"></span>&nbsp;&nbsp; <span class="comment_number"><?php echo $post->comment_count;?></span>
			</h2>
			<p class="postinfo">
				<span class="spacer"></span>&nbsp;&nbsp;<i class="icon-user"></i> <?php the_author_posts_link(); ?><span class="spacer"></span> &nbsp;&nbsp;<?php the_time ('Y-m-d'); ?>
				&nbsp;&nbsp; 浏览：<span><?php echo $post->click;?></span>
			</p>
			<?php // shows featured video embed if post is video format and featured video embed box is used
				if ( has_post_format('video') && ( get_post_meta ($post->ID, 'newsframe_video', true) != '' ) ) { ?>
			<div class="row">
				<div class="twelve columns centered">
					<div class="flex-video">
						<?php echo get_post_meta($post->ID, 'newsframe_video', true); ?>
					</div>
				</div>
			</div>
			<?php }
				?>
			<?php // content backup if featured video is unset
				if ( has_post_format('video') && ( get_post_meta ($post->ID, 'newsframe_video', true) == '' ) ) {
				the_content();
				}
				?>
		<?php if ( !has_post_format('video') ) { ?>
			<?php if ( has_post_thumbnail() ) { ?>
			<div class="col-lg-12">
				<?php $img_id = get_post_thumbnail_id($post->ID); // This gets just the ID of the img
				the_post_thumbnail('large');
				$alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true); ?>
			</div>
			<?php } ?>
		
			<div class="col-lg-12">
				<?php the_excerpt(); ?>
			</div>
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
			<?php } ?>
		</article>
</div>
	<?php endwhile; ?>
	<?php endif; ?>
	</div>
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

<script type="text/javascript">
	$(".wp-post-image").removeAttr('width');
	$(".wp-post-image").removeAttr('height');
</script>
