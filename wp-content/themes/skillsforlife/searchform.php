<?php
/**
 * The template for displaying search forms in Underscores.me
 *
 * @package Underscores.me
 * @since Underscores.me 1.0
 */
?>
<div class="search-header">
<div class="search-wrapper">
<div id="SearchOverlay" class="Search-overlay">
  <span class="closebtn" onclick="closeSearch()" title="Close Overlay">x</span>
  <div class="Search-overlay-content">
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'skillsforlife' ); ?></label>
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'skillsforlife' ); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'skillsforlife' ); ?>" />
	</form>
  </div>
</div>
</div>
</div>
