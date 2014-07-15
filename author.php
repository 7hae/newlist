<?php get_header(); ?>
<?php echo '<pre>'; var_dump(get_the_author()); exit;?> 
<div class="container">
<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 news_list">
		<?php if ( have_posts() ) : ?>
		<?php the_post(); ?>
	<header class="author-page-header">
	<h1 class="author-title"><?php echo get_the_author();?></h1>
	</header><!-- .author-page-header -->
		<?php rewind_posts(); ?>
		<?php get_template_part ('authorbox'); ?>
		<?php endif; ?>
		<?php /* Start the Loop */ ?>
		<?php while (have_posts()) : the_post(); ?>
	
<div class="news list">
	<h2 class="index-title">
		<span class="post_class"><?php the_category(' '); ?></span>
		<span><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
			<?php the_title(); ?>
		</a></span>
		<span class="comment_number"><?php echo $post->comment_count;?></span>
	</h2>
	<p class="postinfo">
		<span class="spacer"></span>&nbsp;&nbsp;<i class="icon-user"></i> <?php the_author_posts_link(); ?>
		<span class="spacer"></span>&nbsp;&nbsp; <?php the_time ('Y-m-d'); ?>
		<span class="spacer"></span>&nbsp;&nbsp; 浏览：<span><?php echo $post->click;?></span>
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
		<p class="col-lg-12" style="line-height:40px">
			<a href="javascript:void()" class="post_tags">标签:</a>&nbsp;&nbsp; 			
			<?php
				$tags = wp_get_post_tags($post->ID);
				foreach ($tags as $tag) {
			?>
					<a class="post_tag" href="/newslist/?tag=<?php echo $tag->name;?>"><?php echo $tag->name;?></a>
			<?php
				}
				if(count($tags) == 0){
					echo '<a  href="javascript:void()" class="post_tag_none">暂无标签</a>';
				}
			?>
		</p>
<div style="clear:both"></div>
</div>
	<?php endwhile; ?>
<section id="post-nav">
	<?php posts_nav_link(' ', '<i class="icon-arrow-left"></i>', '<i class="icon-arrow-right"></i>'); ?>
</section><!--End Navigation-->

</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>