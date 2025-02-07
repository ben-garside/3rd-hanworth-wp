<?php
/**
 * Single Event Template
 *
 * A single event complete template, divided in smaller template parts.
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/single-event-blocks.php
 *
 * See more documentation about our Blocks Editor templating system.
 *
 * @link {INSERT_ARTCILE_LINK_HERE}
 *
 * @version 4.7
 *
 */

$event_id = $this->get( 'post_id' );

$is_recurring = '';

if ( ! empty( $event_id ) && function_exists( 'tribe_is_recurring_event' ) ) {
	$is_recurring = tribe_is_recurring_event( $event_id );
}

// check if the post has a Post Thumbnail assigned to it.
if ( has_post_thumbnail() ) {
?>

<div class="sub-header">
<div class="sub-header-background" style="background: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>') no-repeat center;  -webkit-background-size: cover;  -moz-background-size: cover;  -o-background-size: cover;  background-size: cover;">
	<div style="background: rgba(0, 0, 0, 0.4); height:220px;")>
	<div class="sub-header-overlay">
		<div class="wrapper">
				<h1><?php echo get_the_title( get_the_ID() ); ?></h1>
				<h4><?php global $post; echo get_post_meta($post->ID, 'sub-header-subtitle', true); ?></h4>
		</div>
	</div>
	</div>
</div>
</div>

	<div class="clear"></div>
<?php } ?>

<div class="wrapper">

<div id="tribe-events-content" class="tribe-events-single tribe-blocks-editor">
	<?php // $this->template( 'single-event/back-link' ); ?>
	<?php $this->template( 'single-event/notices' ); ?>
	<?php $this->template( 'single-event/title' ); ?>
	<?php if ( $is_recurring ) { ?>
		<?php $this->template( 'single-event/recurring-description' ); ?>
	<?php } ?>
	<?php $this->template( 'single-event/content' ); ?>
	<?php $this->template( 'single-event/comments' ); ?>
	<?php $this->template( 'single-event/footer' ); ?>
</div>
</div>