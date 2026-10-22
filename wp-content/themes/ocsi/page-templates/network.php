<?php
/**
 * Template Name: Our Network
 *
 * @package OCSI
 */

get_header();

$branches = ocsi_directory_query( 'branch' );

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
				'intro'    => 'Each location below is a branch entry in WordPress, filled from PhilJobNet, Jobstreet, and an FDA establishment record. Phone numbers and opening hours were not in those sources.',
				'sections' => array(
					array(
						'title' => 'Coverage overview',
						'text'  => 'Luzon coverage named in the profiles runs through Pampanga, Cavite, Laguna, Quezon, Marinduque, Las Piñas, Muntinlupa, and Parañaque. Western Visayas coverage is Iloilo, Antique, and Guimaras. Marinduque is listed as coverage, not as a separate office. A map is not drawn until OCSI confirms the territory.',
					),
				),
			)
		);
		?>
		<h2>Branch directory</h2>
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
		<p><a href="<?php echo esc_url( get_post_type_archive_link( 'branch' ) ); ?>">Open the branch archive</a></p>
		<p><a class="button" href="<?php echo esc_url( ocsi_page_url( 'contact-us' ) ); ?>">Contact our team</a></p>
		<?php ocsi_the_editable_content(); ?>
	</main>
	<?php
endwhile;

get_footer();
