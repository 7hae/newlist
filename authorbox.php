<div class="authorbox">
	<div class="row">
		<div class="three columns">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 150 ); ?>
		</div>
	<div class="nine columns">
		<p><?php the_author_meta('description'); ?></p>
		<ul class="social-links">
			<?php if (get_the_author_meta ('googleplus') ) : ?>
			<li><a href="<?php the_author_meta ('googleplus'); ?>"><i class="icon-google-plus icon-large"></i></a></li>
			<?php endif; ?>
			<?php if (get_the_author_meta ('linkedin') ) : ?>
			<li><a href="<?php the_author_meta ('linkedin'); ?>"><i class="icon-linkedin icon-large"></i></a></li>
			<?php endif; ?>
			<?php if (get_the_author_meta ('facebook') ) : ?>
			<li><a href="<?php the_author_meta ('facebook'); ?>"><i class="icon-facebook icon-large"></i></a></li>
			<?php endif; ?>
			<?php if (get_the_author_meta ('twitter') ) : ?>
			<li><a href="<?php the_author_meta ('twitter'); ?>"><i class="icon-twitter icon-large"></i></a></li>
			<?php endif; ?>
			<?php if (get_the_author_meta ('tumblr') ) : ?>
			<li><a href="<?php the_author_meta ('tumblr'); ?>"><i class="icon-tumblr icon-large"></i></a></li>
			<?php endif; ?>
			<li><a href="<?php get_author_feed_link('$author_id'); ?>"><i class="icon-rss icon-large"></i></a></li>
			<?php if (get_the_author_meta ('user_url') ) : ?>
			<li><a href="<?php the_author_meta ('user_url'); ?>"><i class="icon-user icon-large"></i></a></li>
			<?php endif; ?>
		</ul>
	</div>
	</div>
</div>