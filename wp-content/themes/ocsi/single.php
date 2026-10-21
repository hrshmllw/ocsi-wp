<?php
/**
 * Single post fallback.
 *
 * @package OCSI
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<main id="main" class="wrap page-main">
		<h1><?php the_title(); ?></h1>
		<div class="entry"><?php the_content(); ?></div>
	</main>
	<?php
endwhile;

get_footer();
