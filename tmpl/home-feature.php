<?php
/**
 * Template part for featured carousel
 *
 * @package eventbrite-event
 */

$featured = eb_api_get_featured_events();
if ( count( $featured ) > 0 ) : $event = array_shift($featured)->event;
$wp_event_url = eb_get_wp_event_url( $event );
?>
<div id="myCarousel" class="eb-carousel carousel slide">
	<div class="carousel-inner">
		<div class="active item">
			<?php if ( ! empty( $event->logo ) ) : ?>
			<div class="carousel-thumb">
				<?php if ( $wp_event_url ) : ?><a href="<?php echo esc_url( $wp_event_url ); ?>"><?php endif; ?>
				<img src="<?php echo esc_url( $event->logo ); ?>"/>
				<?php if ( $wp_event_url ) : ?></a><?php endif; ?>
			</div>
			<?php endif; ?>

			<div class="carousel-text">
				<a href="<?php echo esc_url( eb_get_eb_event_url( $event ) ); ?>" class="btn"><?php echo esc_html( eb_get_call_to_action() ); ?></a>
				<h3>
					<?php if ( $wp_event_url ) : ?><a href="<?php echo esc_url( $wp_event_url ); ?>"><?php endif; ?>
					<?php echo esc_html( $event->title ); ?>
					<?php if ( $wp_event_url ) : ?></a><?php endif; ?>
				</h3>
				<p><?php echo eb_get_event_excerpt( $event->description, 70 ); ?></p>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
