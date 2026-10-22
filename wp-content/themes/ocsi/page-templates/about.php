<?php
/**
 * Template Name: About OCSI
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
				'intro'    => 'Optimized Customer Solutions, Inc. distributes Nestlé products. Public profiles date the start to 2002 in Pampanga, with later sites in Cavite, Laguna, Quezon, southern Metro Manila, and Western Visayas.',
				'sections' => array(
					array(
						'title' => 'Company overview',
						'text'  => 'OCSI’s Jobstreet profile describes distribution of Nestlé products in Laguna, Pampanga, Cavite, Marinduque, Las Piñas, Muntinlupa, and Parañaque, with offices in San Pablo City, San Fernando, Imus, and Gumaca. The same profile says the group has sister companies that carry other principals. Those companies are not named.',
					),
					array(
						'title' => 'History',
						'text'  => '2002: distribution in Pampanga. 2005: Lower Cavite and Upper Laguna, later extended through those provinces into Quezon and Marinduque, plus Las Piñas, Muntinlupa, and Parañaque. 2007: Nestlé Professional in the covered areas. About ten years in, a warehouse in the City of San Fernando. 2018: Nestlé Professional for South Greater Manila, with a warehouse in Las Piñas. August 2019: Iloilo, covering Iloilo, Antique, and Guimaras.',
					),
					array(
						'title' => 'Still to be supplied',
						'text'  => 'Mission, vision, values, and leadership names will be added when OCSI supplies them.',
					),
					array(
						'title' => 'Working with the principal',
						'text'  => 'The principal named across the profiles is Nestlé Philippines, for grocery distribution and for Nestlé Professional food service. Product names are on the partners page.',
					),
				),
			)
		);
		?>
		<p><a class="button" href="<?php echo esc_url( ocsi_page_url( 'capabilities' ) ); ?>">Explore capabilities</a></p>
		<?php ocsi_the_editable_content(); ?>
	</main>
	<?php
endwhile;

get_footer();
