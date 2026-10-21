<?php
/**
 * Template Name: Our Partners
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
				'intro'    => 'Partner logos and award claims will be shown only after OCSI approves them for public use.',
				'sections' => array(
					array(
						'title' => 'Partnership overview',
						'text'  => 'An explanation of OCSI’s role with brand principals will be added after review.',
					),
					array(
						'title' => 'Authorized brand assets',
						'text'  => 'No logos are displayed until written approval is on file.',
					),
					array(
						'title' => 'Awards and recognition',
						'text'  => 'Awards will be listed only when OCSI confirms them.',
					),
				),
			)
		);
		?>
		<p><a class="button" href="<?php echo esc_url( ocsi_page_url( 'contact-us' ) ); ?>">Discuss a partnership</a></p>
		<?php ocsi_the_editable_content(); ?>
	</main>
	<?php
endwhile;

get_footer();
