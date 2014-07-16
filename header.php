<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/font-icon/css/font.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/flat-ui.css">
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery-2.0.3.min.js"></script>
</head>
<style>
	body{font-family:"Microsoft YaHei";background-color:#eeeeee;padding:0 10px;}
</style>
<body <?php body_class(); ?> id="newsmain">
<?php global $newsframe_options; $newsframe_settings = get_option( 'newsframe_options', $newsframe_options ); ?>


<div class="container news" style="padding-top:10px">
<nav class="navbar navbar-default navbar-embossed" role="navigation">
  <div class="navbar-header">
	
	<a class="navbar-brand" href="/newslist"><img src="<?php echo get_template_directory_uri();?>/images/footer/logo.png" style="float:left" /></a>
  </div>
  <div class="navbar-collapse navbar_fu" id="navbar-collapse-02">
	<ul class="nav navbar-nav">           
	 <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'nav-menu') ); ?>	
	 </ul>          
	<form class="navbar-form navbar-right" method="get" id="searchform" action="<?php echo esc_url(home_url()); ?>" role="search" style="width: 250px">
	  <div class="form-group">
		<div class="input-group">
		  <input class="form-control" name="s" id="navbarInput-01" type="text" placeholder="输入关键字">
		  <span class="input-group-btn">
			<button type="submit" class="btn"><span class="fui-search"></span></button>
		  </span>            
		</div>
	  </div>               
	</form>
  </div><!-- /.navbar-collapse -->
</nav>
</div>













<!--div class="container news">
	<div class="navbar navbar-default" role="navigation">
	<a href="/newslist" style="font-size:40px;float:left">上医养生</a>
		<div class="navbar-collapse" style="margin-top:67px">
			<ul class="nav navbar-nav navbar-right">
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'nav-menu') ); ?>	
</ul>
		</div>
	</div>
</div-->