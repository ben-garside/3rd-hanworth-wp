<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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

			<section class="error-404 not-found">
				<header class="sub-header">
					<div class="sub-header-background" style="background: url('<?php echo get_template_directory_uri(); ?>/img/404-bg.jpg') no-repeat center;  -webkit-background-size: cover;  -moz-background-size: cover;  -o-background-size: cover;  background-size: cover;">
						<div style="background: rgba(0, 0, 0, 0.4); height:220px;")>
						<div class="sub-header-overlay">
						<h1><?php esc_html_e( 'Error 404', 'skillsforlife' ); ?></h1>
						<h4><?php esc_html_e( 'Oh No! It looks like you&rsquo;re a little lost...', 'skillsforlife' ); ?></h4>
						</div>
						</div>
					</div>
				</header><!-- .entry-header -->

				<div class="wrapper">
				<div class="entry-content">
					<p><?php esc_html_e( 'Unfortunately, the page you were looking for cannot be found.', 'skillsforlife' ); ?></p>
					
					<p><?php esc_html_e( 'If you have ended up on this page from a link elsewhere on our website, or believe that this is a mistake - then please let us know!', 'skillsforlife' ); ?></p>

					<p>Let us help you get back to our site - <a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'skillsforlife' ); ?></a></p>
				</div><!-- .page-content -->
				</div>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
