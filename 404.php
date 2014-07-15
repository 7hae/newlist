<?php get_header();
?>
<div class="container">
<div class="col-lg-8" id="news_list">
		<div id="404-page" class="news">
		<article id="post-0" class="post error404 no-results not-found">
			<header class="entry-header">
				<h1 class="entry-title"><?php _e( '404 - Oops. Page Not Found', 'newsframe' ); ?></h1>
			</header>
		<div class="entry-content">
			<h4><?php _e ('The page you\'re looking for has gone extinct.', 'newsframe'); ?></h4>
			<p><?php _e ('Perhaps you should try searching for what you\'re looking for.', 'newsframe'); ?></p>
			<h2><?php _e('List o\' pages' , 'newsframe'); ?></h2>
			<ul>
				<?php
				// Add pages you'd like to exclude in the exclude here
				wp_list_pages(
				array(
				'exclude' => '',
				'title_li' => '',
				)
				);
				?>
			</ul>
		</div><!-- .entry-content -->
		</article><!-- #post-0 -->
	</div>
	</div>
<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>