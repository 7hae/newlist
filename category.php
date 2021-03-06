<?php 
	get_header(); 
	$category = get_the_category();
	$car_id=$category[0]->term_id;
?>
<div class="container main_index">
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" id="news_list">
	<?php if (have_posts()) : ?>
	<div class="news">
		<header id="archive-header">
		<h1 class="archive-title">
		<?php
		printf( __( '%s', 'newsframe' ), '<span>' . single_cat_title( '', false ) . '</span>' );
		?></h1>
		<?php
		$category_description = category_description();
		if ( ! empty( $category_description ) )
		echo apply_filters( 'category_archive_meta',
		'<div class="cat-archive-meta">' . $category_description . '</div>' );
		?>
		</header>
	</div>
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
	var cat=<?php echo $car_id;?>;
	var pages=<?php echo get_system_info('posts_per_page');?>;
    $(document).ready(function(){
        var range = 5;             //距下边界长度/单位px
        var elemt = 500;           //插入元素高度/单位px
        var maxnum = 60;           //设置加载最多次数
        var num = 0;
        $(window).scroll(function(){
            var srollPos = $(window).scrollTop();    //滚动条距顶部距离(页面超出窗口的高度)
            var dbHiht = $(window).height();          //页面(约等于窗体)高度/单位px
            var main = $("#newsmain");                        //主体元素
            var news_list = $("#news_list");                  //内容主体元素
            var mainHiht = main.height();               //主体元素高度/单位px
            if((srollPos + dbHiht) >= (mainHiht-range)){
			$("#jiazai").css('display','block');
				num += pages;
				$("#load_number").val(num);
				var data={
					offset:num,
					cat:cat,
					number:pages
				}
				 $.ajax({
					url: '/newslist/wp-content/themes/newsframe/get_news_list.php',
					type:"POST",
					data:data,
					success:function(msg)
					{
						if(msg == '0'){
							$(".neirong").html('没有更多文章了');
						}else{
							news_list.append(msg)
							$("#jiazai").css('display','none');
						}
					}
				})			
            }
        });
    });
    </script>
<script type="text/javascript">
	$(".wp-post-image").removeAttr('width');
	$(".wp-post-image").removeAttr('height');
</script>
