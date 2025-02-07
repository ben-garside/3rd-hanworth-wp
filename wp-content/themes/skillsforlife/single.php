<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Skills_for_Life
 */

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
			<div class="sub-header-transparency"  style="background: rgba(0, 0, 0, 0.4); height:220px;")>
			<div class="sub-header-overlay">
				<?php the_title( '<h1>', '</h1>' ); ?>
				<h4><div class="entry-meta">
				<?php
				if (get_theme_mod('sfl_post_title','ud')=='ud') {
				skillsforlife_posted_on();
				skillsforlife_posted_by();
				}
				if (get_theme_mod('sfl_post_title','ud')=='st' AND (function_exists('the_subtitle'))){
			    the_subtitle( '<h4 class="subtitle">', '</h4>' );
			//	the_excerpt(__('(more…)'));
			//	echo get_the_excerpt();
				}
				?>
			</div></h4>
			</div>
			</div>
		</div>
	</header><!-- .entry-header -->

<div class="wrapper">
<div class="main-content">
	<div class="entry-content">
	    <?php    if(get_theme_mod('sfl_post_img',' ')=='X')  {
	              if( !strpos( get_the_content(), '<img ' ) ){
 	                 if ( has_post_thumbnail() ) {
                       the_post_thumbnail();
                     }
	              }} ?>

		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'skillsforlife' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
		 	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'skillsforlife' ),
		 	'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php skillsforlife_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</div>
	<?php get_sidebar(); ?>
	<div class="clear">
</div>
</article><!-- #post-<?php the_ID(); ?> -->
<div class="wrapper">
<?php

			// the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
