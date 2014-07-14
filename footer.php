</div><!-- Ends Container -->

<div class="container news">
<div class="col-lg-12">
<ul id="footermenu">
	<?php wp_nav_menu( array( 'theme_location' => 'bottom-menu' ) ); ?>
</ul>
	<br /><br /><br />
<p style="text-align:center">&copy; <?php echo date('Y'); ?> - <?php bloginfo('name'); ?></p><br>
</div><br />
<p id="back-to-top"><a href="#top"><span></span></a></p>
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
<script>
$(function(){
	//当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失
	$(function () {
		$(window).scroll(function(){
			if ($(window).scrollTop()>100){
				$("#back-to-top").css('display','block');
			}
			else
			{
				$("#back-to-top").css('display','none');
			}
		});

		//当点击跳转链接后，回到页面顶部位置

		$("#back-to-top").click(function(){
			$('body,html').animate({scrollTop:0},1000);
			return false;
		});
	});
});
</script>
