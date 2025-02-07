<?php /* Template Name: Homepage */

add_filter( 'excerpt_length', function( $length ) {  return 30; }, 999);

get_header();

// check if the post has a Post Thumbnail assigned to it.
if ( has_post_thumbnail() ) {
?>
<div class="home-welcome">
<div class="home-welcome-background" style="background: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>') no-repeat center;  -webkit-background-size: cover;  -moz-background-size: cover;  -o-background-size: cover;  background-size: cover; height: auto;">
	<div class="home-welcome-box">
	<div class="home-welcome-box-container">
		<div class="home-welcome-box-left">
				<?php the_title( '<h1>', '</h1>' ); ?>
			<!-- article -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			 <?php
    // TO SHOW THE PAGE CONTENTS
    while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
            <?php the_content(); ?> <!-- Page Content -->
    <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
    ?>
			</article>
			<!-- /article -->

		
				</div>
				<?php if( get_theme_mod( 'hide_all_hp' ) == '') { ?>
	<div class="home-welcome-box-right">
		<div class="sections-home">
			<div class="the-sections">
				<?php if( get_theme_mod( 'hide_squ_hp' ) == '') { ?>
				<div class="sections-clear"></div>
				<a href="<?php echo get_theme_mod( 'sfl_squirrel_url', '/squirrels/' ); ?>" class=" ">
					<div class="section-squirrels-text">
						<span class="font-weight-bold">4–5</span>
						<span class="chevron-right"></span>
					</div>
					<div class="section-squirrels-logo">
						<img src="<?php echo get_template_directory_uri(); ?>/img/logo-squirrels.svg" alt="Squireels" scale="0">
					</div>
				</a>
				<?php } ?>
				<?php if( get_theme_mod( 'hide_bvr_hp' ) == '') { ?>
				<div class="sections-clear"></div>
				<a href="<?php echo get_theme_mod( 'sfl_beaver_url', '/beavers/' ); ?>" class=" ">
					<div class="section-beavers-text">
						<span class="font-weight-bold">6–8</span>
						<span class="chevron-right"></span>
					</div>
					<div class="section-beavers-logo">
						<img src="<?php echo get_template_directory_uri(); ?>/img/logo-beavers.svg" alt="Beavers" scale="0">
					</div>
				</a>
				<?php } ?>
				<?php if( get_theme_mod( 'hide_cub_hp' ) == '') { ?>
				<div class="sections-clear"></div>
				<a href="<?php echo get_theme_mod( 'sfl_cub_url', '/cubs/' ); ?>" class=" ">
					<div class="section-cubs-text">
						<span class="font-weight-bold">8–10½</span>
						<span class="chevron-right"></span>
						</div>
					<div class="section-cubs-logo">
						<img src="<?php echo get_template_directory_uri(); ?>/img/logo-cubs.svg" alt="Cubs" scale="0">
					</div>
				</a>
				<?php } ?>
				<?php if( get_theme_mod( 'hide_sct_hp' ) == '') { ?>
				<div class="sections-clear"></div>
				<a href="<?php echo get_theme_mod( 'sfl_scout_url', '/scouts/' ); ?>" class=" ">
					<div class="section-scouts-text">
						<span class="font-weight-bold">10½–14</span>
						<span class="chevron-right"></span>
					</div>
					<div class="section-scouts-logo">
						<img src="<?php echo get_template_directory_uri(); ?>/img/logo-scouts.svg" alt="Scouts" scale="0">
					</div>
				</a>
				<?php } ?>
				<?php if( get_theme_mod( 'hide_exp_hp' ) == '') { ?>
			<div class="sections-clear"></div><a href="<?php echo get_theme_mod( 'sfl_explorer_url', '/explorers/' ); ?>" class=" ">
					<div class="section-explorers-text">
						<span class="font-weight-bold">14–18</span>
						<span class="chevron-right"></span>
					</div>
					<div class="section-explorers-logo">
						<img src="<?php echo get_template_directory_uri(); ?>/img/logo-explorers.svg" alt="Explorers" scale="0">
					</div>
				</a><?php } ?>
				<?php if( get_theme_mod( 'hide_net_hp' ) == '') { ?>
				<div class="sections-clear"></div><a href="<?php echo get_theme_mod( 'sfl_network_url', '/network/' ); ?>" class=" ">
					<div class="section-network-text">
						<span class="font-weight-bold">18–25</span>
						<span class="chevron-right"></span>
					</div>
					<div class="section-network-logo">
						<img src="<?php echo get_template_directory_uri(); ?>/img/logo-network.svg" alt="Network" scale="0">
					</div>
				</a><?php } ?></div>
			
			
			</div>
			
			
		
		<div class="volunteer-box">
			<div class="volunteer-box-intro">
                Gain new skills while helping others
            </div>
			<a href="<?php echo get_theme_mod( 'sfl_volunteer_url', '/volunteer/' ); ?>" class="volunteer">
				<div class="volunteer-text">
					<span class="font-weight-bold">14 and up</span>
					<span class="chevron-right"></span>
				</div>
				<div class="volunteer-logo">
					<span class="h4">Volunteer</span>
				</div>
			</a>
			<div class="clear"></div>
		</div>
	</div>
	<?php } ?>
	</div>
</div>
</div>

<?php } ?>
	<div class="clear"></div>

	<section id="colophon" class="home-mid">
	<div class="wrapper">
