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
</head>
<style>
	body{font-family:"Microsoft YaHei";background-color:#eeeeee;padding:0 10px;}
</style>
<body <?php body_class(); ?> id="newsmain">
<?php global $newsframe_options; $newsframe_settings = get_option( 'newsframe_options', $newsframe_options ); ?>

<div class="container news">
	<div class="navbar navbar-default" role="navigation">
	<a href="/newslist" style="font-size:40px;float:left">上医养生</a>
		<div class="navbar-collapse" style="margin-top:67px">
			<ul class="nav navbar-nav navbar-right">
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'nav-menu') ); ?>	
</ul>
		</div><!--/.nav-collapse -->
	</div>
</div>