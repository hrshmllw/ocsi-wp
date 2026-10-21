<?php
/**
 * Generic archive.
 *
 * @package OCSI
 */

get_header();
?>
<main id="main" class="wrap page-main">
	<h1><?php the_archive_title(); ?></h1>
	<?php if ( have_posts() ) : ?>
		<ul class="text-links">
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile; ?>
		</ul>
		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<p>Nothing has been published here.</p>
	<?php endif; ?>
</main>
<?php
get_footer();
