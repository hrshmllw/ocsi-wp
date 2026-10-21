<?php
/**
 * Branch archive.
 *
 * @package OCSI
 */

get_header();
?>
<main id="main" class="wrap page-main">
	<p class="placeholder-flag">Placeholder copy</p>
	<h1>Branch directory</h1>
	<p>Each published branch has its own page. Staff add and remove records in WordPress.</p>
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
