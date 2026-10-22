<?php
/**
 * Vacancy archive.
 *
 * @package OCSI
 */

get_header();
?>
<main id="main" class="wrap page-main">
	<p class="placeholder-flag">Open roles are published by HR.</p>
	<h1>Open positions</h1>
	<p>HR publishes, edits, and closes vacancies in WordPress. Unpublished roles do not appear here.</p>
	<?php if ( have_posts() ) : ?>
		<ul class="directory">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/job', 'row' );
			endwhile;
			?>
		</ul>
		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<p>No vacancies are open.</p>
	<?php endif; ?>
</main>
<?php
get_footer();
