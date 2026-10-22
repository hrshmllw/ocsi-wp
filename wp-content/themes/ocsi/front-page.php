<?php
/**
 * Home page.
 *
 * Layout and copy follow the Figma frame “High Fidelity design mockup”
 * (file YTFqwNWXJQmSOxU4XBAnQ4, node 6:2). The draft banner stays.
 *
 * @package OCSI
 */

get_header();

$about        = ocsi_page_url( 'about-ocsi' );
$network      = ocsi_page_url( 'our-network' );
$capabilities = ocsi_page_url( 'capabilities' );
$careers      = ocsi_page_url( 'careers' );
$contact      = ocsi_page_url( 'contact-us' );
$branches     = get_post_type_archive_link( 'branch' );

$slides = array(
	array(
		'id'    => 'slide-san-fernando',
		'image' => 'capability-sales.jpg',
		'alt'   => 'A merchandiser arranging coffee products on a grocery shelf.',
		'label' => 'San Fernando, Pampanga',
	),
	array(
		'id'     => 'slide-san-pablo',
		'image'  => 'hero-san-pablo.jpg',
		'alt'    => 'OCSI crews loading a delivery truck at a warehouse dock.',
		'label'  => 'San Pablo, Laguna Warehouse · Southern Tagalog Hub',
		'active' => true,
	),
	array(
		'id'    => 'slide-imus',
		'image' => 'capability-logistics.jpg',
		'alt'   => 'A forklift moving pallets inside an OCSI warehouse.',
		'label' => 'Imus, Cavite',
	),
	array(
		'id'    => 'slide-oton',
		'image' => 'people-crews.jpg',
		'alt'   => 'An OCSI field team standing in front of delivery trucks.',
		'label' => 'Oton, Iloilo',
	),
);

$milestones = array(
	array(
		'year'   => '2002',
		'tone'   => 'red',
		'marker' => 'fill',
		'kicker' => 'Central Luzon Anchor',
		'title'  => 'Founded in San Fernando, Pampanga',
		'text'   => 'Established initial FMCG warehousing hub and route-to-market structure for Central Luzon trading posts.',
	),
	array(
		'year'   => '2005',
		'tone'   => 'blue',
		'marker' => 'fill',
		'kicker' => 'Southern Corridors',
		'title'  => 'Expansion to Southern Tagalog',
		'text'   => 'Commissioned operational branches across Cavite, Laguna, and Quezon corridors to support high-density trade.',
	),
	array(
		'year'   => '2007',
		'tone'   => 'red',
		'marker' => 'ring',
		'kicker' => 'Institutional Accord',
		'title'  => 'Authorized Nestlé Professional Distribution',
		'text'   => 'Awarded commercial mandate for dedicated beverage system installations and HORECA food service logistics.',
	),
	array(
		'year'   => '2018',
		'tone'   => 'blue',
		'marker' => 'ring',
		'kicker' => 'Metro Commercial Link',
		'title'  => 'South Greater Manila Hub (Las Piñas)',
		'text'   => 'Launched dedicated cross-docking operations serving Metro South institutions and modern retail channels.',
	),
	array(
		'year'   => '2019',
		'tone'   => 'blue',
		'marker' => 'fill',
		'kicker' => 'Island Reach',
		'title'  => 'Panay & Western Visayas Regional Depot',
		'text'   => 'Inaugurated Oton, Iloilo logistics complex, extending direct distribution lines to Antique, Iloilo, and Guimaras.',
	),
);

$channels = array(
	array(
		'title'     => 'General Trade & Sari-Sari',
		'tag'       => 'High-frequency replenishment',
		'watermark' => array( 'watermark-general.svg', '144', '144' ),
		'icon'      => array( 'icon-general.svg', '20.0939', '18' ),
	),
	array(
		'title'     => 'Modern Trade & Supermarkets',
		'tag'       => 'Key account fulfillment',
		'watermark' => array( 'watermark-modern.svg', '144', '144' ),
		'icon'      => array( 'icon-modern.svg', '19.9815', '20' ),
	),
	array(
		'title'     => 'Wholesalers & Public Markets',
		'tag'       => 'Bulk volume routing',
		'watermark' => array( 'watermark-wholesale.svg', '144', '144' ),
		'icon'      => array( 'icon-wholesale.svg', '20', '20' ),
	),
	array(
		'title'     => 'Food Service & Professional',
		'tag'       => 'Nestlé Professional solutions',
		'watermark' => array( 'watermark-food.svg', '144', '144' ),
		'icon'      => array( 'icon-food.svg', '18', '18' ),
	),
);

