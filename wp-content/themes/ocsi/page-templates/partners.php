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
		<p class="placeholder-flag">Draft from public profiles. Confirm before publication.</p>
		<h1><?php the_title(); ?></h1>
		<?php
		get_template_part(
			'template-parts/outline',
			null,
			array(
				'intro'    => 'OCSI’s public profiles name Nestlé Philippines as the principal, for grocery distribution and for Nestlé Professional. No partner logo is shown, because logo use needs the brand owner’s permission.',
				'sections' => array(
					array(
						'title' => 'Partnership overview',
						'text'  => 'OCSI distributes Nestlé products to retail, wholesale, public-market, sari-sari, and food-service customers in the territories it lists. Some profiles call the appointment exclusive. Others say authorized. This site uses “distributor” until OCSI confirms the wording.',
					),
					array(
						'title' => 'Product lines named by OCSI',
						'text'  => 'The Jobstreet company profile lists Nescafé, Milo, Bear Brand, Nestea, Coffee-mate, Nido, Maggi, Chuckie, Nesvita, Nestogen, Nan, KitKat, Crunch, Fox’s, and Polo. Spellings here follow the brand names.',
					),
					array(
						'title' => 'Awards and recognition',
						'text'  => 'No award is listed yet. OCSI can add one after the name, the year, and permission to publish it are confirmed.',
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
