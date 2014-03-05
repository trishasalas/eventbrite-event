<?php
/**
 * Template for sidebar
 *
 * @package eventbrite-single
 */
?>

<?php
if ( eventbrite_event_get_page_id( 'event-info' ) == get_queried_object_id() ) {
	$events     = eventbrite_event_api_get_featured_events();
	$event      = array_shift( $events );
	$event      = is_null( $event ) ? false : $event->event;
	$venue_info = eventbrite_event_get_venue_address( $event );
	$map_url    = eventbrite_event_get_venue_google_map_url( $event );

	$venue_info = eventbrite_event_get_venue_address( $event );
	if ( isset( $venue_info['mailing-address'] ) )
		$address = $venue_info['mailing-address'];
}
?>

<aside class="span4" role="complementary">
	<div class="sidebar">
		<?php if ( ! empty( $map_url ) || ! empty( $address ) ) : ?>
			<div class="event-location widget">
				<h2 class="widget-title"><?php _e( 'Location', 'eventbrite-multi' ); ?></h2>

				<?php if ( $map_url ) : ?>
					<img class="event-map" src="<?php echo esc_url( $map_url ); ?>" />
				<?php endif; ?>

				<?php if ( ! empty( $address ) ) : ?>
					<p class="venue-address">
					<?php foreach ( $address as $key => $line ) : ?>
						<span class="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $line ); ?></span><br/>
					<?php endforeach; ?>
					</p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</aside>
