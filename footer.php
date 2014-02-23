<?php
/**
 * Template for global footer
 *
 * @package eventbrite-parent
 */
?>
	</div>
</section>
<footer class="site-footer row" role="contentinfo">
	<div class="container">
		<?php wp_nav_menu( array(
					'theme_location'  => 'secondary',
					'container_class' => 'pull-right',
					'fallback_cb'     => '__return_false'
				) ); ?>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
