<?php
/**
 * Template for attend event page
 *
 * @package eventbrite-event
 */

get_header();

$events              = eb_api_get_featured_events();
$event               = array_shift( $events );
$event               = is_null( $event )    ? false                                : $event->event;
$event_date_timespan = ( false !== $event ) ? eb_get_event_date_timespan( $event ) : false;
?>
			<div class="row">
				<div class="span8">
					<div class="left-col">
						<div class="well">

						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

							<?php if ( ! empty( $event->title ) ) : ?>
								<h1><?php _e( 'Attend:', 'eventbrite-event' ); ?> <?php echo esc_html( $event->title ); ?></h1>
							<?php else : ?>
								<h1><?php the_title(); ?></h1>
							<?php endif; ?>

							<?php if ( ! is_wp_error( $event_date_timespan ) ) : ?>
								<p class="date"><strong><?php echo esc_html( $event_date_timespan ); ?></strong></p>
							<?php endif; ?>

							<?php if ( ! empty( $event->id ) ) : ?>
								<div class="ticket-info">
									<?php eb_print_ticket_widget( $event->id, '210px' ); ?>
								</div>
							<?php endif; ?>

							<div class="post-entry">
								<?php the_content(); ?>
							</div>

							<?php if ( comments_open() || '0' != get_comments_number() ) : ?>
								<hr/>
								<div class="post-<?php the_ID(); ?>-comments"><?php comments_template(); ?></div>
							<?php endif; ?>

							</div>
						<?php endwhile; endif; ?>

						</div>
					</div>
				</div>
				<?php get_sidebar(); ?>
			</div>
<?php
get_footer();
