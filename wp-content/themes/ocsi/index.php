<?php
/**
 * Fallback index.
 *
 * @package OCSI
 */

get_header();
?>
<main id="main" class="wrap page-main">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<article <?php post_class( 'band' ); ?>>
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<div class="entry"><?php the_excerpt(); ?></div>
			</article>
		<?php endwhile; ?>
	<?php else : ?>
		<h1>Nothing published</h1>
		<p>There is no content to show here yet.</p>
	<?php endif; ?>
</main>
<?php
get_footer();
