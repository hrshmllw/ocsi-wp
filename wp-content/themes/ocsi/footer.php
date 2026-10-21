<?php
/**
 * Site footer.
 *
 * @package OCSI
 */
?>
<footer class="site-footer">
	<div class="wrap site-footer__inner">
		<p class="site-footer__name">Optimized Customer Solutions, Inc.</p>
		<p>Content on this site is placeholder until OCSI approves it for publication.</p>
		<ul class="site-footer__links">
			<li><a href="<?php echo esc_url( ocsi_page_url( 'contact-us' ) ); ?>">Contact Us</a></li>
			<li><a href="<?php echo esc_url( ocsi_page_url( 'privacy-policy' ) ); ?>">Privacy Policy</a></li>
			<li><a href="<?php echo esc_url( get_post_type_archive_link( 'branch' ) ); ?>">Branch directory</a></li>
			<li><a href="<?php echo esc_url( get_post_type_archive_link( 'job' ) ); ?>">Open positions</a></li>
		</ul>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
