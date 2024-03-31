<?php
/**
 *
 *
 * Footer copyright
 *
 *
 */
// Footer copyright
$wp_customize->add_section(
	'bond_construction_footer_section',
	array(
		'title' => esc_html__( 'Footer', 'bond-construction' ),
		'panel' => 'bond_construction_general_panel',
	)
);

// Footer copyright setting
$wp_customize->add_setting(
	'bond_construction_copyright_txt',
	array(
		'sanitize_callback' => 'bond_construction_sanitize_html',
		'default' => $default['bond_construction_copyright_txt'],
	)
);

$wp_customize->add_control(
	'bond_construction_copyright_txt',
	array(
		'section'		=> 'bond_construction_footer_section',
		'label'			=> esc_html__( 'Copyright text:', 'bond-construction' ),
		'type'			=> 'textarea',
	)
);
