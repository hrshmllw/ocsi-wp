<?php
/**
 * Home page.
 *
 * Placeholder sections follow the project brief. They do not state
 * unverified company facts.
 *
 * @package OCSI
 */

get_header();

$branches = ocsi_directory_query( 'branch', 3 );
$jobs     = ocsi_directory_query( 'job', 3 );
?>
<main id="main">
	<section class="hero">
		<div class="wrap hero__grid">
			<div>
				<p class="mark" aria-hidden="true"></p>
				<p class="eyebrow">Distribution That Connects</p>
				<h1>Moving Brands Forward.</h1>
				<p class="lede">Connecting products, businesses, and communities through distribution.</p>
				<p class="placeholder-flag">Proposed copy. Not approved company messaging.</p>
				<div class="hero-actions">
					<a class="button" href="<?php echo esc_url( ocsi_page_url( 'about-ocsi' ) ); ?>">Discover OCSI</a>
					<a class="button button--quiet" href="<?php echo esc_url( ocsi_page_url( 'our-network' ) ); ?>">Explore Our Network</a>
				</div>
			</div>
			<div class="photo-slot">
				<p>Placeholder for an approved operations photograph.</p>
			</div>
		</div>
	</section>

	<section class="band">
		<div class="wrap">
			<h2>Company introduction</h2>
			<p>A short company profile will appear here after OCSI approves it. Years of operation will be added only if they are verified.</p>
			<p><a href="<?php echo esc_url( ocsi_page_url( 'about-ocsi' ) ); ?>">Read the company overview</a></p>
		</div>
	</section>

	<section class="band band--sage">
		<div class="wrap">
			<h2>Key strengths</h2>
			<p>Three or four verified strengths will be listed here after management approves them. Unsupported figures, such as outlet counts or fleet size, will not be published.</p>
		</div>
	</section>

	<section class="band">
		<div class="wrap">
			<h2>Capabilities</h2>
			<p>These section names come from the proposed sitemap. OCSI still needs to confirm which services to publish.</p>
			<ul class="cards">
				<li class="card">
					<div class="card__photo"><p>Placeholder photograph</p></div>
					<h3>Distribution operations</h3>
					<p>A short explanation will be added after the service list is approved.</p>
					<a class="text-link" href="<?php echo esc_url( ocsi_page_url( 'capabilities' ) . '#distribution' ); ?>">Read about distribution</a>
				</li>
				<li class="card">
					<div class="card__photo"><p>Placeholder photograph</p></div>
					<h3>Sales and market execution</h3>
					<p>A short explanation will be added after the service list is approved.</p>
					<a class="text-link" href="<?php echo esc_url( ocsi_page_url( 'capabilities' ) . '#sales' ); ?>">Read about sales execution</a>
				</li>
				<li class="card">
					<div class="card__photo"><p>Placeholder photograph</p></div>
					<h3>Logistics and warehousing</h3>
					<p>A short explanation will be added after the service list is approved.</p>
					<a class="text-link" href="<?php echo esc_url( ocsi_page_url( 'capabilities' ) . '#logistics' ); ?>">Read about logistics</a>
				</li>
			</ul>
		</div>
	</section>

	<section class="band">
		<div class="wrap">
			<h2>Distribution network</h2>
			<p class="prose">Published branch records appear below. A coverage summary will be added when the branch list is verified.</p>
			<?php if ( $branches->have_posts() ) : ?>
				<ul class="directory">
					<?php
					while ( $branches->have_posts() ) :
						$branches->the_post();
						get_template_part( 'template-parts/branch', 'row' );
					endwhile;
					wp_reset_postdata();
					?>
				</ul>
			<?php else : ?>
				<p>No branches have been published.</p>
			<?php endif; ?>
			<p><a href="<?php echo esc_url( ocsi_page_url( 'our-network' ) ); ?>">View the full directory</a></p>
		</div>
	</section>

	<section class="band">
		<div class="wrap">
			<h2>Partners and recognition</h2>
			<p>Approved partner logos, awards, and milestones will appear here. Nothing will be shown until OCSI confirms it may be published.</p>
			<p><a href="<?php echo esc_url( ocsi_page_url( 'our-partners' ) ); ?>">Partnership overview</a></p>
		</div>
	</section>

	<section class="band">
		<div class="wrap">
			<h2>People and careers</h2>
			<p class="prose">Employee photography and a description of working at OCSI will be added after approval. Open roles are managed in WordPress.</p>
			<?php if ( $jobs->have_posts() ) : ?>
				<ul class="directory">
					<?php
					while ( $jobs->have_posts() ) :
						$jobs->the_post();
						get_template_part( 'template-parts/job', 'row' );
					endwhile;
					wp_reset_postdata();
					?>
				</ul>
			<?php else : ?>
				<p>No vacancies are open.</p>
			<?php endif; ?>
			<p><a href="<?php echo esc_url( ocsi_page_url( 'careers' ) ); ?>">See careers at OCSI</a></p>
		</div>
	</section>

	<section class="band">
		<div class="wrap">
			<h2>Contact the company</h2>
			<p>Business and general inquiries will use a form once email delivery is configured and tested.</p>
			<p><a class="button" href="<?php echo esc_url( ocsi_page_url( 'contact-us' ) ); ?>">Contact our team</a></p>
		</div>
	</section>
</main>
<?php
get_footer();
