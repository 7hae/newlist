<?php
	require_once('../../../wp-blog-header.php');
	require_once('./functions.php');
	global $wpdb;
	$offset=$_POST['offset'];
	$number=$_POST['number'];
	$cat=isset($_POST['cat'])?$_POST['cat']:0;
	$where="category=$cat&offset=".$offset."&numberposts=$number";
	$posts = get_posts($where); 
	if(count($posts) == 0){
		echo '0';exit;
	}
	$content='';
	foreach($posts as $k=>$v){
		$sql='select user_login from wp_users where ID='.$v->post_author;
		$author=$wpdb->get_var($sql);
		$cat=get_the_category($v->ID);//获取文章所属分类 
		//拼接字符串
		$content.="<div class='news list'>";
		$content.="<article class='post-11 post type-post status-publish format-standard has-post-thumbnail hentry category-news_ys last' id='post-11'>";
		$content.="<h2 class='index-title'>";
		$content.="<span class='post_class'><a href='/newslist/?cat=".$cat[0]->term_id."' title='查看".$cat[0]->cat_name."中的全部文章' rel='category'>".$cat[0]->cat_name."</a></span>";
		$content.="&nbsp;&nbsp;<span><a href='http://www.7hae.com/newslist/?p=".$v->ID."' rel='bookmark' title='".$v->post_title."'>";
		$content.=$v->post_title;
		$content.="</a></span><span class='comment_number'>".get_post($v->ID)->comment_count."</span>";
		$content.="</h2>";
		$content.="<p class='postinfo'>";
		$content.="";
		$content.="<span class='spacer'></span>";
		$content.="&nbsp;&nbsp;<i class='icon-user'></i> <a href='/newslist/?author=1' title='由".$author."发布' rel='author'>".$author."</a><span class='spacer'></span>&nbsp;&nbsp;".$v->post_date."<span class='spacer'></span>&nbsp;&nbsp; 浏览：<span>".$v->click."</span></p>";
		if(get_post_thumbnail_url($v->ID)){
		$content.="<div class='col-lg-12'>";
		$content.="<img src='".get_post_thumbnail_url($v->ID)."' class='img-responsive' />";
		$content.="</div>";
		}
		$content.="<div>";
		$content.="<p>".mb_strimwidth(get_post($v->ID)->post_content, 0, 200,"...")."<a class='more' href='/newslist/?p=".$v->ID."'>&#8230;全文</a></p>";
		$content.="</div>";

		$content.="<div class='col-lg-12'>";
		$content.="<ul>";
		$content.="<li class='post_tags'>标签:</li>&nbsp;&nbsp;"; 			
			
		$tags = wp_get_post_tags($v->ID);
		foreach ($tags as $tag) {
			$content.="<li class='post_tag'><a href='/newslist/?tag=".$tag->name."'>".$tag->name."</a></li>";
		}
		if(count($tags) == 0){
		$content.="<li class='post_tag_none'>暂无标签</li>";
		}

		$content.="</ul></div>";

		$content.="<div style='clear:both'></div>";
		$content.="</article>";
		$content.="</div>";
	}
	echo $content;
?>  
