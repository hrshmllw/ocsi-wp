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
		<p class="placeholder-flag">Placeholder copy</p>
		<h1><?php the_title(); ?></h1>
		<?php
		get_template_part(
			'template-parts/outline',
			null,
			array(
				'intro'    => 'The directory below is managed in WordPress. A coverage map is optional and is not part of this scaffold.',
				'sections' => array(
					array(
						'title' => 'Coverage overview',
						'text'  => 'A regional overview will be written from the verified branch list.',
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
