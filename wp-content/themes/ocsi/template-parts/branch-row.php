<?php
/**
 * One branch in a directory list.
 *
 * @package OCSI
 */

$region  = ocsi_meta( get_the_ID(), '_ocsi_region' );
$address = ocsi_meta( get_the_ID(), '_ocsi_address' );
?>
<li>
	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	<span class="directory__meta"><?php echo '' !== $region ? esc_html( $region ) : 'Region pending'; ?></span>
	<span class="directory__meta"><?php echo '' !== $address ? esc_html( $address ) : 'Address pending'; ?></span>
</li>
