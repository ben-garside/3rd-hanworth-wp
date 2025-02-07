<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Skills_for_Life
 */

get_header();

add_filter( 'excerpt_length', function( $length ) {  return 40; }, 999);
?>
<div class="breadcrumbs">
	<div class="wrapper">
		<?php skillsforlife_breadcrumbs(); ?>
	</div>
</div>

	<header class="sub-header">
		<div class="sub-header-background" style="background-color: #002f6c !important;">
			<div style="height:220px;")>
			<div class="sub-header-overlay">
				<h1><?php _e( 'Latest News', 'skillsforlife' ); ?></h1>
				<h4><?php echo get_post_meta($post->ID, 'sub-header-subtitle', true); ?></h4>
			</div>
			</div>
		</div>
	</header>

	<!-- wrapper -->
	<div class="wrapper">

<aside class="sidebar" role="complementary">

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('news-sidebar')) ?>
	</div>

</aside>

	<div class="the-content">
	<main role="main">

		<!-- section -->
		<section>

			<?php get_template_part('loop'); ?>

			<?php the_posts_navigation(); ?>

		</section>
		<!-- /section -->
	</main>

	</div>

	<div class="clear"></div>

	</div>
	<!-- wrapper -->

<?php
get_footer();
