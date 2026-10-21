<?php
/**
 * Single branch.
 *
 * @package OCSI
 */

get_header();

while ( have_posts() ) :
	the_post();
	$phone   = ocsi_meta( get_the_ID(), '_ocsi_phone' );
	$map_url = ocsi_meta( get_the_ID(), '_ocsi_map_url' );
	$hours   = ocsi_meta( get_the_ID(), '_ocsi_hours' );
	$region  = ocsi_meta( get_the_ID(), '_ocsi_region' );
	$address = ocsi_meta( get_the_ID(), '_ocsi_address' );
	?>
	<main id="main" class="wrap page-main">
		<p class="placeholder-flag">Branch record</p>
		<h1><?php the_title(); ?></h1>
		<dl class="meta-list">
			<div>
				<dt>Region</dt>
				<dd><?php echo '' !== $region ? esc_html( $region ) : 'Pending verification'; ?></dd>
			</div>
			<div>
				<dt>Address</dt>
				<dd><?php echo '' !== $address ? esc_html( $address ) : 'Pending verification'; ?></dd>
			</div>
			<div>
				<dt>Phone</dt>
				<dd>
					<?php if ( '' !== $phone ) : ?>
						<a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
					<?php else : ?>
						Pending verification
					<?php endif; ?>
				</dd>
			</div>
			<div>
				<dt>Hours</dt>
				<dd><?php echo '' !== $hours ? esc_html( $hours ) : 'Pending verification'; ?></dd>
			</div>
		</dl>
		<?php if ( '' !== $map_url ) : ?>
			<p><a href="<?php echo esc_url( $map_url ); ?>" rel="noopener noreferrer">Directions</a></p>
		<?php endif; ?>
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'large' ); ?>
		<?php endif; ?>
		<?php ocsi_the_editable_content(); ?>
		<p><a class="back-link" href="<?php echo esc_url( get_post_type_archive_link( 'branch' ) ); ?>">All branches</a></p>
	</main>
	<?php
endwhile;

get_footer();
