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
<script type="text/javascript">
<!--
	$('.JIATHIS_IMG_NO').css('border-radius','0px');
//-->
</script>
<script language="javascript">
imgs = document.getElementsByTagName("img");
imgsnum = imgs.length;
for(imgi = 0 ;imgi < imgsnum;imgi++){
     if (imgs[imgi].className != 'img-responsive'){
        imgs[imgi].className += ' img-responsive';
	 }
}

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

