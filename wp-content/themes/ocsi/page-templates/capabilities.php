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
		<p class="placeholder-flag">Placeholder copy</p>
		<h1><?php the_title(); ?></h1>
		<?php
		get_template_part(
			'template-parts/outline',
			null,
			array(
				'intro'    => 'This page can launch as one page with anchored sections. Service claims stay unpublished until OCSI confirms them.',
				'sections' => array(
					array(
						'title' => 'Capabilities overview',
						'id'    => 'overview',
						'text'  => 'A confirmed overview of OCSI services will appear here.',
					),
					array(
						'title' => 'Distribution operations',
						'id'    => 'distribution',
						'text'  => 'Distribution operations will be described after the service list is approved.',
					),
					array(
						'title' => 'Sales and market execution',
						'id'    => 'sales',
						'text'  => 'Sales and market execution will be described after the service list is approved.',
					),
					array(
						'title' => 'Logistics and warehousing',
						'id'    => 'logistics',
						'text'  => 'Warehousing and inventory handling will be described after the service list is approved.',
					),
					array(
						'title' => 'Territory coverage',
						'id'    => 'coverage',
						'text'  => 'Delivery coverage will be described from the verified branch list.',
					),
					array(
						'title' => 'Service standards',
						'id'    => 'standards',
						'text'  => 'Quality and process notes will be added only where they are documented.',
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
