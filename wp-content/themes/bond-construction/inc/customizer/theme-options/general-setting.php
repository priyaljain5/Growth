<?php
/**
 * General settings
 */
// General settings
$wp_customize->add_section(
	'bond_construction_general_section',
	array(
		'title' => esc_html__( 'General', 'bond-construction' ),
		'panel' => 'bond_construction_general_panel',
	)
);

// Breadcrumb enable setting
$wp_customize->add_setting(
	'bond_construction_breadcrumb_enable',
	array(
		'sanitize_callback' => 'bond_construction_sanitize_checkbox',
		'default' => true,
	)
);

$wp_customize->add_control(
	'bond_construction_breadcrumb_enable',
	array(
		'section'		=> 'bond_construction_general_section',
		'label'			=> esc_html__( 'Enable breadcrumb.', 'bond-construction' ),
		'type'			=> 'checkbox',
	)
);