</div><!-- Ends Container -->

<div class="container news">

<div class="cols-lg-12" style="text-align:center;font-size:20px">		
<a href="#" id="top-return">			
<?php _e ('^Top', 'newsframe' ); ?>		
</a>	
</div>

<div class="col-lg-12">
<?php global $newsframe_options; $newsframe_settings = get_option( 'newsframe_options', $newsframe_options ); ?>

<ul id="footermenu">
	<?php wp_nav_menu( array( 'theme_location' => 'bottom-menu' ) ); ?>
</ul>
	<br /><br /><br />
<small>&copy; <?php echo date('Y'); ?> - <?php bloginfo('name'); ?></small><br>
<input type="hidden" id="load_number" value="0" />
</div><br />
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

<script language="javascript">
imgs = document.getElementsByTagName("img");
imgsnum = imgs.length;
for(imgi = 0 ;imgi < imgsnum;imgi++){
     if (imgs[imgi].className != 'img-responsive'){
        imgs[imgi].className += ' img-responsive';
	 }
}
</script>
<script type="text/javascript">
	var cat=<?php echo isset($_GET['cat'])?$_GET['cat']:0;?>;
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
					url: './wp-content/themes/newsframe/get_news_list.php',
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