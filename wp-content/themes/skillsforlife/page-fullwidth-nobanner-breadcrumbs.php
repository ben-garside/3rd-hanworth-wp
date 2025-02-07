<?php

/* Template Name: Default Page (Full Width, No Featured Image) */ 


get_header();
?>
<div class="breadcrumbs">
	<div class="wrapper">
		<?php skillsforlife_breadcrumbs(); ?>
	</div>
</div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<div class="wrapper">

<h1><?php the_title(); ?></h1>
		<?php
		while ( have_posts() ) :
			the_post();

		?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
</article><!-- #post-<?php the_ID(); ?> -->

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
