<?php
/**
 * Planned page sections.
 *
 * @package OCSI
 *
 * @var array $args {
 *     @type string $intro
 *     @type array  $sections
 * }
 */

$intro    = isset( $args['intro'] ) ? (string) $args['intro'] : '';
$sections = isset( $args['sections'] ) && is_array( $args['sections'] ) ? $args['sections'] : array();
?>
<?php if ( '' !== $intro ) : ?>
	<p class="prose"><?php echo esc_html( $intro ); ?></p>
<?php endif; ?>
<?php foreach ( $sections as $section ) : ?>
	<?php
	$title = isset( $section['title'] ) ? (string) $section['title'] : '';
	$text  = isset( $section['text'] ) ? (string) $section['text'] : '';
	$id    = isset( $section['id'] ) ? (string) $section['id'] : '';
	if ( '' === $title ) {
		continue;
	}
	?>
	<section class="outline-section"<?php echo '' !== $id ? ' id="' . esc_attr( $id ) . '"' : ''; ?>>
		<h2><?php echo esc_html( $title ); ?></h2>
		<?php if ( '' !== $text ) : ?>
			<p><?php echo esc_html( $text ); ?></p>
		<?php endif; ?>
	</section>
<?php endforeach; ?>
