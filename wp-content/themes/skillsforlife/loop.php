<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="news-box">
			<div class="news-box-img">
				<a href="<?php the_permalink() ?>"><img src="<?php if (has_post_thumbnail()) {the_post_thumbnail_url();} else { echo get_template_directory_uri()."/img/placeholder.svg" ; } ?>" /></a>
			</div>
			<div class="news-box-main">
				<header class="news-entry-header">
					<!-- post title -->
					<h2>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h2>
					<!-- /post title -->
					<h4><?php echo get_post_meta($post->ID, 'sub-header-subtitle', true); ?><?php the_subtitle(); ?></h4>
					<div class="entry-meta">
						<!-- post details -->
						
						<!-- /post details -->
					</div>
				</header><!-- .entry-header -->

				<div class="news-entry-content">
					<?php
					the_excerpt(__('(more…)'));
					?>
				</div><!-- .entry-content -->
				
			</div>
		<div class="clear"></div>
		</div>
	</article>
	<!-- /article -->

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'skillsforlife' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
