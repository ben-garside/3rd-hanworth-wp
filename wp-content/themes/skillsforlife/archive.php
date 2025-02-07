<?php
/**
 * The template for displaying archive pages
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
		<div class="sub-header-background" style="background-color: #003982 !important;">
			<div style="height:220px;")>
			<div class="sub-header-overlay">
				<h1><?php
				the_archive_title( '' );
				?></h1>
				<h4><?php the_archive_description( '<div class="archive-description">' ); ?></h4>
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

		<?php if (have_posts()): the_post(); ?>

		<?php if ( get_the_author_meta('description')) : ?>

		<?php echo get_avatar(get_the_author_meta('user_email')); ?>

			<h2><?php _e( 'About ', 'skillsforlife' ); echo get_the_author() ; ?></h2>

			<?php echo wpautop( get_the_author_meta('description') ); ?>

		<?php endif; ?>

		<?php rewind_posts(); while (have_posts()) : the_post(); ?>

			<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="news-box">
			<div class="news-box-img">
				<a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url(); ?>" /></a>
			</div>
			<div class="news-box-main">
				<header class="news-entry-header">
					<!-- post title -->
					<h2>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h2>
					<!-- /post title -->
					<div class="entry-meta">
						<!-- post details -->
						<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('H:i'); ?></span> | 
						<span class="author"><?php _e( 'Posted by', 'skillsforlife' ); ?> <?php the_author_posts_link(); ?></span> | 
						<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'No Comments', 'skillsforlife' ), __( '1 Comment', 'skillsforlife' ), __( '% Comments', 'skillsforlife' )); ?></span>
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
