<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Skills_for_Life
 */

?>

	</div><!-- #content -->
<?php if( get_theme_mod( 'hide_social' ) == '') { ?>
			<div class="footer-social">
				<div class="wrapper">
					<ul>
 		       			<?php if( get_theme_mod( 'hide_facebook' ) == '') { ?>
 		       			<li><a href="<?php echo get_theme_mod( 'group_facebook', 'http://www.facebook.com/scoutassociation' ); ?>" target="_blank" rel="noopener"><img width="41px" height="40px" src="<?php echo get_template_directory_uri(); ?>/img/social/facebook.svg" alt="Facebook"></a></li>
						<?php } // end if ?>
						<?php if( get_theme_mod( 'hide_twitter' ) == '') { ?>
						<li><a href="<?php echo get_theme_mod( 'group_twitter', 'https://twitter.com/scouts' ); ?>" target="_blank" rel="noopener"><img width="41px" height="40px" src="<?php echo get_template_directory_uri(); ?>/img/social/twitter.svg" alt="Twitter"></a></li>
						<?php } // end if ?>
						<?php if( get_theme_mod( 'hide_instagram' ) == '') { ?>
						<li><a href="<?php echo get_theme_mod( 'group_instagram', 'https://instagram.com/scouts/' ); ?>" target="_blank" rel="noopener"><img width="41px" height="40px" src="<?php echo get_template_directory_uri(); ?>/img/social/instagram.svg" alt="Instagram"></a></li>
						<?php } // end if ?>
						<?php if( get_theme_mod( 'hide_linkedin' ) == '') { ?>
						<li><a href="<?php echo get_theme_mod( 'group_linkedin', 'https://www.linkedin.com/company/scoutsuk' ); ?>" target="_blank" rel="noopener"><img width="41px" height="40px" src="<?php echo get_template_directory_uri(); ?>/img/social/linkedin.svg" alt="LinkedIn"></a></li>
						<?php } // end if ?>
						<?php if( get_theme_mod( 'hide_youtube' ) == '') { ?>
						<li><a href="<?php echo get_theme_mod( 'group_youtube', 'https://www.youtube.com/UKScoutAssociation' ); ?>" target="_blank" rel="noopener"><img width="41px" height="40px" src="<?php echo get_template_directory_uri(); ?>/img/social/youtube.svg" alt="YouTube"></a></li>
						<?php } // end if ?>
						<?php if( get_theme_mod( 'hide_pinterest' ) == '') { ?>
						<li><a href="<?php echo get_theme_mod( 'group_pinterest', 'https://www.pinterest.co.uk/ukscouting/' ); ?>" target="_blank" rel="noopener"><img width="41px" height="40px" src="<?php echo get_template_directory_uri(); ?>/img/social/pinterest.svg" alt="Pintrest"></a></li>
						<?php } // end if ?>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
<?php } // end if ?>
	<footer id="colophon" class="site-footer">
	<div class="wrapper">
		<span class="footer-logo animatedParent"><img width="110" height="80" src="<?php echo get_template_directory_uri(); ?>/img/Scouts-Logo-Stack-White.svg" alt="Scouts logo" class="wow animated swing go"></span>
<div class="footer-row">
			<div class="footer-widget-left">
				<?php dynamic_sidebar( 'footer-widget-left' ); ?>
			</div>
			<div class="footer-widget-mid-left">
				<?php dynamic_sidebar( 'footer-widget-mid-left' ); ?>
			</div>
			<div class="footer-widget-mid-right">
				<?php dynamic_sidebar( 'footer-widget-mid-right' ); ?>
			</div>
			<div class="footer-widget-right">
				<?php dynamic_sidebar( 'footer-widget-right' ); ?>
				<?php if( get_theme_mod( 'hide_qavs' ) == '') { ?>
		<div class="qavs-footer">
			<a href="/qavs"><img src="<?php echo get_template_directory_uri(); ?>/img/qavs_trans.png" alt="The Queens Award for Voluntary Service" /></a>
		</div>
		<?php } // end if ?></div>
			</div>


		<div class="site-info">
			
				<!-- copyright -->
				<p class="copyright">
				&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>, All rights reserved.<br />
				<?php if( get_theme_mod( 'hide_charity_number' ) == '') { ?>
				Registered Charity in England and Wales: <a href="https://register-of-charities.charitycommission.gov.uk/charity-search/-/charity-details/<?php echo get_theme_mod( 'charity_number', '0000000' ); ?>"><?php echo get_theme_mod( 'charity_number', '0000000' ); ?></a><br /></br>
					<?php } // end if ?>
				<?php if( get_theme_mod( 'hide_address' ) == '') { ?>	
				<strong>Registered Address:</strong>&nbsp;<?php echo get_theme_mod( 'group_address', 'xthn Scout Group, Scout Hut Lane, Cheshire, WA6 XXX' ); ?><br />
				<?php } // end if ?>
				<?php if( get_theme_mod( 'hide_telephone' ) == '') { ?><strong>Telephone:</strong>&nbsp;<?php echo get_theme_mod( 'group_telephone', '00000 000000' ); ?><?php } // end if ?><br />
				<?php if( get_theme_mod( 'hide_mw' ) == '') { ?>Website built using the <a href="https://mwscouts.org"><b>Mersey Weaver</b></a> <a href="http://fundraising.mwscouts.org/product/skills-for-life-wordpress-theme/">SkillsForLife Wordpress Theme</a><?php } // end if ?>
				</p>
					
				<!-- /copyright -->
		</div><!-- .site-info -->
	</div>	
		
	</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

	<script>
        new WOW().init();
    </script>
    
</body>
</html>
