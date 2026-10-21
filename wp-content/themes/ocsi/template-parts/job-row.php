<?php
/**
 * One vacancy in a directory list.
 *
 * @package OCSI
 */

$location   = ocsi_meta( get_the_ID(), '_ocsi_location' );
$department = ocsi_meta( get_the_ID(), '_ocsi_department' );
?>
<li>
	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	<span class="directory__meta"><?php echo '' !== $location ? esc_html( $location ) : 'Location pending'; ?></span>
	<span class="directory__meta"><?php echo '' !== $department ? esc_html( $department ) : 'Department pending'; ?></span>
</li>
