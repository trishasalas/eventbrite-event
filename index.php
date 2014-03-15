<?php
/**
 * Default template
 *
 * @package eventbrite-event
 */

get_header();
?>
			<div class="row">
				<div class="span8">
					<div class="left-col event-home-loop" id="content">
						<?php if ( class_exists( 'Voce_Eventbrite_API' ) ) : ?>
							<?php get_template_part( 'tmpl/home-feature' ); ?>
						<?php endif; ?>
						<h1 class="pagetitle"><?php _e( 'Latest Event Updates', 'eventbrite-event' ); ?></h1>
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'tmpl/post-loop' ); ?>
						<?php endwhile; ?>
							<?php eventbrite_event_paging_nav(); ?>
						<?php endif; ?>
					</div>
				</div>
				<?php get_sidebar(); ?>
			</div>
<?php
get_footer();