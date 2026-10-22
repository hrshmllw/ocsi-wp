<?php
/**
 * Template Name: Capabilities
 *
 * @package OCSI
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<main id="main" class="wrap page-main">
		<p class="placeholder-flag">Draft from public profiles. Confirm before publication.</p>
		<h1><?php the_title(); ?></h1>
		<?php
		get_template_part(
			'template-parts/outline',
			null,
			array(
				'intro'    => 'The work described in OCSI’s profiles is distribution, field sales, and warehousing for Nestlé grocery and Nestlé Professional lines.',
				'sections' => array(
					array(
						'title' => 'Capabilities overview',
						'id'    => 'overview',
						'text'  => 'OCSI supplies retailers, wholesalers, public markets, sari-sari stores, restaurants, offices, and other food-service customers. Outlet counts and fleet size are not published here.',
					),
					array(
						'title' => 'Distribution operations',
						'id'    => 'distribution',
						'text'  => 'Grocery lines move through retail, wholesale, public markets, and sari-sari stores in the territories OCSI lists. Food-service customers are covered under Nestlé Professional.',
					),
					array(
						'title' => 'Sales and market execution',
						'id'    => 'sales',
						'text'  => 'Job listings describe territory sales work: sales supervisors for Nestlé distribution, salespeople covering assigned areas, and a Nestlé Professional supervisor role advertised for Cavite.',
					),
					array(
						'title' => 'Logistics and warehousing',
						'id'    => 'logistics',
						'text'  => 'PhilJobNet describes a warehouse OCSI built in the City of San Fernando, Pampanga. Later listings add warehouses in Imus, San Pablo City, Las Piñas, Gumaca, and Oton, Iloilo. An earlier Iloilo profile used Mandurriao; later listings use Barangay Pakiad, Oton.',
					),
					array(
						'title' => 'Territory coverage',
						'id'    => 'coverage',
						'text'  => 'Profiles name Laguna, Pampanga, Cavite, Quezon, Marinduque, Las Piñas, Muntinlupa, and Parañaque. The Iloilo operation, from August 2019, covers Iloilo, Antique, and Guimaras. Street addresses are on the network page only where a listing published one.',
					),
				),
			)
		);
		?>
		<p><a class="button" href="<?php echo esc_url( ocsi_page_url( 'contact-us' ) ); ?>">Contact our team</a></p>
		<?php ocsi_the_editable_content(); ?>
	</main>
	<?php
endwhile;

get_footer();
