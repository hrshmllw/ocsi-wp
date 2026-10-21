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
		<p class="placeholder-flag">Placeholder copy</p>
		<h1><?php the_title(); ?></h1>
		<?php
		get_template_part(
			'template-parts/outline',
			null,
			array(
				'intro'    => 'HR publishes and closes vacancies in WordPress. Applications leave the site through an approved link. CVs are not stored here.',
				'sections' => array(
					array(
						'title' => 'Life at OCSI',
						'text'  => 'Workplace and culture copy will be added after OCSI approves it.',
					),
					array(
						'title' => 'Benefits',
						'text'  => 'Benefits will be listed only where they are confirmed.',
					),
					array(
						'title' => 'How to apply',
						'text'  => 'Each vacancy links to an approved application destination. That destination is still to be chosen.',
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
