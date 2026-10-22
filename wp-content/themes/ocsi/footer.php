<?php
/**
 * Site footer.
 *
 * @package OCSI
 */

$capabilities = ocsi_page_url( 'capabilities' );
$network      = ocsi_page_url( 'our-network' );
?>
<footer class="site-footer">
	<div class="wrap">
		<div class="site-footer__grid">
			<div class="site-footer__brand">
				<p class="site-footer__name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">OCSI</a></p>
				<p>Institutional FMCG distribution, cold-ambient logistics, and localized retail execution across Luzon and Western Visayas.</p>
				<p class="site-footer__partner">
					<?php ocsi_icon( 'icon-partner.svg', '14.6667', '14' ); ?>
					<span>Nestlé Distributor Partner</span>
				</p>
			</div>
			<nav aria-label="Company">
				<h2>Company</h2>
				<ul>
					<li><a href="<?php echo esc_url( ocsi_page_url( 'about-ocsi' ) ); ?>">About OCSI</a></li>
					<li><a href="<?php echo esc_url( ocsi_page_url( 'about-ocsi' ) ); ?>">Heritage &amp; Leadership</a></li>
					<li><a href="<?php echo esc_url( ocsi_page_url( 'our-partners' ) ); ?>">Principal Partnerships</a></li>
				</ul>
			</nav>
			<nav aria-label="Capabilities">
				<h2>Capabilities</h2>
				<ul>
					<li><a href="<?php echo esc_url( $capabilities . '#distribution' ); ?>">Distribution Operations</a></li>
					<li><a href="<?php echo esc_url( $capabilities . '#sales' ); ?>">Sales &amp; Merchandising</a></li>
					<li><a href="<?php echo esc_url( $capabilities . '#logistics' ); ?>">Logistics &amp; Warehousing</a></li>
				</ul>
			</nav>
			<nav aria-label="Network">
				<h2>Network</h2>
				<ul>
					<li><a href="<?php echo esc_url( $network ); ?>">Regional Operating Hubs</a></li>
					<li><a href="<?php echo esc_url( get_post_type_archive_link( 'branch' ) ); ?>">Depot Locations</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#coverage' ) ); ?>">Coverage Architecture</a></li>
				</ul>
			</nav>
			<nav aria-label="Connect">
				<h2>Connect</h2>
				<ul>
					<li><a href="<?php echo esc_url( ocsi_page_url( 'careers' ) ); ?>">Careers &amp; Openings</a></li>
					<li><a href="<?php echo esc_url( ocsi_page_url( 'contact-us' ) ); ?>">Trade Inquiries</a></li>
					<li><a href="<?php echo esc_url( ocsi_page_url( 'contact-us' ) ); ?>">Contact Head Office</a></li>
				</ul>
			</nav>
		</div>
		<div class="site-footer__base">
			<p>Optimized Customer Solutions, Inc. (OCSI) — FMCG Distribution Partner since 2002. San Fernando, Pampanga, Philippines.</p>
			<ul>
				<li><a href="<?php echo esc_url( ocsi_page_url( 'privacy-policy' ) ); ?>">Privacy Policy</a></li>
				<li><a href="<?php echo esc_url( ocsi_page_url( 'terms-of-service' ) ); ?>">Terms of Service</a></li>
				<li><a href="<?php echo esc_url( ocsi_page_url( 'compliance' ) ); ?>">Compliance</a></li>
			</ul>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
