<?php

/* Template Name: Full Width - Grey Sub-banner (no image) */ 

get_header();
?>

<div class="breadcrumbs">
	<div class="wrapper">
		<?php skillsforlife_breadcrumbs(); ?>
	</div>
</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

		?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- .entry-header -->
<div class="sub-banner"><div class="wrapper"><div class="sub-banner-overlay">
				<?php the_title( '<h1>', '</h1>' ); ?>
				<h4><?php echo get_post_meta($post->ID, 'sub-header-subtitle', true); ?><?php if (function_exists('the_subtitle')) {the_subtitle(); } ?></h4>
			</div><?php dynamic_sidebar( 'sub-banner-widget' ); ?></div></div>
<div class="sub-banner-index">
	<div class="sub-banner-index-wrapper">
		<?php dynamic_sidebar( 'sub-banner-index-widget' ); ?>
	</div>
</div>
<div class="wrapper">
<div class="main-content-full-width">
	<div class="entry-content-full">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'skillsforlife' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'skillsforlife' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

</div>
</article>
<!-- #post-<?php the_ID(); ?> -->

	</main><!-- #main -->
</div><!-- #primary -->
</div><div class="wrapper">
<?php

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile; // End of the loop.
?>
</div>
<?php
get_footer();
