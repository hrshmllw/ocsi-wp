<?php
/**
 * Template Name: Careers
 *
 * @package OCSI
 */

get_header();

$jobs = ocsi_directory_query( 'job' );

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
				'intro'    => 'HR publishes and closes vacancies in WordPress. Applications leave the site through an approved link. CVs are not stored here.',
				'sections' => array(
					array(
						'title' => 'Where people work',
						'text'  => 'Public job listings place OCSI teams in San Fernando, Imus, San Pablo City, Gumaca, Las Piñas, and Oton. Recent openings have included sales supervisors, salespeople, and a Nestlé Professional supervisor in Cavite.',
					),
					array(
						'title' => 'Benefits',
						'text'  => 'Benefits will be listed when OCSI confirms the current package.',
					),
					array(
						'title' => 'How to apply',
						'text'  => 'A vacancy appears below only when it is published in WordPress. Each one can link to an application page. That destination is still to be chosen, so no sample vacancy is shown.',
					),
				),
			)
		);
		?>
		<h2>Open positions</h2>
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
		<p><a href="<?php echo esc_url( get_post_type_archive_link( 'job' ) ); ?>">View all vacancies</a></p>
		<?php ocsi_the_editable_content(); ?>
	</main>
	<?php
endwhile;

get_footer();
