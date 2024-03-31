<?php
/**
 * 
 *
 * @see bond_construction_custom_header_setup().
 */
function bond_construction_header_text_style() {
	// If we get this far, we have custom styles. Let's do this.
	$header_text_display = get_theme_mod( 'bond_construction_header_text_display' );
	?>
	<style type="text/css">

	.site-title a{
		color: #<?php echo esc_attr( get_header_textcolor() ); ?>;
	}
	.site-description {
		color: <?php echo esc_attr( get_theme_mod( 'bond_construction_header_tagline', '#2e2e2e' ) ); ?>;
	}
	
	</style>

	<?php
}
add_action( 'wp_head', 'bond_construction_header_text_style' );