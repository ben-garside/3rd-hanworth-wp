<?php
/* Template Name: Groups */ 

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
	<header class="sub-header">
		<div class="sub-header-background" style="background: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>') no-repeat center, #034dad;  -webkit-background-size: cover;  -moz-background-size: cover;  -o-background-size: cover;  background-size: cover; height:220px">
			<div classs="sub-header-transparency" style="background: rgba(0, 0, 0, 0.4); height:220px;")>
			<div class="sub-header-overlay">
				<?php the_title( '<h1>', '</h1>' ); ?>
				<h4><?php echo get_post_meta($post->ID, 'sub-header-subtitle', true); ?><?php if (function_exists('the_subtitle')) {the_subtitle(); } ?></h4>
			</div>
			</div>
		</div>
	</header><!-- .entry-header -->

<div class="wrapper">
<div class="main-content">
	<div class="entry-content">
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
<aside id="secondary" class="widget-area">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('groups-sidebar')) ?>
		  </aside>
	<div class="clear">
</div>
</article><!-- #post-<?php the_ID(); ?> -->

		<?php

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
