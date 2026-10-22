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
		<p class="placeholder-flag">Draft from public profiles. Confirm before publication.</p>
		<h1><?php the_title(); ?></h1>
		<p class="prose">The address repeated on PhilJobNet and the FDA record is MacArthur Highway, Barangay Saguin, City of San Fernando, Pampanga. No public phone number or email address was found in those listings, so none is printed here. Other sites are in the branch directory.</p>
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
