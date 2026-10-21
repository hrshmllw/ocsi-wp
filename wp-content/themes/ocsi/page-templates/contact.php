<?php
/**
 * Template Name: Contact
 *
 * The inquiry form is intentionally not active. InfinityFree and many
 * local setups cannot deliver PHP mail reliably, and the brief requires
 * tested delivery before a form collects personal information.
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
		<p class="prose">Official headquarters address, phone, and email are not entered yet. They will be added when OCSI provides them.</p>
		<h2>Inquiry form</h2>
		<p class="prose">The form is not active. It will be connected after an external mail account is configured and a test message reaches the right inbox.</p>
		<p>Planned fields:</p>
		<ul class="field-list">
			<li>Full name</li>
			<li>Work email</li>
			<li>Company name</li>
			<li>Inquiry category</li>
			<li>Contact number</li>
			<li>Message</li>
			<li>Privacy notice acknowledgment</li>
		</ul>
		<p>Recruitment questions belong on the <a href="<?php echo esc_url( ocsi_page_url( 'careers' ) ); ?>">Careers</a> page. Branch phones and addresses are in the <a href="<?php echo esc_url( ocsi_page_url( 'our-network' ) ); ?>">branch directory</a>.</p>
		<?php ocsi_the_editable_content(); ?>
	</main>
	<?php
endwhile;

get_footer();