$capability_cards = array(
	array(
		'image'  => 'hero-san-pablo.jpg',
		'alt'    => 'OCSI crews loading a delivery truck at a warehouse dock.',
		'kicker' => 'Execution',
		'tone'   => 'red',
		'title'  => 'Distribution Operations',
		'text'   => 'High-frequency route replenishment, field coordination, and dedicated trade account management tailored to the geography of each serviced province.',
		'href'   => $capabilities . '#distribution',
	),
	array(
		'image'  => 'capability-sales.jpg',
		'alt'    => 'A merchandiser arranging coffee products on a grocery shelf.',
		'kicker' => 'Commercial',
		'tone'   => 'blue',
		'title'  => 'Sales & Market Execution',
		'text'   => 'Trained field representatives, consistent point-of-sale visibility, category merchandising standards, and consultative collaboration to support retailer velocity.',
		'href'   => $capabilities . '#sales',
	),
	array(
		'image'  => 'capability-logistics.jpg',
		'alt'    => 'A forklift moving pallets inside an OCSI warehouse.',
		'kicker' => 'Storage & Tech',
		'tone'   => 'red',
		'title'  => 'Logistics & Warehousing',
		'text'   => 'Temperature-controlled ambient storage, rigorous inventory cycle counts, and modern hubs across San Fernando, Imus, San Pablo, Gumaca, Las Piñas, and Oton.',
		'href'   => $capabilities . '#logistics',
	),
);

