<?php
/**
 * Single vacancy.
 *
 * @package OCSI
 */

get_header();

while ( have_posts() ) :
	the_post();
	$department = ocsi_meta( get_the_ID(), '_ocsi_department' );
	$location   = ocsi_meta( get_the_ID(), '_ocsi_location' );
	$type       = ocsi_employment_label( ocsi_meta( get_the_ID(), '_ocsi_employment_type' ) );
	$closing    = ocsi_format_date( ocsi_meta( get_the_ID(), '_ocsi_closing_date' ) );
	$apply_url  = ocsi_meta( get_the_ID(), '_ocsi_apply_url' );
	?>
	<main id="main" class="wrap page-main">
		<p class="placeholder-flag">Vacancy</p>
		<h1><?php the_title(); ?></h1>
		<dl class="meta-list">
			<div>
				<dt>Department</dt>
				<dd><?php echo '' !== $department ? esc_html( $department ) : 'Not set'; ?></dd>
			</div>
			<div>
				<dt>Location</dt>
				<dd><?php echo '' !== $location ? esc_html( $location ) : 'Not set'; ?></dd>
			</div>
			<div>
				<dt>Employment type</dt>
				<dd><?php echo '' !== $type ? esc_html( $type ) : 'Not set'; ?></dd>
			</div>
			<div>
				<dt>Closing date</dt>
				<dd><?php echo '' !== $closing ? esc_html( $closing ) : 'None set'; ?></dd>
			</div>
		</dl>
		<?php ocsi_the_editable_content(); ?>
		<?php if ( '' !== $apply_url ) : ?>
			<p><a class="button" href="<?php echo esc_url( $apply_url ); ?>" rel="noopener noreferrer">Apply</a></p>
		<?php else : ?>
			<p>Apply link pending approval. This page does not accept CV uploads.</p>
		<?php endif; ?>
		<p><a class="back-link" href="<?php echo esc_url( ocsi_page_url( 'careers' ) ); ?>">Back to careers</a></p>
	</main>
	<?php
endwhile;

get_footer();
