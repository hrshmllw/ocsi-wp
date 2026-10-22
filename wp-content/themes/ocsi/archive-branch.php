<?php
/**
 * Branch archive.
 *
 * @package OCSI
 */

get_header();
?>
<main id="main" class="wrap page-main">
	<p class="placeholder-flag">Draft from public profiles. Confirm before publication.</p>
	<h1>Branch directory</h1>
	<p>Sites named in PhilJobNet, Jobstreet, and an FDA establishment record. Staff can correct an address in WordPress.</p>
	<?php if ( have_posts() ) : ?>
		<ul class="directory">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/branch', 'row' );
			endwhile;
			?>
		</ul>
		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<p>No branches have been published.</p>
	<?php endif; ?>
</main>
<?php
get_footer();
