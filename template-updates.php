<?php
/**
 * Template for updates page
 *
 * @package eventbrite-event
 */

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$updates = new WP_Query( array( "paged" => $paged ) );
?>
<?php get_header(); ?>
			<div class="row">
				<div class="span8">
					<div class="left-col" id="content">
						<h1 class="pagetitle"><?php _e( 'Updates', 'eventbrite-event' ); ?></h1>
						<div class="event-items">
							<div class="event-day">
							<?php if ( have_posts() ) : ?>
								<?php
								$total_posts = $updates->found_posts;
								$total_pages = ceil( $total_posts / get_option("posts_per_page") );
								?>

								<?php while ( $updates->have_posts() ) : $updates->the_post(); ?>
									<!-- loop begins now -->
									<?php get_template_part( 'tmpl/post-loop' ); ?>
								<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
								<?php if ( 0 < $total_pages ) : ?>
									<div class="pagination pagination-centered">
										<?php echo paginate_links( array(
											'base'    => get_pagenum_link( 1 ) . '%_%',
											'format'  => '/page/%#%',
											'current' => $paged,
											'total'   => $total_pages,
											'type'    => 'list',
										) ); ?>
									</div>
								<?php endif; ?>
							<?php else : ?>
								<p><?php _e( 'No updates found', 'eventbrite-event' ); ?></p>
							<?php endif; ?>
							</div> <!-- end event-day -->
						</div> <!-- end event-items -->
					</div> <!-- end left-col -->
				</div> <!-- end span8 -->
				<?php get_sidebar(); ?>
			</div> <!-- end row -->
<?php
get_footer();