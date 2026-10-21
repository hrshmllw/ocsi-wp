<?php
/**
 * Search results.
 *
 * @package OCSI
 */

get_header();
?>
<main id="main" class="wrap page-main">
	<h1>Search results</h1>
	<?php if ( have_posts() ) : ?>
		<p>Results for “<?php echo esc_html( get_search_query() ); ?>”.</p>
		<ul class="text-links">
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile; ?>
		</ul>
		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<p>Nothing matched “<?php echo esc_html( get_search_query() ); ?>”.</p>
	<?php endif; ?>
</main>
<?php
get_footer();
