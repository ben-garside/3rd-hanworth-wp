<?php /* Template Name: Contact */ get_header();

// check if the post has a Post Thumbnail assigned to it.
if ( has_post_thumbnail() ) {
?>
<div class="breadcrumbs">
	<div class="wrapper">
		<?php skillsforlife_breadcrumbs(); ?>
	</div>
</div>
<div class="sub-header">
<div class="sub-header-background" style="background: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>') no-repeat center;  -webkit-background-size: cover;  -moz-background-size: cover;  -o-background-size: cover;  background-size: cover;">
	<div style="background: rgba(0, 0, 0, 0.4); height:412px;")>
	<div class="sub-header-overlay">
		<div class="wrapper">
			<div class="rotate">
				<h1><?php echo get_post_meta($post->ID, 'sub-header-title', true); ?></h1>
				<h4><?php echo get_post_meta($post->ID, 'sub-header-subtitle', true); ?></h4>
			</div>
		</div>
	</div>
	</div>
</div>
</div>
<div class="sub-banner"><div class="wrapper"><div class="sub-banner-overlay">
				<?php the_title( '<h1>', '</h1>' ); ?>
				<h4><?php echo get_post_meta($post->ID, 'sub-header-subtitle', true); ?><?php if (function_exists('the_subtitle')) {the_subtitle(); } ?></h4>
			</div><?php dynamic_sidebar( 'sub-banner-widget' ); ?></div></div>
	<div class="clear"></div>
<?php } ?>

	<!-- wrapper -->
	<div class="wrapper">
	<div class="contact-page">

	<main role="main">

		<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>

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

		</section>
		<!-- /section -->
		<div class="clear" style="padding: 0 0 20px 0;"></div>
	</main>
	
	<div class="contact-left">
	
	<section id="" class="widget">
	<h4>Write to us...</h4>
	<p><strong><?php bloginfo('name'); ?></strong><br />
	<?php echo get_theme_mod( 'group_address', 'xthn Scout Group, Scout Hut Lane, Cheshire, WA6 XXX' ); ?></p>
	</section>

	<section id="" class="widget">
	<h4>Call us...</h4>
	<p>If you'd prefer to speak over the phone, call us on the number below and leave a voicemail:</p>
<p class="confit-phone"><?php echo get_theme_mod( 'group_telephone', '00000 000000' ); ?></p>
	</section>
	
    <section id="" class="widget">
	<h4>Find us...</h4>
	<?php dynamic_sidebar( 'contact-map-widget' ); ?>
	</section>
	</div>

	</div>
	
	<div class="contact-right">
	<div class="contact-form">
		<?php dynamic_sidebar( 'contact-widget' ); ?>
	</div>
	</div>

	<div class="clear"></div>

	</div>
	</div>
	<!-- wrapper -->

<?php get_footer(); ?>