<div class="homepage-row">
  <div class="column left">&nbsp;<?php dynamic_sidebar( 'home-widget-left' ); ?></div>
  <div class="column middle">&nbsp;<?php dynamic_sidebar( 'home-widget-mid' ); ?></div>
  <div class="column right">&nbsp;<?php dynamic_sidebar( 'home-widget-right' ); ?></div>
</div>
			<div class="clear"></div>
	</div>
	</section>

	<!-- wrapper -->
	<div class="wrapper">

	<main role="main">
<!-- <?php // dynamic_sidebar( 'home-widget-mid' ); ?> -->
<center>
<div class="home-main-widget"><?php dynamic_sidebar( 'home-widget-main' ); ?></div>
<div>
<?php if( get_theme_mod( 'hide_news' ) == '') { ?>
<div class="news-title">
<h1><?php echo get_theme_mod( 'wh_title', 'What\'s happening' ); ?></h1>
</div>
<div class="news-subtitle">
<h4><?php echo get_theme_mod( 'wh_subtitle', 'All the latest news for you and your Scouts' ); ?></h4>
</div>
</center>
	<div class="news-wrapper">
<?php
    $main = new WP_Query();
    $main->query('posts_per_page='.strval(get_theme_mod('news_articles','6' )) );
    while($main->have_posts()) : $main->the_post();
?>
    <div class="post-grid">
		<div class="post-box">
		<a href="<?php the_permalink() ?>"><img src="<?php if (has_post_thumbnail()) {the_post_thumbnail_url();} else { echo get_template_directory_uri()."/img/placeholder.svg" ; } ?>" /></a>
        <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
        <em class="postMetaData">Posted on <?php the_time('jS F Y'); ?> at <?php the_time('H:i'); ?>.</em>
 
        <div class="entry">
            <?php the_excerpt(__('(more…)')); ?>
        </div>
		</div>
    </div>
<?php endwhile; ?>
</div>
<?php } // end if ?>
</div>
<div class="clear"></div>
	<?php if( get_theme_mod( 'hide_safe' ) == '') { ?>
<div class="yp-wrapper">	
<div class="sg-box">
<div class="sg-box-left">
<h2 class="sg-h2"><?php echo get_theme_mod( 'sg_title', 'Young people first: safeguarding and safety in Scouting' ); ?></h2>
<p class="lead"><a href="<?php echo get_theme_mod( 'sg_description_url', 'https://www.scouts.org.uk/volunteers/staying-safe-and-safeguarding/reporting-a-concern-to-safeguarding/' ); ?>"><?php echo get_theme_mod( 'sg_description', 'Wherever we go and whatever we do, we put young people’s safety and wellbeing first.' ); ?></a></p>
<div class="ceop">
		<a href="https://www.ceop.police.uk/safety-centre/"><img src="<?php echo get_template_directory_uri(); ?>/img/CEOPReportBtn.png" style="height: 50px; width: 144px;"></a>
		</div>
</div>
<div class="sg-box-right">
<div class="sg-box-right-widget"><?php dynamic_sidebar( 'safety-widget-right' ); ?></div>
</div>
</div>
</div>
			<?php } // end if ?>
	<!--End Volunteer-->
	<center>
		<div class="home-main-widget-bottom"><?php dynamic_sidebar( 'home-widget-main-bottom' ); ?></div>
		</center>
	</div>

	</div>
	</main>

	</div>
	<!-- wrapper -->

<?php get_footer(); ?>