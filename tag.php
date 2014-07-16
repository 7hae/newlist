<?php // template for tag archives
	get_header(); ?>
<div class="container main_index">
	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 news_list">
		<div class="archive-view">
		<?php if (have_posts()) : ?>
		<header class="news">
			<h1 class="archive-title">
			<?php
			 echo single_tag_title( '', false );
			?>
			</h1>
			<?php
			$tag_description = tag_description();
			if ( ! empty( $tag_description ) )
			echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
			?>
		</header>
		<?php while (have_posts()) : the_post(); ?>
			<div class="news list">
					<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
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
							<div class="index-thumb">
								<?php $img_id = get_post_thumbnail_id($post->ID); // This gets just the ID of the img
								the_post_thumbnail('large');
								$alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true); ?>
							</div>
							<?php } ?>
				<div class="archive-excerpt">
					<?php the_excerpt(); ?>
				</div>
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
				<?php } ?>
					</article>
<div style="clear:both"></div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
		</div>
<?php get_sidebar(); ?>
<section id="post-nav">
	<?php posts_nav_link(' ', '<i class="icon-arrow-left"></i>', '<i class="icon-arrow-right"></i>'); ?>
</section><!--End Navigation-->
</div>

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

<script type="text/javascript">
	$(".wp-post-image").removeAttr('width');
	$(".wp-post-image").removeAttr('height');
</script>