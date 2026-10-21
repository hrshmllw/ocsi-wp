<?php
/**
 * Missing page.
 *
 * @package OCSI
 */

get_header();
?>
<main id="main" class="wrap page-main">
	<h1>Page not found</h1>
	<p>That address does not match a page on this site.</p>
	<p><a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to the home page</a></p>
</main>
<?php
get_footer();