$people_notes = array(
	array(
		'icon'  => array( 'icon-field.svg', '22', '16' ),
		'title' => 'Frontline Field Excellence',
		'text'  => '100% locally hired drivers, warehousemen, and merchandising professionals embedded in their home communities with deep municipal route familiarity.',
	),
	array(
		'icon'  => array( 'icon-safety.svg', '16', '20' ),
		'title' => 'Safety & Operational Rigor',
		'text'  => 'Stringent ambient and cold-handling protocols, certified fleet safety drills, and routine ergonomic development to safeguard our people every shift.',
	),
	array(
		'icon'  => array( 'icon-tenure.svg', '16', '21' ),
		'title' => 'Long-Tenured Stability',
		'text'  => 'Remarkable team loyalty with continuous career progression from dispatch logistics to depot supervisor and regional branch leadership roles.',
	),
);
?>
<main id="main">
	<div class="draft-banner">
		<div class="wrap draft-banner__inner">
			<p>
				<?php ocsi_icon( 'icon-info.svg', '13.3333', '13.3333' ); ?>
				<strong>Draft Presentation</strong>
				<span> — Content based on public filings and distributor records. Final messaging &amp; partner assets pending stakeholder confirmation.</span>
			</p>
			<p class="draft-banner__chip">Internal review v0.9</p>
		</div>
	</div>

	<section class="hero" data-hero aria-roledescription="carousel" aria-label="OCSI facilities">
		<div class="hero__media">
			<?php foreach ( $slides as $slide ) : ?>
				<?php $active = ! empty( $slide['active'] ); ?>
				<div
					class="hero__slide<?php echo $active ? ' is-active' : ''; ?>"
					id="<?php echo esc_attr( $slide['id'] ); ?>"
					data-slide
					data-label="<?php echo esc_attr( $slide['label'] ); ?>"
					aria-hidden="<?php echo $active ? 'false' : 'true'; ?>"
				>
					<img
						src="<?php echo esc_url( get_theme_file_uri( 'assets/images/home/' . $slide['image'] ) ); ?>"
						alt="<?php echo esc_attr( $slide['alt'] ); ?>"
						width="512"
						height="279"
						<?php echo $active ? 'fetchpriority="high"' : 'loading="lazy"'; ?>
						decoding="async"
					>
				</div>
			<?php endforeach; ?>
			<div class="hero__scrim" aria-hidden="true"></div>
		</div>
		<div class="wrap hero__copy">
			<h1>Nestlé products, distributed by OCSI.</h1>
			<p class="lede">Supplying retailers, public markets, and food-service partners across Luzon and Western Visayas.</p>
			<div class="hero__actions">
				<a class="button" href="<?php echo esc_url( $about ); ?>">Discover OCSI</a>
				<a class="button button--glass" href="<?php echo esc_url( $network ); ?>">Explore Our Network</a>
			</div>
		</div>
		<div class="hero__bar">
			<div class="wrap hero__bar-inner">
				<ul class="hero__stats">
					<li>
						<p class="hero__figure">22<span>+</span></p>
						<p class="hero__stat-label">Years active</p>
					</li>
					<li>
						<p class="hero__figure">6</p>
						<p class="hero__stat-label">Regional depots</p>
					</li>
					<li>
						<p class="hero__figure hero__figure--blush">Daily</p>
						<p class="hero__stat-label">Replenishment</p>
					</li>
				</ul>
				<div class="hero__controls">
					<p class="hero__place">
						<span class="hero__pulse" aria-hidden="true"></span>
						<?php ocsi_icon( 'icon-pin.svg', '10.6667', '13.3333' ); ?>
						<span data-place>San Pablo, Laguna Warehouse · Southern Tagalog Hub</span>
					</p>
					<div class="hero__tabs" role="tablist" aria-label="Facility slides">
						<?php foreach ( $slides as $slide ) : ?>
							<?php $active = ! empty( $slide['active'] ); ?>
							<button
								type="button"
								role="tab"
								id="<?php echo esc_attr( 'tab-' . $slide['id'] ); ?>"
								aria-controls="<?php echo esc_attr( $slide['id'] ); ?>"
								aria-selected="<?php echo $active ? 'true' : 'false'; ?>"
								tabindex="<?php echo $active ? '0' : '-1'; ?>"
							>
								<span class="visually-hidden"><?php echo esc_html( $slide['label'] ); ?></span>
							</button>
						<?php endforeach; ?>
					</div>
					<button class="hero__pause" type="button" data-pause aria-pressed="false">Pause</button>
				</div>
			</div>
		</div>
	</section>

	<section class="intro" id="heritage" aria-labelledby="heritage-title">
		<div class="wrap">
			<div class="intro__card">
				<div class="intro__copy">
					<div>
						<p class="eyebrow">Organizational heritage</p>
						<h2 id="heritage-title">Two Decades of Supply Chain Reliability</h2>
						<p>Established in 2002 in San Fernando, Pampanga, Optimized Customer Solutions, Inc. (OCSI) has grown from a regional operations base into a vital link within the Philippine consumer goods network. Over the last twenty-two years, we have systematically reinforced route architecture, storage integrity, and localized merchant support.</p>
						<p>Today, our strategic footprints across Central Luzon, Southern Tagalog, South Greater Manila, and Western Visayas support everyday availability. We operate on foundational values: rigorous logistics discipline, transparent partner relationships, and frontline personnel trained to execute with institutional precision.</p>
					</div>
					<p class="intro__more">
						<a class="text-link" href="<?php echo esc_url( $about ); ?>">
							Read more about our journey and leadership
							<?php ocsi_icon( 'icon-arrow.svg', '10.6667', '10.6667' ); ?>
						</a>
					</p>
				</div>
				<div class="timeline-panel">
					<div class="timeline-panel__head">
						<p>
							<?php ocsi_icon( 'icon-milestone.svg', '16.25', '13.3333' ); ?>
							<span>Corridor expansion milestones</span>
						</p>
						<p class="timeline-panel__range">2002 — Present</p>
					</div>
					<div class="timeline">
						<?php ocsi_icon( 'timeline-line.png', '2', '480', 'timeline__line' ); ?>
						<ol>
						<?php foreach ( $milestones as $item ) : ?>
							<li class="timeline__item timeline__item--<?php echo esc_attr( $item['tone'] ); ?> timeline__item--<?php echo esc_attr( $item['marker'] ); ?>">
								<p class="timeline__year">
									<span><?php echo esc_html( $item['year'] ); ?></span>
									<?php echo esc_html( $item['kicker'] ); ?>
								</p>
								<p class="timeline__title"><?php echo esc_html( $item['title'] ); ?></p>
								<p><?php echo esc_html( $item['text'] ); ?></p>
							</li>
						<?php endforeach; ?>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="channels" id="coverage" aria-labelledby="coverage-title">
		<div class="wrap">
			<div class="section-head">
				<div>
					<p class="eyebrow">Coverage architecture</p>
					<h2 id="coverage-title">Where the Work Happens</h2>
					<p>Orchestrating daily trade flow across traditional community retailers and structured commercial enterprises.</p>
				</div>
				<p class="section-head__meta">Multichannel Distribution Infrastructure</p>
			</div>
			<ul class="channel-grid">
				<?php foreach ( $channels as $channel ) : ?>
					<li class="channel">
						<?php ocsi_icon( $channel['watermark'][0], $channel['watermark'][1], $channel['watermark'][2], 'channel__watermark' ); ?>
						<span class="channel__badge">
							<?php ocsi_icon( $channel['icon'][0], $channel['icon'][1], $channel['icon'][2] ); ?>
						</span>
						<h3><?php echo esc_html( $channel['title'] ); ?></h3>
						<p class="channel__tag"><?php echo esc_html( $channel['tag'] ); ?></p>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>

	<section class="capabilities" id="capabilities" aria-labelledby="capabilities-title">
		<div class="wrap">
			<div class="section-intro">
				<p class="eyebrow">Core competencies</p>
				<h2 id="capabilities-title">Capabilities Designed for FMCG Scale</h2>
				<p>Institutional systems ensuring stock integrity, accurate forecasting, and disciplined route governance.</p>
			</div>
			<ul class="cap-grid">
				<?php foreach ( $capability_cards as $card ) : ?>
					<li class="cap-card">
						<div class="cap-card__photo">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/home/' . $card['image'] ) ); ?>" alt="<?php echo esc_attr( $card['alt'] ); ?>" width="512" height="279" loading="lazy" decoding="async">
						</div>
						<div class="cap-card__body">
							<p class="cap-card__kicker cap-card__kicker--<?php echo esc_attr( $card['tone'] ); ?>"><?php echo esc_html( $card['kicker'] ); ?></p>
							<h3><?php echo esc_html( $card['title'] ); ?></h3>
							<p><?php echo esc_html( $card['text'] ); ?></p>
							<p class="cap-card__more">
								<a class="text-link" href="<?php echo esc_url( $card['href'] ); ?>">
									Learn more
									<?php ocsi_icon( 'icon-arrow.svg', '10.6667', '10.6667' ); ?>
								</a>
							</p>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>

	<section class="people" id="people" aria-labelledby="people-title">
		<div class="wrap">
			<div class="section-intro section-intro--wide">
				<p class="eyebrow eyebrow--red">Our workforce &amp; people</p>
				<h2 id="people-title">Built on Dedicated People &amp; Local Execution</h2>
				<p>From warehouse associates and transport drivers to inventory coordinators and field sales specialists, our workforce drives everyday FMCG availability in communities across Luzon and Western Visayas. Our strength lies in long-tenured field professionals who know local trade routes, market habits, and customer priorities.</p>
			</div>
			<div class="people__grid">
				<figure class="people__photo">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/home/people-crews.jpg' ) ); ?>" alt="An OCSI field team standing in front of delivery trucks." width="512" height="279" loading="lazy" decoding="async">
					<figcaption>
						<p class="people__kicker">Field teams &amp; logistics crews</p>
						<p class="people__caption-title">The Frontline That Keeps Philippine Pantries Stocked</p>
						<p>Over 500 dedicated logistics, dispatch, and commercial personnel executing daily deliveries across 6 provincial operating hubs.</p>
					</figcaption>
				</figure>
				<ul class="people__notes">
					<?php foreach ( $people_notes as $note ) : ?>
						<li>
							<span class="people__badge">
								<?php ocsi_icon( $note['icon'][0], $note['icon'][1], $note['icon'][2] ); ?>
							</span>
							<div>
								<h3><?php echo esc_html( $note['title'] ); ?></h3>
								<p><?php echo esc_html( $note['text'] ); ?></p>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="hiring">
				<div class="hiring__lead">
					<span class="hiring__badge">
						<?php ocsi_icon( 'icon-briefcase.svg', '20', '20' ); ?>
					</span>
					<div>
						<p class="hiring__title">
							Current Openings Across 6 Regional Operating Hubs
							<span>Actively hiring</span>
						</p>
						<p>Roles open in Pampanga, Cavite, Laguna, Quezon, Las Piñas, and Iloilo for field sales, fleet dispatch, and warehouse operations.</p>
					</div>
				</div>
				<a class="button button--blue" href="<?php echo esc_url( $careers ); ?>">
					Explore Careers &amp; Openings
					<?php ocsi_icon( 'icon-arrow-light.svg', '10.6667', '10.6667' ); ?>
				</a>
			</div>
		</div>
	</section>

	<section class="cta" aria-labelledby="partner-title">
		<?php ocsi_icon( 'watermark-partner.svg', '224', '224', 'cta__watermark' ); ?>
		<div class="wrap cta__inner">
			<div>
				<p class="cta__pill"><span aria-hidden="true"></span> Direct engagement</p>
				<h2 id="partner-title">Partner with OCSI</h2>
				<p>Looking to expand your FMCG distribution network or explore trade partnerships? Our management and regional dispatch offices are ready to assist.</p>
			</div>
			<div class="cta__actions">
				<a class="button" href="<?php echo esc_url( $contact ); ?>">Contact Our Team</a>
				<a class="button button--ghost" href="<?php echo esc_url( $branches ); ?>">Find Nearest Branch</a>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();
