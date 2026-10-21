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
		<p class="placeholder-flag">Placeholder copy</p>
		<h1><?php the_title(); ?></h1>
		<?php
		get_template_part(
			'template-parts/outline',
			null,
			array(
				'intro'    => 'Approved company profile, founding date, and leadership details are still required before this page can be published.',
				'sections' => array(
					array(
						'title' => 'Company overview',
						'text'  => 'Positioning copy will be added after OCSI approves the company profile.',
					),
					array(
						'title' => 'History and milestones',
						'text'  => 'Historical milestones will be added only from verified records.',
					),
					array(
						'title' => 'Mission and vision',
						'text'  => 'The official mission and vision will appear here.',
					),
					array(
						'title' => 'Core values',
						'text'  => 'Core values will appear here after they are confirmed.',
					),
					array(
						'title' => 'Leadership',
						'text'  => 'Leadership biographies will be included only if OCSI approves them.',
					),
					array(
						'title' => 'Working with partners',
						'text'  => 'A description of how OCSI works with partners will be added after review.',
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
